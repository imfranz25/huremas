<?php
	include '../includes/session.php';

	if(isset($_POST['reference_id_admin'])){
		$reference_id = trim($_POST['reference_id_admin']);
		$request_name = trim($_POST['name']);
		$employee_id = trim($_POST['employee']);
		$details = trim($_POST['details']);

		$sql = "UPDATE document_request SET employee_id='$employee_id' ,request_name='$request_name' ,request_note='$details' WHERE reference_id='$reference_id' ";

		echo ($conn->query($sql))?1:0;

	}else if(isset($_POST['reject_id'])){
		$reference_id = trim($_POST['reject_id']);
		$sql = "UPDATE document_request SET request_status=2 WHERE reference_id='$reference_id' ";

		echo ($conn->query($sql))?1:0;

	}else if(isset($_POST['reply_id'])){
		$reply_id = $_POST['reply_id'];
		$file = isset($_FILES['file'])? $_FILES['file']['name']:'';
		$comment = trim($_POST['comment']);
		$valid = true;
		$file_query='';

		
		if ($file!='') {
			$file_query = ",request_file = '$file' ";
			// get extension 
			$extension = pathinfo($file)['extension'];
			//set filename
			$new_filename = $reply_id.".".$extension;
			$valid = false;
		}

		$sql = "UPDATE document_request SET request_status=1,request_comment='$comment' $file_query WHERE reference_id='$reply_id' ";

		if ($valid) {
			echo ($conn->query($sql))?1:0;
		}else{
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/HUREMAS/Documents/request/".$new_filename)) {
				echo ($conn->query($sql))?1:0;
			}else{echo 0;}
		}

		


	}elseif(isset($_POST['reject_id'])){
		$reject_id = $_POST['reject_id'];
		$comment = isset($_POST['reject_comment'])? trim($_POST['reject_comment']) :'';
		$comment_query = '';
		if ($comment!==''){
			$comment_query = ",request_comment='$comment' ";
		}

		$sql = "UPDATE document_request SET request_status=2 $comment_query  WHERE reference_id='$reply_id' ";
		echo ($conn->query($sql))?1:0;
	}

		


?>