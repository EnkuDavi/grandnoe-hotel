<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser($user)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->where_not_in('user_id', $user);
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function login($post)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "username" => htmlspecialchars($post['username']),
            "nama_user" => htmlspecialchars($post['nama']),
            "password" => htmlspecialchars(sha1($post['password'])),
            "level" => $post['level']
        ];

        $this->db->insert('user', $params);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}