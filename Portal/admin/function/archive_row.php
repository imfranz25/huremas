<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';


	function filterType($archive_type){

		$selectors = array();
		if ($archive_type=='folder') {
			$selectors['table']= 'document_folder LEFT JOIN employees ON employees.employee_id=document_folder.folder_created_by';
			$selectors['reference']= 'folder_archive=1';
			$selectors['primary']= 'folder_id';
		}else if ($archive_type=='docu') {
			$selectors['table']= 'documents';
			$selectors['reference']= 'document_archive=1';
			$selectors['primary']= 'document_id';
		}else if ($archive_type=='emp') {
			$selectors['table']= 'employees';
			$selectors['reference']= 'employee_archive=1';
			$selectors['primary']= 'employee_id';
		}else{
			$selectors['table']= '';
			$selectors['reference']= '';
		}
		return $selectors;
	}


	if(isset($_POST['archive_type'])){

		// INITIALIZATION
		$archive_type = $_POST['archive_type'];
		$output = array();

		$table = filterType($archive_type)['table'];
		$reference = filterType($archive_type)['reference'];

		if ($table!='') {

			$sql = "SELECT * FROM $table WHERE $reference ";
			$query = $conn->query($sql);

			while ($row = $query->fetch_assoc()) {
				array_push($output, $row);
			}
		}

		echo json_encode($output);
	}
	else if(isset($_POST['s_type'])) { // Query for Specific archive (for retrieve modal)

		$archive_type = $_POST['s_type'];
		$id = $_POST['s_id'];
		$table = filterType($archive_type)['table'];
		$primary = filterType($archive_type)['primary'];
		$sql = $conn->prepare("SELECT * FROM $table WHERE $primary=? ");
    $sql->bind_param('s',$id);
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);

	}else {
    header('location: ../archive.php');
  }
?>