<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['archive_type'])){

		// INITIALIZATION
		$archive_type = $_POST['archive_type'];
		$id = $_POST['id'];
		$table = '';
		$reference = '';
		$update = '';


		if ($archive_type=='folder') {
			$table = 'document_folder';
			$reference = "folder_id";
			$update = "folder_archive";
		}else if ($archive_type=='docu') {
			$table = 'documents';
			$reference = "document_id";
			$update = "document_archive";
		}else if ($archive_type=='emp') {
			$table = 'employees';
			$reference = "employee_id";
			$update = "employee_archive";
		}


		if ($table!='') {
			$sql = $conn->prepare("UPDATE $table SET $update = 0 WHERE $reference = ? ");
      $sql->bind_param('s',$id);
			echo ($sql->execute())? 1: 0;
		}else {
			echo 0;
		}

	}else {
    header('location: ../archive.php');
  }
?>