<?php
error_reporting(0);
require('database/db_test.php');

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM question where Tname='$Tname' ORDER BY RAND()";
    $row2 = mysqli_query($conn,$sql2);
    
    $sql10 = "SELECT *FROM test where Tname='$Tname'";
    $row10 = mysqli_query($conn,$sql10);
    $row11 = mysqli_fetch_array($row10);


    $count = $_POST['count'];

    for ($i = 0; $i < $count; $i++) {
      
        $Sname = mysqli_real_escape_string($conn,$_POST['Sname']); 
        $Semail = mysqli_real_escape_string($conn,$_POST['Semail']); 
        $SuniqueNo = mysqli_real_escape_string($conn,$_POST['SuniqueNo']);
        $submitAns = mysqli_real_escape_string($conn,$_POST['submitAns'][$i]);
        $Qname = mysqli_real_escape_string($conn,$_POST['Qname'][$i]);

        $sql = "INSERT INTO answer (Tname,Qname, Sname,Semail,SuniqueNo,submitAns)
        VALUES ('$Tname','$Qname','$Sname','$Semail','$SuniqueNo','$submitAns')";
        $result = mysqli_query($conn,$sql);

        header('Location: submit.php?name='.$Sname.'&&Tname='.$Tname.'&&SuniqueNo='.$SuniqueNo);
    }

    $sql4 = "SELECT *FROM test left join users using(id) where Tname='$Tname'";
    $row4 = mysqli_query($conn,$sql4);
    $row5 = mysqli_fetch_array($row4);
  }

   $counter = 0;
   $i = 0;
?>

<!DOCTYPE html>
<html lang="en" >
<head>
<title>Get Set Go | radoncosmos.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="radoncosmos.in" />
<meta property="og:description" content="Unfolding the Sheets of Technology" />
<meta property="og:url" content="https://radoncosmos.in/" />
<meta property="og:site_name" content="radoncosmos.in" />
<meta property="og:image" content="icons/android-chrome-512x512.png" />
<link rel="canonical" href="https://radoncosmos.in/" />
<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="512x512" href="icons/android-chrome-512x512.png">
<link rel="manifest" href="icons/site.webmanifest">
<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="icons/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="icons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" type="text/css" href="assets/css/sharestyle.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<!-- .timer start. -->
<script> 
        //set minutes 
        var mins = <?php echo $row5['time']?>; 
  
        //calculate the seconds 
        var secs = mins * 60; 
  
        //countdown function is evoked when page is loaded 
        function countdown() { 
            setTimeout('Decrement()', 60); 
        } 
  
        //Decrement function decrement the value. 
        function Decrement() { 
            if (document.getElementById) { 
                minutes = document.getElementById("minutes"); 
                seconds = document.getElementById("seconds"); 
  
                //if less than a minute remaining 
                //Display only seconds value. 
                if (seconds < 59) { 
                    seconds.value = secs; 
                } 
  
                //Display both minutes and seconds 
                //getminutes and getseconds is used to 
                //get minutes and seconds 
                else { 
                    minutes.value = getminutes(); 
                    seconds.value = getseconds(); 
                } 
                //when less than a minute remaining 
                //colour of the minutes and seconds 
                //changes to red 
                if (mins < 1) { 
                    minutes.style.color = "red"; 
                    seconds.style.color = "red"; 
                } 
                //if seconds becomes zero, 
                //then page alert time up 
                if (mins < 0) { 
                    document.getElementById('myquiz').submit();
                    minutes.value = 0; 
                    seconds.value = 0; 
                } 
                //if seconds > 0 then seconds is decremented 
                else { 
                    secs--; 
                    setTimeout('Decrement()', 1000); 
                } 
            } 
        } 
  
        function getminutes() { 
            //minutes is seconds divided by 60, rounded down 
            mins = Math.floor(secs / 60); 
            return mins; 
        } 
  
        function getseconds() { 
            //take minutes remaining (as seconds) away  
            //from total seconds remaining 
            return secs - Math.round(mins * 60); 
        } 
    </script> 

<style type="text/css"> 
*{
    margin:0;
    padding:0;
}

    span {color: #17e3e3}
    #timer{
        background:#1b1b32;
        color:white;
        position: fixed;
        top: 0;
        width: 100%; 
        font-size:30px;
    }
    @media only screen and (max-width: 600px) {
      #timer{font-size: 15px;}
    }
    
</style>
<!-- .timer end. -->

<!-- .key block start. -->
<script>

    document.onkeydown = function (e) {
        if (event.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'i'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'c'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
            return false;
        }
    }
</script>
<!-- .key block end. -->
</head>
<body oncontextmenu="return false" onload="uwait();uover();">
    
    <div id="waittest">
<h1 class="Tname">Test Name : <?php echo $row11['Pname'];?></h1>
<center><img src="assets/img/testpad.svg" /><img src="assets/img/testgrade.svg" /></center>
<h3 class="text">Your Test will begin after</h3>
<p id="test_time_display"></p>
</div>

<input id="date" type="hidden" value="<?php echo $row11['portal_start_date'];?>" />
<input id="time" type="hidden" value="<?php echo $row11['portal_start_time'];?>" />

<input id="enddate" type="hidden" value="<?php echo $row11['portal_end_date'];?>" />
<input id="endtime" type="hidden" value="<?php echo $row11['portal_end_time'];?>" />

<div id="testend" style="display: none;">
    <h1 class="Tname">Test Name : <?php echo $row11['Pname'];?></h1>
<center><img src="assets/img/testpad.svg" /><img src="assets/img/testgrade.svg" /></center>
<h3 class="text">This Test has been closed at</h3>
<p id="test_time_display"><?php echo date('l jS \of F Y',strtotime($row5['portal_end_date']));?>, <?php echo date('h:i:s A',strtotime($row5['portal_end_time']));?></p>
</div>

<script type="text/javascript">

function uwait() {
  var date = document.getElementById("date").value,
      time = document.getElementById("time").value
    
  var hi = new Date(date + " " + time).toISOString();
  var countDownDate = new Date(hi).getTime();
  var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  document.getElementById("test_time_display").innerHTML = days + " Days " + hours + " Hours "
  + minutes + " Minutes " + seconds + " Seconds ";
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("waittest").style.display = "none";
    document.getElementById("testbegin").style.display = "inherit";
  }
}, 1000);}

  function uover() {
  var date = document.getElementById("enddate").value,
      time = document.getElementById("endtime").value
    
  var hi = new Date(date + " " + time).toISOString();
  var countDownDate = new Date(hi).getTime();
  var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("testbegin").style.display = "none";
    document.getElementById("testend").style.display = "block";
  }
}, 1000);}
</script>

<style type="text/css">
    .Tname{
        font-size: 60px;
        margin-top: 7%;
    }
  #test_time_display,.text,.Tname,.text{
    text-align: center;
    text-transform: uppercase;
  }
  .text{
    font-size: 25px;
  }
  #test_time_display{
    font-size: 40px;
    color: #17e3e3;
  }
  div img{
    width: 200px;
    height: 300px;
  }

  @media only screen and (max-width: 600px) {
    .Tname{
    margin-top: 25%;
    font-size: 20px;
    }
    div img{
    width: 100px;
    height: 200px;
  }
  .text{
    font-size: 20px;
    padding-bottom: 40px;
  }
  #test_time_display{
    font-size: 20px;
  }
</style>

<div id="testbegin" style="display: none;">

  <div class="timerhead" align="center" style="background:rgba(27, 27, 50, 0.8);" > 
        Time Left
        <input id="minutes" type="text" style="width: 50px; 
             border: none; font-size: 27px;
            font-weight: bold; color: white;background:none; text-align: center" disabled><span style="font-size: 35px; color: #fff"> : 
                        </span>
        <input id="seconds" type="text" style="width: 50px; 
                        border: none; font-size: 27px; 
                        font-weight: bold; color: white;background:none; text-align: center" disabled> 
    </div>

<div class="container" style="margin-top: 7%">
  <form method="post"  id="myquiz" onsubmit="return validate()">
      
      <p style="color: white" class="description text-center">Test Name : <?php echo $row5['Pname'];?></p>
    <p id="description" class="description text-center" style="color:#17e3e3;">ALL THE BEST FOR YOUR TEST</p>
    <div class="form-group">
      <label id="name-label" for="name">Enter your name</label>
      <input
        type="text"
        name="Sname"
        id="name"
        class="form-control"
        placeholder="Enter your full name"
        required
      />
    </div>
  
    <div class="form-group">
      <label id="email-label" for="email">Enter your Email</label>
      <input
        type="email"
        name="Semail"
        id="email"
        class="form-control"
        placeholder="Enter your Email"
        required
      />
    </div>

    <div class="form-group">
      <label id="email-label" for="email">Enter your Unique No.(mandatory)</label>
      <input
        type="text"
        name="SuniqueNo"
        id="Unique"
        class="form-control"
        placeholder="Roll No. or Reference No. etc"
        required
      />
    </div>
    
  <button id="btn-test" class="submit-button" type="button" onclick="testhide(); countdown();">START TEST</button>
  <?php while($row = mysqli_fetch_array($row2)):;?>

    <div class="form-group" style="display: none">
      <p>Q <?php echo ++$counter; ?> : : <?php echo $row['Qname'];?> (<span>Mark : <?php echo $row['mark'];?></span>)<br><br>

        <input name="Qname[<?php echo $i; ?>]" type="hidden" value="<?php echo $row['Qname'];?>" type="text" />

        <?php if($row['Qimg'] != "") { ?><span>Reference Image : </span><br><br>
        <a href="./uploads/<?php echo $row['Qimg'];?>" data-lightbox="Qimg"><img src="./uploads/<?php echo $row['Qimg'];?>"></a><br><br>
        <?php } ?>

      <label>
          <span>Select appropriate choice : </span>
      </label>

        <label>
          <input name="submitAns[<?php echo $i; ?>]" value="<?php echo $row['option1'];?>" type="radio" class="input-radio"/><?php echo $row['option1'];?>
      </label>

        <label>
          <input name="submitAns[<?php echo $i; ?>]" value="<?php echo $row['option2'];?>" type="radio" class="input-radio"/><?php echo $row['option2'];?>
      </label>

        <label>
          <input name="submitAns[<?php echo $i; ?>]" value="<?php echo $row['option3'];?>" type="radio" class="input-radio"/><?php echo $row['option3'];?>
      </label>

        <label>
          <input name="submitAns[<?php echo $i; ?>]" value="<?php echo $row['option4'];?>" type="radio" class="input-radio"/><?php echo $row['option4'];?>
      </label>

    </div>

  <?php  $i++; endwhile;?> 
  <input type="hidden" name="count" value="<?php echo $i; ?>" />

    <div class="form-group" style="display: none;">
      <input type="submit" name="submitbutton" class="submit-button" value="submit">
    </div>
    <span style="float: right;">organiser : <?php echo $row5['username'];?></span>
  </form>
</div>
</div>

<style>
    .form-group img{
      height: 420px;
      width: 100%;
    }
     @media only screen and (max-width: 600px) {
         .form-group img{
          height: 230px;
          width: 100%;
        }
     }
</style>

<script>
    lightbox.option({
      'maxWidth': 900,
      'maxHeight': 700
    })
</script>

<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
</script>

<script>
function testhide(){
    $(".form-group").fadeIn();
    $("#btn-test").hide();
}
</script>

</body>
</html>