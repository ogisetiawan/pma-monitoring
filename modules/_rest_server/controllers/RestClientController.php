<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class RestClientController extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
		$this->load->model('RestClientModels');
    }

    public function index_get() {
        $id = $this->get('id');
        $check = $this->RestClientModels->get_all('telepon');
        $a = $this->db->query('select * from telepon');
        print_r($a);
        die();
        
        // if ($id == '') {
        //     $kontak = $this->db->get('telepon')->result();
        // } else {
        //     $this->db->where('id', $id);
        //     $kontak = $this->db->get('telepon')->result();
        // }
        // $this->response($kontak, 200);

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    public function index_post() {
        $data = array(
            'id'    => $this->post('id'),
            'nama'  => $this->post('nama'),
            'nomor' => $this->post('nomor')
        );
        $insert = $this->db->insert('telepon', $data);
        
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
