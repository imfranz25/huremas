<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if (isset($_POST['edit_action'])) {
		//basic info
		$reference = $_POST['reference'];
		$explanation = trim($_POST['explanation']);
		$attachment = isset($_FILES["attachment"]["name"]) ? $_FILES["attachment"]["name"] : '';
		$valid = true;

		//process file if not null
		if ($attachment !='') {
			//file size
			$file_size = $_FILES["attachment"]["size"];
			//valid extension array (document Type)
			$valid_extension = array('pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx');
			//get extension 
			$extension = pathinfo($_FILES["attachment"]["name"])['extension'];
			//set filename
			$new_filename = $reference.".".$extension;

			$attach_query = "attachment ='$new_filename',";
		}else{ 
			$attach_query ="";
		}

		$check = "SELECT state FROM disciplinary_action WHERE reference_id ='$reference'";
		$query = $conn->query($check);
		$row= $query->fetch_assoc();
		$state_query = ($row['state']=='Reviewed') ? "" : ",state='Responded'";

		$sql = "UPDATE disciplinary_action SET $attach_query explanation='$explanation' $state_query  WHERE reference_id ='$reference' ";

		if ($attachment!='') {
			if (!in_array($extension, $valid_extension)) {
		    	$_SESSION['error'] = 'Invalid File Type';
		    	$valid =false;
			}else if ($file_size > 5242880) { //5MB Maximum file size
				$_SESSION['error'] = 'File size exceeds the maximum limit';
				$valid =false;
			}
		}

		if($valid){
			if(file_exists($_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/disciplinary/'.$new_filename)){
				if (unlink($_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/disciplinary/'.$new_filename)) {
				}
				
			}
			//move file
			move_uploaded_file($_FILES["attachment"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/HUREMAS/Portal/admin/uploads/disciplinary/'.$new_filename);
			if($conn->query($sql)){
				$emp_id = $user['employee_id'];
				$full = $user['firstname'].' '.$user['lastname'];
				$title = $full." sent a reply regarding with disciplinary action";
				send_notif($conn, $emp_id, $title, 'disciplinary.php', 'admin');
				$_SESSION['success'] = 'Response sent successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Time-out';
			}
		}

		
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../disciplinary.php');


?>