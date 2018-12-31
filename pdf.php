<?php
require('fpdf/fpdf.php');

$id 		= $_POST['sid'];
$f_name 	= $_POST['f_name'];
$l_name 	= $_POST['l_name'];
$address 	= $_POST['address'];
$email 		= $_POST['email'];
$city 		= $_POST['city'];
$zip 		= $_POST['zip'];
$country 	= $_POST['country'];
$phone 		= $_POST['phone'];
$datein 	= $_POST['datein'];
$dateout 	= $_POST['dateout'];
$a_number 	= $_POST['a_number'];
$c_number 	= $_POST['c_number'];

class PDF extends FPDF
{
	// P
}

// Instanciation of inherited class
// $pdf = new PDF('L','mm',array(100,150));


$pdf = new PDF('l','mm',array(140,250));

$pdf->AddPage();

$pdf->Image('images/txt/logo.png',10,6,30);

// Arial bold 15
$pdf->SetFont('Arial','B',20);

// Title
$pdf->Cell(0,20,'Your Booking is done',0,1);



//SetFont(name, r/b/i, pt)
$pdf->SetFont('Times','B',12);

//cell(width, height, text, border, endline, align)
$pdf->Cell(30,5,'Your trip id is ');
$pdf->SetFont('Times','I',12);
$pdf->Cell(70,5,$id);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,'All details will be sent to '.$email,0,1);
$pdf->Cell(0,5,'Thank you for booking with us.',0,1);

$pdf->Ln(5);

$pdf->Cell(0,5,'You just booked',0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,'This hotel, in this location',0,1);

$pdf->SetFont('Times','',12);
//Image(path, x, y, width, height)
$pdf->Image('admin/upload/1a0fcfbb445c6d.jpg',10,60,30,25);
$pdf->SetXY(45,58);

$pdf->Cell(0,5,'1 room for 4 nights',0,1);
$pdf->Line(45,63,210,63);

$pdf->SetXY(45,65);
$pdf->Cell(30,5,'Check In',0,0);
$pdf->Cell(30,5,'',0,0);
$pdf->Cell(30,5,'Check Out',0,0);
$pdf->Cell(30,5,'',0,0);
$pdf->Cell(30,5,'Guests',0,1);

$pdf->SetXY(45,71);
$pdf->Cell(30,5,$datein,0,0);
$pdf->Cell(30,5,'2 nights',0,0);
$pdf->Cell(30,5,$dateout,0,0);
$pdf->Cell(30,5,'',0,0);
$pdf->Cell(15,5,$a_number.' Adult',0,0);
$pdf->Cell(0,5,$c_number.' Child',0,1);

$pdf->SetXY(20,90);
$pdf->Cell(0,5,'Primary Traveller in this trip',0,1);
$pdf->Image('images/uploads/avatar.jpg',20,96,10,10);

$pdf->SetXY(32,97);
$pdf->Cell(30,5,'Mr. '.$f_name.' '.$l_name);
$pdf->Cell(30,5,'',0,0);

$pdf->Cell(0,5,$address.', '.$city.'-'.$zip.', '.$country,0,1);

$pdf->SetXY(92,105);
$pdf->Cell(0,5,'Phone     '.$phone,0,1);








$pdf->Output();
?>
