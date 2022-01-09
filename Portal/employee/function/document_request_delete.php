<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['delete'])){
		$reference_id = $_POST['reference_id'];

		
		$sql = "DELETE FROM document_request WHERE reference_id='$reference_id' ";

		if ($conn->query($sql)) {
			$_SESSION['success']='Document Request cancelled successfully';
		}else{
			$_SESSION['error']='Document Request cancel failed';
		}

	}	
	header('location:../documents.php');



?>