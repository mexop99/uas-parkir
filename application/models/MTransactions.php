<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MTransactions extends CI_Model
{
    private $_table = "transactions";
    public $id = 0;
    public $vehicle_id = 0;
    public $time_enter = 0;
    public $time_exit = 0;
    public $status_parking_id = 0;
    public $user_id_enter=11;
    public $user_id_exit=11;
    public $total_tarif = 0;

    public function create()
    {
        $this->db->insert($this->_table, $this);
    }

    public function getAll($id =null)
    {
        if ($id != null) {
            $transactions = $this->db->get_where($this->_table, ['id' => $id]);
            return $transactions;
        }
        return $this->db->get($this->_table)->result_object();
    }

    /**
     * @param mixed $status
     * @param mixed $time
     * @param mixed $inEx
     * 
     * @return [type]
     * 
     * data untuk di tampilkan di front-end
     */
    public function readJoin($status, $time, $inEx)
    {
        return $this->db->query(
            "SELECT
                tr.*,
                vh.plat_number,
                vh.parking_cost_id,
                pc.nama_kendaraan,
                usr.username usr_enter,
                usr2.username usr_exit
            FROM
                transactions tr
            INNER JOIN vehicle vh ON
                tr.vehicle_id = vh.id
            INNER JOIN parking_cost pc ON
                pc.id = vh.parking_cost_id
            INNER JOIN users usr ON
                tr.user_id_enter = usr.id
            INNER JOIN users usr2 ON
                tr.user_id_exit = usr2.id
            WHERE
                tr.status_parking_id = $status AND(
                    tr.$inEx BETWEEN '$time' AND NOW())
                ORDER BY
                    tr.id ASC"
        )->result_object();
    }

    /**
     * @param mixed $vehicleId
     * 
     * @return [type]
     * mengambil data dari inputan nomor kendaraan yang akan keluar
     */
    public function getTrsJoinVh($vehicleId)
    {
        return $this->db->query(
            "SELECT
                tr.*,
                vh.plat_number,
                vh.parking_cost_id,
                pc.nama_kendaraan,
                pc.tarif,
                usr.username usr_enter,
                usr2.username usr_exit
            FROM
                transactions tr
            INNER JOIN vehicle vh ON
                tr.vehicle_id = vh.id
            INNER JOIN parking_cost pc ON
                pc.id = vh.parking_cost_id
            INNER JOIN users usr ON
                tr.user_id_enter = usr.id
            INNER JOIN users usr2 ON
                tr.user_id_exit = usr2.id
            WHERE
                tr.status_parking_id = 1 AND tr.vehicle_id = $vehicleId
            ORDER BY
                tr.id ASC"
        );
    }

    /**
     * @param mixed $id
     * @param mixed $array
     * 
     * @return [type]
     * 
     * mengubah data untuk kendaraan yang akan keluar
     */
    public function exitVehicle($id, $array)
    {
        $this->db->where('id', $id);
        $this->db->update($this->_table, $array);
    }


}