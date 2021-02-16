<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model
{
    public function getById($id)
    {
        $this->db->select('kamar.*, type.*');
        $this->db->from('kamar');
        $this->db->join('type','type.type_id = kamar.type_id');
        $this->db->where('kamar.kamar_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function setTerisi($post)
    {
        $this->db->set('status','Terisi');        
        $this->db->where('kamar_id',$post['kamar_id']);
        $this->db->update('kamar');
    }

    public function setKosong($post)
    {
        $this->db->set('status','Kosong');        
        $this->db->where('no_kamar',$post['no_kamar']);
        $this->db->update('kamar');
    }

    public function getKamarKosong()
    {
        $this->db->select('kamar.*, type.*');
        $this->db->from('kamar');
        $this->db->join('type','type.type_id = kamar.type_id');
        $this->db->where('kamar.status','Kosong');
        $this->db->order_by('kamar.no_kamar','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getKamar()
    {
        $this->db->select('kamar.*, type.*');
        $this->db->from('kamar');
        $this->db->join('type','type.type_id = kamar.type_id');
        // $this->db->where('kamar.status','Kosong');
        $this->db->order_by('kamar.no_kamar','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "no_kamar" => htmlspecialchars($post['no_kamar']),
            "type_id" => htmlspecialchars($post['type']),
            "fasilitas" => htmlspecialchars($post['fasilitas']),
            "harga" => htmlspecialchars($post['harga_kamar']),
            "status" => htmlspecialchars($post['status']),
            "foto" => $post['foto']
        ];
        $this->db->insert('kamar',$params);
    }

    public function updateFoto($post)
    {
        $this->db->set("no_kamar", htmlspecialchars($post['no_kamar']));
        $this->db->set("type_id", htmlspecialchars($post['type']));
        $this->db->set("fasilitas", htmlspecialchars($post['fasilitas']));
        $this->db->set("harga", htmlspecialchars($post['harga_kamar']));
        $this->db->set("status", htmlspecialchars($post['status']));
        $this->db->set("foto", htmlspecialchars($post['foto']));
        $this->db->where('kamar_id', $post['id']);
        
        $this->db->update('kamar');
    
    }

    public function updateKamar($post)
    {
        $this->db->set("no_kamar", htmlspecialchars($post['no_kamar']));
        $this->db->set("type_id", htmlspecialchars($post['type']));
        $this->db->set("fasilitas", htmlspecialchars($post['fasilitas']));
        $this->db->set("harga", htmlspecialchars($post['harga_kamar']));
        $this->db->set("status", htmlspecialchars($post['status']));
        $this->db->where('kamar_id', $post['id']);
        $this->db->update('kamar');
    }

    public function delete($id)
    {
        $this->db->where('kamar_id',$id);
        $this->db->delete('kamar');
    }
}
