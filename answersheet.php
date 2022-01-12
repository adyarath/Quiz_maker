<?php

error_reporting(0);
require('database/db_test.php');
include_once("fpdf/fpdf.php");

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];

    ////////////////////////////
    $sql = "select * from question inner join test using(Tname) where Tname = '$Tname'";
    $records = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_array($records);

    $sql1 = "select * from question where Tname = '$Tname'";
    $records1 = mysqli_query($conn,$sql1);

    ///////////////////////////

    $pdf = new FPDF('p','mm','A4');
    $pdf->AddPage();

    $pdf->SetFont("Times","B",20);
    $pdf->Cell(0,20,"Test Name : ".$fetch['Pname']."",0,1,"C");
    // $pdf->SetFont("Times","",15);
    // $pdf->Cell(0,-5,"(Organiser : ".$fetch['username'].")",0,1,"C");
    $pdf->Cell(189,15,'',0,1); //vertical space
    $pdf->SetTextColor(0,8,8);
    $pdf->SetFont("Arial","",12);

    while($fetch1 = mysqli_fetch_array($records1)) {

    $pdf->SetTextColor(255,0,0);
    $pdf->Write(5,"Question : ".$fetch1['Qname']."");
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,5," (".$fetch1['mark']." marks)",0,1,"L");

    $pdf->Cell(189,3,'',0,10); //vertical space

    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,5,"Option 1 : ".$fetch1['option1']."",0,1,"L");
    $pdf->Cell(0,5,"Option 2 : ".$fetch1['option2']."",0,1,"L");
    $pdf->Cell(0,5,"Option 3 : ".$fetch1['option3']."",0,1,"L");
    $pdf->Cell(0,5,"Option 4 : ".$fetch1['option4']."",0,1,"L");

    $pdf->SetTextColor(0,128,0);
    $pdf->Cell(0,5,"Correct Answer : ".$fetch1['correctAns']."",0,1,"L");

    $pdf->Cell(189,10,'',0,1); //vertical space
    }

    $pdf->SetY(-40);
    $pdf->SetFont('Arial','',8);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,10,'This portal is brought to you by radoncosmos.in',0,0,'C');
    $pdf->Output();
    }
?>