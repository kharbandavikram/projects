<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
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
