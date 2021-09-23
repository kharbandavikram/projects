<?php

class Createpdf extends CI_Controller {

function create_pdf(){
$this->load->library('pdf');
$this->pdf->load_view('mypdf');
$this->pdf->render();
$this->pdf->stream("welcome.pdf");
}
 
 
 
 
 
}