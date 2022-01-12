<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
 $user_login->redirect('../welcome.php');
}

if(isset($_POST['btn-login']))
{
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtupass']);
 
 if($user_login->login($email,$upass))
 {
  $user_login->redirect('../welcome.php');
 }
}
?>

<!--google login begin-->
<?php

include('config.php');

$login_button = '';

if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 if(!isset($token['error']))
 {
  $google_client->setAccessToken($token['access_token']);

  $_SESSION['access_token'] = $token['access_token'];

  $google_service = new Google_Service_Oauth2($google_client);

  $data = $google_service->userinfo->get();

  if(!empty($data['given_name']))
  {
   $_SESSION['username'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['userEmail'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }

$qry = mysqli_query($conn,"insert into users(username,userEmail,userStatus) values('".$_SESSION['username']."','".$_SESSION['userEmail']."','Y')");

header('location: ../welcome.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login | radoncosmos.in</title>
<?php include_once "../includes/metahead.php"; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<body>

<div class="wrapper">
    <h2 style="text-align: center;">Sign In</h2><br>
  <?php 
  if(isset($_GET['inactive']))
  {
   ?>
            <div class='alert alert-danger'>
    <strong>Sorry!</strong> This Account is not Activated. Check your Mail and Activate it. 
   </div>
            <?php
  }
  ?>
        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
  {
   ?>
            <div class='alert alert-danger'>
    <strong>Wrong Email or Password!</strong> 
   </div>
            <?php
  }
  ?>
        
        <div class="form-group">
            <label>Enter Your Email ID</label>
            <input type="email" placeholder="Email address" name="txtemail" class="form-control" required>
        </div>    
        <div class="form-group">
            <label>Enter Your Password</label>
            <input type="password" placeholder="Password" name="txtupass" class="form-control" required>
        </div>
        <div class="form-group" align="center">
            <input type="submit" class="btn btn-success" id="login" name="btn-login" value="Sign in">
        </div>
        
        <div class="separator">OR</div>
        
        <div class="form-group" align="center">
           <?php
           if(!isset($_SESSION['access_token']))
              {
               $login_button = '<a href="'.$google_client->createAuthUrl().'"><img class="btn-google" src="https://radoncosmos.in/assets/img/signin_google.png" /></a>';
              }

              if($login_button == '')
              {
               echo '<p style="color: red; font-size: 20px; font-weight: 700">Redirecting...</p>'; 
               echo "<script>window.location.href='../welcome.php'</script>"; 
              }
              else
              {
               echo '<div align="center">'.$login_button . '</div>';
              }
           ?>
        </div>
        <div class="signup"><p>Don't have an account? <a href="signup.php" style="color: #17e3e3">Sign up now</a>.</p></div>
        <div class="forget"><p>Forgot Password?<a href="fpass.php" style="color: #17e3e3"> Click Here</a>.</p></div>
        
        
      </form>
<style>
body{ 
    background-image: linear-gradient(to right bottom, rgba(30, 11, 54, 0.65),  rgba(30, 11, 54, 0.65)), url(https://cdn.spacetelescope.org/archives/images/screen/heic0406a.jpg);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: 'Poppins', sans-serif;"
}
.wrapper{
      background-image: linear-gradient(to right bottom, rgba(202, 55, 130, 0.7)), url(https://cdn.spacetelescope.org/archives/images/screen/heic0406a.jpg);
    box-shadow:3px 3px 20px #e3e6e6;
    border-radius:20px;
    width: 40%;
    }
.form-control {
    border: 1px solid #d5dae2;
    margin-bottom: 20px;
    min-height: 45px;
    font-size: 13px;
    line-height: 15;
    font-weight: normal; }

    h2,label,p{color: white}
    
.separator {
    display: flex;
    align-items: center;
    text-align: center;
    color: #fff;
    padding-bottom: 10px;
}
    .separator::before, .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #fff;
    }
    .separator::before {
        margin-right: .25em;
    }
    .separator::after {
        margin-left: .25em;
    }
    
    .btn-google{
      width: 200px;
    }
    #login{
        width: 200px;
    }
    .signup{float: left;}
    .forget{float: right}
    .redirect{color: red; font-size: 20px; font-weight: 700}
    #show-password{text-align: right}

@media only screen and (max-width: 600px) {
    .wrapper{
        box-shadow:3px 3px 20px grey;
        border-radius:20px;
        width:95%;
    }
    .btn{
        padding: 5px;
    }
    .signup,.forget{float: left}
}

</style> 
</body>
</html>