<?php

error_reporting(0);
require('database/db_test.php');
include_once("fpdf/fpdf.php");

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];

    ////////////////////////////
    $sql = "select * from answer inner join test using(Tname) where Tname = '$Tname'";
    $records = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_array($records);

    $sql1 = "SELECT *FROM answer where Tname='$Tname' GROUP BY SuniqueNo ORDER BY Sdate";
    $records1 = mysqli_query($conn,$sql1);

    ///////////////////////////
    $counter = 0;

    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();

    $pdf->SetFont("Times","B",20);
    $pdf->Cell(0,20,"Test Name : ".$fetch['Pname']."",0,1,"C");
    $pdf->Cell(189,15,'',0,1); //vertical space
    $pdf->SetTextColor(255,0,0);
	$pdf->SetFont("Arial","",14);

	$pdf->Cell(56,10,"Name",1,0,"C");
	$pdf->Cell(46,10,"Unique No.",1,0,"C");
	$pdf->Cell(50,10,"Date",1,0,"C");
	$pdf->Cell(18,10,"Score",1,0,"C");
	$pdf->Cell(18,10,"Out of",1,1,"C");
	
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont("Arial","",12);

    while($fetch1 = mysqli_fetch_array($records1)) {
    $pdf->Cell(56,10,$fetch1['Sname'],1,0,"C");
    $pdf->Cell(46,10,$fetch1['SuniqueNo'],1,0,"C");
    $pdf->Cell(50,10,date('d-m-Y, h:i A',strtotime('+5 hour +30 minutes +1 seconds',strtotime($fetch1['Sdate']))),1,0,"C");
    $pdf->Cell(18,10,$fetch1['score'],1,0,"C");
    $pdf->Cell(18,10,$fetch1['total'],1,1,"C");
    }

    $pdf->SetY(-40);
    $pdf->SetFont('Arial','',8);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,10,'This portal is brought to you by radoncosmos.in',0,0,'C');
    $pdf->Output();
    }
?>