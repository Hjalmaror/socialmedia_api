<?php 

include "db_connect.php";

$stmt = $conn->prepare("SELECT * FROM ig");
$stmt->execute();

$rows = $stmt->fetchAll();	

?>