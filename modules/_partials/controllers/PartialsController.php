<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PartialsController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function app($data)
	{
		$this->meta_data($meta, $data['title']);
		$this->load->view('_app', $meta);
	}
	public function header()
	{
		$data['get_depo']   = $this->db->query("SELECT KD_DEPO,NM_DEPO FROM rdepo ORDER BY KD_DEPO")->result();
		$this->load->view('_header', $data);
	}
	public function footer()
	{
		$this->load->view('_footer');
	}
	public function master($data)
	{
		$this->load->view('master', $data);
	}

	public function checkLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$respone = "";
		if($username == 'admin' && $password == 'admin'){
			$session = array(
				'username'   => $username,
				'logged_monitoring' => TRUE,
			);
			$this->session->set_userdata($session);
			$respone = 1;
		}
		echo json_encode($respone);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
	public function form_nosales(){
		$depo   = $this->input->post('lblDepo');
		$reason = $this->input->post('lblReason');
		$modul  = $this->input->post('lblModul');
		$date   = $this->input->post('lblDate');

		if($modul == 'LBP'){
			$id = '01';
		}else if($modul == 'SAPKASBANK'){
			$id = '02';
		}else if($modul == 'SAPINV'){
			$id = '03';
		}else{
			$id = '04';
		}

		$insertArray = array(
			'module_id'                  => "$id-$date-$depo",
			'module_name'                => $modul,
			'module_site'                => $depo,
			'module_date'                => $date,
			'module_flag'                => $reason,
			'module_timestamp'	         => date('Y-m-d H:i:s'),
		);   
		// $this->db->insert('rmodule_monitor',$insertArray);
		echo json_encode($depo);
	}
}
