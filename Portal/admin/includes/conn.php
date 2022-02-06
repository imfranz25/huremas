<?php
	$conn = new mysqli('localhost', 'u418351397_huremas', 'Syracrus99', 'u418351397_huremas');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>