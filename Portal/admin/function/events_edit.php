<?php 

	include '../includes/session.php';

	if (isset($_POST['edit'])) {

		$reference_id = trim($_POST['reference_id']);
		$date = $_POST['event_date'];
		$event_name = trim($_POST['event_name']);
		$event_from = $_POST['event_from'];
		$event_to = $_POST['event_to'];
		$venue = trim($_POST['venue']);
		$display =  isset($_FILES["display"]["name"])? $_FILES["display"]["name"] : '';
		$valid = true;

		if ($display!= '') {
			//file size
			$file_size = $_FILES["display"]["size"];
			//valid extension array (document Type)
			$valid_extension = array('jpg', 'jpeg', 'png');
			//get extension 
			$extension = pathinfo($_FILES["display"]["name"])['extension'];
			//set filename
			$new_filename = $reference_id.".".$extension;
			$image_query = ", display_image='$new_filename' ";
		}else{
			$image_query ='';
		}


	
		$sql = "UPDATE events SET event_name='$event_name',event_date='$date',event_from='$event_from',event_to='$event_to',event_venue='$venue'  $image_query WHERE reference_id='$reference_id' ";

		if ($display!= '') {
			if (!in_array($extension, $valid_extension)) {
			    $_SESSION['error'] = 'Invalid File Type';
			    $valid = false;
			}else if ($file_size > 5242880) { //5MB Maximum file size
				$_SESSION['error'] = 'File size exceeds the maximum limit';
				$valid = false;
			}
			
			if ($valid) {
				if(file_exists($_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/events/'.$new_filename)){
					if (unlink($_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/events/'.$new_filename)) {
					}
					
				}
				//move file
				move_uploaded_file($_FILES["display"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/events/'.$new_filename);
			}
		}

		if ($valid) {

			if($conn->query($sql)){
				$_SESSION['success'] = 'Event updated successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Time-out';
			}
		}

		
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../events.php');


?>

