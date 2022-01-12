<?php 
require('includes/header.php');

$sql1 = "SELECT *FROM test";
$name = mysqli_query($conn, $sql1);

$user = $_SESSION["userEmail"];
$sql1 = "SELECT *FROM users where userEmail = '$user'";
$row = mysqli_query($conn,$sql1);
$records = mysqli_fetch_array($row);
$id = $records['id'];

if (isset($_REQUEST["submit"])) {
    if(mysqli_real_escape_string($conn,$_POST["task_date"])>mysqli_real_escape_string($conn,$_POST["taskend_date"]))
    {
       echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "End date is behind start date !!", "error");
        });</script>';
    }
    else if(mysqli_real_escape_string($conn,$_POST["task_date"])==mysqli_real_escape_string($conn,$_POST["taskend_date"]) && mysqli_real_escape_string($conn,$_POST["task_time"])>mysqli_real_escape_string($conn,$_POST["taskend_time"]))
    {
        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "End time is behind start time !!", "error");
        });</script>';
    }
    else{
    $Pname = mysqli_real_escape_string($conn,$_POST['Tname']);
	$Tname = rand(1000,10000000).md5($Pname);

    $sql = "INSERT INTO test (Pname,Tname,id, time,portal_start_date,portal_start_time,portal_end_date,portal_end_time,showScore)
    VALUES ('$Pname','$Tname','$id','".mysqli_real_escape_string($conn,$_POST["time"])."','".mysqli_real_escape_string($conn,$_POST["task_date"])."','".mysqli_real_escape_string($conn,$_POST["task_time"])."','".mysqli_real_escape_string($conn,$_POST["taskend_date"])."','".mysqli_real_escape_string($conn,$_POST["taskend_time"])."','".mysqli_real_escape_string($conn,$_POST["showScore"])."')";

    if(mysqli_query($conn,$sql)){
    
    echo '<script type="text/javascript">$(document).ready(function(){
        swal("Good job!", "Test Created Successfully !", "success");
        });</script>';
        
        echo '<script>setTimeout(function () {    
        window.location.href = "viewalltest.php"; 
        },2000);</script>';
    }
    else{
        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "Something Went Wrong !!", "error");
        });</script>';
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Test <?php echo $_SESSION["username"]; ?> | radoncosmos.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once "includes/metahead.php"; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>
<div id="mcq">
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                   
                    <div class="card">
                       
                        <div class="card-body">
                            <h3 style="">ADD NEW TEST</h3>
                        
                            <form class="contact__form" method="post" enctype="multipart/form-data">
                               
                                <div class="row">
                
                                    <div class="col-md-6 form-group">
                                    <p>Enter Test Name</p>
                                        <input type="text" name="Tname" placeholder="Enter test name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <p>Enter Test Duration (in min)</p>
                                        <input type="text" name="time" placeholder="Enter test duration" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <p>Enter Test Start Date</p>
                                        <input type="date" name="task_date" id="sdate" placeholder="Enter Test Start Date" class="form-control"  required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <p>Enter Test Start Time</p>
                                        <input type="time" name="task_time" placeholder="Enter Test Start Time" class="form-control"  required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <p>Enter Test End Date</p>
                                        <input type="date" name="taskend_date" id="edate" placeholder="Enter Test End Date" class="form-control"  required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <p>Enter Test End Time</p>
                                        <input type="time" name="taskend_time" placeholder="Enter Test End Time" class="form-control"  required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <p>Want to show marks at the test end?</p>
                                        <select name="showScore" class="form-control" required>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group"></div>
                                    
                                    <div class="col-12" id="btn" align="center">
                                    <a onclick='pageRedirect();'><button class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;&nbsp;
                                    <input type="submit" name="submit" class="btn btn-success" value="Create" >
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
    margin-top: 4%;
}
    @media only screen and (max-width: 600px) {
    .container{
        margin-top: 5%;
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