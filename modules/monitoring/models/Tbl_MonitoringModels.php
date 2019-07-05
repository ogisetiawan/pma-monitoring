<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tbl_MonitoringModels extends CI_Model
{
    var $table = 'rdepo as d';
    var $column_order = array(null, 'kode_site', 'd.NM_DEPO');
    var $column_search = array('kode_site', 'd.NM_DEPO');
    var $order = array('d.KD_DEPO' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    private function _get_datatables_query()
    {
        $bln         = $this->input->post('bulan');
        $thn         = $this->input->post('tahun');
        $grup_region = $this->input->post('grup_region');
        $region      = $this->input->post('region');
        $modul       = $this->input->post('modul');
        //? show antoher field 
            $select_table_coloumn = "MAX(odate.prevdate) prevdate, MAX(odate.next_date)as next, d.KD_DEPO as kode_site,
            (
                SELECT max(module_date)
                FROM rmodule_monitor
                WHERE module_name = '$modul'
                AND module_site = kode_site
                AND DATE_FORMAT(MODULE_DATE, '%Y %m') = DATE_FORMAT('$thn-$bln-01', '%Y %m')
            ) as last_transaksi,
            CASE
                WHEN d.sta01 = 'PMA' THEN 'PINUS MERAH ABADI, PT'
            ELSE d.NM_DEPO
                END AS nama_site,
            CASE
                    WHEN d.sta01 = 'PMA' AND substr(d.nm_depo,1,3) = 'PMA' THEN trim(replace(replace(substr(d.NM_DEPO,5),'MT',''),'GT',''))
                    WHEN d.sta01 = 'PMA' AND substr(d.nm_depo,1,3) <> 'PMA' THEN trim(replace(replace(d.NM_DEPO,'MT',''),'GT',''))
            ELSE d.NM_DEPO
            END AS area, d.divisi divisi,
            COALESCE(MAX(CASE WHEN a.tgl = '01' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') as tanggal_1,
            COALESCE(MAX(CASE WHEN a.tgl = '02' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') as tanggal_2,
            COALESCE(MAX(CASE WHEN a.tgl = '03' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') as tanggal_3,
            COALESCE(MAX(CASE WHEN a.tgl = '04' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') as tanggal_4,
            COALESCE(MAX(CASE WHEN a.tgl = '05' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_5,
            COALESCE(MAX(CASE WHEN a.tgl = '06' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_6,
            COALESCE(MAX(CASE WHEN a.tgl = '07' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_7,
            COALESCE(MAX(CASE WHEN a.tgl = '08' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_8,
            COALESCE(MAX(CASE WHEN a.tgl = '09' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_9,
            COALESCE(MAX(CASE WHEN a.tgl = '10' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_10,
            COALESCE(MAX(CASE WHEN a.tgl = '11' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_11,
            COALESCE(MAX(CASE WHEN a.tgl = '12' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_12,
            COALESCE(MAX(CASE WHEN a.tgl = '13' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_13,
            COALESCE(MAX(CASE WHEN a.tgl = '14' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_14,
            COALESCE(MAX(CASE WHEN a.tgl = '15' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_15,
            COALESCE(MAX(CASE WHEN a.tgl = '16' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_16,
            COALESCE(MAX(CASE WHEN a.tgl = '17' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_17,
            COALESCE(MAX(CASE WHEN a.tgl = '18' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_18,
            COALESCE(MAX(CASE WHEN a.tgl = '19' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_19,
            COALESCE(MAX(CASE WHEN a.tgl = '20' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_20,
            COALESCE(MAX(CASE WHEN a.tgl = '21' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_21,
            COALESCE(MAX(CASE WHEN a.tgl = '22' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_22,
            COALESCE(MAX(CASE WHEN a.tgl = '23' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_23,
            COALESCE(MAX(CASE WHEN a.tgl = '24' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_24,
            COALESCE(MAX(CASE WHEN a.tgl = '25' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_25,
            COALESCE(MAX(CASE WHEN a.tgl = '26' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_26,
            COALESCE(MAX(CASE WHEN a.tgl = '27' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_27,
            COALESCE(MAX(CASE WHEN a.tgl = '28' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_28,
            COALESCE(MAX(CASE WHEN a.tgl = '29' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_29,
            COALESCE(MAX(CASE WHEN a.tgl = '30' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_30,
            COALESCE(MAX(CASE WHEN a.tgl = '31' AND a.bulan = '$bln' AND a.tahun ='$thn' THEN STAT END),'') tanggal_31,
            d.tanggal_live_depo,
            d.status_system";
        //? end 

        // ? condition
        if ($grup_region == '') {
            $this->db->select("$select_table_coloumn")
                ->from($this->table)
                ->join("(SELECT a.module_site as kode_site, a.module_name,
                    month(a.module_date) as bulan,
                    year(a.module_date) as tahun,
                    day(a.module_date) as tgl,
                    module_flag as STAT
                FROM rmodule_monitor a WHERE month(a.module_date) = '$bln' AND a.module_name = '$modul' AND year(a.module_date) = '$thn'
                ) AS a", "on a.kode_site = d.KD_DEPO", "LEFT")
                ->join("rops_date as odate", "on odate.depo = d.KD_DEPO", "LEFT")
                ->where("d.status", "A")
                ->where("d.status_system", "SCYLLA")
                ->group_by("d.KD_DEPO")
                ->group_by("a.bulan")
                ->group_by("a.tahun");
        } else if ($grup_region !== '' && $region == '') {
            $this->db->select("$select_table_coloumn")
                ->from($this->table)
                ->join("(SELECT a.module_site as kode_site, a.module_name,
                        month(a.module_date) as bulan,
                        year(a.module_date) as tahun,
                        day(a.module_date) as tgl,
                        module_flag as STAT
                    FROM rmodule_monitor a WHERE month(a.module_date) = '$bln' AND a.module_name = '$modul' AND year(a.module_date) = '$thn'
                    ) AS a", "on a.kode_site = d.KD_DEPO", "LEFT")
                ->join("rops_date as odate", "on odate.depo = d.KD_DEPO", "LEFT")
                ->where("d.KD_GREG", "$grup_region")
                ->where("d.status", "A")
                ->where("d.status_system", "SCYLLA")
                ->group_by("d.KD_DEPO")
                ->order_by("a.kode_site");
        }else {
            $this->db->select("$select_table_coloumn")
                ->from($this->table)
                ->join("(SELECT a.module_site as kode_site, a.module_name,
                        month(a.module_date) as bulan,
                        year(a.module_date) as tahun,
                        day(a.module_date) as tgl,
                        module_flag as STAT
                    FROM rmodule_monitor a WHERE month(a.module_date) = '$bln' AND a.module_name = '$modul' AND year(a.module_date) = '$thn'
                    ) AS a", "on a.kode_site = d.KD_DEPO", "LEFT")
                ->join("rops_date as odate", "on odate.depo = d.KD_DEPO", "LEFT")
                ->where("d.KD_REG", "$region")
                ->where("d.status", "A")
                ->where("d.status_system", "SCYLLA")
                ->group_by("d.KD_DEPO")
                ->order_by("a.kode_site");
        }

        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
