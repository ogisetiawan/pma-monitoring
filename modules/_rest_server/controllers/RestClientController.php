<?php
set_time_limit(0);
ini_set('max_execution_time', '0');
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class RestClientController extends REST_Controller {
    public $table;
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('RestClientModels');
        $this->table = '_sum_sls_bydepo_daily';
    }

    public function index_get() {
        $command  = $this->get('command');
        $depo     = $this->get('m_plant');
        $inv_date = $this->get('m_inv_date');
        $custno   = $this->get('m_custno');
        if($command === NULL || $command != 'lbp'){
            /// IF PARAMETER COMMAND NULL
            $this->response([
                'status'  => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'Bad request'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }else{
            if($depo === NULL){
                $query = $this->RestClientModels->get_all($this->table);
                if($query->num_rows() > 0){
                    $this->response($query->result(), REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                        'message' => 'No data were found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
            }else{
                $this->db->where('KD_DEPO', $depo);
                $result = $this->db->get($this->table)->result();
                if(!empty($result)){
                    $this->response($result, REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                        'message' => 'No data were found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
            }
        }
    }

    public function index_post() {
        $data = array(
            'KD_DEPO'    => $this->post('KD_DEPO'),
            'INV_DATE'   => $this->post('INV_DATE'),
            'SLSNO'      => $this->post('SLSNO'),
            'OPRTYPE'    => $this->post('OPRTYPE'),
            'KG'         => $this->post('KG'),
            'TYPEOUT'    => $this->post('TYPEOUT'),
            'CUSTNO'     => $this->post('CUSTNO'),
            'CUSTNAME'   => $this->post('CUSTNAME'),
            'GRUP'       => $this->post('GRUP'),
            'BRUTAMOUNT' => $this->post('BRUTAMOUNT'),
            'CASHDISCT'  => $this->post('CASHDISCT'),
            'PROAMOUNT'  => $this->post('PROAMOUNT'),
            'DISC1'      => $this->post('DISC1'),
            'DISC2'      => $this->post('DISC2'),
            'PPN'        => $this->post('PPN'),
            'PCODE'      => $this->post('PCODE'),
            'QTY'        => $this->post('QTY'),
            'AMOUNT'     => $this->post('AMOUNT'),
            'NAMAPC'     => $this->post('NAMAPC'),
            'SATUAN'     => $this->post('SATUAN'),
            'CONVUNIT3'  => $this->post('CONVUNIT3'),
            'CONVUNIT2'  => $this->post('CONVUNIT2'),
            'NAMAFILE'   => $this->post('NAMAFILE'),
            'AREA'       => $this->post('AREA'),
            'KDRTR'      => $this->post('KDRTR'),
            'NMRTR'      => $this->post('NMRTR'),
            'TYPERTR'    => $this->post('TYPERTR'),
            'TRANSTYPE'  => $this->post('TRANSTYPE'),
            'ORDERNO'    => $this->post('ORDERNO'),
            'SLSNAME'    => $this->post('SLSNAME'),
            'TGL_TEMPO'  => $this->post('TGL_TEMPO'),
        );
        
        $insert = $this->db->insert($this->table, $data);
        
        if ($insert) {
            $this->response(array('status' => REST_Controller::HTTP_CREATED, 'message' => 'Success added a resource'));
        } else {
            $this->response(array('status' => REST_Controller::HTTP_BAD_REQUEST, 'message'=> 'Resource format error'));
        }
    }

}
