<?php
namespace Magazine\Service;

class PdfService
{
	public function extractPdf($data = array(
			"source","page_start","page_end", "file_name", "year", "number"
		))
	{
		$journal_path = (!empty($data['source'])) ? $data['source'] : null;
		$page_start = (!empty($data['page_start'])) ? (int) $data['page_start'] : null;
		$page_end = (!empty($data['page_end'])) ? (int) $data['page_end'] : null;
		$_file_name = (!empty($data['file_name'])) ? $data['file_name'] : null;
		$year = (!empty($data['year'])) ? $data['year'] : null;
		$number = (!empty($data['number'])) ? $data['number'] : null;				
		if($page_start>0 && $page_end>0){   
		$base_dir = "/webservers/xampp/htdocs/tibl.new/www/wp-content/uploads/journals/";
		$link = $base_dir.$journal_path;
		$hash = substr(md5(microtime()), 0, 8);	
		$name = (!empty($_file_name)) ? $_file_name : "$page_start"."_"."$page_end"."_"."$hash.pdf";
		//die($name);
		$file_path=$base_dir."$year/$number/$name"; 

		$pdf = new \Magazine\Pdf\JournalPdfExtractor();
		$pdf->setFile($link);     
		$pdf->getRange($page_start,$page_end);
		$pdf->Output($file_path,'F');
		return array(
			"name" => $name
			);
		}
		return false;
	}

	public function getPdfFile($year, $num, $doi)
	{
		
	}
}