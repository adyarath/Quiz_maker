<?php
 
require('includes/header.php');

    $user = $_SESSION["userEmail"];
    $sql1 = "SELECT *FROM users where userEmail = '$user'";
    $row1 = mysqli_query($conn,$sql1);
    $records = mysqli_fetch_array($row1);
    $id = $records['id'];

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM answer where Tname='$Tname' GROUP BY SuniqueNo ORDER BY Sdate";
    $row2 = mysqli_query($conn,$sql2);
    $count=mysqli_num_rows($row2);
  }

    $sql4 = "SELECT *FROM test left join users using(id) where Tname='$Tname'";
    $row4 = mysqli_query($conn,$sql4);
    $row5 = mysqli_fetch_array($row4);

    $counter = 0;
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>View Test Score | radoncosmos.in</title>
<?php include_once "includes/metahead.php"; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
<center>
<a href="viewalltest.php"><button class="btn-back">Go Back</button></a>
<a href="printscore.php?Tname=<?php echo $row5['Tname'];?>"><button class="btn-back">Print Score</button></a>
<a href="answersheet.php?Tname=<?php echo $row5['Tname'];?>"><button class="btn-back">Send Answer Key</button></a>
</center>
    <?php if($count>=1){ ?>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Test Name : <b><?php echo $row5['Pname'];?></b></h2></div>
                    <div class="col-sm-4">
                        <form action="" method="post">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" name="search" id="myInput" onkeyup="myFunction()" placeholder="Search&hellip;">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <table id="myTable" class="table table-striped table-hover table-bordered">
                <thead style="color: red">
                <th>#</th>
                <th>Name</th>
                <th>Unique No.</th>
                <th>Date and Time</th>
                <th>Score</th>
                <th>Out of</th>
                <th>View Response</th>
                <th>Delete score</th>
              </thead>

              <tbody>
                <?php while($row3 = mysqli_fetch_array($row2)):;?>
                <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo $row3['Sname'];?></td>
                <td><?php echo $row3['SuniqueNo'];?></td>
                <td><?php echo date("d-m-Y h:i A",strtotime('+5 hour +30 minutes +1 seconds',strtotime($row3['Sdate'])));?></td>
                <td><?php echo $row3['score'];?></td>
                <td><?php echo $row3['total'];?></td>

                <td>
                  <a href="studentwisemark.php?student=<?php echo $row3['SuniqueNo'];?>&&Tname=<?php echo $row3['Tname'];?>">
                    <button class="btn btn-success btn-xs">
                      <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                    </button>
                  </a>
                </td>

                <td>
                  <a href="delete.php?delete=<?php echo $row3['SuniqueNo'];?>&&Tname=<?php echo $row3['Tname'];?>">
                    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');">
                      <span><i class="fa fa-trash" aria-hidden="true"></i></span>
                    </button>
                  </a>
                </td>

                </tr>
                 <?php endwhile;?> 
                 
              </tbody>
            </table>

        </div>
         <p style="float: right;">organiser : <b><?php echo $row5['username'];?></b></p>
    </div>  
</div>   
<?php } else { ?>
        <p class="noqsn">Seems, no one has attended the test till now or else you haven't shared the link yet or your test does not contain any Question!
🤔</p>

<br><center><a href="newquestion.php?Tname=<?php echo $row5['Tname'];?>"><button class="btn btn-success">Add Question</button></a></center>
        <?php } ?>
    
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
     td1 = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      txtValue1 = td1.textContent || td1.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif !important;
}
.container-xl{
    padding-top: 1%;
    width: 100%;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    text-align: center;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}   
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
.noqsn{font-size: 30px; margin-top: 20%; color: purple; text-align: center}
.btn-success{background: purple !important; border: none; outline: none}
.btn-back {
    cursor: pointer;
    background: purple;
    color: white;
    padding: 5px;
    border-radius: 5%;
    border: none;
    outline: none;
}
@media only screen and (max-width: 600px) {
    .btn-back{
    margin-top: 1%;
}
.noqsn{font-size: 20px; margin-top: 45%;}
}
</style>
</body>
</html>