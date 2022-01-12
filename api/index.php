<?php
include('../database/db_test.php');

$sql = mysqli_query($conn,"select *from test");
$count = mysqli_num_rows($sql);

if ($count > 0) {
	while ($row = mysqli_fetch_assoc($sql)) {
		$array[] = $row;
	}
	echo json_encode(['status' => true, 'data' => $array]);
}
else{
	echo json_encode(['status' => true, 'data' => 'Not found']);
}

?>