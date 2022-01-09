<?php
	include '../includes/session.php';


	$stmt = $conn->prepare("DELETE FROM news WHERE reference_id = ? ");
	$stmt->bind_param("s", $delete);

	function delete($id){
		global $stmt,$delete;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'News deleted successfully' : $_SESSION['error'] = $conn->error;
	}

	if(isset($_POST['delete'])){
		// initialization shitty
		$id  = explode(',', $_POST['id']);

		if (count($id) > 1) {
			array_map('delete', $id);
		}else{
			delete($id[0]);
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../news.php');
	
?>