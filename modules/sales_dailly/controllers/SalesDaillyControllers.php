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

	private function dots(&$monthPOST, &$yearPOST, &$tgl_live_depo, &$tgl1, &$penjualan1, &$retur1, &$tgl2, &$penjualan2, &$retur2, &$tgl3, &$penjualan3, &$retur3, &$tgl4, &$penjualan4, &$retur4, &$tgl5, &$penjualan5, &$retur5, &$tgl6, &$penjualan6, &$retur6, &$tgl7, &$penjualan7, &$retur7, &$tgl8, &$penjualan8, &$retur8, &$tgl9, &$penjualan9, &$retur9, &$tgl10, &$penjualan10, &$retur10, &$tgl11, &$penjualan11, &$retur11, &$tgl12, &$penjualan12, &$retur12, &$tgl13, &$penjualan13, &$retur13, &$tgl14, &$penjualan14, &$retur14, &$tgl15, &$penjualan15, &$retur15, &$tgl16, &$penjualan16, &$retur16, &$tgl17, &$penjualan17, &$retur17, &$tgl18, &$penjualan18, &$retur18, &$tgl19, &$penjualan19, &$retur19, &$tgl20, &$penjualan20, &$retur20, &$tgl21, &$penjualan21, &$retur21, &$tgl22, &$penjualan22, &$retur22, &$tgl23, &$penjualan23, &$retur23, &$tgl24, &$penjualan24, &$retur24, &$tgl25, &$penjualan25, &$retur25, &$tgl26, &$penjualan26, &$retur26, &$tgl27, &$penjualan27, &$retur27, &$tgl28, &$penjualan28, &$retur28, &$tgl29, &$penjualan29, &$retur29, &$tgl30, &$penjualan30, &$retur30, &$tgl31, &$penjualan31, &$retur31)
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
					//! add data  ke dalam variabel looping
					//? jika ada value di variable dan $i kurang dari tgl sekarang
					if (${"tgl$i"} && $i <= $date) {
						${"penjualan$i"} = number_format(empty(${"penjualan$i"}) ? "0" : ${"penjualan$i"});
						${"retur$i"} = number_format(empty(${"retur$i"}) ? "0" : ${"retur$i"});
					} else if (!${"tgl$i"} && $i <= $date) {
						${"penjualan$i"} = '<p style="color: red;">&#8226;</p>';
						${"retur$i"} = '<p style="color: red;">&#8226;</p>';
					} else {
						${"penjualan$i"} = '<p style="text-align:center; font-size:12px;">-</p>';
						${"retur$i"} = '<p style="text-align:center; font-size:12px;">-</p>';
					}
				//? bulan dan tahun sudah berlalu
				} else {
					//? bulan skrg kurang dari bulan post
					if ($month <= $monthPOST) {
						${"penjualan$i"} = '<p style="text-align:center;">-</p>';
						${"retur$i"} = '<p style="text-align:center;">-</p>';
					} else {
					//? periode sekarang						
						if (${"tgl$i"}) {
							${"penjualan$i"} = number_format(empty(${"penjualan$i"}) ? "0" : ${"penjualan$i"});
							${"retur$i"} = number_format(empty(${"retur$i"}) ? "0" : ${"retur$i"});
						} else {
							${"penjualan$i"} = '<p style="color: red;">&#8226;</p>';
							${"retur$i"} = '<p style="color: red;">&#8226;</p>';
						}
					}
				}
			} else {
				${"penjualan$i"} = '<p style="text-align:center;">-</p>';
				${"retur$i"} = '<p style="text-align:center;">-</p>';
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

			//? parse data to convert dots_status_color
			$this->dots($monthPOST, $yearPOST, $val->tanggal_live_depo, $val->tanggal_1, $val->penjualan_1, $val->retur_1, $val->tanggal_2, $val->penjualan_2, $val->retur_2, $val->tanggal_3, $val->penjualan_3, $val->retur_3, $val->tanggal_4, $val->penjualan_4, $val->retur_4, $val->tanggal_5, $val->penjualan_5, $val->retur_5, $val->tanggal_6, $val->penjualan_6, $val->retur_6, $val->tanggal_7, $val->penjualan_7, $val->retur_7, $val->tanggal_8, $val->penjualan_8, $val->retur_8, $val->tanggal_9, $val->penjualan_9, $val->retur_9, $val->tanggal_10, $val->penjualan_10, $val->retur_10, $val->tanggal_11, $val->penjualan_11, $val->retur_11, $val->tanggal_12, $val->penjualan_12, $val->retur_12, $val->tanggal_13, $val->penjualan_13, $val->retur_13, $val->tanggal_14, $val->penjualan_14, $val->retur_14, $val->tanggal_15, $val->penjualan_15, $val->retur_15, $val->tanggal_16, $val->penjualan_16, $val->retur_16, $val->tanggal_17, $val->penjualan_17, $val->retur_17, $val->tanggal_18, $val->penjualan_18, $val->retur_18, $val->tanggal_19, $val->penjualan_19, $val->retur_19, $val->tanggal_20, $val->penjualan_20, $val->retur_20, $val->tanggal_21, $val->penjualan_21, $val->retur_21, $val->tanggal_22, $val->penjualan_22, $val->retur_22, $val->tanggal_23, $val->penjualan_23, $val->retur_23, $val->tanggal_24, $val->penjualan_24, $val->retur_24, $val->tanggal_25, $val->penjualan_25, $val->retur_25, $val->tanggal_26, $val->penjualan_26, $val->retur_26, $val->tanggal_27, $val->penjualan_27, $val->retur_27, $val->tanggal_28, $val->penjualan_28, $val->retur_28, $val->tanggal_29, $val->penjualan_29, $val->retur_29, $val->tanggal_30, $val->penjualan_30, $val->retur_30,  $val->tanggal_31, $val->penjualan_31, $val->retur_31);

			for ($i = 1; $i <= 31; $i++) {
				$row[] = $val->{"penjualan_$i"};
				$row[] = $val->{"retur_$i"};
			}


			// $row[]  = number_format(empty($val->penjualan_1) ? "0" : $val->penjualan_1);
			// $row[]  = number_format(empty($val->retur_1) ? "0" : $val->retur_1);
			// $row[]  = number_format(empty($val->penjualan_2) ? "0" : $val->penjualan_2);
			// $row[]  = number_format(empty($val->retur_2) ? "0" : $val->retur_2);
			// $row[]  = number_format(empty($val->penjualan_3) ? "0" : $val->penjualan_3);
			// $row[]  = number_format(empty($val->retur_3) ? "0" : $val->retur_3);
			// $row[]  = number_format(empty($val->penjualan_4) ? "0" : $val->penjualan_4);
			// $row[]  = number_format(empty($val->retur_4) ? "0" : $val->retur_4);
			// $row[]  = number_format(empty($val->penjualan_5) ? "0" : $val->penjualan_5);
			// $row[]  = number_format(empty($val->retur_5) ? "0" : $val->retur_5);
			// $row[]  = number_format(empty($val->penjualan_6) ? "0" : $val->penjualan_6);
			// $row[]  = number_format(empty($val->retur_6) ? "0" : $val->retur_6);
			// $row[]  = number_format(empty($val->penjualan_7) ? "0" : $val->penjualan_7);
			// $row[]  = number_format(empty($val->retur_7) ? "0" : $val->retur_7);
			// $row[]  = number_format(empty($val->penjualan_8) ? "0" : $val->penjualan_8);
			// $row[]  = number_format(empty($val->retur_8) ? "0" : $val->retur_8);
			// $row[]  = number_format(empty($val->penjualan_9) ? "0" : $val->penjualan_9);
			// $row[]  = number_format(empty($val->retur_9) ? "0" : $val->retur_9);
			// $row[]  = number_format(empty($val->penjualan_10) ? "0" : $val->penjualan_10);
			// $row[]  = number_format(empty($val->retur_10) ? "0" : $val->retur_10);
			// $row[]  = number_format(empty($val->penjualan_11) ? "0" : $val->penjualan_11);
			// $row[]  = number_format(empty($val->retur_11) ? "0" : $val->retur_11);
			// $row[]  = number_format(empty($val->penjualan_12) ? "0" : $val->penjualan_12);
			// $row[]  = number_format(empty($val->retur_12) ? "0" : $val->retur_12);
			// $row[]  = number_format(empty($val->penjualan_13) ? "0" : $val->penjualan_13);
			// $row[]  = number_format(empty($val->retur_13) ? "0" : $val->retur_13);
			// $row[]  = number_format(empty($val->penjualan_14) ? "0" : $val->penjualan_14);
			// $row[]  = number_format(empty($val->retur_14) ? "0" : $val->retur_14);
			// $row[]  = number_format(empty($val->penjualan_15) ? "0" : $val->penjualan_15);
			// $row[]  = number_format(empty($val->retur_15) ? "0" : $val->retur_15);
			// $row[]  = number_format(empty($val->penjualan_16) ? "0" : $val->penjualan_16);
			// $row[]  = number_format(empty($val->retur_16) ? "0" : $val->retur_16);
			// $row[]  = number_format(empty($val->penjualan_17) ? "0" : $val->penjualan_17);
			// $row[]  = number_format(empty($val->retur_17) ? "0" : $val->retur_17);
			// $row[]  = number_format(empty($val->penjualan_18) ? "0" : $val->penjualan_18);
			// $row[]  = number_format(empty($val->retur_18) ? "0" : $val->retur_18);
			// $row[]  = number_format(empty($val->penjualan_19) ? "0" : $val->penjualan_19);
			// $row[]  = number_format(empty($val->retur_19) ? "0" : $val->retur_19);
			// $row[]  = number_format(empty($val->penjualan_20) ? "0" : $val->penjualan_20);
			// $row[]  = number_format(empty($val->retur_20) ? "0" : $val->retur_20);
			// $row[]  = number_format(empty($val->penjualan_21) ? "0" : $val->penjualan_21);
			// $row[]  = number_format(empty($val->retur_21) ? "0" : $val->retur_21);
			// $row[]  = number_format(empty($val->penjualan_22) ? "0" : $val->penjualan_22);
			// $row[]  = number_format(empty($val->retur_22) ? "0" : $val->retur_22);
			// $row[]  = number_format(empty($val->penjualan_23) ? "0" : $val->penjualan_23);
			// $row[]  = number_format(empty($val->retur_23) ? "0" : $val->retur_23);
			// $row[]  = number_format(empty($val->penjualan_24) ? "0" : $val->penjualan_24);
			// $row[]  = number_format(empty($val->retur_24) ? "0" : $val->retur_24);
			// $row[]  = number_format(empty($val->penjualan_25) ? "0" : $val->penjualan_25);
			// $row[]  = number_format(empty($val->retur_25) ? "0" : $val->retur_25);
			// $row[]  = number_format(empty($val->penjualan_26) ? "0" : $val->penjualan_26);
			// $row[]  = number_format(empty($val->retur_26) ? "0" : $val->retur_26);
			// $row[]  = number_format(empty($val->penjualan_27) ? "0" : $val->penjualan_27);
			// $row[]  = number_format(empty($val->retur_27) ? "0" : $val->retur_27);
			// $row[]  = number_format(empty($val->penjualan_28) ? "0" : $val->penjualan_28);
			// $row[]  = number_format(empty($val->retur_28) ? "0" : $val->retur_28);
			// $row[]  = number_format(empty($val->penjualan_29) ? "0" : $val->penjualan_29);
			// $row[]  = number_format(empty($val->retur_29) ? "0" : $val->retur_29);
			// $row[]  = number_format(empty($val->penjualan_30) ? "0" : $val->penjualan_30);
			// $row[]  = number_format(empty($val->retur_30) ? "0" : $val->retur_30);
			// $row[]  = number_format(empty($val->penjualan_31) ? "0" : $val->penjualan_31);
			// $row[]  = number_format(empty($val->retur_31) ? "0" : $val->retur_31);

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
