<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transactions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mparkingcost');
        $this->load->model('mvehicle');
        $this->load->model('mtransactions');
        date_default_timezone_set('Asia/Jakarta');
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
        $data['genreCost'] = $this->mparkingcost->getGenre(1);

        $thisDate = date('Y-m-d 00:00:00');
        var_dump($thisDate);
        $data['parkingEnter'] = $this->mtransactions->readJoin(1, $thisDate, 'time_enter');

        // load view 
        $this->load->view('template/header', $data);
        $this->template->load('template/globalTemplate', 'transactions/enter', $data);
        $this->load->view('template/footer');
    }

    public function exit()
    {
        // cek login atau belum
        check_not_login();
        // mengambil data dari libraries Fungsi.PHP
        $data['user_login'] = $this->fungsi->user_login();

        /**
         * Validasi inputan form
         */
        $this->form_validation->set_rules('plat', 'PLAT', 'required');
        $this->form_validation->set_rules('nomor', 'nomor', 'required');
        $this->form_validation->set_rules('back', 'back', 'required');

        if ($this->form_validation->run() == true) {

            /**
             * mengambil nilai inputan kendaraan keluar
             * mengecek apakah sudah ada inputan dari form menu parkir keluar
             */
            $plat = strtoupper($this->input->post('plat'));
            $nomor = strtoupper($this->input->post('nomor'));
            $back = strtoupper($this->input->post('back'));
            $plat_number = $plat . "-" . $nomor . "-" . $back;
            $idPlat = $this->mvehicle->getID($plat_number);
            if ($idPlat->num_rows() > 0) {
                $resultOneTrs = $this->mtransactions->getTrsJoinVh($idPlat);
                /**
                 * $resultOneTrs->num_rows() : untuk mengambil nilai row dari hasil query
                 * $resultOneTrs->row_object() : untuk mengambil hasil query dalam array object
                 * gunakan `var_dump($resultOneTrs->row_object());` untuk melihat hasil query
                 */
                if ($resultOneTrs->num_rows() > 0) {
                    $resultOneTrs = $resultOneTrs->row_object();
                    $id = $resultOneTrs->id;
                    $time_enter = strtotime($resultOneTrs->time_enter);
                    $time_exit = strtotime(date('Y-m-d H:m:s'));
                    $tarif = $resultOneTrs->tarif;
                    $totaltarif = 0;

                    $detik = $time_exit - $time_enter;
                    $jam = floor($detik / (60 * 60));

                    if ($jam == 0) {
                        $totaltarif = 1 * $tarif;
                    } else {
                        $totaltarif = $jam * $tarif;
                    }
                    $array = array(
                        'time_exit' => date('Y-m-d H:m:s'),
                        'status_parking_id' => 2,
                        'user_id_exit' => (int) $this->session->userdata('id'),
                        'total_tarif' => $totaltarif,

                    );
                    $this->mtransactions->exitVehicle($id, $array);
                    $this->session->set_flashdata('message', 'Kendaraan BerHasil Keluar!');
                    redirect('transactions/exit');
                } else {
                    var_dump("data tak ditemukan!");
                }
            }else {
                var_dump("data tak ditemukan!");
            }
        } else {
            /**
             * getData for views
             * (menyiapkan data untuk ditampilkan di views)
             */
            $data['title'] = "Kendaraan Keluar | UAS-Parkir";
            $data['titlePage'] = "Kendaraan Keluar";
            // $data['titlePage'] = "Kendaraan Keluar | ". $plat_number . " | ". $idPlat;

            $thisDate = date('Y-m-d 00:00:00');
            $data['parkingEnter'] = $this->mtransactions->readJoin(1, $thisDate, 'time_enter');
            $data['parkingExit'] = $this->mtransactions->readJoin(2, $thisDate, 'time_exit');

            // load view 
            $this->load->view('template/header', $data);
            $this->template->load('template/globalTemplate', 'transactions/exit', $data);
            $this->load->view('template/footer');
        }
    }





    /**
     * @return [type]
     * funtion to add vehicle enter the parking lot
     * -> fungsi untuk menambahkan data kendaraan yang sedang masuk parkir
     */
    public function add()
    {
        $post = $this->input->post();
        $plat = strtoupper($this->input->post('plat'));
        $nomor = strtoupper($this->input->post('nomor'));
        $back = strtoupper($this->input->post('back'));
        $plat_number = $plat . " " . $nomor . " " . $back;
        $cost_id = $this->input->post('cost_id');
        date_default_timezone_set('Asia/Jakarta');



        // $this->form_validation->set_rules($plat_number, 'Plat Number', 'is_uniqe[parking_cost.plat_number]');

        // var_dump($this->form_validation->run());

        $array = array(
            'parking_cost_id' => (int) $cost_id,
            'plat_number' => $plat . " " . $nomor . " " . $back,
            'time_enter' => date('Y-m-d H:i:s'),
            'user_id' => (int) $this->session->userdata('id'),
            'status' => 1

        );


        // $this->mparkingenter->addParkingEnter($array);
        // $this->session->set_flashdata('message','ditambahkan!');
        // redirect('transactions/enter');
    }






    /**
     * @return [type]
     * fungsi untuk menambahkan kendaraan yang akan parkir
     * pendataan kendaraan
     * pendataan transaksi masuk
     */
    public function add2()
    {
        $post = $this->input->post();
        $plat = strtoupper($this->input->post('plat'));
        $nomor = strtoupper($this->input->post('nomor'));
        $back = strtoupper($this->input->post('back'));
        $plat_number = $plat . "-" . $nomor . "-" . $back;
        $cost_id = $this->input->post('cost_id');
        date_default_timezone_set('Asia/Jakarta');


        /**
         * untuk mengecek apakah plat nomor sudah terdaftar di database atau belum.
         * is the plat_number registered?
         */
        $numRowsPlat = $this->mvehicle->checkReg($plat_number);

        /**
         * operasi jika plat nomo SUDAH TERDAFTAR di database.
         * maka hanya insert data transaksi dengan mengambil ID Vehicle nya
         */
        if ($numRowsPlat > 0) {

            /**
             * mengambil ID vehicle yang sudah berhasil di daftarkan
             */
            $idVehicle = $this->mvehicle->getID($plat_number)->row_object()->id;

            /**
             * insert into table transactions
             */
            $this->mtransactions->vehicle_id = (int) $idVehicle;
            $this->mtransactions->time_enter = date('Y-m-d H:i:s');
            $this->mtransactions->status_parking_id = 1;
            $this->mtransactions->user_id_enter = (int) $this->session->userdata('id');
            $this->mtransactions->create();

            $this->session->set_flashdata('message', 'ditambahkan!');
            redirect('transactions/enter');
        }

        /**
         * operasi jika plat nomor belum ada di database.
         * maka akan insert data baru di tabel vehicle dan tabel transaksi.
         */
        else {
            /**
             * insert to vehicle table
             */
            $array = array(
                'parking_cost_id' => (int) $cost_id,
                'plat_number' => $plat_number,
                'status' => 1

            );
            $last_id = $this->mvehicle->add($array);

            /**
             * insert into transactions table
             */
            $this->mtransactions->vehicle_id = $last_id;
            $this->mtransactions->time_enter = date('Y-m-d H:i:s');
            $this->mtransactions->status_parking_id = 1;
            $this->mtransactions->user_id_enter = (int) $this->session->userdata('id');
            $this->mtransactions->create();

            $this->session->set_flashdata('message', 'ditambahkan!');
            redirect('transactions/enter');
        }
    }
}
