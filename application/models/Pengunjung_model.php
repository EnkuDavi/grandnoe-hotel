<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model
{
    public function getPengunjung()
    {
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->order_by('created','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('pengunjung_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('pengunjung_id', $id);
        $this->db->delete('pengunjung');
    }

    public function get()
    {
        $date = date('m');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)',$date);
        $query = $this->db->get();
        return $query;
    }
    
    
    public function jan()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '01');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function feb()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '02');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    
    public function maret()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '03');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    
    public function april()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '04');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function mei()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '05');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function juni()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '06');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function juli()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '07');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }


    public function agustus()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '08');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function september()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '09');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function oktober()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '10');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function november()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '11');
        $this->db->where('YEAR(created)', $y);
        $query = $this->db->get();
        return $query;
    }

    
    public function desember()
    {
        $y = date('Y');
        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('MONTH(created)', '12');
        $query = $this->db->get();
        return $query;
    }

    public function getByMonth($post)
    {
        $tgl_a = $post['tgl_a'];
        $tgl_b = $post['tgl_b'];

        $this->db->select();
        $this->db->from('pengunjung');
        $this->db->where('created BETWEEN "'.$tgl_a.'" AND "'.$tgl_b.'"');
        $this->db->order_by('created','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "kd_booking" => $post['kd_booking'],
            "nama_pengunjung" => htmlspecialchars($post['nama_pengunjung']),
            "gender" => htmlspecialchars($post['gender']),
            "telepone" => htmlspecialchars($post['tlp']),
            "alamat" => htmlspecialchars($post['alamat']),
            "foto_ktp" => $post['foto-ktp'],
            "created" => $post['tanggal'],
        ];

        $this->db->insert('pengunjung',$params);    
    }
}