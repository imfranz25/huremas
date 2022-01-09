<?php 
	include '../includes/session.php';

	if(isset($_POST['folder_id'])){
		$id = $_POST['folder_id'];
		$sql = "SELECT * FROM document_folder WHERE folder_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

?>