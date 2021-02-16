<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_model extends CI_Model
{
    public function getType()
    {
        return $this->db->get('type');
    }

    public function add($post)
    {
        $params = [
            "type" => htmlspecialchars($post['type'])
        ];

        $this->db->insert('type',$params);
    }

    public function update($post)
    {
        $this->db->set('type', $post['type']);
        $this->db->where('type_id', $post['id']);
        $this->db->update('type');
    }
}