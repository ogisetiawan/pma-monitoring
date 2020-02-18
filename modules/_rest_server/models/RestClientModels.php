<?php
defined('BASEPATH') or exit('No direct script access allowed');
class RestClientModels extends CI_Model
{
    public $table;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add($data, $table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
    }
    public function get($val, $where, $table)
    {
        return $this->db->where($where, $val)
        ->get($table)->result();
    }
    public function get_all($table)
    {
        return $this->db->get($table);
    }
    public function update($id, $data, $table)
	{
		$this->db->update($table, $data, $id);
		return $this->db->affected_rows();
    }
   public function delete($id, $where, $table)
   {
        $this->db->where($where,$id);
        $this->db->delete($table);
        return $this->db->affected_rows();
   }
}
