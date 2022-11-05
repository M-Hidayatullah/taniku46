<?php namespace App\Controllers;

use App\Models\M_pembelian;
use TCPDF;

class Pdf extends BaseController
{

	protected $M_pembelian;

	public function __construct()
	{
		$this->M_pembelian = new M_pembelian;
	}
	public function cetakPdf()
	{
		$data = [
			'title'			=> 'Ceak Ke PDF',
			'getData'		=> $this->M_pembelian->ambilData()
		];

		$html = view('/admin/pdf/v_pdfProduk',$data);

		
		//Creae PDF
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->setPrintHeader(true);
		$pdf->setPrintFooter(false);

		$pdf->SetHeaderData('',PDF_HEADER_LOGO_WIDTH, 'TOKO HIKMAH', 'Jln. Raya Masbagik - Labuhan Lombok, Lombok Timur Kode 83661.');

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin('10');

		$pdf->AddPage();
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		$pdf->Output('example_011.pdf', 'I');
	}
}