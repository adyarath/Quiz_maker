<?php
 
require('includes/header.php');

	$user = $_SESSION["userEmail"];
    $sql1 = "SELECT *FROM users where userEmail = '$user'";
    $row1 = mysqli_query($conn,$sql1);
    $records = mysqli_fetch_array($row1);
    $id = $records['id'];
    
    if(isset($_REQUEST['id'])){
    $Qid=$_GET['id'];
    $sql5 = "SELECT *FROM question where Qid='$Qid'";
    $row5 = mysqli_query($conn,$sql5);
  }
    
    if(isset($_REQUEST['del'])){
    $Q=$_GET['del'];
    $sql = "delete from question WHERE Qid='$Q'";
    $row = mysqli_query($conn,$sql);
    echo "<script>window.location.href='viewalltest.php'</script>";
    }

    if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM question where organiser = '$id' and Tname='$Tname' ORDER BY RAND()";
    $row2 = mysqli_query($conn,$sql2);
    $count=mysqli_num_rows($row2);
  }
  
  $counter = 0;
?>

<!DOCTYPE html>
<html lang="en" >
<head>
<title>View Your Question <?php echo $_SESSION["username"]; ?> | radoncosmos.in</title>
<?php include_once "includes/metahead.php"; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/sharestyle.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</head>
<body>

<div class="container">
    <center>
    <a href="viewalltest.php"><button class="btn-back">Go Back</button></a>
    <a href="newquestion.php?Tname=<?php echo $_GET['Tname'];?>"><button class="btn-back">Add Question</button></a>
    <a href="link.php?Tname=<?php echo $_GET['Tname'];?>"><button class="btn-back">Share Test</button></a>
    </center>
  <form id="survey-form">

  <?php if($count>=1){ ?>
    <p id="description" class="description text-center" style="color:#17e3e3;">Your Test will look like this</p>
    <p id="description" class="description text-center" style="color:#17e3e3;">(On each refresh, the question pattern will change)</p>
    
	<?php while($row = mysqli_fetch_array($row2)):;?>

    <div class="form-group">
      <p>Q <?php echo ++$counter; ?> : : <?php echo $row['Qname'];?><br>
        <a href="updatequestion.php?id=<?php echo $row['Qid'];?>&&Tname=<?php echo $row['Tname'];?>" style="color:red;">Update this question</a><br>
        <a href="delete.php?del=<?php echo $row['Qid'];?>&&Tname=<?php echo $row['Tname'];?>" onClick="return confirm('Do you really want to delete');" style="color:red;">Delete this question</a></p><br>

        <?php if($row['Qimg'] != "") { ?><span>Reference Image : </span><br><br>
        <a href="./uploads/<?php echo $row['Qimg'];?>" data-lightbox="Qimg"> <img src="./uploads/<?php echo $row['Qimg'];?>"></a><br><br>
        <?php } ?>

      <span style="color:#17e3e3;">Select appropriate choice : </span><br><br>
      	<label>
        	<input name="correctAns" value="<?php echo $row['option1'];?>" type="radio" class="input-radio"/><?php echo $row['option1'];?>
    	</label>

      	<label>
        	<input name="correctAns" value="<?php echo $row['option2'];?>" type="radio" class="input-radio"/><?php echo $row['option2'];?>
    	</label>

      	<label>
      		<input name="correctAns" value="<?php echo $row['option3'];?>" type="radio" class="input-radio"/><?php echo $row['option3'];?>
    	</label>

      	<label>
      		<input name="correctAns" value="<?php echo $row['option4'];?>" type="radio" class="input-radio"/><?php echo $row['option4'];?>
    	</label>

      <label>
          <span>Mark : <?php echo $row['mark'];?></span>
      </label>
    </div>
    
 	<?php endwhile;?> 
  <?php } else { ?>
        <p id="description" class="description text-center" style="color:#17e3e3;">Your Test do not contain any Question. 1st add question then navigate here to view them.</p>
        <?php } ?>

    </div>
  </form>
</div>

<style>
.btn-back{margin: 0 0 5% 0; cursor: pointer; background: rgba(27, 27, 50, 0.8); color: white; padding: 10px; border-radius: 5%}
.container{margin-top: 2% !important}
    @media only screen and (max-width: 600px) {
        .container{margin-top: 1% !important}
        .btn-back{margin: 1% 0 5% 0;}
}
</style>
    <script>
    lightbox.option({
      'maxWidth': 900,
      'maxHeight': 700
    })
</script>
</body>
</html>