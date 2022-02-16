<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['reference_id_admin'])){

    //get detials
		$reference_id = trim($_POST['reference_id_admin']);
		$request_name = trim($_POST['name']);
		$employee_id = trim($_POST['employee']);
		$details = trim($_POST['details']);

    //update stmt prepared
		$sql = $conn->prepare("UPDATE document_request SET employee_id=? ,request_name=? ,request_note=? WHERE reference_id=? ");
    $sql->bind_param('ssss',$employee_id,$request_name,$details,$reference_id);

		// send notif
		$title = "Document Request from HR has been updated";
		send_notif($conn, $employee_id, $title, 'documents.php', 'employee');

		echo ($sql->execute())?1:0;

	}else if(isset($_POST['reject_id'])){

    //get details reject
		$reference_id = trim($_POST['reject_id']);
		$comment = $_POST['reject_comment'];

		//update docu req
		$sql = $conn->prepare("UPDATE document_request SET request_status=2, request_comment=? WHERE reference_id=? ");
    $sql->bind_param('ss',$comment,$reference_id);

    //select emp id
		$get_id = $conn->prepare("SELECT employee_id FROM document_request WHERE reference_id = ? ");
    $get_id->bind_param('s',$reference_id);
    $get_id->execute();
		$result = $get_id->get_result();
		$row = $result->fetch_assoc();

    //fetch values & send notif
		$employee_id = $row['employee_id']; 
		$title = "Document Request reply rejected";
		send_notif($conn, $employee_id, $title, 'documents.php', 'employee');

		echo ($sql->execute())?1:0;

	}else if(isset($_POST['reply_id'])){

    //get details
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

    //update docu req prepared stmt
		$sql = $conn->prepare("UPDATE document_request SET request_status=1,request_comment=? $file_query WHERE reference_id=? ");
    $sql->bind_param('ss',$comment,$reply_id);

		if ($valid) {
			echo ($sql->execute())?1:0;
		}else{
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$global_link."/Documents/request/".$new_filename)) {

        //prepared stmt select emp
				$get_id = $conn->prepare("SELECT employee_id FROM document_request WHERE reference_id = ? ");
        $get_id->bind_param('s',$reply_id);
        $get_id->execute();
				$result = $get_id->get_result();
				$row = $result->fetch_assoc();
        //fetch values then send notif
				$employee_id = $row['employee_id']; 
				$title = "Document Request has been evaluated";
				send_notif($conn, $employee_id, $title, 'documents.php', 'employee');


				echo ($sql->execute())?1:0;

			}else{echo 0;}
		}

	}else{
    header('location:../documents.php');
  }   

		
// elseif(isset($_POST['reject_id'])){

//     $reject_id = $_POST['reject_id'];
//     $comment = isset($_POST['reject_comment'])? trim($_POST['reject_comment']) :'';
//     $comment_query = '';
//     if ($comment!==''){
//       $comment_query = ",request_comment='$comment' ";
//     }

//     $sql = "UPDATE document_request SET request_status=2 $comment_query  WHERE reference_id='$reply_id' ";
//     echo ($conn->query($sql))?1:0;

//   }

?>