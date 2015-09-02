<?php 

include "db_connect.php";

//Get the like number
$stmt = $conn->prepare("SELECT * FROM ig INNER JOIN likes ON ig.id = likes.ig_id WHERE ig.id = :ig_id");
$result = $stmt->execute(array(
    ":ig_id" => $_POST["ig_id"]
));
if($result){
	echo ($stmt->rowCount());
}
else{
	echo ("Error: could not get like number");
}



?>