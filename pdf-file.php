<?php
$html = file_get_contents('pdf-template.php');
//ob_start();
//include dirname(__FILE__).'./pdf-template.php';
//$html = ob_get_clean();
//echo $html;
//exit;

require_once("./htmltopdf/html2pdf.class.php");
try{
	$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', $marges = array(8, 5, 8, 5));
	$html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->writeHTML($html);
	$html2pdf->Output('remuse-pdf-'.date("Y-m-d").'.pdf');
	
}catch(HTML2PDF_exception $e){
	$formatter = new ExceptionFormatter($e);
	echo $formatter->getHtmlMessage();
}
?>
