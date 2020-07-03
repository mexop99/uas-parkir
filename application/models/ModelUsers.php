<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUsers extends CI_Model
{

    private $_table = "users";

    public $name = "";
    public $username = "";
    public $password = "";
    public $image = "default.png";
    public $is_active = 0;
    public $role_id = 0;
    public $time_created = 0;



    // public function login($data)
    // {
    // // $this->db->select('*');
    // $this->db->select('users');
    // $this->db->where('username', $data['username']);
    // $this->db->where('password', sha1($data['password']));
    // $query = $this->db->get();
    // // $query = $this->db->get_where('users', $data(''));
    // return $query;
    // }


    public function login1($username)
    {
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        return $user;
    }


    /**
     * @return void
     * fungsi registrasi untuk karyawan
     */
    public function reg()
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->username = $post['username'];
        $this->password = password_hash($post['password'], PASSWORD_DEFAULT);
        $this->is_active = 1;
        $this->role_id = 2;
        $this->time_created = time();

        return $this->db->insert($this->_table, $this);
    }

    public function regUser()
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->username = $post['username'];
        $this->password = password_hash($post['password'], PASSWORD_DEFAULT);
        $this->image = $post['image'];
        $this->is_active = 1;
        $this->role_id = $post['role_id'];
        $this->time_created = time();

        return $this->db->insert($this->_table, $this);
    }


    /**
     * @param mixed $id
     * 
     * @return row array, data array
     */
    public function getById($id)
    {
        $user = $this->db->get_where('users', ['id' => $id])->row_array();
        return $user;
    }


    /**
     * @return void
     */
    public function getUsers()
    {
        $this->db->select('id, name, username, role_id, is_active');
        return $this->db->get($this->_table)->result_array();
    }

    /**
     * @param null $id
     * 
     * @return if $id != null return result query (data query dari DB)
     * harus di ->row() kan untuk bisa di akses di html
     */
    public function getUser($id = null)
    {
        if ($id != null) {
            $user = $this->db->get_where('users', ['id' => $id]);
            return $user;
        }
        $this->db->select('id, name, username, role_id, is_active');
        return $this->db->get($this->_table)->result_array();
    }

    /**
     * @param mixed $id
     * 
     * @return [type]
     * untuk menghapus data user
     */
    public function delUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
