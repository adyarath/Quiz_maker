<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
 $reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
 $uname = trim($_POST['txtuname']);
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);
 $code = md5(uniqid(rand()));
 
 $stmt = $reg_user->runQuery("SELECT * FROM users WHERE userEmail=:email_id");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() > 0)
 {
  $msg = "
        <div class='alert alert-danger'>
     <strong>Sorry !</strong>  Email already exists, Please Try another one
     </div>
     ";
 }
 else
 {
  if($reg_user->register($uname,$email,$upass,$code))
  {   
   $id = $reg_user->lasdID();  
   $key = base64_encode($id);
   $id = $key;
   
   $message = "     
      Hello $uname,
      <br /><br />
      Welcome to radoncosmos.in!<br/>
      Are you happy?<br/>
      We're sure you are. We are happy too.<br />
      This is a big step for both of us, and we're ready to commit. Become radoncosmos user by activating your email:<br /><br />
      <a href='https://radoncosmos.in/auth/verify.php?id=$id&code=$code'>ACTIVATE YOUR ACCOUNT</a>
      <br /><br />
      If the link doesn't work, copy and paste the URL in your browser: <br />
      <a href='https://radoncosmos.in/auth/verify.php?id=$id&code=$code'>https://radoncosmos.in/auth/verify.php?id=$id&code=$code</a>
      <br /><br />
      Thanks,<br />Team Radoncosmos";
      
   $subject = "Confirm Registration";
      
   $reg_user->send_mail($email,$message,$subject); 
   $msg = "
     <div class='alert alert-success'>
      <strong>Success!</strong>  We've sent an email to $email.
                    Please check your inbox or <strong>spam</strong> folder to confirm creating your account. 
       </div>
     ";
  }
  else
  {
   echo "sorry , Query could no execute...";
  }  
 }
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
        <h2 style="text-align: center;">Sign Up</h2><br>
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post" id="signup">
          
        <div class="form-group">
            <label>Enter Your Name</label>
            <input type="text" placeholder="Full Name" name="txtuname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Enter Your Email ID</label>
            <input type="email" placeholder="Email Address" name="txtemail" class="form-control" required>
        </div>    
        <div class="form-group">
            <label>Enter Your Password</label>
            <input type="password" placeholder="Password" name="txtpass" class="form-control" required>
        </div>
        
        <div class="form-group" align="center">
            <input type="submit" class="btn btn-success" name="btn-signup" value="Sign Up">
        </div>
        <p>Already have an account? <a href="index.php" style="color: #17e3e3">Login here</a>.</p>
        
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

@media only screen and (max-width: 600px) {
    .wrapper{
        box-shadow:3px 3px 20px grey;
        border-radius:20px;
        width:95%;
    }
    .btn{
        padding: 5px;
    }
}

</style> 
</body>
</html>