<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_model extends CI_Model
{
    public function get()
    {
        $date = date('m');
        $this->db->select();
        $this->db->from('rekap');
        $this->db->where('month(date)', $date);
        $query = $this->db->get();
        return $query;
    }

    public function getRekap($post)
    {
        $date = date('m');
        $this->db->select();
        $this->db->from('rekap');
        $this->db->where('month(date)', $date);
        $this->db->where('type_kamar',$post['type']);
        $query = $this->db->get();
        return $query;
    }

    public function getByMonth($post)
    {
        $this->db->select();
        $this->db->from('rekap');
        $this->db->where('month(date)', $post['bulan']);
        $query = $this->db->get();
        return $query;
    }

    public function update($post)
    {
        $type = $post['type'];
        
        $sql = "UPDATE rekap SET rekap = rekap + 1 WHERE type_kamar = '$type' ";
        $this->db->query($sql);
    }

    public function add($post)
    {
        $params = [
            "type_kamar" => $post['type'],
            "rekap" => 1,
            "date" => $post['tanggal']
        ];

        $this->db->insert('rekap',$params);
    }
}