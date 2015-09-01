<?php
	$conn = new PDO("mysql:host=localhost;dbname=socialmedia_api", "root", "");
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>