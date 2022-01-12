<?php

require('includes/header.php');

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM question where Tname='$Tname'";
    $row2 = mysqli_query($conn,$sql2);
  }

    $user = $_SESSION["userEmail"];
    $sql1 = "SELECT *FROM users where userEmail = '$user'";
    $row = mysqli_query($conn,$sql1);
    $records = mysqli_fetch_array($row);
    $id = $records['id'];

    if(isset($_REQUEST['id'])){
    $Qid=$_GET['id'];
    $sql5 = "SELECT *FROM question where Qid='$Qid'";
    $row5 = mysqli_query($conn,$sql5);
  }

if (isset($_REQUEST["submit"])) {

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

            $sql99 = mysqli_query($conn,"update question set  Qname = '".mysqli_real_escape_string($conn,$_POST["Qname"])."', Qimg = '$QimgNew',mark='".mysqli_real_escape_string($conn,$_POST["mark"])."', option1 = '".mysqli_real_escape_string($conn,$_POST["option1"])."', option2 = '".mysqli_real_escape_string($conn,$_POST["option2"])."', option3 = '".mysqli_real_escape_string($conn,$_POST["option3"])."', option4 = '".mysqli_real_escape_string($conn,$_POST["option4"])."', correctAns = '".mysqli_real_escape_string($conn,$_POST["correctAns"])."' where Qid='$Qid'");
    
            echo '<script type="text/javascript">$(document).ready(function(){
            swal("Good job!", "Records Updated Successfully !", "success");
            });</script>';
    
            echo "<script>setTimeout(function () {    
            window.location.href = 'viewquestion.php?Tname=$Tname'; 
            },2000);</script>";
        }
        
    }
    else{
        $sql100 = mysqli_query($conn,"update question set  Qname = '".mysqli_real_escape_string($conn,$_POST["Qname"])."',mark='".mysqli_real_escape_string($conn,$_POST["mark"])."', option1 = '".mysqli_real_escape_string($conn,$_POST["option1"])."', option2 = '".mysqli_real_escape_string($conn,$_POST["option2"])."', option3 = '".mysqli_real_escape_string($conn,$_POST["option3"])."', option4 = '".mysqli_real_escape_string($conn,$_POST["option4"])."', correctAns = '".mysqli_real_escape_string($conn,$_POST["correctAns"])."' where Qid='$Qid'");

        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Good job!", "Records Updated Successfully !", "success");
        });</script>';

        echo "<script>setTimeout(function () {    
        window.location.href = 'viewquestion.php?Tname=$Tname'; 
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
<title>Update your Question | radoncosmos.in</title>
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
                            <h3>UPDATE QUESTION</h3>
                            <form class="contact__form" method="post" enctype="multipart/form-data">
                               
                                <div class="row">

                                    <?php while($row6 = mysqli_fetch_array($row5)):;?>

                                    <div class="col-12 form-group">
                                        <p>Question</p>
                                        <input class="form-control" value="<?php echo $row6['Qname'];?>" name="Qname" required="">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <p>Update image if neccessary</p>
                                        <label class="custom-file-label" id="fileLabel" for="inputGroupFile01"><?php echo $row6['Qimg'];?></label>
                                        <input type="file" id="inputGroupFile01" class="form-control" name="Qimg" aria-describedby="inputGroupFileAddon01" onchange="pressed()">
                                    </div><br><br><br><br>

                                    <div class="col-md-6 form-group">
                                        <p>How much mark?</p>
                                        <input name="mark" type="number" value="<?php echo $row6['mark'];?>" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <p>Option A</p>
                                        <input name="option1" type="text" value="<?php echo $row6['option1'];?>" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <p>Option B</p>
                                        <input name="option2" type="text" value="<?php echo $row6['option2'];?>" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                    <p>Option C</p>
                                        <input name="option3" type="text" value="<?php echo $row6['option3'];?>" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <p>Option D</p>
                                        <input type="text" name="option4" value="<?php echo $row6['option4'];?>" class="form-control" required>
                                    </div>

                                    <div class="col-12 form-group">
                                        <p>Enter the correct Answer</p>
                                        <input type="text" name="correctAns" value="<?php echo $row6['correctAns'];?>" class="form-control" required>
                                    </div>

                               <?php endwhile;?> 

                                    <div class="col-12" id="btn" align="center">
                                        <a onclick='pageRedirect();'><button class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;&nbsp;
                                        <input name="submit"  type="submit" class="btn btn-success" value="Update">
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
    margin-top: 1%;
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
    margin-top: 5%;
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

<script>
    function pageRedirect(){
    var delay = 0; 
    setTimeout(function(){
    window.location = "./viewquestion.php?Tname=<?php echo $_GET['Tname'];?>";
  },delay);
  
  }
  </script>
</body>
</html>