<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
        $data['title'] = "Dashboard | UAS-Parkir";
        $data['titlePage'] = "Dashboard";
        $data['countParkingCost'] = $this->mparkingcost->getCount();

        //load view
        $this->load->view('template/header', $data);
        $this->template->load('template/globalTemplate', 'dashboard/dashboard', $data);
        $this->load->view('template/footer');
    }
}
