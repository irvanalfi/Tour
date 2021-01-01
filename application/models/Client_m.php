<?php defined('BASEPATH') or exit('No direct script access allowed');

class Client_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function addRegister($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = 2;
        $params['status'] = "N";
        $params['token'] = random_string('alnum', 64);
        $this->db->insert('user', $params);

        return $params;
    }
}
