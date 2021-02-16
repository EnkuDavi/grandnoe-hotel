<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_model extends CI_Model
{
    public function getByDate($post)
    {
        $tgl_a = $post['tgl_a'];
        $tgl_b = $post['tgl_b'];

        $this->db->select('pendapatan.*, booking.*,pengunjung.kd_booking,pengunjung.nama_pengunjung');
        $this->db->from('pendapatan');
        $this->db->join('booking','pendapatan.booking_id = booking.booking_id');
        $this->db->join('pengunjung','booking.kd_booking = pengunjung.kd_booking');
        $this->db->where('booking.checkOut BETWEEN "'.$tgl_a.'" AND "'.$tgl_b.'"');
        $query = $this->db->get();
        return $query;
        // $this->db->select('pendapatan.*, booking.*,pengunjung.kd_booking,pengunjung.nama_pengunjung, type.type, kamar.*');
        // $this->db->from('pendapatan');
        // $this->db->join('booking','pendapatan.booking_id = booking.booking_id');
        // $this->db->join('pengunjung','booking.kd_booking = pengunjung.kd_booking');
        // $this->db->join('type','kamar.type_id = type.type_id');
        // $this->db->where('booking.checkOut BETWEEN "'.$tgl_a.'" AND "'.$tgl_b.'"');
        // $query = $this->db->get();
        // return $query;
    }

    public function jumlah()
    {
        $date = date('m');
        $this->db->select_sum('pendapatan');
        $this->db->from('pendapatan');
        $this->db->where('MONTH(created)',$date);
        $query = $this->db->get();
        return $query;
    }

    public function getPendapatan()
    {
        $this->db->select('pendapatan.*, booking.*,pengunjung.kd_booking,pengunjung.nama_pengunjung');
        $this->db->from('pendapatan');
        $this->db->join('booking','pendapatan.booking_id = booking.booking_id');
        $this->db->join('pengunjung','booking.kd_booking = pengunjung.kd_booking');
        $this->db->order_by('pendapatan.created','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
		$harga = $post['harga'];
		$checkIn = new DateTime($post['checkIn']);
		$checkOut = new DateTime($post['checkOut']);
		$d = $checkOut->diff($checkIn)->days;
        $hasil = $d * $harga;
        
        $params = [
            "booking_id" => $post['id'],
            "pendapatan" => $hasil,
            "created" => $post['checkOut']
        ];

        $this->db->insert('pendapatan',$params);
    }

    public function delete($id)
    {
        $this->db->where('pendapatan_id', $id);
        $this->db->delete('pendapatan');
    }
}