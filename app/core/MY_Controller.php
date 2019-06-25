<?php (defined('BASEPATH')) or exit('No direct script access allowed');

require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{
	public $keyword;
	public $description;
	function __construct()
	{
		parent::__construct();
		$this->keyword     = 'Nabati, Pinus Merah Abadi, Kaldu Sari Nabati';
		$this->description = 'Monitoring';
	}
	public function meta_data(&$meta, $title)
	{
		$meta = array(
			'title'       => $title,
			'keyword'     => $this->keyword,
			'description' => $this->description,
		);
	}
	public function template($page, $data = NULL)
	{
		$data['content'] = $this->parser->parse($page, $data, TRUE);
		$data['app']     = modules::run('_partials/PartialsController/app', $data);
		$data['header']  = modules::run('_partials/PartialsController/header', $data);
		$data['footer']  = modules::run('_partials/PartialsController/footer', $data);
		$this->parser->parse('_partials/master', $data);
	}
}
