<?php
require('includes/header.php');

if(isset($_REQUEST['del']))
{
$tname=$_GET['del'];
$sql10 = "delete from test WHERE Tname='$tname'";
$row10 = mysqli_query($conn,$sql10);
$sql11 = "delete from score WHERE Tname='$tname'";
$row11 = mysqli_query($conn,$sql11);
$sql12 = "delete from answer WHERE Tname='$tname'";
$row12 = mysqli_query($conn,$sql12);
$sql13 = "delete from question WHERE Tname='$tname'";
$row13 = mysqli_query($conn,$sql13);

echo "<script>window.location.href='viewalltest.php'</script>"; 
}

$user = $_SESSION["userEmail"];
$sql1 = "SELECT *FROM users where userEmail = '$user'";
$row1 = mysqli_query($conn,$sql1);
$records = mysqli_fetch_array($row1);
$id = $records['id'];

$sql2 = "SELECT *from test left join users using(id) where id = '$id' order by Tdate desc";
$row2 = mysqli_query($conn,$sql2);
$count=mysqli_num_rows($row2);
 
$counter = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $_SESSION["username"]; ?> Dashboard | radoncosmos.in </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once "includes/metahead.php"; ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
</head>
<body>
    
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <a href="addtest.php"><button class="btn btn-primary">Create New Test </button></a>
        <!--<a href="https://www.payumoney.com/paybypayumoney/#/6B1DCE0136910F765E18E89ABF6AC4D3"><button class="btn btn-success">Donate</button></a>-->
        
            <div class="search-box">
                <input type="text" class="form-control" name="search" id="myInput" onkeyup="myFunction()" title="Search by Test name or date created" placeholder="Search Test...">
            </div>
        
          <div class="table-responsive" style="border: none;outline: none;">       

<?php if($count>=1){ ?>
<table id="mytable" class="table table-bordred table-striped">                 
  <thead>
    <th>Sl. No.</th>
    <th>Test Name</th>
    <th>Test Created On</th>
    <th>No. of Questions</th>
    <th>Add Question</th>
    <th>View Test</th>
    <th>Share Test</th>
    <th>Show Result</th>
    <th>Delete Test</th>
  </thead>
<tbody>
 
<?php while($row3 = mysqli_fetch_array($row2)):;?>

<!--No.of question count-->
<?php
$Tnamefetch=$row3['Tname'];
$sql3=mysqli_query($conn,"select *from question where Tname='$Tnamefetch'");
$qcount=mysqli_num_rows($sql3);
?>
<tr>
    <td><?php echo ++$counter; ?></td>
    <td><?php echo $row3['Pname'];?><a href="UpdateTest.php?Tname=<?php echo $row3['Tname'];?>"> (update?)</a></td>
    <td><?php echo date("d-m-Y", strtotime($row3['Tdate']));?></td>
    <!--<td><?php echo $row3['time'];?>&nbsp;</td>-->
    <td><?php echo $qcount;?></td>

    <td>
      <a href="newquestion.php?Tname=<?php echo $row3['Tname'];?>">
        <button id="share" class="btn btn-info btn-xs">
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      </a>
    </td>

    <td>
      <a href="viewquestion.php?Tname=<?php echo $row3['Tname'];?>">
        <button class="btn btn-success btn-xs">
          <span class="glyphicon glyphicon-eye-open"></span>
        </button>
      </a>
    </td>

    <td>
      <a href="link.php?Tname=<?php echo $row3['Tname'];?>">
        <button id="share" class="btn btn-info btn-xs">
          <span class="glyphicon glyphicon-share"></span>
        </button>
      </a>
    </td>

    <td>
      <a href="results.php?Tname=<?php echo $row3['Tname'];?>">
        <button class="btn btn-success btn-xs">
          <span class="glyphicon glyphicon-eye-open"></span>
        </button>
      </a>
    </td>

    <td>
      <button class="btn btn-danger btn-xs" data-href="viewalltest.php?del=<?php echo $row3['Tname'];?>" data-toggle="modal" data-target="#confirm-delete">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
    </td>
</tr>

  <?php endwhile;?> 

</tbody>      
</table>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
<p class="notest">You have not created any test yet. All test created will reflect here serially.</p>
<?php } ?>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <center><img src="https://coolbackgrounds.io/images/backgrounds/white/pure-white-background-85a2a7fd.jpg" /></center>
                    <p class="p_delete">You are about to delete this Test, this procedure is irreversible.</p>
                    <p class="p_delete">Do you want to proceed?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL : <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>

<style type="text/css">
.container{
    margin-top: 1%;
}
  .glyphicon{padding: 7px 5px 7px 5px}
  td{font-size: 16px}
  body{
    font-family: 'Poppins', sans-serif;
  }
  .btn{
      margin-bottom: 2%;
  }
  .notest{
    font-size: 30px; margin-top: 20%; color: purple; text-align: center
  }
  .search-box{float: right}
  .search-box input[type=text]{border: 1px solid #428bca}
  td,tr,th{text-align: center; border: 1px solid #bdbcbb;}
  button{border: none !important; outline: none !important}
  .modal-header{background: red; color: white}
  .modal-title{text-align: center; font-size: 25px; font-weight: 700}
  .modal-footer .btn-default{float: left; border: 2px solid green !important}
  .modal-footer .btn-ok{background: red !important; border: 2px solid red; color: white}
  .modal-body img{width: 50px; height: 50px}
  .p_delete{text-align: center; font-size: 17px}
  ::-webkit-scrollbar {
  width: 0px;
}
  @media only screen and (max-width: 600px) {
      .search-box{float: none; padding: 0 0 15px 0;}
      .btn{margin-bottom: 6%;}
      .notest{font-size: 20px;margin-top: 2%;}
      .modal-body img{width: 40px; height: 40px}
      .p_delete{font-size: 14px}
  }
</style>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mytable");
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

</body>
</html>