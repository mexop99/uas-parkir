<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MParkingEnter extends CI_Model
{
    private $_table = "parking_enter";
    public $id = 0;
    public $parking_cost_id = 0;
    public $plat_number = "";
    public $time_enter;
    public $user_id = 1;
    public $status = 1;


    public function addParkingEnter($array)
    {
        $this->db->insert($this->_table, $array);
    }

    public function getParkingEnter($id = null)
    {
        if ($id != null) {
            $parkingEnter = $this->db->get_where('parking_enter', ['id' => $id]);
            return $parkingEnter;
        }
        // return $this->db->get($this->_table)->result_object();
        return $this->db->query(
            "SELECT
            pe.*,
            pc.nama_kendaraan,
            usr.username
            FROM
            parking_enter pe
            INNER JOIN parking_cost pc ON
            pe.parking_cost_id = pc.id
            INNER JOIN users usr ON
            usr.id = pe.user_id
            ORDER BY
            pe.id ASC"
        )->result_object();
    }
}
