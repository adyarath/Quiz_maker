<?php
require('database/db_test.php');

if(isset($_REQUEST['Tname']) && isset($_REQUEST['SuniqueNo'])){

	$Tname=$_GET['Tname'];
	$SuniqueNo=$_GET['SuniqueNo'];
	$sql = "select *from answer inner join test using(Tname) where Tname='$Tname' and SuniqueNo='$SuniqueNo'";
	$row = mysqli_query($conn,$sql);
	$fetch = mysqli_fetch_array($row);

	$showScore = $fetch['showScore'];
}
?>

<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Thanks Giving | radoncosmos.i</title>
<?php include_once "includes/metahead.php"; ?>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
<style>
@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
</style>
<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">You have successfully conducted your test.</p>
	</div>

	<?php if ($showScore == 'Yes') { ?>
		<h2 style="color: green">Your Score is <?php echo $fetch['score'];?> / <?php echo $fetch['total'];?></h2>
	<?php } ?>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright <a href="https://radoncosmos.in/index.html">radoncosmos.in</a> ©2020 | All Rights Reserved</p>
	</footer>
	<style type="text/css"> @media only screen and (max-width: 600px) {
		#fineprint{margin-top: 75%}
	}</style>
</body>
</html>