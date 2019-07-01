<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MonitoringControllers extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->database();
	}

	private function dots(&$monthPOST, &$yearPOST, &$tgl_live_depo, &$tgl1, &$tgl2, &$tgl3, &$tgl4, &$tgl5, &$tgl6, &$tgl7, &$tgl8, &$tgl9, &$tgl10, &$tgl11, &$tgl12, &$tgl13, &$tgl14, &$tgl15, &$tgl16, &$tgl17, &$tgl18, &$tgl19, &$tgl20, &$tgl21, &$tgl22, &$tgl23, &$tgl24, &$tgl25, &$tgl26, &$tgl27, &$tgl28, &$tgl29, &$tgl30, &$tgl31)
	{
		$date  = date("d");
		$month = date("m");
		$year  = date("Y");

		//? looping in condition
		for ($i = 1; $i <= 30; $i++) {
			if ($year . "-" . $month . "-" . $i >= $tgl_live_depo) {
				if ($month == $monthPOST && $year == $yearPOST) { //! check month and year past?
					if (${"tgl$i"} && $i <= $date) {
						${"tgl$i"} = '<p style="color: green;">&#8226;</p>';
					} else if (!${"tgl$i"} && $i <= $date) {
						${"tgl$i"} = '<p style="color: red;">&#8226;</p>';
					} else {
						${"tgl$i"} = '-';
					}
				} else {
					if($month <= $monthPOST){
						${"tgl$i"} = '-';
					}else{
						if (${"tgl$i"}) {
							$dots = 'green';
						} else {
							$dots = 'red';
						}
						${"tgl$i"} = '<p style="color: '.$dots.';">&#8226;</p>';
					}
				}
			} else {
				${"tgl$i"} = '<p style="text-align:center;">-</p>';
			}
		}
	}

	public function index()
	{
		$this->meta_data($meta, 'Dashboard Monitoring - Pinus Merah Abadi');
		$this->template('monitoring', $meta);
	}

	public function table_monitoring()
	{
		$this->load->model('Tbl_MonitoringModels');
		$query           = $this->Tbl_MonitoringModels->get_datatables();
		$month 		     = date("m");
		$data            = array();
		$no              = $_POST['start'];
        $monthPOST 		 = $this->input->post('bulan');
		$yearPOST        = $this->input->post('tahun');

		foreach ($query as $val) {
			//? parse tanggal to dots
			$this->dots($monthPOST, $yearPOST, $val->tanggal_live_depo, $val->tanggal_1, $val->tanggal_2, $val->tanggal_3, $val->tanggal_4, $val->tanggal_5, $val->tanggal_6, $val->tanggal_7, $val->tanggal_8, $val->tanggal_9, $val->tanggal_10, $val->tanggal_11, $val->tanggal_12, $val->tanggal_13, $val->tanggal_14, $val->tanggal_15, $val->tanggal_16, $val->tanggal_17, $val->tanggal_18, $val->tanggal_19, $val->tanggal_20, $val->tanggal_21, $val->tanggal_22, $val->tanggal_23, $val->tanggal_24, $val->tanggal_25, $val->tanggal_26, $val->tanggal_27, $val->tanggal_28, $val->tanggal_29, $val->tanggal_30, $val->tanggal_31);

			//? table value
			$no++;
			$row    = array();
			$row[]  = $no;
			$row[]  = $val->kode_site;
			$row[]  = $val->nama_site;
			$row[]  = $val->area;
			$row[]  = $val->divisi;
			$row[]  = $val->status_system;

			if ($month == '01' OR $month == '03' OR $month == '05' OR $month == '07' OR $month == '08' OR $month == '10' OR $month == '12'){
				$date_calendar = 31;
			}else if ($month == '04' OR $month == '06' OR $month == '09' or $month == '11') {
				$date_calendar = 30;
			}else{
				$date_calendar = 28;
			}
			
			//? looping cretae variable date
			for ($i = 1; $i <= 31; $i++) {
				$row[] = $val->{"tanggal_$i"};
			}

			$data[] = $row;
		}
		$output = array(
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->Tbl_MonitoringModels->count_all(),
			"recordsFiltered" => $this->Tbl_MonitoringModels->count_filtered(),
			"data"            => $data,
		);
		echo json_encode($output);
	}

	public function search_region(){
		$greg = $this->input->post('grup_region');
		$query = $this->db->query("SELECT * FROM rmstreg WHERE KD_GREG='$greg' order by NM_REG")->result();
		echo "<option value=''>-- PILIH REGION --</option>";
		foreach ($query as $value) {
			echo "<option value=\"".$value->KD_REG."\" >".$value->NM_REG."</option>\n";
		}
	}
	
	public function get_status_dots()
	{
		//! get count status dots /date
		$this->load->database();
		$tgl    = $this->uri->segment('2');
		$module = $this->uri->segment('3');
		$bulan  = $this->uri->segment('4');
		$tahun  = $this->uri->segment('5');
		$query  = $this->db->query("SELECT module_id, module_date,
		(SELECT count(*)
		FROM rmodule_monitor
		WHERE module_name = '$module' 
		AND DATE_FORMAT(module_date, '%Y %m %d') = DATE_FORMAT('".$tahun."-".$bulan."-".$tgl."', '%Y %m %d')) as data_done, 
		(select COUNT(*) from rdepo where status_system = 'SCYLLA' AND status ='A')-(SELECT count(*)
		FROM rmodule_monitor
		WHERE module_name = '$module' 
		AND DATE_FORMAT(module_date, '%Y %m %d') = DATE_FORMAT('".$tahun."-".$bulan."-".$tgl."', '%Y %m %d')) as data_undone
		FROM rmodule_monitor
		WHERE module_name = '$module' 
		AND DATE_FORMAT(module_date, '%Y %m') = DATE_FORMAT('".$tahun."-".$bulan."-".$tgl."', '%Y %m')
		")->result();
		echo json_encode($query);
	}
}