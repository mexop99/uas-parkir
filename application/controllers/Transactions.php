<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transactions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mparkingcost');
        $this->load->model('mparkingenter');
    }


    /**
     * @return [type]
     * function to view menu enter.
     * untuk menampilkan menu parkir masuk.
     * 
     */
    public function enter()
    {
        check_not_login(); // cek login atau belum
        $data['user_login'] = $this->fungsi->user_login(); // mengambil data dari libraries Fungsi.PHP

        /**
         * getData for views
         * (menyiapkan data untuk ditampilkan di views)
         */
        $data['title'] = "Kendaraan Masuk | UAS-Parkir";
        $data['titlePage'] = "Kendaraan Masuk";
        $data['genreCost'] = $this->mparkingcost->getCost();
        $data['parkingEnter']= $this->mparkingenter->getParkingEnter();

        // load view 
        $this->load->view('template/header', $data);
        $this->template->load('template/globalTemplate', 'transactions/enter', $data);
        $this->load->view('template/footer');
    }

    /**
     * @return [type]
     * funtion to add vehicle enter the parking lot
     * -> fungsi untuk menambahkan data kendaraan yang sedang masuk parkir
     */
    public function add()
    {
        $post = $this->input->post();
        $plat = strtoupper( $this->input->post('plat'));
        $nomor = strtoupper( $this->input->post('nomor'));
        $back = strtoupper($this->input->post('back'));
        $cost_id = $this->input->post('cost_id');
        date_default_timezone_set('Asia/Jakarta');

        $array = array(
            'parking_cost_id' => (int)$cost_id,
            'plat_number' => $plat . " " . $nomor . " " . $back,
            'time_enter' => date('Y-m-d H:i:s'),
            'user_id' =>(int) $this->session->userdata('id'),
            'status'=> 1

        );
        $this->mparkingenter->addParkingEnter($array);
        $this->session->set_flashdata('message','ditambahkan!');
        redirect('transactions/enter');
    }


}
