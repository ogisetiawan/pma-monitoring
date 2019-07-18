<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PartialsController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		$this->load->database();
	}
	public function app($data)
	{
		$this->meta_data($meta, $data['title']);
		$this->load->view('_app', $meta);
	}
	public function header()
	{
		$data['get_depo'] = $this->db->query("SELECT KD_DEPO,NM_DEPO FROM rdepo where status = 'A' and status_system = 'SCYLLA' and STA01 = 'PMA' ORDER BY KD_DEPO ASC")->result();
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

	public function checkLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$respone = "";
		if ($username == 'admin' && $password == 'admin') {
			$session = array(
				'username'   => $username,
				'logged_monitoring' => TRUE,
			);
			$this->session->set_userdata($session);
			$respone = 1;
		}
		echo json_encode($respone);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
	private function form_(&$module_id, &$module_name = NULL, &$insertArray)
	{
		$depo    = $this->input->post('lblDepo');
		$reason  = $this->input->post('lblReason');
		$modul   = $this->input->post('lblModul');
		$date    = $this->input->post('lblDate');
		$newDate = date("dmY", strtotime($date));
		if ($modul == 'LBP') {
			$id = '01';
		} else if ($modul == 'SAPKASBANK') {
			$id = '02';
		} else if ($modul == 'SAPINV') {
			$id = '03';
		} else {
			$id = '04';
		}
		$insertArray = array(
			'module_id'                  => "$id-$newDate-$depo",
			'module_name'                => $modul,
			'module_site'                => $depo,
			'module_date'                => $date,
			'module_flag'                => $reason,
			'module_timestamp'	         => date('Y-m-d H:i:s'),
		);
		$module_id = $insertArray['module_id'];
		$module_name = $insertArray['module_name'];
	}
	public function check_form_nosales()
	{
		$this->form_($module_id, $module_name, $insertArray);
		$check = $this->db->query("SELECT * FROM rmodule_monitor WHERE module_id = '$module_id' AND module_name = '$module_name' ");
		if ($check->num_rows() > 0) {
			$status = 1;
		} else {
			$status = 2;
		}
		echo json_encode($status);
	}
	public function insertUpdate_form_nosales()
	{
		$this->form_($module_id, $module_name, $insertArray);
		$status = $this->input->post('status');
		if ($status == 'Updated') {
			$this->db->where('module_id', $module_id);
			$this->db->update('rmodule_monitor', $insertArray);
			$respone = 'update';
		} else {
			$this->db->insert('rmodule_monitor', $insertArray);
			$respone = 'insert';
		}
		echo json_encode($status);
	}
}
