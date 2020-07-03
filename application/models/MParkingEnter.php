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


    public function addParkingEnter()
    {
        $post = $this->input->post();

    }

}
