<?php 
	include '../includes/session.php';

	if(isset($_POST['archive_type'])){

		// INITIALIZATION
		$archive_type = $_POST['archive_type'];
		$table = '';
		$reference = '';
		$output = array();

		if ($archive_type=='folder') {
			$table = 'document_folder LEFT JOIN employees ON employees.employee_id=document_folder.folder_created_by';
			$reference = "folder_archive=1";
		}else if ($archive_type=='docu') {
			$table = 'documents';
			$reference = "document_archive=1";
		}

		if ($table!='') {

			$sql = "SELECT * FROM $table WHERE $reference ";
			$query = $conn->query($sql);

			while ($row = $query->fetch_assoc()) {
				array_push($output, $row);
			}
		}

		echo json_encode($output);
	}
?>