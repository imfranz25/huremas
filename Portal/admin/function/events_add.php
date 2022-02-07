<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['add'])) {

    //preapred statement
    $sql = $conn->prepare("INSERT INTO events (reference_id,event_name,display_image,event_date,event_from,event_to,event_venue) VALUES (?,?,?,?,?,?,?)");
    $sql->bind_param('sssssss',$reference_id,$event_name,$new_filename,$date,$event_from,$event_to,$venue);

    //get values
		$date = $_POST['event_date'];
		$display =  $_FILES["display"]["name"];
		$event_name = trim($_POST['event_name']);
		$event_from = $_POST['event_from'];
		$event_to = $_POST['event_to'];
		$venue = trim($_POST['venue']);

		//creating reference_id
		$reference_id = 'CVSUEV'.generate_id();

		//file size
		$file_size = $_FILES["display"]["size"];
		//valid extension array (document Type)
		$valid_extension = array('jpg', 'jpeg', 'png');
		//get extension 
		$extension = pathinfo($_FILES["display"]["name"])['extension'];
		//set filename
		$new_filename = $reference_id.".".$extension;

		if (!in_array($extension, $valid_extension)) {
		  $_SESSION['error'] = 'Invalid File Type';
		}else if ($file_size > 5242880) { //5MB Maximum file size
			$_SESSION['error'] = 'File size exceeds the maximum limit';
		}else{
			//move file
			move_uploaded_file($_FILES["display"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].$global_link.'/Portal/admin/uploads/events/'.$new_filename);
			if($sql->execute()){
				$_SESSION['success'] = 'Event posted successfully';
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

