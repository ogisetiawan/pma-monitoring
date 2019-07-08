<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesDaillyControllers extends MY_Controller
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

		//? variable looping in condition
		for ($i = 1; $i <= 31; $i++) {
			//! check depo sudah live?
			if ($year . "-" . $month . "-" . $i >= $tgl_live_depo) {
				//? check bulan dan tahun sudah berlalu?
				if ($month == $monthPOST && $year == $yearPOST) {
					//? add data  ke dalam variabel looping
					//! jika ada value di variable dan $i kurang dari tgl sekarang
					if (${"tgl$i"} && $i <= $date) {
						${"tgl$i"} = '<p style="color: green;">&#8226;</p>';
					} else if (!${"tgl$i"} && $i <= $date) {
						${"tgl$i"} = '<p style="color: red;">&#8226;</p>';
					} else {
						${"tgl$i"} = '-';
					}
				} else {
					if ($month <= $monthPOST) {
						${"tgl$i"} = '-';
					} else {
						if (${"tgl$i"}) {
							$dots = 'green';
						} else {
							$dots = 'red';
						}
						${"tgl$i"} = '<p style="color: ' . $dots . ';">&#8226;</p>';
					}
				}
			} else {
				${"tgl$i"} = '<p style="text-align:center;">-</p>';
			}
		}
	}

	public function index()
	{
		$this->meta_data($meta, 'Monitoring Sales Dailly - Pinus Merah Abadi');
		// $this->template('sales_dailly', $meta);
		$this->template('sales_dailly copy', $meta);
	}

	public function table_monitoring()
	{
		$this->load->model('Tbl_SalesDaillyModels');
		$query     = $this->Tbl_SalesDaillyModels->get_datatables();
		$data      = array();
		$monthPOST = $this->input->post('bulan');
		$yearPOST  = $this->input->post('tahun');

		foreach ($query as $val) {
			//? table value
			$row    = array();
			$r = '<p style="color: red;">&#8226;</p>';
			$row[]  = $val->kode_site;
			$row[]  = $val->nama_site;
			$row[]  = $val->area;
			$row[]  = $val->divisi;
			$row[]  = $val->status_system;
			
			$row[]  = number_format(empty($val->penjualan_1) ? "0" : $val->penjualan_1);
			$row[]  = number_format(empty($val->retur_1) ? "0" : $val->retur_1);
			$row[]  = number_format(empty($val->penjualan_2) ? "0" : $val->penjualan_2);
			$row[]  = number_format(empty($val->retur_2) ? "0" : $val->retur_2);
			$row[]  = number_format(empty($val->penjualan_3) ? "0" : $val->penjualan_3);
			$row[]  = number_format(empty($val->retur_3) ? "0" : $val->retur_3);
			$row[]  = number_format(empty($val->penjualan_4) ? "0" : $val->penjualan_4);
			$row[]  = number_format(empty($val->retur_4) ? "0" : $val->retur_4);
			$row[]  = number_format(empty($val->penjualan_5) ? "0" : $val->penjualan_5);
			$row[]  = number_format(empty($val->retur_5) ? "0" : $val->retur_5);
			$row[]  = number_format(empty($val->penjualan_6) ? "0" : $val->penjualan_6);
			$row[]  = number_format(empty($val->retur_6) ? "0" : $val->retur_6);
			$row[]  = number_format(empty($val->penjualan_7) ? "0" : $val->penjualan_7);
			$row[]  = number_format(empty($val->retur_7) ? "0" : $val->retur_7);
			$row[]  = number_format(empty($val->penjualan_8) ? "0" : $val->penjualan_8);
			$row[]  = number_format(empty($val->retur_8) ? "0" : $val->retur_8);
			$row[]  = number_format(empty($val->penjualan_9) ? "0" : $val->penjualan_9);
			$row[]  = number_format(empty($val->retur_9) ? "0" : $val->retur_9);
			$row[]  = number_format(empty($val->penjualan_10) ? "0" : $val->penjualan_10);
			$row[]  = number_format(empty($val->retur_10) ? "0" : $val->retur_10);
			$row[]  = number_format(empty($val->penjualan_11) ? "0" : $val->penjualan_11);
			$row[]  = number_format(empty($val->retur_11) ? "0" : $val->retur_11);
			$row[]  = number_format(empty($val->penjualan_12) ? "0" : $val->penjualan_12);
			$row[]  = number_format(empty($val->retur_12) ? "0" : $val->retur_12);
			$row[]  = number_format(empty($val->penjualan_13) ? "0" : $val->penjualan_13);
			$row[]  = number_format(empty($val->retur_13) ? "0" : $val->retur_13);
			$row[]  = number_format(empty($val->penjualan_14) ? "0" : $val->penjualan_14);
			$row[]  = number_format(empty($val->retur_14) ? "0" : $val->retur_14);
			$row[]  = number_format(empty($val->penjualan_15) ? "0" : $val->penjualan_15);
			$row[]  = number_format(empty($val->retur_15) ? "0" : $val->retur_15);
			$row[]  = number_format(empty($val->penjualan_16) ? "0" : $val->penjualan_16);
			$row[]  = number_format(empty($val->retur_16) ? "0" : $val->retur_16);
			$row[]  = number_format(empty($val->penjualan_17) ? "0" : $val->penjualan_17);
			$row[]  = number_format(empty($val->retur_17) ? "0" : $val->retur_17);
			$row[]  = number_format(empty($val->penjualan_18) ? "0" : $val->penjualan_18);
			$row[]  = number_format(empty($val->retur_18) ? "0" : $val->retur_18);
			$row[]  = number_format(empty($val->penjualan_19) ? "0" : $val->penjualan_19);
			$row[]  = number_format(empty($val->retur_19) ? "0" : $val->retur_19);
			$row[]  = number_format(empty($val->penjualan_20) ? "0" : $val->penjualan_20);
			$row[]  = number_format(empty($val->retur_20) ? "0" : $val->retur_20);
			$row[]  = number_format(empty($val->penjualan_21) ? "0" : $val->penjualan_21);
			$row[]  = number_format(empty($val->retur_21) ? "0" : $val->retur_21);
			$row[]  = number_format(empty($val->penjualan_22) ? "0" : $val->penjualan_22);
			$row[]  = number_format(empty($val->retur_22) ? "0" : $val->retur_22);
			$row[]  = number_format(empty($val->penjualan_23) ? "0" : $val->penjualan_23);
			$row[]  = number_format(empty($val->retur_23) ? "0" : $val->retur_23);
			$row[]  = number_format(empty($val->penjualan_24) ? "0" : $val->penjualan_24);
			$row[]  = number_format(empty($val->retur_24) ? "0" : $val->retur_24);
			$row[]  = number_format(empty($val->penjualan_25) ? "0" : $val->penjualan_25);
			$row[]  = number_format(empty($val->retur_25) ? "0" : $val->retur_25);
			$row[]  = number_format(empty($val->penjualan_26) ? "0" : $val->penjualan_26);
			$row[]  = number_format(empty($val->retur_26) ? "0" : $val->retur_26);
			$row[]  = number_format(empty($val->penjualan_27) ? "0" : $val->penjualan_27);
			$row[]  = number_format(empty($val->retur_27) ? "0" : $val->retur_27);
			$row[]  = number_format(empty($val->penjualan_28) ? "0" : $val->penjualan_28);
			$row[]  = number_format(empty($val->retur_28) ? "0" : $val->retur_28);
			$row[]  = number_format(empty($val->penjualan_29) ? "0" : $val->penjualan_29);
			$row[]  = number_format(empty($val->retur_29) ? "0" : $val->retur_29);
			$row[]  = number_format(empty($val->penjualan_30) ? "0" : $val->penjualan_30);
			$row[]  = number_format(empty($val->retur_30) ? "0" : $val->retur_30);
			$row[]  = number_format(empty($val->penjualan_31) ? "0" : $val->penjualan_31);
			$row[]  = number_format(empty($val->retur_31) ? "0" : $val->retur_31);

			$data[] = $row;
		}
		$output = array(
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->Tbl_SalesDaillyModels->count_all(),
			"recordsFiltered" => $this->Tbl_SalesDaillyModels->count_filtered(),
			"data"            => $data,
		);
		echo json_encode($output);
	}

	public function search_region()
	{
		$greg = $this->input->post('grup_region');
		$query = $this->db->query("SELECT * FROM rmstreg WHERE KD_GREG='$greg' order by NM_REG")->result();
		echo "<option value=''>-- SELECT REGION --</option>";
		foreach ($query as $value) {
			echo "<option value=\"" . $value->KD_REG . "\" >" . $value->NM_REG . "</option>\n";
		}
	}

	public function get_status_dots()
	{
		//! get count status dots /date
		$this->load->database();
		$tgl    = $this->uri->segment('2');
		$bulan  = $this->uri->segment('3');
		$tahun  = $this->uri->segment('4');
		$query  = $this->db->query("SELECT KD_DEPO NM_DEPO, INV_DATE,
		(SELECT count(*)
		FROM Sum_SLS_BYDEPO_DAILY
		WHERE DATE_FORMAT(INV_DATE, '%Y %m %d') =  DATE_FORMAT('" . $tahun . "-" . $bulan . "-" . $tgl . "', '%Y %m %d')) as data_done, 
		(select COUNT(*) from rdepo where status_system = 'SCYLLA' AND status ='A')-(SELECT count(*)
		FROM Sum_SLS_BYDEPO_DAILY
		WHERE DATE_FORMAT(INV_DATE, '%Y %m %d') =  DATE_FORMAT('" . $tahun . "-" . $bulan . "-" . $tgl . "', '%Y %m %d')) as data_undone
		FROM Sum_SLS_BYDEPO_DAILY
		WHERE DATE_FORMAT(INV_DATE, '%Y %m') =  DATE_FORMAT('" . $tahun . "-" . $bulan . "-" . $tgl . "', '%Y %m')
		")->result();
		echo json_encode($query);
	}
}
