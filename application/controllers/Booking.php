<?php

use PhpOffice\PhpSpreadsheet\Shared\Trend\Trend;

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['booking_model','pengunjung_model','kamar_model','income_model','rekap_model']);
	}

	public function index()
	{
		check_not_login();
		$data['booking'] = $this->booking_model->getBooking();
		$this->template->load('template','booking/booking_data',$data);
	}

	public function add()
	{
		$this->load->model('kamar_model');
		$data['kamar'] = $this->kamar_model->getKamarKosong();
		$this->template->load('template','booking/booking_form',$data);
	}
	
	public function proses()
	{
		$config['upload_path']  = './uploads/ktp/';
        $config['allowed_types']= 'gif|jpg|png|jpeg';
        $config['max_size']     = 10048;
        $config['file_name']    = 'ktp-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload',$config);
		$post = $this->input->post(Null,TRUE);
		
		if(isset($_POST['add_booking']))
		{
			if(@$_FILES['foto-ktp']['name'] != Null)
			{
				if($this->upload->do_upload('foto-ktp'))
				{
					$post['foto-ktp'] = $this->upload->data('file_name');
		
					$this->rekap_model->getRekap($post)->result();
					if($this->db->affected_rows() > 0)
					{
						$this->rekap_model->update($post);
						$this->booking_model->add($post);
						$this->pengunjung_model->add($post);
						$this->kamar_model->setTerisi($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success','Data Berhasil Di Simpan');
						}
						redirect('booking');
					}else{
						$this->rekap_model->add($post);
						$this->booking_model->add($post);
						$this->pengunjung_model->add($post);
						$this->kamar_model->setTerisi($post);
						if($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('success','Data Berhasil Di Simpan');
						}
						redirect('booking');
					}			
				}
			}
		}
	}

	public function checkOut()
	{
		$post = $this->input->post(NUll, TRUE);
		if(isset($_POST['updateBooking']))
		{
			$this->booking_model->update($post);
			$this->kamar_model->setKosong($post);
			$this->income_model->add($post);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success','Data Berhasil Di Simpan');
			}
			redirect('booking');
		}
	}

	public function del($id)
	{
		$this->booking_model->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success','Data Berhasil Di hapus!');
		}
		redirect('booking');
	}

}
