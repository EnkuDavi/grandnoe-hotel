<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kamar_model','type_model']);
	}

	public function index()
	{
		$data['kamar'] = $this->kamar_model->getKamar();
		$data['type'] = $this->type_model->getType();
		$this->load->view('konten/home',$data);
	}
}
