<?php

class Createpdf extends CI_Controller {

function create_pdf_data(){
$this->load->library('pdf');
$this->pdf->load_view('mypdf');
$this->pdf->render();
$this->pdf->stream("welcome.pdf");
}
 
 
function create_pdf(){
$data  = array();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [250, 1200]]);
$mpdf->AddPage('P');   // L for landscope, P for potrate
$html = $this->load->view('mypdf',$data,true);
$mpdf->WriteHTML($html);
$mpdf->defaultheaderline = 0;
$mpdf->defaultfooterline = 0;
$mpdf->setAutoBottomMargin = 'stretch';
$mpdf->Output($partnername.'.pdf', 'D'); // D for down load , I for open in browser



$this->load->library('pdf');
$this->pdf->load_view('mypdf');
$this->pdf->render();
$this->pdf->stream("welcome.pdf");
}
  
 
 
 
}