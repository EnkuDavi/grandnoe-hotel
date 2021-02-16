<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require 'assets/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Rekap extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekap_model');
    }

    public function index()
    {
        $data['rekap'] = $this->rekap_model->get();
        $this->template->load('template','rekap/rekap_data',$data);
    }

    public function export()
    {
        $post = $this->input->post(Null, True);
        if(isset($_POST['btn-cari']))
        {
            $data['rekap'] = $this->rekap_model->getByMonth($post);
            if($this->db->affected_rows() > 0)
            {
                $this->template->load('template','rekap/rekap_data',$data);
            }else{
                echo "<script>
                alert('Data tidak ditemukan');
                window.location = '" . site_url('rekap') . "';
                </script>";
            }
        }else{
            $data['rekap'] = $this->rekap_model->getByMonth($post);
            if($this->db->affected_rows() > 0)
            {
                $spreadsheet = New Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('B4','Rekapitulasi Kamar Hotel');
                $sheet->setCellValue('B5','Grand Noeri Hotel');
                $sheet->setCellValue('B6','Jl. Pangkal Perjuangan By Pass Patung Udang RT 008 / RW 010, Tanjung Mekar Karawang');
                $writer = new Xlsx($spreadsheet);
                $sheet->setCellValue('A9', 'No');
                $sheet->setCellValue('B9', 'TANGGAL');
                $sheet->setCellValue('C9', 'TYPE');
                $sheet->setCellValue('D9', 'PEROLEHAN');

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

                $spreadsheet->getActiveSheet()->mergeCells("B4:D4");
                $spreadsheet->getActiveSheet()->mergeCells("B5:D5");
                $spreadsheet->getActiveSheet()->mergeCells("B6:D7");
                $spreadsheet->getActiveSheet()->mergeCells("A1:B3");
                $spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setSize(14);
                $spreadsheet->getActiveSheet()->getStyle('B5')->getFont()->setSize(14);
                $spreadsheet->getActiveSheet()->getStyle("B6:D7")->getAlignment()->setWrapText(true);
                $spreadsheet->getActiveSheet()->getStyle("B6")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("B4")->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle("B5")->getFont()->setBold(true);

                $spreadsheet->getActiveSheet()->getStyle("B4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("B5")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle("A9:D9")->applyFromArray($tableHead);

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(8);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(23);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                $spreadsheet->getActiveSheet()->getStyle('A9:D9')->getFont()->setSize(11);
                $spreadsheet->getActiveSheet()->getStyle("A9:D9")->getFont()->setBold(true);
                $spreadsheet->getActiveSheet()->getStyle("A9:D9")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Paid');
                $drawing->setDescription('Paid');
                $drawing->setPath('./assets/dist/img/logo.png'); // put your path and image here
                $drawing->setCoordinates('A1');
                $drawing->setOffsetX(40);
                // $drawing->setRotation(25);
                $drawing->setWidthAndHeight(70, 60);
                $drawing->getShadow()->setVisible(true);
                $drawing->setWorksheet($spreadsheet->getActiveSheet());
    
        
                $baris = 10;
                $no = 1;

                foreach($data['rekap']->result() as $data){
                    $sheet->setCellValue('A'.$baris, $no++);
                    $sheet->setCellValue('B'.$baris, $data->date);
                    $sheet->setCellValue('C'.$baris, $data->type_kamar);
					$sheet->setCellValue('D'.$baris, $data->rekap);
                   
                    
                    $spreadsheet->getActiveSheet()->getStyle('A'.$baris.':D'.$baris)->applyFromArray($tableBody);
					$spreadsheet->getActiveSheet()->getStyle('A'.$baris.':D'.$baris)->getFont()->setSize(10);
					$spreadsheet->getActiveSheet()->getStyle("D".$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    
                    // $spreadsheet->getActiveSheet()->getStyle('F'.$baris.':G'.$baris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    
                    $baris++;
				}
				$SUMRANGE = 'D10:D'.$baris;
				$col = $baris + 1;
				$sheet->setCellValue('C'.$col, "Total");
                $sheet->setCellValue('D'.$col, "=SUM($SUMRANGE)");
                
                $firtsrow = 9;
				$lastrow = $baris-1;
				$spreadsheet->getActiveSheet()->setAutoFilter("A".$firtsrow.':D'.$lastrow);
		

                $filename = 'Rekap';
                
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'. $filename .'".xlsx'); 
                header('Cache-Control: max-age=0');

                $writer->save('php://output');

            }else{
                echo "<script>
                alert('Data tidak ditemukan');
                window.location = '" . site_url('rekap') . "';
                </script>";
            }
        }
    }

}