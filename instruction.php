<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>Instruction for Admin | radoncosmos.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once "includes/metahead.php"; ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</head>
<body>

<div id="progressbar"></div>
<div id="scrollpath"></div>

<section>
	<h2>Instructions for <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
	<p class="desk">** Seems you are at the right place and after some time you will be confident enough to begin your test creation! **</p>
	<p class="mob">** Seems you are at the right place. **</p>

	<center><img src="assets/img/InstructionQuiz.webp" height="500px" width="700px"></center>
	
	<p class="descrip"><span class="backl">color</span> : Highlited Points</p>
	<p class="descrip"><a heref="">color</a> : Clickable Image</p>
	<p class="heading"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Your <span class="backl">"Welcome page"</span> contains 3 cards namely <span class="backl">"INSTRUCTION Card"</span>, <span class="backl">"ADD TEST Card"</span> and <span class="backl">"VIEW TEST Card"</span>.</p>
	
	<p class="heading"><i class="fa fa-hand-o-right" aria-hidden="true"></i>If you are a new member, then u have to read the instruction thoroughly, if not u can skip to the dashboard.</p>
	
    <p class="heading"><i class="fa fa-hand-o-right" aria-hidden="true"></i><span class="backl">"ADD TEST Card"</span></p>
    <p class="descrip"> <span class="descrip-pt"> >> </span> In this section, the admin can click to add a new test with portal start date and end date.</p>
  
    <p class="descrip"> <span class="descrip-pt"> >> </span> If the user successfully creates the test then he/she will be redirected to the <a href="assets/img/screenshots/dash.webp">"viewall test page"</a>.<br></p>
    <p class="descrip"> <span class="descrip-pt"> >> </span> Assuming the admin successfully created the test and now is in the <a href="assets/img/screenshots/dash.webp">"viewall test page"</a>, <br>
    Here, you can manage your all your created test neatly. More description below</p>
    
    <p class="heading"><i class="fa fa-hand-o-right" aria-hidden="true"></i><span class="backl">"VIEW TEST Card"</span></p>
    <p class="descrip"> <span class="descrip-pt"> >> </span> After successfully creating your test, you get to manipulate or modify your test. This <a href="assets/img/screenshots/welcomePage.webp">"view test card"</a> will help you to manage your tests.</p>
    <p class="descrip"> <span class="descrip-pt"> >> </span> Assuming you are now inside the <a href="assets/img/screenshots/dash.webp">"viewall test page"</a>. Here, you have a tabular dashboard with the following facilities. <br>
    <span class="descrip-pt"> -> </span>You can see your respective test name with the test date and total no. of questions your test contains. <br>
    <span class="descrip-pt"> -> </span>You have the option to update portal start time,end time and test timing,<br>
    <span class="descrip-pt"> -> </span>You have the option to add questions to your test created,<br>
    <span class="descrip-pt"> -> </span>You have the option to view your test that you created earlier, and inside that, you have another option to <a href="assets/img/screenshots/view%20qsn.webp">"update or change your question"</a> if it has some mistake.<br>
     <span class="descrip-pt"> -> </span>You have the option to share your test among the participants,<br>
    <span class="descrip-pt"> -> </span>You have the option to view the results submitted by participants. Inside <a href="assets/img/screenshots/results.webp">"View results page"</a> you will find a list of all participants, with their name, unique id, response date and time, marks scored out of,  option to delete any of the records found susceptible and view detailed answersheet of particular participant,<br>
    
    <span class="descrip-pt"> -> </span>You have the option to delete your test if wrongly created.</p>
    
   
    
    <p class="heading"><i class="fa fa-hand-o-right" aria-hidden="true"></i><span class="backl">Notes :</span></p>
    <p class="descrip"> <span class="descrip-pt"> >> </span> If you are the admin of any school, college, university, or institution then you participants those who are going to give test have their own registration number or roll no, etc.
        and if you do not belong to the above category, then you have to give your participants a unique id (which is mandatory because the name can be of the same type but not the unique ID) so that they can be uniquely identified.</p>
    <p class="descrip"> <span class="descrip-pt"> >> </span> As u know your test has a certain duration to complete if anyone fails to submit within the time then his/her test will be submitted automatically including his filled answers.</p><br><br>
   
    <h2>Thank You</h2>
    
</section>

<button id="toTop"></button>

<style type="text/css">
	*{margin: 0;padding: 0;font-family: 'Poppins', sans-serif;}
	section{padding: 0 10% 7% 10%;background: #000;}
    section h2{text-align: center;font-size: 2.5em;color: #fff;padding-bottom: 10px;}
	section p{font-size: 1.2em;color: #fff;text-align: justify;padding-bottom: 10px;}
	.desk{text-align:center};
	.heading{padding: 10px 0 5px 0;}
	.descrip{padding-bottom: 10px;}
	.descrip-pt{color: yellow;}
	.backl{color: yellow;}
	.mob{display: none;}
	.descrip a{text-decoration: none;color: #17e3e3;}
	.fa-hand-o-right{font-size: 40px;padding-right: 20px;color: red;}
	::selection {color: red}
	::-webkit-scrollbar{width: 0;}
	#scrollpath{position: fixed;top: 0;right: 0;width: 10px;height: 100%;background: rgba(255,255,255,0.05);}
	#progressbar{position: fixed;top: 0;right: 0;width: 10px;height: 100%;background: linear-gradient(to top, #008aff, #00ffe7);animation: animate 5s linear-infinite;}
	@keyframes animate{0%,100%{filter: hue-rotate(0deg);}50%{filter: hue-rotate(360deg);}}
	#progressbar:before{content: '';position: absolute;top: 0;left: 0;width: 100%;height: 100%;background: linear-gradient(to top, #008aff, #00ffe7);filter: blur(10px);}
	#progressbar:after{content: '';position: absolute;top: 0;left: 0;width: 100%;height: 100%;background: linear-gradient(to top, #008aff, #00ffe7);filter: blur(30px);}
	#toTop{width: 50px; height: 50px;border: none;border-radius: 50%;bottom: 23px;left: 15px;background: red;cursor: pointer; position: fixed;display: none;outline: none;}
	#toTop:before {content: '';top: 50%;left: 50%;display: block;margin: -14px 0 0 -12px;border-left: 12px solid transparent;border-right: 12px solid transparent;border-bottom: 23px solid white;position: absolute;}
	@media only screen and (max-width: 600px) {
		section{padding: 0 20px 15% 20px;}
		section h2{padding-bottom: 16%;}
		section p{text-align: left;font-size: 14px;}
		section img{width: 100%; height: 230px}
		.desk{display: none;}
		.mob{display: block;text-align: center;}
		.fa-hand-o-right{font-size: 26px;padding-right: 5px;}
		video,iframe{width: 100%;}
		#scrollpath,#progressbar{display: none;}
		#toTop{width: 48px; height: 48px; cursor: pointer; position: fixed;bottom: 15px;left: 13px;display: none;}
	}
</style>
<script type="text/javascript">
	let progress = document.getElementById('progressbar');
	let totalHeight = document.body.scrollHeight - window.innerHeight;
	window.onscroll = function(){
		let progressHeight = (window.pageYOffset / totalHeight) * 100;
		progress.style.height = progressHeight + "%";
	}
</script>

<script type="text/javascript">
	$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});

$("#toTop").click(function() {
    $("html, body").animate({scrollTop: 0}, 1000);
 });
</script>
<script>
    lightbox.option({
      'maxWidth': 900,
      'maxHeight': 700
    })
</script>
</body>
</html>