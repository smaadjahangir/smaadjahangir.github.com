<?php
require 'pdfcrowd.php';

try
{   
    // create an API client instance
	// PW: airbender786
    $client = new Pdfcrowd("mursaleen", "25817a151f222839341d20c48424e345");
	
	$client->setPageWidth("8.5in");
	$client->setPageHeight("14in");
	$client->setHorizontalMargin("0.5in");
	$client->setVerticalMargin("0.5in");
	
	$client->setPageWidth("210mm");
	$client->setPageHeight("297mm");
	
	$client->setInitialPdfZoomType(Pdfcrowd::FIT_PAGE);
	$client->setPageLayout(Pdfcrowd::CONTINUOUS);
	
	$client->setHtmlZoom(100);
	$client->setPdfScalingFactor(0.8);
	
    // convert a web page and store the generated PDF into a $pdf variable
	$pdf = $client->convertURI('http://www.smaadjahangir.com/');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"remuse-pdf-".date('Y-m-d').".pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>