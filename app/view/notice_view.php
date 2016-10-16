<?php
require("../Config.php");
require (SITE_PATH."/controller/PostController.php");
$PostCon=new PostController;
$notice_id=$_GET['notice_id'];
$result=$PostCon->c_notice_list($notice_id);
foreach ($result as $value) {
  $title=$value['notice_title'];
  $describe=$value['notice_description'];
  $date=$value['notice_date'];
  $user=$value['u_f_name'];
  $user_type=$value['user_type'];
}
class PDF extends FPDF
{
// Page header
  function Header()
  {
    GLOBAL $date;
// Logo
    $this->Image('asset/image/site/logo.png',10,6,30);
// Arial bold 15
    $this->SetFont('Arial','B',15);
// Move to the right
    $this->Cell(80);
// Title
    $this->Cell(60,10,'Miar Hat High School',0,0,'C');
    $this->Ln();
    $this->Cell(130);
    $this->SetFont('Arial','B',10);
    $this->Cell(60,5,'Date-'.$date,0,0,'C');
    $this->Ln();
    $this->Cell(80);
// Line break
    $this->Ln(20);
    $this->Ln();
    $this->Ln();
  }

  function Footer()
  {
    GLOBAL $user;
    GLOBAL $user_type;
    $this->SetY(-45);
    $this->Cell(130);
    $this->Cell(60,5,'Authorized Published By',0,0,'C');
    $this->Ln();
    $this->Cell(130);
    $this->Cell(60,5,$user.', '.$user_type,0,0,'C');
// Position at 1.5 cm from bottom
    $this->SetY(-15);
// Arial italic 8
    $this->SetFont('Arial','I',8);
// Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

  function notice_title( $data)
  {
// Arial bold 15
    $this->SetFont('Arial','B',15);
// Calculate width of title and position
    $w = $this->GetStringWidth($data)+6;
    $this->SetX((210-$w)/2);
// Colors of frame, background and text
    $this->SetFillColor(199,220,255);
    $this->SetTextColor(0,0,0);
// Thickness of frame (1 mm)
    $this->SetLineWidth(1);
// Title
    $this->Cell($w,9,$data,0,0,'C',true);
// Line break
    $this->Ln(30);
  }

  function notic_description($data)
  {
    $this->SetFillColor(255,255,255);
    $this->SetFont('Times','',12);
// Output justified text
    $this->MultiCell(0,5,$data);
    $this->Ln();
  }
// Page footer
}
$pdf = new PDF();
// Column headings
// Data loading
$pdf->SetFont('Arial','',14);
$pdf->Header($date);
$pdf->AddPage();
$pdf->notice_title($title);
$pdf->notic_description($describe);
$pdf->Output();
?>