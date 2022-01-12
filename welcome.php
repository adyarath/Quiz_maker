<?php require('includes/header-welcome.php'); ?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Welcome <?php echo $_SESSION["username"]; ?> | radoncosmos.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include_once "includes/metahead.php"; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/welcomestyle.css">
</head>
<body>

    <div class="box">

      <div class="card">
        <div class="imgBx">
        <p class="card__title">INSTRUCTION</p>
        <p class="card__subject"> Read Instruction before creating test</p>
        <p class="span">Click on the card!</p>
        </div>
        <div class="details">
        <a href="instruction.php" target="_blank"><button id="addtest1" >Read Instruction</button></a>
        </div>
    </div>

      <div class="card">
        <div class="imgBx">
        <p class="card__title">ADD TEST</p>
        <p class="card__subject"> Create your own quiz!</p>
        <p class="span">Click on the card!</p>
        </div>
        <div class="details">
        <div class="card__details">
        <a href="addtest.php" ><button id="addtest1">Add Test</button></a>
        </div>
        </div>
    </div>
    
    <div class="card">
        <div class="imgBx">
        <p class="card__title">VIEW TEST</p>
        <p class="card__subject"> View all the test with results submitted</p>
        <p class="span">Click on the card!</p>
        </div>
        <div class="details">
        <a href="viewalltest.php" ><button id="addtest1">View All Tests</button></a>
        </div>
    </div>
</div>

</body>
</html>