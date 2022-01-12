<?php
error_reporting(0);

require('includes/header.php');

$Qname = "";
$Qimg = "";
$mark = "";
$option1 = "";
$option2 = "";
$option3 = "";
$option4 = "";
$correctAns = "";

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM question where Tname='$Tname'";
    $row2 = mysqli_query($conn,$sql2);
  }

    $sql10 = "SELECT *FROM question where Tname='$Tname'";
    $row10 = mysqli_query($conn,$sql10);
    $row11 = mysqli_fetch_array($row10);
    $qcount=mysqli_num_rows($row10);

    $user = $_SESSION["userEmail"];
    $sql1 = "SELECT *FROM users where userEmail = '$user'";
    $row1 = mysqli_query($conn,$sql1);
    $records = mysqli_fetch_array($row1);
    $id = $records['id'];

if (isset($_REQUEST["submit"])) {

    $Qname = mysqli_real_escape_string($conn, $_POST['Qname']);
    $Qimg = mysqli_real_escape_string($conn, $_POST['Qimg']);
    $mark = mysqli_real_escape_string($conn, $_POST['mark']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
    $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
    $correctAns = mysqli_real_escape_string($conn, $_POST['correctAns']);

    $Qimg=$_FILES["Qimg"]["name"];
    $extension = substr($Qimg,strlen($Qimg)-4,strlen($Qimg));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    if($_POST['correctAns'] == $_POST['option1'] || $_POST['correctAns'] == $_POST['option2'] || $_POST['correctAns'] == $_POST['option3'] || $_POST['correctAns'] == $_POST['option4']) {

    if (isset($Qimg) && !empty($Qimg)){
        
        if(!in_array($extension,$allowed_extensions)){
            echo '<script type="text/javascript">$(document).ready(function(){
            swal("Hey You!", "Invalid File Format Choosen ! Allowed Extension : jpg,jpeg,png,gif", "error");
            });</script>';
        }
        else if($_FILES['Qimg']['size'] > 3000 * 1024){
         echo '<script type="text/javascript">$(document).ready(function(){
            swal("Hey You!", "File size should not exceed 3MB !", "error");
            });</script>';
        }
        else{
            $QimgNew=rand(1000,10000).$Qimg;
            move_uploaded_file($_FILES["Qimg"]["tmp_name"],"uploads/".$QimgNew);

            $sql99 = mysqli_query($conn,"INSERT INTO question (Tname,Qname,Qimg,mark, option1, option2,option3,option4,correctAns, organiser) VALUES ('$Tname','".mysqli_real_escape_string($conn,$_POST["Qname"])."','$QimgNew','".mysqli_real_escape_string($conn,$_POST["mark"])."','".mysqli_real_escape_string($conn,$_POST["option1"])."','".mysqli_real_escape_string($conn,$_POST["option2"])."','".mysqli_real_escape_string($conn,$_POST["option3"])."','".mysqli_real_escape_string($conn,$_POST["option4"])."','".mysqli_real_escape_string($conn,$_POST["correctAns"])."','$id')");
    
            echo '<script type="text/javascript">$(document).ready(function(){
            swal("Good job!", "Question Added Successfully !", "success");
            });</script>';
    
            echo "<script>setTimeout(function () {    
            window.location.href = 'newquestion.php?Tname=$Tname'; 
            },2000);</script>";
        }
        
    }
    else{
        $sql100 = mysqli_query($conn,"INSERT INTO question (Tname,Qname,mark, option1, option2,option3,option4,correctAns, organiser) VALUES ('$Tname','".mysqli_real_escape_string($conn,$_POST["Qname"])."','".mysqli_real_escape_string($conn,$_POST["mark"])."','".mysqli_real_escape_string($conn,$_POST["option1"])."','".mysqli_real_escape_string($conn,$_POST["option2"])."','".mysqli_real_escape_string($conn,$_POST["option3"])."','".mysqli_real_escape_string($conn,$_POST["option4"])."','".mysqli_real_escape_string($conn,$_POST["correctAns"])."','$id')");

        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Good job!", "Question Added Successfully !", "success");
        });</script>';

        echo "<script>setTimeout(function () {    
        window.location.href = 'newquestion.php?Tname=$Tname'; 
        },2000);</script>";
    }
    }else{
    echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "None of the options matched with the correct answer.\nClick OK to rectify error.", "error");
        });</script>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Question <?php echo $_SESSION["username"]; ?> | radoncosmos.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once "includes/metahead.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"  />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
</head>
<body>

<!--mcq-->
<div id="mcq">
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">
                                   <h3>ADD NEW QUESTION</h3>

                            <form class="contact__form" method="post" enctype="multipart/form-data">
                               
                                <div class="row">
                                    <?php if($qcount>=1){ ?>
                                    <div class="col-12" align="center">
                                        <a href="viewquestion.php?Tname=<?php echo $row11['Tname'];?>">
                                            <p id="count">No. Of Questions : <span class="count"><?php echo $qcount;?></span>&nbsp;(view)</p>
                                        </a>
                                        <p id="orderid" style="color: purple; font-size: 15px;"></p>
                                    </div>
                                    <?php } ?>

                                    <div class="col-12 form-group">
                                        <p>Question</p>
                                        <textarea class="form-control" name="Qname" required=""><?php echo $Qname; ?></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <p>Choose image (if necessary)</p>
                                        <label class="custom-file-label" id="fileLabel" for="inputGroupFile01">Choose file</label>
                                        <input type="file" id="inputGroupFile01" class="form-control" name="Qimg" aria-describedby="inputGroupFileAddon01" onchange="pressed()">
                                    </div><br><br><br><br>

                                    <div class="col-md-6 form-group">
                                        <p>How much mark?</p>
                                        <input name="mark" type="number" class="form-control" value="<?php echo $mark; ?>" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <p>Option A</p>
                                        <input name="option1" id="option1" type="text" class="form-control" value="<?php echo $option1; ?>" onkeyup='check();' required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <p>Option B</p>
                                        <input name="option2" id="option2" type="text" class="form-control" value="<?php echo $option2; ?>" onkeyup='check();' required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                    <p>Option C</p>
                                        <input name="option3" id="option3" type="text" class="form-control" value="<?php echo $option3; ?>" onkeyup='check();' required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <p>Option D</p>
                                        <input type="text" name="option4" id="option4" class="form-control" value="<?php echo $option4; ?>" onkeyup='check();' required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <p>Enter the Correct Answer</p>
                                        <input type="text" name="correctAns" id="correctAns" class="form-control" value="<?php echo $correctAns; ?>" onkeyup='check();' required>
                                    </div>
                                    
                                    <div class="col-12" id="btn" align="center">
                                        <div align="center" id='message'></div>
                                    </div>

                                    <div class="col-12" id="btn" align="center">
                                        <a onclick='pageRedirect();'><button class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;&nbsp;
                                        <input name="submit"  type="submit" class="btn btn-success" value="Save">
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<style>
.card-body h3{
    margin-bottom:30px; 
    text-align: center;
    font-weight: 600;
}
#mcq{
   margin-top:30px;
}
#tnf{
    display:none;
}
.custom-file{
    width: 96%;
    padding-bottom: 80px;
}
p{
    font-weight: 700;
}
#btn{
    padding-top: 20px;
}
#inputGroupFile01{
    display: none;
}
#fileLabel{
    position: relative;
    width: 100%;
}.container{
    margin-top: 2%;
}
#count{
    text-align: center;
    font-weight: 600;
    background: black;
    color: white;
    font-size: 25px;
    text-transform: uppercase;
}
.count{
    color: orange;
}
#message{
    font-weight: 600;
    font-size: 18px;
}
@media only screen and (max-width: 600px) {
    .custom-file{
    width: 91%;
    padding-bottom: 80px;
}
p{
    font-weight: 700;
}
.container{
    margin-top: 3%;
}
#count{
    font-size: 21px;
}
#message{
    font-weight: 600;
    text-align: center;
    font-size: 15px;
}
}
</style>
<script>
function mcq(){
    document.getElementById("mcq").style.display="block";
    document.getElementById("tnf").style.display="none";
}
function tnf(){
    document.getElementById("tnf").style.display="block";
    document.getElementById("mcq").style.display="none";
}
</script>
<script type="text/javascript">
    window.pressed = function(){
    var a = document.getElementById('inputGroupFile01');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose file";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};
</script>
<script type="text/javascript">
    var check = function() {
   if (document.getElementById('option1').value == document.getElementById('correctAns').value || document.getElementById('option2').value == document.getElementById('correctAns').value || document.getElementById('option3').value == document.getElementById('correctAns').value || document.getElementById('option4').value == document.getElementById('correctAns').value) 
    {
     document.getElementById('message').style.color = '';
     document.getElementById('message').innerHTML = '';
    } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Correct answer did not matched with any of the above option';
  }
}
</script>

 <script>
    function pageRedirect(){
    var delay = 0; 
    setTimeout(function(){
    window.location = "./viewalltest.php";
  },delay);
  
  }
  </script
</body>
</html>