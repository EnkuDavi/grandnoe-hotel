<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    public function getBooking()
    {
        $this->db->select('booking.*, pengunjung.kd_booking, pengunjung.nama_pengunjung');
        $this->db->from('booking');
        $this->db->join('pengunjung','booking.kd_booking = pengunjung.kd_booking');
        $this->db->where('booking.status','active');
        $this->db->order_by('booking.created','DESC');
        return $this->db->get();
    }

    public function add($post)
    {
        $params = [
            "kd_booking" => $post['kd_booking'],
            "no_kamar" => htmlspecialchars($post['no_kamar']),
            "type" => htmlspecialchars($post['type']),
            "harga" => $post['harga'],
            "checkIn" => $post['tanggal'],
            "ket" => htmlspecialchars($post['ket'])
        ];

        $this->db->insert('booking',$params);
    }

    public function update($post)
    {
        $this->db->set('checkOut', $post['checkOut']);
        $this->db->set('ket',$post['ket']);
        $this->db->where('booking_id',$post['id']);
        $this->db->update('booking');
    }

    public function delete($id)
    {
        $this->db->set('status','non');
        $this->db->where('booking_id', $id);
        $this->db->update('booking');
    }

}