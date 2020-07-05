<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MParkingCost extends CI_Model
{

    private $_table = "parking_cost";

    public $nama_kendaraan = "";
    public $roda = 0;
    public $tarif = 1000;

    public function addCost()
    {
        $post = $this->input->post();
        $this->nama_kendaraan = $post['nama_kendaraan'];
        $this->roda = $post['roda'];
        $this->tarif = $post['tarif'];

        return $this->db->insert($this->_table, $this);
    }

    public function getCost($id = null)
    {
        if ($id != null) {
            $cost = $this->db->get_where('parking_cost',['id'=> $id]);
            return $cost;
        }
        return $this->db->get($this->_table)->result_object();
        
    }

    public function getGenre($isActive)
    {
        return $this->db->get_where($this->_table, ['isActive'=>$isActive])->result_object();
    }

    public function update($array, $id)
    {
        
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update($this->_table);
    }

    public function getCount()
    {
        return $this->db->count_all($this->_table);
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
}
