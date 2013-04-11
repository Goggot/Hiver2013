<?php

require('fpdf/fpdf.php');

class PDF extends FPDF {
	// Page header
	function Header() {
		// Logo
		$this->Image('logo.png',10,6,30);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30,10,'Receipt',1,0,'C');
		// Line break
		$this->Ln(20);
	}

	// Page footer
	function Footer() {
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

class SendAttachmentEmail {
	public $to;
	public $toName;
	public $from;
	public $fromName;
	public $subject;
	public $body;
	public $attachmentPath;
	public $attachmentName;
	public $mailSent;

	public function __construct($fromEmail, $fromName, $toEmail, $toName, $subject, $body, $attachmentPath, $attachmentName) {
		$this->to = $toEmail;
		$this->toName = $toName;
		$this->from = $fromEmail;
		$this->fromName = $fromName;
		$this->subject = $subject;
		$this->body = $body;
		$this->attachmentPath = $attachmentPath;
		$this->attachmentName = $attachmentName;
		$this->mailSent = false;
	}


	public function send() {
		$uid = md5(uniqid(time()));
		$attachment = chunk_split(base64_encode(file_get_contents($this->attachmentPath)));
		
		$headers = "";
		$headers .= "From: " . $this->fromName . " <" . $this->from . ">\n"; 
		$headers .= "Return-Path: " . $this->from . "\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\n\n";
		$headers .= "This is a multi-part message in MIME format.\n\n";
		$headers .= "--".$uid."\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
		$headers .= "Content-Transfer-Encoding: 7bit\n\n";
		$headers .= $this->body . "\n";
		$headers .= "--".$uid."\n";
		$headers .= "Content-Type: application/octet-stream; name=\"" . $this->attachmentName . "\"\n";
		$headers .= "Content-Transfer-Encoding: base64\n";
		$headers .= "Content-Disposition: attachment; filename=\"" . $this->attachmentName . "\"\n\n";
		$headers .= $attachment . "\n\n";
		$headers .= "--".$uid."--";

		$this->mailSent = mail($this->toName . " <" .$this->to .">", $this->subject, "", $headers, "-f" . $this->from . "" );
		
	}
}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	
	for($i=1;$i<=40;$i++)
		$pdf->Cell(0,10,'Printing line number '.$i,0,1);
		
	$pdf->Output("fpdf/receipt.pdf", "F");
	//$pdf->Output(); // outputs to screen
	
	/*
	$sender = new SendAttachmentEmail("from@email.comf", "ISRE", "to@email.com", "Fred", "Attachment mail", "See attached receipt", "fpdf/receipt.pdf", "receipt.pdf");
	$sender->send();
	
	if ($sender->mailSent) {
		echo "success";
	}
	else {
		echo "failed";
	}
	*/
	
	//unlink("fpdf/receipt.pdf");
	
?>