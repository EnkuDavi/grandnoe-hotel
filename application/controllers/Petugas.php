<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function index()
	{
		$this->load->model('user_model');
		$user = $this->fungsi->user_login()->user_id;
		$data['user'] = $this->user_model->getUser($user);
		$this->template->load('template','petugas/petugas_data',$data);
	}

	public function add()
	{
		$this->template->load('template','petugas/petugas_form');
	}

	public function addPetugas()
	{
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]',[
			'is_unique' => 'This %s already exists!'
		]);
		$this->form_validation->set_rules('nama','Nama','required|trim|min_length[5]');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]');
		$this->form_validation->set_rules('passconf','Konfirm Password','required|matches[password]');
		if($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','petugas/petugas_form');
		}else{
			$post = $this->input->post(Null, True);
			$this->load->model('user_model');
			$this->user_model->add($post);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success','Data Berhasil Di Simpan');
			}
			redirect('petugas');
		}
	}

	public function del($id)
	{
		$this->load->model('user_model');
		$this->user_model->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success','Data Berhasil Di hapus!');
		}
		redirect('petugas');
	}
}
