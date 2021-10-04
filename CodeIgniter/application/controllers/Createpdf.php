<?php

class Createpdf extends CI_Controller {


 
		public function create_pdf()
	{
		$data  = array();
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [250, 1200]]);
		$mpdf->AddPage('P');   // L for landscope, P for potrate
		$html = $this->load->view('mypdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->defaultheaderline = 0;
		$mpdf->defaultfooterline = 0;
		$mpdf->setAutoBottomMargin = 'stretch';
		$mpdf->Output('test.pdf', 'D'); // D for down load , I for open in browser
	}
 
 
 
}