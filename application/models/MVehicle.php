<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MVehicle extends CI_Model
{

    private $_table = "vehicle";
    public $id = 0;
    public $parking_cost_id = 0;
    public $plat_number = "";
    public $status = 0;



    public function checkReg($plat)
    {
        $plat_number = $this->db->get_where($this->_table , ['plat_number' => $plat])->num_rows();
        return $plat_number;
    }

    public function getID($plat)
    {
        $this->db->select('id');
        return $this->db->get_where($this->_table,['plat_number' => $plat])->row_object()->id;
    }

    public function add($array)
    {
        $this->db->insert($this->_table, $array);
        return $this->db->insert_id();
    }
    public function maxID()
    {
        $this->db->select('id');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->_table, 1)->row_object();
    }
}
