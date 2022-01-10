<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=snackDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$statement = $conn->prepare("select * from SnackDB.snacks");
$statement->execute();
$rows = $statement->fetchAll(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator

echo json_encode($rows);
$conn = null;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
$conn = null;
}
?>