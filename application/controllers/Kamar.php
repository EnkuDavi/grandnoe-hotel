<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['type_model','kamar_model']);
    }

	public function index()
	{
		$data['kamar'] = $this->kamar_model->getKamar();
		$data['type'] = $this->type_model->getType();
		$this->template->load('template','kamar/kamar_data',$data);
    }
    
    public function add()
	{
		$data['type'] = $this->type_model->getType();
		$this->template->load('template','kamar/kamar_form',$data);
    }
    
    public function proses()
    {
        $config['upload_path']  = './uploads/kamar/';
        $config['allowed_types']= 'gif|jpg|png|jpeg';
        $config['max_size']     = 12048;
        $config['file_name']    = 'kamar-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload',$config);
        $post = $this->input->post(null,TRUE);

        if(isset($_POST['add_kamar']))
		{
			if(@$_FILES['foto']['name'] != NULL)
			{
				if($this->upload->do_upload('foto'))
				{
					$post['foto'] = $this->upload->data('file_name');
					$this->kamar_model->add($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success','Data Berhasil Di Simpan');
					}
					redirect('kamar/add');
				}else{
					$error = $this->upload->display_errors();
					echo"<script>alert('Error $error');
								window.location ='" .site_url('kamar/add'). "';
									</script>";
				}
			}
		}elseif(isset($_POST['edit_kamar']))
		{
			if(@$_FILES['foto']['name'] == Null)
			{
				$this->kamar_model->updateKamar($post);
				if($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata('success','Data Berhasil Di Update');
				}
				redirect('kamar');
			}else{
				if($this->upload->do_upload('foto'))
				{
					$post['foto'] = $this->upload->data('file_name');
					$this->kamar_model->updateFoto($post);
					if($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('success','Data Berhasil Di Update');
					}
					redirect('kamar');
				}else{
					$error = $this->upload->display_errors();
					echo"<script>alert('Error $error');
								window.location ='" .site_url('kamar/edit'). "';
									</script>";
				}
			}
		}
	}
	
	
    public function edit($id)
    {
		$query = $this->kamar_model->getById($id);
		$kamar =  $query->row();
		$type = $this->type_model->getType();

		$data= array(
			'row' => $kamar,
			'type' => $type
		);
        $this->template->load('template','kamar/kamar_edit',$data);
	}
	
	public function del($id)
	{
		$kamar = $this->kamar_model->getById($id)->row();
		if($kamar != Null){
			$target_file = './uploads/kamar/'.$kamar->foto;
			unlink($target_file);
		}
		
		$this->kamar_model->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success','Data Berhasil Di hapus');
		}
		redirect('kamar');
	}
}
