<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('modelusers');
        $id = $this->ci->session->userdata('id');
        $user_data = $this->ci->modelusers->getById($id);
        return $user_data;
    }

    function getUsers(){
        $this->ci->load->model('modelusers');
        $user_data = $this->ci->modelusers->getUsers();
        return $user_data;
    }
    
    
function getUserLoginID()
{
    $this->ci->load->model('modelusers');
    $id = $this->ci->session->userdata('id');
    return $id;
}
}
