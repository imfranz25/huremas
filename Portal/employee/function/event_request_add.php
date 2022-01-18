<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if (isset($_POST['save'])) {

		$id = $user['employee_id'];
		$date = $_POST['event_date'];
		$display =  $_FILES["display"]["name"];
		$event_name = trim($_POST['event_name']);
		$event_from = $_POST['event_from'];
		$event_to = $_POST['event_to'];
		$venue = trim($_POST['venue']);
		$details = trim($_POST['details']);

		//creating reference_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reference_id = 'CVSUEV'.substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 4);

		//file size
		$file_size = $_FILES["display"]["size"];
		//valid extension array (document Type)
		$valid_extension = array('jpg', 'jpeg', 'png');
		//get extension 
		$extension = pathinfo($_FILES["display"]["name"])['extension'];
		//set filename
		$new_filename = $reference_id.".".$extension;

	
		$sql = "INSERT INTO event_request (reference_id,event_name,display_image,event_date,event_from,event_to,event_venue,employee_id,details) VALUES ('$reference_id','$event_name','$new_filename','$date','$event_from','$event_to','$venue','$id','$details')";

		if (!in_array($extension, $valid_extension)) {
		    $_SESSION['error'] = 'Invalid File Type';
		}else if ($file_size > 5242880) { //5MB Maximum file size
			$_SESSION['error'] = 'File size exceeds the maximum limit';
		}else{
			//move file
			move_uploaded_file($_FILES["display"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/events/'.$new_filename);
			if($conn->query($sql)){


				$emp_id = $user['employee_id'];
				$full = $user['firstname'].' '.$user['lastname'];
				$title = $full." sent a event request";
				send_notif($conn, $emp_id, $title, 'events.php', 'admin');

				$_SESSION['success'] = 'Event request sent successfully';
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

