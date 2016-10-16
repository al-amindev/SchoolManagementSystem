<?php
  require("../Config.php");
  require (SITE_PATH."/controller/PostController.php");
  $PostCon=new PostController;
   $class_id=$_GET['class_id'];
   $class_name=$_GET['class_name'];
    $result=$PostCon->c_result_by_class($class_id);
    $class='Class'.' '.$class_name;
  
  class PDF extends FPDF
  {
  // Page header
  function Header()
  {
      // Logo
      $this->Image('asset/image/site/logo.png',10,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Cell(80);
      // Title
      $this->Cell(60,10,'Miar Hat High School',0,0,'C');
       $this->Ln();
      $this->Cell(80);
      $this->Cell(60,10,$GLOBALS['class'],0,0,'C');
      // Line break
      $this->Ln(20);
      $this->Ln();
      $this->Ln();
  }
  function Footer()
  {
      // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

  function BasicTable($header, $data)
  {
      // Header
    $this->Cell(30);
      foreach($header as $col)

          $this->Cell(45,7,$col,1);
      $this->Ln();
      // Data
      foreach($data as $row)
      {
        $this->Cell(30);
          foreach($row as $col)
              $this->Cell(45,6,$col,1);
          $this->Ln();
      }
  }

  // Page footer

  }

  $pdf = new PDF();
  // Column headings
  $header= array('Reg Number', 'Name Of Student', 'Avg Mark OR GPA');
  // Data loading
  $pdf->SetFont('Arial','',14);
  $pdf->AddPage();
  $pdf->BasicTable($header,$result);
  $pdf->Output();
    ?>