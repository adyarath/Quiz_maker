<?php
require('includes/header.php');

if(isset($_REQUEST['Tname'])){
    $Tname=$_GET['Tname'];
    $sql2 = "SELECT *FROM question where Tname='$Tname'";
    $row2 = mysqli_query($conn,$sql2);
    $qcount=mysqli_num_rows($row2);
  }

    $user = $_SESSION["userEmail"];
    $sql1 = "SELECT *FROM users where userEmail = '$user'";
    $row1 = mysqli_query($conn,$sql1);
    $records = mysqli_fetch_array($row1);
    $id = $records['id'];

$sql2 = "SELECT *from test where id = '$id' and Tname='$Tname'";
$row2 = mysqli_query($conn,$sql2);
$row3 = mysqli_fetch_array($row2);

$counter = 0;

?>
<head>
<title>Test Link Share | radoncosmos.in </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once "includes/metahead.php"; ?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<center>
    
<?php if($qcount>=1){ ?>
    
<h2>Your Generated Test Link is :</h2>
<p id="status"></p>
<input type="text" value="https://radoncosmos.in/share?Tname=<?php echo rawurlencode($row3['Tname']); ?>" id="myInput" readonly>
<button onclick="copyMeOnClipboard()">Copy Link</button><br><br>

<div class="shareic">
<p id="share">Share this test link via</p>
<a href="https://www.facebook.com/sharer/sharer.php?u=https://radoncosmos.in/share.php?Tname=<?php echo $row3['Tname']; ?>&t=Test Name : <?php echo $row3['Pname']; ?> and Test Duration : <?php echo $row3['time']; ?> min." onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDExMi4xOTYgMTEyLjE5NiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTEyLjE5NiAxMTIuMTk2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiMzQjU5OTg7IiBjeD0iNTYuMDk4IiBjeT0iNTYuMDk4IiByPSI1Ni4wOTgiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTcwLjIwMSw1OC4yOTRoLTEwLjAxdjM2LjY3Mkg0NS4wMjVWNTguMjk0aC03LjIxM1Y0NS40MDZoNy4yMTN2LTguMzQNCgkJYzAtNS45NjQsMi44MzMtMTUuMzAzLDE1LjMwMS0xNS4zMDNMNzEuNTYsMjEuODF2MTIuNTFoLTguMTUxYy0xLjMzNywwLTMuMjE3LDAuNjY4LTMuMjE3LDMuNTEzdjcuNTg1aDExLjMzNEw3MC4yMDEsNTguMjk0eiIvPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" /></a>

<a href="whatsapp://send?text=*Test Name :* <?php echo $row3['Pname']; ?> and *Test Duration :* <?php echo $row3['time']; ?> min. Click on the link to proceed with your test : https://radoncosmos.in/share?Tname=<?php echo $row3['Tname']; ?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHBhdGggc3R5bGU9ImZpbGw6IzRDQUY1MDsiIGQ9Ik0yNTYuMDY0LDBoLTAuMTI4bDAsMEMxMTQuNzg0LDAsMCwxMTQuODE2LDAsMjU2YzAsNTYsMTguMDQ4LDEwNy45MDQsNDguNzM2LDE1MC4wNDhsLTMxLjkwNCw5NS4xMDQNCglsOTguNC0zMS40NTZDMTU1LjcxMiw0OTYuNTEyLDIwNCw1MTIsMjU2LjA2NCw1MTJDMzk3LjIxNiw1MTIsNTEyLDM5Ny4xNTIsNTEyLDI1NlMzOTcuMjE2LDAsMjU2LjA2NCwweiIvPg0KPHBhdGggc3R5bGU9ImZpbGw6I0ZBRkFGQTsiIGQ9Ik00MDUuMDI0LDM2MS41MDRjLTYuMTc2LDE3LjQ0LTMwLjY4OCwzMS45MDQtNTAuMjQsMzYuMTI4Yy0xMy4zNzYsMi44NDgtMzAuODQ4LDUuMTItODkuNjY0LTE5LjI2NA0KCUMxODkuODg4LDM0Ny4yLDE0MS40NCwyNzAuNzUyLDEzNy42NjQsMjY1Ljc5MmMtMy42MTYtNC45Ni0zMC40LTQwLjQ4LTMwLjQtNzcuMjE2czE4LjY1Ni01NC42MjQsMjYuMTc2LTYyLjMwNA0KCWM2LjE3Ni02LjMwNCwxNi4zODQtOS4xODQsMjYuMTc2LTkuMTg0YzMuMTY4LDAsNi4wMTYsMC4xNiw4LjU3NiwwLjI4OGM3LjUyLDAuMzIsMTEuMjk2LDAuNzY4LDE2LjI1NiwxMi42NA0KCWM2LjE3NiwxNC44OCwyMS4yMTYsNTEuNjE2LDIzLjAwOCw1NS4zOTJjMS44MjQsMy43NzYsMy42NDgsOC44OTYsMS4wODgsMTMuODU2Yy0yLjQsNS4xMi00LjUxMiw3LjM5Mi04LjI4OCwxMS43NDQNCgljLTMuNzc2LDQuMzUyLTcuMzYsNy42OC0xMS4xMzYsMTIuMzUyYy0zLjQ1Niw0LjA2NC03LjM2LDguNDE2LTMuMDA4LDE1LjkzNmM0LjM1Miw3LjM2LDE5LjM5MiwzMS45MDQsNDEuNTM2LDUxLjYxNg0KCWMyOC41NzYsMjUuNDQsNTEuNzQ0LDMzLjU2OCw2MC4wMzIsMzcuMDI0YzYuMTc2LDIuNTYsMTMuNTM2LDEuOTUyLDE4LjA0OC0yLjg0OGM1LjcyOC02LjE3NiwxMi44LTE2LjQxNiwyMC0yNi40OTYNCgljNS4xMi03LjIzMiwxMS41ODQtOC4xMjgsMTguMzY4LTUuNTY4YzYuOTEyLDIuNCw0My40ODgsMjAuNDgsNTEuMDA4LDI0LjIyNGM3LjUyLDMuNzc2LDEyLjQ4LDUuNTY4LDE0LjMwNCw4LjczNg0KCUM0MTEuMiwzMjkuMTUyLDQxMS4yLDM0NC4wMzIsNDA1LjAyNCwzNjEuNTA0eiIvPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" /></a>

<a href="https://twitter.com/share?url=https://radoncosmos.in/share.php?Tname=<?php echo $row3['Tname']; ?>&text=Test Name : <?php echo $row3['Pname']; ?> and Test Duration : <?php echo $row3['time']; ?> min." onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE4LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDExMi4xOTcgMTEyLjE5NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTEyLjE5NyAxMTIuMTk3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiM1NUFDRUU7IiBjeD0iNTYuMDk5IiBjeT0iNTYuMDk4IiByPSI1Ni4wOTgiLz4NCgk8Zz4NCgkJPHBhdGggc3R5bGU9ImZpbGw6I0YxRjJGMjsiIGQ9Ik05MC40NjEsNDAuMzE2Yy0yLjQwNCwxLjA2Ni00Ljk5LDEuNzg3LTcuNzAyLDIuMTA5YzIuNzY5LTEuNjU5LDQuODk0LTQuMjg0LDUuODk3LTcuNDE3DQoJCQljLTIuNTkxLDEuNTM3LTUuNDYyLDIuNjUyLTguNTE1LDMuMjUzYy0yLjQ0Ni0yLjYwNS01LjkzMS00LjIzMy05Ljc5LTQuMjMzYy03LjQwNCwwLTEzLjQwOSw2LjAwNS0xMy40MDksMTMuNDA5DQoJCQljMCwxLjA1MSwwLjExOSwyLjA3NCwwLjM0OSwzLjA1NmMtMTEuMTQ0LTAuNTU5LTIxLjAyNS01Ljg5Ny0yNy42MzktMTQuMDEyYy0xLjE1NCwxLjk4LTEuODE2LDQuMjg1LTEuODE2LDYuNzQyDQoJCQljMCw0LjY1MSwyLjM2OSw4Ljc1Nyw1Ljk2NSwxMS4xNjFjLTIuMTk3LTAuMDY5LTQuMjY2LTAuNjcyLTYuMDczLTEuNjc5Yy0wLjAwMSwwLjA1Ny0wLjAwMSwwLjExNC0wLjAwMSwwLjE3DQoJCQljMCw2LjQ5Nyw0LjYyNCwxMS45MTYsMTAuNzU3LDEzLjE0N2MtMS4xMjQsMC4zMDgtMi4zMTEsMC40NzEtMy41MzIsMC40NzFjLTAuODY2LDAtMS43MDUtMC4wODMtMi41MjMtMC4yMzkNCgkJCWMxLjcwNiw1LjMyNiw2LjY1Nyw5LjIwMywxMi41MjYsOS4zMTJjLTQuNTksMy41OTctMTAuMzcxLDUuNzQtMTYuNjU1LDUuNzRjLTEuMDgsMC0yLjE1LTAuMDYzLTMuMTk3LTAuMTg4DQoJCQljNS45MzEsMy44MDYsMTIuOTgxLDYuMDI1LDIwLjU1Myw2LjAyNWMyNC42NjQsMCwzOC4xNTItMjAuNDMyLDM4LjE1Mi0zOC4xNTNjMC0wLjU4MS0wLjAxMy0xLjE2LTAuMDM5LTEuNzM0DQoJCQlDODYuMzkxLDQ1LjM2Niw4OC42NjQsNDMuMDA1LDkwLjQ2MSw0MC4zMTZMOTAuNDYxLDQwLjMxNnoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" /></a>

<a href="mailto:?subject=You received a new test.&body= Test Name : <?php echo $row3['Pname']; ?> and Test Duration : <?php echo $row3['time']; ?> min. Click on the link : https://radoncosmos.in/share?Tname=<?php echo $row3['Tname']; ?>" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Mail"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGNpcmNsZSBzdHlsZT0iZmlsbDojNUY5OEQxOyIgY3g9IjI1NiIgY3k9IjI1NiIgcj0iMjU2Ii8+DQo8cGF0aCBzdHlsZT0iZmlsbDojM0E2REExOyIgZD0iTTQxNS44MTMsMTQ3LjQ2Nkg5NS41NThsMTE2LjAxOSwxMjAuODA2bDMzLjQ4LDMzLjljLTE4LjIxNi00LjE2NC0xOS4zNDMtNi43NTktMjcuNDE1LTEzLjM0OQ0KCWMtNC4yMzQtMy40NTctMTIuNDE0LTEyLjg1Mi0yNC44MzgtMjUuNTRDMTU0LjAyMywyMjMuNjgyLDg4LjIxNywxNTYuNDg0LDg4LjIxNywxNTYuNDg0djE5OC44MjJsOC4yNjUsOC4yNjVsLTAuOTI1LDAuOTYzDQoJTDI0Mi42OCw1MTEuNjU3YzQuNDEyLDAuMjI2LDguODUyLDAuMzQzLDEzLjMyLDAuMzQzYzE0MS4zODUsMCwyNTYtMTE0LjYxNSwyNTYtMjU2YzAtNC4yNDYtMC4xMS04LjQ2Ni0wLjMxMy0xMi42NjENCglMNDE1LjgxMywxNDcuNDY2eiIvPg0KPGc+DQoJPHBvbHlnb24gc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHBvaW50cz0iODguMjE3LDE1Ni40ODQgODguMjE3LDM1NS4zMDYgMTg1LjE3NSwyNTUuNDkzIAkiLz4NCgk8cG9seWdvbiBzdHlsZT0iZmlsbDojRkZGRkZGOyIgcG9pbnRzPSI0MjMuNzgzLDE1Ni40ODQgNDIzLjc4MywzNTUuMzA2IDMyNy4zMDcsMjU1Ljg5NSAJIi8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik05NS41NTgsMTQ3LjQ2NmgzMjAuMjU1TDI4OS45NDgsMjc4LjUyNGMtOC45NTgsOS4zMjctMjEuMzMxLDE0LjU5OS0zNC4yNjIsMTQuNTk5DQoJCXMtMjUuMzA0LTUuMjcyLTM0LjI2Mi0xNC41OTlMOTUuNTU4LDE0Ny40NjZ6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0yOTcuMjA5LDI4NS40OTZjLTEwLjc5OSwxMS4yNDQtMjUuOTMzLDE3LjY5NC00MS41MjMsMTcuNjk0Yy0xNS41ODksMC0zMC43MjQtNi40NDgtNDEuNTIyLTE3LjY5Mw0KCQlsLTIxLjM0OS0yMi4yM0w5NS41NTgsMzY0LjUzNGgzMjAuMjU1bC05Ny4yNTYtMTAxLjI2N0wyOTcuMjA5LDI4NS40OTZ6Ii8+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" /></a>
</div>

<?php } else { ?>
<p class="noqsn">Hey <?php echo strip_tags(substr(htmlspecialchars($_SESSION["username"]),0,13)); ?> ! Your test doesn't contain any Question. What to share?</p>
        <?php } ?>
<br><br><br>
<a href="viewalltest.php"><button class="btn-back">Go Back</button></a>&nbsp; OR &nbsp;
<a href="newquestion.php?Tname=<?php echo $row3['Tname'];?>"><button class="btn-back">Add Question</button></a>

</center>

<style type="text/css">
	body{font-family: 'Poppins', sans-serif;overflow: hidden; margin: 0; padding: 0}
	h2,p,span{text-align: center;}
	h2{margin-top: 6%; font-size: 50px; }
	#share {font-size: 30px; color: purple; font-weight: 600}
	#status{color: green}
	.shareic a img{width: 50px; height: 50px}
	input[type=text]{width: 33%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 2px solid #ccc;border-radius: 4px;box-sizing: border-box;}
	button {border: 2px solid black;color: black;padding: 14px 20px;margin: 8px 0;border: none; outline: none; border-radius: 4px;cursor: pointer;}
	.btn-back{background: purple; color: white; font-size: 17px}
	.noqsn{font-size: 30px; margin-top: 15%; color: purple; text-align: center}
	::selection {background: black; color: white}

	@media only screen and (max-width: 600px) {
		h2{font-size: 20px; margin-top: 15%}
		input[type=text]{width: 95%}
		#share{font-size: 20px}
		.shareic a img{width: 40px; height: 40px}
		.noqsn{font-size: 20px; margin-top: 55%;}
	}
</style>

<script>
const copyText = document.querySelector("#myInput");
const showText = document.querySelector("#status");

const copyMeOnClipboard = () => {
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  showText.innerHTML = `Link has been copied successfully`    
  setTimeout(() => {
  showText.innerHTML = ''    
  }, 3000)
}
</script>
</body>