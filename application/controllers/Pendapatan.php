<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'assets/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Pendapatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['income_model','type_model']);
	}

	public function index()
	{
        check_not_login();
        $data['pendapatan'] = $this->income_model->getPendapatan();
		$this->template->load('template','pendapatan/p_data',$data);
	}

	public function del($id)
	{
		$this->income_model->delete($id);
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success','Data Berhasil Di hapus!');
		}
		redirect('pendapatan');
	}

	public function export()
	{
		$post = $this->input->post(Null, True);
		if(isset($_POST['btn-cari']))
		{
			$data['pendapatan'] = $this->income_model->getByDate($post);
			if($this->db->affected_rows() > 0)
			{
				$this->template->load('template','pendapatan/p_data',$data);
			}else{
				echo"<script>alert('Data Tidak di temukan !');
						window.location ='" .site_url('pendapatan'). "';
							</script>";
			}

		}elseif(isset($_POST['export']))
		{
			$data['pendapatan'] = $this->income_model->getByDate($post);
			if($this->db->affected_rows() > 0)
			{
				$spreadsheet = New Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('C1','Laporan Pendapatan');
			$sheet->setCellValue('C2','Grand Noeri Hotel');
			$sheet->setCellValue('C3','Jl. Pangkal Perjuangan By Pass Patung Udang RT 008 / RW 010, Tanjung Mekar Karawang');
			$writer = new Xlsx($spreadsheet);
			$sheet->setCellValue('A6', 'No');
			$sheet->setCellValue('B6', 'TANGGAL');
			$sheet->setCellValue('C6', 'KODE BOOKING');
			$sheet->setCellValue('D6', 'NO KAMAR');
			$sheet->setCellValue('E6', 'PEROLEHAN');

			$tableHead = [
				'font' =>[
					'color' =>[
						'rgb' => 'FFFFFF'
					],
				],
				'fill' =>[
					'fillType' => Fill::FILL_SOLID,
					'startColor' =>[
						'rgb' => '#FBFD00'
					]
				],
				'borders' =>[
					'allBorders' =>[
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
					]
				]
			];

			$tableBody = [
				'borders' =>[
					'allBorders' =>[
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
					]
				]
			];

			$spreadsheet->getActiveSheet()->mergeCells("C1:D1");
			$spreadsheet->getActiveSheet()->mergeCells("C2:D2");
			$spreadsheet->getActiveSheet()->mergeCells("C3:D4");
			$spreadsheet->getActiveSheet()->mergeCells("A1:B4");
			$spreadsheet->getActiveSheet()->getStyle('C1')->getFont()->setSize(14);
			$spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(14);

			$spreadsheet->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
			$spreadsheet->getActiveSheet()->getStyle("C2")->getFont()->setBold(true);
			$spreadsheet->getActiveSheet()->getStyle("C3:D4")->getAlignment()->setWrapText(true);

			$spreadsheet->getActiveSheet()->getStyle("C1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle("C2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle("A6:E6")->applyFromArray($tableHead);

			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(17);
			$spreadsheet->getActiveSheet()->getStyle('A6:E6')->getFont()->setSize(11);
			$spreadsheet->getActiveSheet()->getStyle("A6:E6")->getFont()->setBold(true);
			$spreadsheet->getActiveSheet()->getStyle("A6:E6")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                                
			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('Paid');
			$drawing->setDescription('Paid');
			$drawing->setPath('./assets/dist/img/logo.png'); // put your path and image here
			$drawing->setCoordinates('A1');
			$drawing->setOffsetX(20);
			// $drawing->setRotation(25);
			$drawing->setWidthAndHeight(90, 80);
			$drawing->getShadow()->setVisible(true);
			$drawing->setWorksheet($spreadsheet->getActiveSheet());


			$baris = 7;
            $no = 1;

                foreach($data['pendapatan']->result() as $p){
                    $sheet->setCellValue('A'.$baris, $no++);
                    $sheet->setCellValue('B'.$baris, $p->checkOut);
                    $sheet->setCellValue('C'.$baris, $p->kd_booking);
					$sheet->setCellValue('D'.$baris, $p->no_kamar);
                    $sheet->setCellValue('E'.$baris, $p->pendapatan);
                   
                    
                    $spreadsheet->getActiveSheet()->getStyle('A'.$baris.':E'.$baris)->applyFromArray($tableBody);
					$spreadsheet->getActiveSheet()->getStyle('A'.$baris.':E'.$baris)->getFont()->setSize(10);
					$spreadsheet->getActiveSheet()->getStyle("D".$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    
                    // $spreadsheet->getActiveSheet()->getStyle('F'.$baris.':G'.$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    
                    $baris++;
				}
				$SUMRANGE = 'E6:E'.$baris;
				$col = $baris + 1;
				$sheet->setCellValue('D'.$col, "Total");
				$sheet->setCellValue('E'.$col, "=SUM($SUMRANGE)");
  
				$firtsrow = 6;
				$lastrow = $baris-1;
				$spreadsheet->getActiveSheet()->setAutoFilter("A".$firtsrow.':E'.$lastrow);
		
			$filename = 'Pendapatan';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'".xlsx'); 
			header('Cache-Control: max-age=0');

			$writer->save('php://output');

			}
			
		}else{
			$data['pendapatan'] = $this->income_model->getPendapatan();
			$this->template->load('template','pendapatan/p_data',$data);
		}
	}
}
