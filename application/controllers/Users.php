<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


    /**
     * @return void
     * constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('modelusers');
    }

    /**
     * @return void
     */
    public function index()
    {
        check_not_login(); // cek login atau belum

        $data['user_login'] = $this->fungsi->user_login(); // mengambil data dari libraries Fungsi.PHP
        $data['users'] = $this->fungsi->getUsers();

        //load view
        $data['title'] = "MyGudang | List User";

        $data['titlePage'] = "Users";

        $this->load->view('template/header', $data);
        $this->template->load('template/globalTemplate', 'user/users');
        $this->load->view('template/footer');
    }

    public function add()
    {

        // cek login atau belum
        check_not_login();

        // mengambil data dari libraries >> Fungsi.PHP
        $data['user_login'] = $this->fungsi->user_login();
        $data['title'] = "MyGudang | Add User";

        /**
         * proses validasi inputan user
         */
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password]');



        /**
         * cecking validation 
         */
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->template->load('template/globalTemplate', 'user/user_add_form');
            $this->load->view('template/footer');
        } else {
            $this->modelusers->regUser();
            $this->session->set_flashdata(
                'message',
                '<div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">User Berhasil dibuat!</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </div>'
            );
            redirect('users');
        }
    }

    public function edit($id)
    {
        // cek login atau belum
        check_not_login();

        // mengambil data dari libraries >> Fungsi.PHP
        $data['user_login'] = $this->fungsi->user_login();
        $data['title'] = "MyGudang | Edit User";
        $data['titlePage'] = "Edit User";

        /**
         * proses validasi inputan user
         */
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password]');



        /**
         * cecking validation 
         */
        if ($this->form_validation->run() == false) {
            $query = $this->modelusers->getUser($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->load->view('template/header', $data);
                $this->template->load('template/globalTemplate', 'user/user_edit_form', $data);
                $this->load->view('template/footer');
            } else {
                echo "<script>alert('Data Tidak Ditemukan!');";
                echo "window.location='" . site_url('users') . "';</script> ";
            }
        } else {
            $this->modelusers->regUser();
            $this->session->set_flashdata(
                'message',
                '<div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">User Berhasil diedit!</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </div>'
            );
            redirect('users');
        }
    }

    public function update($id)
    {

        // cek login atau belum
        check_not_login();

        // mengambil data dari libraries >> Fungsi.PHP
        $data['user_login'] = $this->fungsi->user_login();
        $data['title'] = "MyGudang | Add User";

        /**
         * proses validasi inputan user
         */
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password]');



        /**
         * cecking validation 
         */
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->template->load('template/globalTemplate', 'user/user_edit_form');
            $this->load->view('template/footer');
        } else {
            $this->modelusers->regUser();
            $this->session->set_flashdata(
                'message',
                '<div class="card card-warning">
                <div class="card-header">
                <h3 class="card-title">User Berhasil diedit!</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </div>'
            );
            redirect('users');
        }
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->modelusers->delUser($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata(
                'message',
                '<div class="card card-warning">
                <div class="card-header">
                <h3 class="card-title">User Berhasil diHapus</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </div>'
            );
            redirect('users');
        }
    }
}
