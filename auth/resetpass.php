<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM users WHERE id=:uid AND tokenCode=:token");
 $stmt->execute(array(":uid"=>$id,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['pass'];
   $cpass = $_POST['confirm-pass'];
   
   if($cpass!==$pass)
   {
    $msg = "<div class='alert alert-danger'>
      <strong>Sorry!</strong>  Password Doesn't match. 
      </div>";
   }
   else
   {
    $stmt = $user->runQuery("UPDATE users SET userPass=:upass WHERE id=:uid");
    $stmt->execute(array(":upass"=>md5($cpass),":uid"=>$rows['id']));
    
    $msg = "<div class='alert alert-success'>
      Password Changed Successfully. Redirecting in 2 Sec.
      </div>";
    header("refresh:2;index.php");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password | radoncosmos.in</title>
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
        <h2 style="text-align: center;">Reset Password</h2><br>
     <div class='alert alert-success'>
   <strong>Hello !</strong>  <?php echo $rows['username'] ?> you are here to reset your forgetton password.
  </div>
        <form class="form-signin" method="post">
        <?php
        if(isset($msg))
  {
   echo $msg;
  }
  ?>
        
        <div class="form-group">
            <label>Enter Your New Password</label>
            <input type="password" class="form-control" placeholder="New Password" name="pass" required>
        </div>
        <div class="form-group">
            <label>Confirm Your New Password</label>
            <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm-pass" required>
        </div>
        <div class="form-group" align="center">
            <input type="submit" class="btn btn-success" name="btn-reset-pass" value="Reset Your Password">
        </div>
        
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