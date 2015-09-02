<?php 

include "db_connect.php";

//Check if User has aleady pressed like
$stmt = $conn->prepare("SELECT * FROM likes WHERE user_id = :user_id");
$stmt->execute(array(
    ":user_id" => $_POST["user_id"],
));
if ($stmt->rowCount() == 0) {
	//Save into database
	$stmt = $conn->prepare("INSERT INTO likes (ig_id, user_id) VALUES (:ig_id, :user_id)");
	$result = $stmt->execute(array(
		":ig_id" => $_POST["ig_id"],
	    ":user_id" => $_POST["user_id"]
	));
	if($result){
		echo ("Your choice is saved");
	}
	else{
		echo ("Could not save choice");
	}
} else {
	//Delete existing like
	$stmt = $conn->prepare("DELETE FROM likes WHERE user_id = :user_id");
	$stmt->execute(array(
		":user_id" => $_POST["user_id"]
	));
	// add new
	$stmt = $conn->prepare("INSERT INTO likes (ig_id, user_id) VALUES (:ig_id, :user_id)");
	$result = $stmt->execute(array(
		":ig_id" => $_POST["ig_id"],
	    ":user_id" => $_POST["user_id"]
	));
	if($result){
		echo ("Your new choice is saved");
	}
	else{
		echo ("Could not save choice");
	}
}


?>