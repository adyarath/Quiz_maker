<?php
require('database/db_test.php');

if(isset($_REQUEST['name']) && isset($_REQUEST['Tname']) && isset($_REQUEST['SuniqueNo'])){

	$name=$_GET['name'];
	$Tname=$_GET['Tname'];
	$SuniqueNo=$_GET['SuniqueNo'];
	$sql = "select *from answer inner join question using(Tname) where Tname='$Tname' and Sname='$name' and SuniqueNo='$SuniqueNo'";
	$row = mysqli_query($conn,$sql);

	$count=0;
	while ($record = mysqli_fetch_array($row)) {
		$mark = $record['mark'];
		if($record['submitAns']==$record['correctAns']){
			$count += $mark;
			}
	 	}

	$sql2="select *from question where Tname='$Tname'";
	$rowcount = 0;
	if ($result=mysqli_query($conn,$sql2)){
		while ($fetch = mysqli_fetch_array($result)) {
			$mark = $fetch['mark'];
	  		$rowcount += $mark;
	  	}
	  }
	
	 	$qry=mysqli_query($conn,"SELECT * FROM score WHERE Tname ='$Tname' and SuniqueNo='$SuniqueNo'");
		$rowCheck=mysqli_num_rows($qry);
	    if ($rowCheck>0) { 
	        header('Location: punish');
	    }
	    else{ 
	        $qry1=mysqli_query($conn,"update answer set score='$count', total='$rowcount' where Tname='$Tname' and Sname='$name' and SuniqueNo='$SuniqueNo'");
	        header("Location: thanks.php?SuniqueNo=$SuniqueNo&Tname=$Tname");
	    }

	}
?>