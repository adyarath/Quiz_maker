<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
 $email = $_POST['txtemail'];
 
 $stmt = $user->runQuery("SELECT id FROM users WHERE userEmail=:email LIMIT 1");
 $stmt->execute(array(":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = base64_encode($row['id']);
  $code = md5(uniqid(rand()));
  
  $stmt = $user->runQuery("UPDATE users SET tokenCode=:token WHERE userEmail=:email");
  $stmt->execute(array(":token"=>$code,"email"=>$email));
  
  $message= "
       Hello , $email
       <br /><br />
       We got a request to reset your password, if you do this then just click the below link to reset your password, if not just ignore this email.
       <br /><br />
       
       <a href='https://radoncosmos.in/auth/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
       <br /><br />
       Thank you :)<br />Team Radoncosmos
       ";
  $subject = "Password Reset";
  
  $user->send_mail($email,$message,$subject);
  
  $msg = "<div class='alert alert-success'>
     We've sent an email to $email.
                    Please check your inbox or <strong>spam</strong> folder of your email to continue resetting your password. 
      </div>";
 }
 else
 {
  $msg = "<div class='alert alert-danger'>
     <strong>Sorry!</strong>  This email not found in our database! 
       </div>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password auth | radoncosmos.in</title>
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
        <h2 style="text-align: center;">Email Authentication</h2><br>

      <form class="form-signin" method="post">
        
         <?php
   if(isset($msg))
   {
    echo $msg;
   }
   else
   {
    ?>
               <div class='alert alert-info'>
    Please enter your registered email address. You will receive a link to create a new password via email.!
    </div>  
                <?php
   }
   ?>
        
            <div class="form-group">
                <label>Enter Your Email ID</label>
                <input type="email" class="form-control" placeholder="Email address" name="txtemail" required>
            </div>
            <div class="form-group" align="center">
                <input type="submit" class="btn btn-success" name="btn-submit" value="Generate new Password">
            </div>
            <p>Don't have an account? <a href="./signup.php" style="color: #17e3e3">Sign up now</a>.</p>
            <p>Remembered Password?<a href="./index.php" style="color: #17e3e3"> Click Here</a>.</p>
      </form>
</div>   

    <style>
body{ 
    background-image: linear-gradient(to right bottom, rgba(30, 11, 54, 0.65), rgba(202, 55, 130, 0.7)), url(https://cdn.spacetelescope.org/archives/images/screen/heic0406a.jpg);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: 'Poppins', sans-serif;"
}
.wrapper{
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