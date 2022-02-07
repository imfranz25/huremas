<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

  //delete news prepare
	$stmt = $conn->prepare("DELETE FROM news WHERE reference_id = ? ");
	$stmt->bind_param("s", $delete);

  //select 
  $select = $conn->prepare("SELECT display_image FROM news WHERE reference_id= ? ");
  $select->bind_param("s", $delete);

	function delete($id){

    //initialize
		global $stmt,$delete,$select,$global_link;
		$delete = $id;
    $isDeleted = false; // set to true if the display is deleted

    //get display image
    $select->execute();
    $result = $select->get_result();
    $row = $result->fetch_assoc();

    //DELETE  FILE
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$global_link."/Portal/admin/uploads/news/".$row['display_image'])){
      if (unlink($_SERVER['DOCUMENT_ROOT'].$global_link."/Portal/admin/uploads/news/".$row['display_image'])) {
        $isDeleted = true;
      }
    }
    //delete db news info
    if ($isDeleted) {
      ($stmt->execute())? $_SESSION['success'] = 'News deleted successfully' :
        $_SESSION['error'] = 'Connection Timeout';
    }else{
      $_SESSION['error'] = 'Something went wrong';
    }  

	}

	if(isset($_POST['delete'])){

		// initialization
		$id  = explode(',', $_POST['id']);
		$pass  = $_POST['pass'];
		$employee_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			if (count($id) > 1) {
				array_map('delete', $id);
			}else{
				delete($id[0]);
			}
		}else{
			 $_SESSION['error'] = 'Incorrect Password, please try again';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../news.php');
	
?>