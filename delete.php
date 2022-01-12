<?php
error_reporting(0);
require('includes/header.php');

    if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM question where organiser = '$id' and Tname='$Tname'";
    $row2 = mysqli_query($conn,$sql2);
    $count=mysqli_num_rows($row2);
  }

    if(isset($_REQUEST['del'])){
    $Q=$_GET['del'];

    $sql6 = "SELECT *FROM question where Qid='$Q'";
    $row6 = mysqli_query($conn,$sql6);
    $fetch = mysqli_fetch_array($row6);
    unlink("uploads/$fetch[Qimg]"); 

    $sql = "delete from question WHERE Qid='$Q'";
    $row = mysqli_query($conn,$sql);
    echo "<script>window.location.href='viewquestion.php?Tname=$Tname'</script>"; 
    }
    
  if(isset($_REQUEST['delete'])){
    $id=$_GET['delete'];
    $sql8 = "delete from score WHERE SuniqueNo='$id'and Tname='$Tname'";
    $row8 = mysqli_query($conn,$sql8);

    $sql12 = "delete from answer WHERE SuniqueNo='$id'and Tname='$Tname'";
    $row12 = mysqli_query($conn,$sql12);
    echo "<script>window.location.href='results.php?Tname=$Tname'</script>"; 
  }
  
?>