<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['add'])) {
    //prepared statement for insert
    $sql = $conn->prepare("INSERT INTO news (reference_id,news_headline,display_image,news_details,news_date) VALUES (?,?,?,?,?)");
    $sql->bind_param('sssss',$reference_id,$headline,$new_filename,$details,$date);

    //get data
		$date = trim($_POST['date']);
		$headline = trim($_POST['headline']);
		$details = trim($_POST['details']);
		$display =  $_FILES["display"]["name"];

		//generate reference_id
		$reference_id = 'CVSUNEWS'.generate_id();
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
			move_uploaded_file($_FILES["display"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].$global_link.'/Portal/admin/uploads/news/'.$new_filename);
			if($sql->execute()){
				$_SESSION['success'] = 'News published successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Time-out';
			}
		}
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../news.php');


?>

