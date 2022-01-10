<?php
include('PDO.php');
/*
if(isset($_POST['year'])){
	$year = $_POST['year'];
}else $year = date("Y");

if(isset($_POST['month'])){
	$month = $_POST['month'];
}else $month = date("M");
*/
$arr = [];
$query = "Select * from LABS order by ID";




$stmt = $db->prepare($query);

//$stmt->bindValue(':m', $month);

if ($stmt->execute()) {

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$arr[] = $row;
	}
	header('Content-Type: application/json');
	echo json_encode($arr);
}else{
    echo "error";
}
$pdo=null;
?>