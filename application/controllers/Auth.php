<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Auth
 */
class Auth extends CI_Controller
{

    /**
     * @return void
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
        check_already_login();
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) { //validasi gagal
            $data['title'] = "UAS Parkir | Login";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else { //validasi sukses
            $this->_login();
        }
    }

    /**
     * @return void
     */
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // var_dump($username);

        // $this->load->model('modelusers');
        $user = $this->modelusers->login1($username);

        if ($user) {
            if ($user['is_active'] == 1) {
                //cek password 
                if (password_verify($password, $user['password'])) {
                    $params = array(
                        "id" => $user['id'],
                        "role_id" => $user['role_id']
                    );
                    $this->session->set_userdata($params);
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-warning" role="alert">Wrong password!</div>'
                    );
                    redirect('auth');
                }
            } else {
                // cek email is_active
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-warning" role="alert">This Email has not been Activated!</div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Email is Not Registered!</div>'
            );
            redirect('auth');
        }
    }





    // public function process()
    // {
    //     $post  = $this->input->post(null, TRUE);
    //     // var_dump($post);
    //     if (isset($post['login'])) {
    //         $this->load->model('modelusers');
    //         $query = $this->modelusers->login($post)->row_array();
    //         var_dump($query);
    //         if ($query->num_rows() > 0) {
    //             echo "berhasil";
    //         }
    //         else {
    //             echo "gagal login";
    //         }
    //     }
    // }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password]');



        if ($this->form_validation->run() == false) { //validasi gagal
            $title['title'] = "MyGudang | Registration";
            $this->load->view('template/auth_header', $title);
            $this->load->view('auth/register');
            $this->load->view('template/auth_footer');
        } else {
            $this->modelusers->reg();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login!</div>'
            );
            redirect('auth');
        }
    }



    public function logout()
    {
        $params = array('id', 'roleid');
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}
