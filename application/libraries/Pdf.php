<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');  

require_once dirname(__FILE__).'/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
function __construct()
{
parent::__construct();
}
	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}


}


?>