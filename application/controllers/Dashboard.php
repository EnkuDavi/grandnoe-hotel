<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kamar_model','pengunjung_model','type_model','income_model']);
	}

	public function index()
	{
		check_not_login();
		$query = $this->income_model->jumlah();
		$income = $query->row();
		$kamar = $this->kamar_model->getKamar();
		$type = $this->type_model->getType();
		$pengunjung = $this->pengunjung_model->get();
		$jan = $this->pengunjung_model->jan();
		$feb = $this->pengunjung_model->feb();
		$maret = $this->pengunjung_model->maret();
		$april = $this->pengunjung_model->april();
		$mei = $this->pengunjung_model->mei();
		$juni = $this->pengunjung_model->juni();
		$juli = $this->pengunjung_model->juli();
		$agus = $this->pengunjung_model->agustus();
		$sep = $this->pengunjung_model->september();
		$okt = $this->pengunjung_model->oktober();
		$nov = $this->pengunjung_model->november();
		$des = $this->pengunjung_model->desember();

		$data = array(
			'income' => $income,
			'kamar' => $kamar,
			'type' => $type,
			'pengunjung' => $pengunjung,
			'januari' => $jan,
			'februari' => $feb,
			'maret' => $maret,
			'april' => $april,
			'mei' => $mei,
			'juni' => $juni,
			'juli' => $juli,
			'agustus' => $agus,
			'september' => $sep,
			'oktober' => $okt,
			'november' => $nov,
			'desember' => $des
		);
		$this->template->load('template','dashboard',$data);
	}
}
