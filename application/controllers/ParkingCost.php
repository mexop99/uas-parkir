<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ParkingCost extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mparkingcost');
    }
    /**
     * @return void
     */
    public function index()
    {
        check_not_login(); // cek login atau belum
        $data['user_login'] = $this->fungsi->user_login(); // mengambil data dari libraries Fungsi.PHP
        $data['title'] = "Parking Cost | UAS-Parkir";
        $data['titlePage'] = "Biaya Parkir";
        $data['cost'] = $this->mparkingcost->getCost();

        // load view 
        $this->load->view('template/header', $data);
        $this->template->load('template/globalTemplate', 'parkingcost/index', $data);
        $this->load->view('template/footer');
    }


    public function add()
    {
        $this->mparkingcost->addCost();
        $this->session->set_flashdata(
            'message',
            '<div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Biaya Parkir Berhasil dibuat!</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            </div>
        </div>'
        );
        redirect(base_url('parkingcost'));
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nama_kendaraan = $this->input->post('nama_kendaraan');
        $roda = $this->input->post('roda');
        $tarif = $this->input->post('tarif');

        $array = array(
            'nama_kendaraan' => $nama_kendaraan,
            'roda' => $roda,
            'tarif' => $tarif
        );

        /**
         * mengirim data ke Model MParkingCOst
         */
        $result = $this->mparkingcost->update($array, $id);
        // if ($result > 0) {
        $this->session->set_flashdata(
            'message',
            '<div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Biaya Parkir Berhasil diperbarui!</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            </div>
        </div>'
        );
        redirect(base_url('parkingcost'));
        // }
    }
}
