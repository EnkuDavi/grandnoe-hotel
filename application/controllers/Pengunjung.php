<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'assets/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class Pengunjung extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengunjung_model');
	}

	public function index()
	{
		check_not_login();
		$data['pengunjung'] = $this->pengunjung_model->getPengunjung();
		$this->template->load('template','pengunjung/pengunjung_data',$data);
    }
    
    
	public function del($id)
	{
		$pengunjung = $this->pengunjung_model->getById($id)->row();
		if($pengunjung != Null){
			$target_file = './uploads/ktp/'.$pengunjung->foto_ktp;
			unlink($target_file);
            
            $this->pengunjung_model->delete($id);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success','Data Berhasil Di hapus');
            }
            redirect('pengunjung');
        }
		
	}

	public function export()
	{
		$post = $this->input->post(Null, True);
        if(isset($_POST['btn-cari']))
        {
            $data['pengunjung'] = $this->pengunjung_model->getByMonth($post);
            if($this->db->affected_rows() > 0)
            {
                $this->template->load('template','pengunjung/pengunjung_data',$data);
            }else{
                echo "<script>
                alert('Data tidak ditemukan');
                window.location = '" . site_url('pengunjung') . "';
                </script>";
            }
        }else{
            $data['pengunjung'] = $this->pengunjung_model->getByMonth($post);
            if($this->db->affected_rows() > 0)
            {
                $spreadsheet = New Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('C1','Laporan Pengunjung');
                $sheet->setCellValue('C2','Grand Noeri Hotel');
                $sheet->setCellValue('C3','Jl. Pangkal Perjuangan By Pass Patung Udang RT 008 / RW 010, Tanjung Mekar Karawang');
                $writer = new Xlsx($spreadsheet);
                $sheet->setCellValue('A5', 'No');
                $sheet->setCellValue('B5', 'TANGGAL');
                $sheet->setCellValue('C5', 'KODE BOOKING');
                $sheet->setCellValue('D5', 'NAMA PENGUNJUNG');
                $sheet->setCellValue('E5', 'GENDER');
				$sheet->setCellValue('F5', 'TELEPHONE');
				$sheet->setCellValue('G5', 'ALAMAT');

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

                $spreadsheet->getActiveSheet()->mergeCells("C1:G1");
                $spreadsheet->getActiveSheet()->mergeCells("C2:G2");
                $spreadsheet->getActiveSheet()->mergeCells("C3:G3");

                $spreadsheet->getActiveSheet()->mergeCells("A1:B4");

                $spreadsheet->getActiveSheet()->getStyle('C1')->getFont()->setSize(14);
                $spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(14);

                $spreadsheet->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle("C2")->getFont()->setBold(true);

                $spreadsheet->getActiveSheet()->getStyle("C1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("C2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("C3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("C4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("A5:G5")->applyFromArray($tableHead);

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(17);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
				$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
				$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(28);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);
                $spreadsheet->getActiveSheet()->getStyle('A5:G5')->getFont()->setSize(11);
                $spreadsheet->getActiveSheet()->getStyle("A5:G5")->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle("A5:G5")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                        
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Paid');
                $drawing->setDescription('Paid');
                $drawing->setPath('./assets/dist/img/logo.png'); // put your path and image here
                $drawing->setCoordinates('A1');
                $drawing->setOffsetX(30);
                // $drawing->setRotation(25);
                $drawing->setWidthAndHeight(90, 80);
                $drawing->getShadow()->setVisible(true);
                $drawing->setWorksheet($spreadsheet->getActiveSheet());


                $baris = 6;
                $no = 1;

                foreach($data['pengunjung']->result() as $data){
                    $sheet->setCellValue('A'.$baris, $no++);
                    $sheet->setCellValue('B'.$baris, $data->created);
                    $sheet->setCellValue('C'.$baris, $data->kd_booking);
					$sheet->setCellValue('D'.$baris, $data->nama_pengunjung);
					$sheet->setCellValue('E'.$baris, $data->gender);
                    $sheet->setCellValue('F'.$baris, $data->telepone);
                    $sheet->setCellValue('G'.$baris, $data->alamat);
                   
                    
                    $spreadsheet->getActiveSheet()->getStyle('A'.$baris.':G'.$baris)->applyFromArray($tableBody);
                    $spreadsheet->getActiveSheet()->getStyle("G".$baris)->getAlignment()->setWrapText(true);
					$spreadsheet->getActiveSheet()->getStyle('A'.$baris.':G'.$baris)->getFont()->setSize(10);
					$spreadsheet->getActiveSheet()->getStyle("B".$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					
					$spreadsheet->getActiveSheet()->getStyle("A".$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    // $spreadsheet->getActiveSheet()->getStyle('F'.$baris.':G'.$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    
                    $baris++;
				}
				// $SUMRANGE = 'D6:D'.$baris;
				// $col = $baris + 1;
				// $sheet->setCellValue('C'.$col, "Total");
				// $sheet->setCellValue('D'.$col, "=SUM($SUMRANGE)");

                $firtsrow = 5;
				$lastrow = $baris-1;
				$spreadsheet->getActiveSheet()->setAutoFilter("A".$firtsrow.':G'.$lastrow);
                $filename = 'Pengunjung';
                
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'. $filename .'".xlsx'); 
                header('Cache-Control: max-age=0');

                $writer->save('php://output');

            }else{
                echo "<script>
                alert('Data tidak ditemukan');
                window.location = '" . site_url('pengunjung') . "';
                </script>";
            }
        }
	}
}
