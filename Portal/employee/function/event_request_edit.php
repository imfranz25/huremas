<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if (isset($_POST['edit'])) {

    // get details
		$id = $_POST['reference_id'];
		$date = $_POST['event_date'];
		$event_name = trim($_POST['event_name']);
		$event_from = $_POST['event_from'];
		$event_to = $_POST['event_to'];
		$venue = trim($_POST['venue']);
		$details = trim($_POST['details']);
		$display =  isset($_FILES["display"]["name"])? $_FILES["display"]["name"]: '';
		$valid = true;

		if ($display!='') {
			//file size
			$file_size = $_FILES["display"]["size"];
			//valid extension array (document Type)
			$valid_extension = array('jpg', 'jpeg', 'png');
			//get extension 
			$extension = pathinfo($_FILES["display"]["name"])['extension'];
			//set filename
			$new_filename = $id.".".$extension;
			$image_query = ", display_image='$new_filename' ";
		}else{
			$image_query ='';
		}

		
		$sql = $conn->prepare("UPDATE event_request SET event_name=?, event_date=?, event_from=?, event_to=?, event_venue=?, details = ? $image_query WHERE reference_id = ? ");
    $sql->bind_param('sssssss',$event_name,$date,$event_from,$event_to,$venue,$details,$id);



		if ($display!= '') {

			if (!in_array($extension, $valid_extension)) {
		    	$_SESSION['error'] = 'Invalid File Type';
				$valid = false;
			}else if ($file_size > 5242880) { //5MB Maximum file size
				$_SESSION['error'] = 'File size exceeds the maximum limit';
				$valid = false;
			}


			if ($valid) {
				if(file_exists('../../admin/uploads/events/'.$new_filename)){
					if (unlink('../../admin/uploads/events/'.$new_filename)) {
					}
				}
				move_uploaded_file($_FILES["display"]["tmp_name"],'../../admin/uploads/events/'.$new_filename);
			}

		}

		if($valid){
			if($sql->execute()){

        // send notif
				$emp_id = $user['employee_id'];
				$full = $user['firstname'].' '.$user['lastname'];
				$title = $full." updated a event request";
				send_notif($conn, $emp_id, $title, 'events.php', 'admin');
				$_SESSION['success'] = 'Event request updated successfully';

			}
			else{
				$_SESSION['error'] = 'Connection Timeout';
			}
		}
		
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../events.php');


?>

