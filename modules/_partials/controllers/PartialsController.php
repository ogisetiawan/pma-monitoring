<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PartialsController extends MY_Controller
{
	public function app($data)
	{
		$this->meta_data($meta, $data['title']);
		$this->load->view('_app', $meta);
	}
	public function header()
	{
		$this->load->view('_header');
	}
	public function footer()
	{
		$this->load->view('_footer');
	}
	public function master($data)
	{
		$this->load->view('master', $data);
	}
}
