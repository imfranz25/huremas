<?php
	$conn = new mysqli('localhost', 'root', '', 'huremas');
	if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
	}
?>