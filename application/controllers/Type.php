<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('type_model');
    }


	public function index()
	{
        $data['type'] = $this->type_model->getType();
		$this->template->load('template','type/type_data',$data);
    }
    
    public function add()
    {
        $this->template->load('template','type/type_form');
    }

    public function add_type()
    {
        $post = $this->input->post(NUll, True);
        if(isset($_POST['add_type']))
        {
            $this->type_model->add($post);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success','Data Berhasil Di Simpan');
            }
            redirect('type');
        }
    }

    public function edit()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['updateType']))
        {
            $this->type_model->update($post);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success','Data Berhasil Di Update');
            }
            redirect('type');
        }
    }
}
