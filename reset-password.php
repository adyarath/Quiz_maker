<?php

require('./includes/header.php');

if (isset($_REQUEST["submit"])) {
  
    if ($_POST["pass"] == $_POST["confirm-pass"]){
        
        $sql = mysqli_query($conn,"update users set userPass = '".mysqli_real_escape_string($conn,md5($_POST["confirm-pass"]))."' where userEmail ='".$_SESSION["userEmail"]."'");
    
        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Good job!", "Password Updated Successfully !", "success");
        });</script>';
        
        echo '<script>setTimeout(function () {    
        window.location.href = "viewalltest.php"; 
        },2000);</script>';
    }
    else{
        echo '<script type="text/javascript">$(document).ready(function(){
        swal("Hey You!", "Two Password did not matched !", "error");
        });</script>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Update your Test | radoncosmos.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once "./includes/metahead.php"; ?>
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
                            <h3>UPDATE YOUR PASSWORD</h3>
                            <form class="contact__form" method="post" enctype="multipart/form-data">
                                <div class="row">
                               
                                <div class="col-12 form-group">
                                        <p>Enter new Password</p>
                                        <input class="form-control" placeholder="New Password" type="password" id="password" name="pass" required="">
                                    </div>
                                    <div class="col-12 form-group">
                                        <p>Confirm new Password</p>
                                        <input class="form-control"  type="password" placeholder="Confirm Password" id="confirm_password" name="confirm-pass" required="">
                                    </div>
                                    <div class="col-12" id="btn" align="center">
                                        <span id='message'></span>
                                    </div>
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
}
#btn{
    padding-top: 20px;
}
.container{
    margin-top: 5%;
}
h4{text-align: center;}
@media only screen and (max-width: 600px) {
    .custom-file{
    width: 91%;
    padding-bottom: 80px;
}
p{
    font-weight: 700;
}
.container{
    margin-top: 20%;
}
}
</style>
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Two Password Matched').css('color', 'green');
  } else 
    $('#message').html('Two Password did not Matched').css('color', 'red');
});
</script>

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