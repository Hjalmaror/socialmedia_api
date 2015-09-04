<?php 
include "db_connect.php";

//Get all instagram elements
$client_id = "f8e6e43ef95d40cebf0ed83cd73ff6a6";
$tag = "nackaforum";

$url = "https://api.instagram.com/v1/tags/". $tag ."/media/recent?client_id=". $client_id ."&count=25";
$result = json_decode(file_get_contents($url));

foreach ($result as $key => $ig_array) {
	if ((is_array($ig_array))) {
		if(count($ig_array) > 0){
			foreach ($ig_array as $key => $value) {
				
				//Get values from instagram
				$id = $value->id;
				$username = $value->user->username;
				$img_link = $value->images->standard_resolution->url;

				//Check if instagram element already is saved
				$stmt = $conn->prepare("SELECT * FROM ig WHERE instagram_id = :instagram_id");
				$stmt->execute(array(
				    ":instagram_id" => $id
				));
				if ($stmt->rowCount() == 0) {
					//Save into database
					$stmt = $conn->prepare("INSERT INTO ig (instagram_id, username, img_link) VALUES (:instagram_id, :username, :img_link);");
					$result = $stmt->execute(array(
						":instagram_id" => $id,
					    ":username" => $username,
					    ":img_link" => $img_link
					));
					if(result){
						echo ("List item saved");
					}
					else{
						echo ("Failed to save listitems");
					}
				}
				else{
					echo ("Failed already exists");
				}
				
			}
		}
		
	}
	 	
}






?>