<?php

require('includes/header.php');

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM test where Tname='$Tname'";
    $row2 = mysqli_query($conn,$sql2);
  }

if (isset($_REQUEST["submit"])) {
if(mysqli_real_escape_string($conn,$_POST["date"])>mysqli_real_escape_string($conn,$_POST["enddate"]))
    {
       echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "End date is behind start date !!", "error");
        });</script>';
    }
    else if(mysqli_real_escape_string($conn,$_POST["date"])==mysqli_real_escape_string($conn,$_POST["enddate"]) && mysqli_real_escape_string($conn,$_POST["time"])>mysqli_real_escape_string($conn,$_POST["endtime"]))
    {
        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "End time is behind start time !!", "error");
        });</script>';
    }
    else{
    if (isset($_POST["showScore"]) && !empty($_POST["showScore"])){

    $sql = mysqli_query($conn,"update test set Pname= '".mysqli_real_escape_string($conn,$_POST["pname"])."', time='".mysqli_real_escape_string($conn,$_POST["duration"])."', portal_start_date='".mysqli_real_escape_string($conn,$_POST["date"])."', portal_start_time='".mysqli_real_escape_string($conn,$_POST["time"])."', portal_end_date='".mysqli_real_escape_string($conn,$_POST["enddate"])."', portal_end_time='".mysqli_real_escape_string($conn,$_POST["endtime"])."', showScore='".mysqli_real_escape_string($conn,$_POST["showScore"])."' where Tname='$Tname'");

        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Good job!", "Test Updated Successfully !", "success");
        });</script>';
        
        echo '<script>setTimeout(function () {    
        window.location.href = "viewalltest.php"; 
        },2000);</script>';
    }
    else{
        $sql4 = mysqli_query($conn,"update test set Pname= '".mysqli_real_escape_string($conn,$_POST["pname"])."', time='".mysqli_real_escape_string($conn,$_POST["duration"])."', portal_start_date='".mysqli_real_escape_string($conn,$_POST["date"])."', portal_start_time='".mysqli_real_escape_string($conn,$_POST["time"])."', portal_end_date='".mysqli_real_escape_string($conn,$_POST["enddate"])."', portal_end_time='".mysqli_real_escape_string($conn,$_POST["endtime"])."' where Tname='$Tname'");

        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Good job!", "Test Updated Successfully !", "success");
        });</script>';
        
        echo '<script>setTimeout(function () {    
        window.location.href = "viewalltest.php"; 
        },2000);</script>';
    }
}
    } 

?>

<!DOCTYPE html>
<html>
<head>
<title>Update your Test <?php echo $_SESSION["username"]; ?> | radoncosmos.in</title>
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
                            <h3>UPDATE YOUR TEST</h3>
                            <form class="contact__form" method="post" enctype="multipart/form-data">
                               
                                <div class="row">
                                <?php while($row3 = mysqli_fetch_array($row2)):;?>
                                    <div class="col-md-6 form-group">
                                        <p>Enter Updated Test Name</p>
                                        <input class="form-control" value="<?php echo $row3['Pname'];?>" type="text" name="pname" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Enter Updated Test Duration (in min)</p>
                                        <input class="form-control" type="text" value="<?php echo $row3['time'];?>" name="duration" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Enter Updated Test Start Date</p>
                                        <input class="form-control" value="<?php echo $row3['portal_start_date'];?>" type="date" name="date" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Enter Updated Test Start Time</p>
                                        <input class="form-control" value="<?php echo $row3['portal_start_time'];?>" type="time" name="time" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Enter Updated Test End Date</p>
                                        <input class="form-control" value="<?php echo $row3['portal_end_date'];?>" type="date" name="enddate" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Enter Updated Test End Time</p>
                                        <input class="form-control" value="<?php echo $row3['portal_end_time'];?>" type="time" name="endtime" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Want to show marks at the test end?</p>
                                        <select name="showScore" class="form-control">
                                        <option value="" disabled selected><?php echo $row3['showScore'];?></option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                        </select>
                                    </div>

                                    <?php endwhile;?> 
                                    <div class="col-md-6 form-group"></div>
                                    
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
p{
    font-weight: 700;
}.container{
    margin-top: 2%;
}
    @media only screen and (max-width: 600px) {
    .container{
        margin-top: 7%;
    }
     .form-group p{
        font-size: 15px !important;
    }
}
</style>

<script>
    function pageRedirect(){
    var delay = 0; 
    setTimeout(function(){
    window.location = "./viewalltest.php";
  },delay);
  
  }
  </script>
</body>
</html>