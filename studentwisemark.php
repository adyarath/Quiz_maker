<?php
 
    require('includes/header.php');

    if(isset($_REQUEST['Tname']) && isset($_REQUEST['student'])){

    	$Tname = $_GET['Tname'];
    	$student = $_GET['student'];

        $sql1 = mysqli_query($conn,"SELECT *FROM question left JOIN answer USING(Qname) WHERE answer.SuniqueNo='$student' AND answer.Tname='$Tname'");

        $sql2 = mysqli_query($conn,"SELECT *FROM question left JOIN answer USING(Tname) left join test using(Tname) WHERE answer.SuniqueNo='$student' AND answer.Tname='$Tname'");
        $fetch2 = mysqli_fetch_array($sql2);
    }
    $counter = 0;
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<body>
	<div class="main">

		<center>
		   
			<a class="btn btn-success" href="results.php?Tname=<?php echo $fetch2['Tname'];?>">Go Back</a>
			<button class="btn btn-success" onclick="window.print()">Print this Page</button>

			<div class="box">
			<p><strong>Test Name :</strong></strong> <?php echo $fetch2['Pname']; ?></p>
			<p><strong>Date & Time :</strong></strong> <?php echo date("d-m-Y h:i A",strtotime('+5 hour +30 minutes +1 seconds',strtotime($fetch2['Sdate']))); ?></p>
			<p><strong>Name :</strong></strong> <?php echo $fetch2['Sname']; ?></p>
			<p><strong>Unique No. :</strong></strong> <?php echo $fetch2['SuniqueNo']; ?></p>
			<p><strong>Score :</strong></strong> <?php echo $fetch2['score']; ?> out of <?php echo $fetch2['total']; ?></p>
		</div>
		</center>

		<?php while($fetch1 = mysqli_fetch_array($sql1)){ ?>

		<span class="qsn">Question <?php echo ++$counter; ?> : </span><?php echo $fetch1['Qname']; ?> <b>(Mark : <?php echo $fetch1['mark']; ?>)</b><br><br>
		<b>Option 1 : </b><?php echo $fetch1['option1']; ?></br>
		<b>Option 2 : </b><?php echo $fetch1['option2']; ?></br>
		<b>Option 3 : </b><?php echo $fetch1['option3']; ?></br>
		<b>Option 4 : </b><?php echo $fetch1['option4']; ?></br>
		<br>
		<span class="sub">Submitted Answer :</span> <?php echo $fetch1['submitAns']; ?><br>
		<span class="cor">Correct Answer :</span> <?php echo $fetch1['correctAns']; ?><br><br><br>

		<?php } ?>

	</div>
	
	<hr>
	<p class="footer">This marksheet is auto generated on request by radoncosmos quiz portal. There is no interference of test admin on any type of changes or modification of the marksheet generated.</p>

	<style type="text/css">
		.main{padding: 2% 4% 0 4%; font-family: 'Poppins', sans-serif;}
		.box{width: 400px; border: 5px solid purple; border-radius: 2%; text-align: left; padding: 20px; margin: 30px;}
		.qsn{color: red; font-weight: 600}
		.sub{font-weight: 600; color: #1f50e0}
		.cor{font-weight: 600; color: green}
		.footer{text-align: right; color: red}

		@media only screen and (max-width: 600px) {
			.main{padding: 2% 2% 0 2%;}
			.box{width: 100%; padding: 7px; border: 2px solid rgba(202, 55, 130, 0.7); margin: 20px 0 20px 0; font-size: 15px}
			.footer{text-align: center; color: red}
		}
	</style>
</body>