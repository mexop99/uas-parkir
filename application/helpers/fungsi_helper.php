<?php
function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id');
    if ($user_session) {
        redirect(base_url());
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id');
    if (!$user_session) {
        redirect('auth');
    }
}

// function getUserLoginID()
// {
//     $ci = &get_instance();
//     $this->ci->load->model('modelusers');
//     $id = $this->ci->session->userdata('id');
//     return $id;
// }
