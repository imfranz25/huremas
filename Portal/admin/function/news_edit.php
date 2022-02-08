<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['edit'])) {

    //get details & initialize
		$reference_id = trim($_POST['reference_id']);
		$date = trim($_POST['date']);
		$headline = trim($_POST['headline']);
		$details = trim($_POST['details']);
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
			$test_image = true;
		}else{
			$image_query ='';
		}

    //update prepared stmt
    $sql =  $conn->prepare("UPDATE news SET news_headline=? , news_details=?,
            news_date=? $image_query WHERE reference_id=? ");
    $sql->bind_param('ssss',$headline,$details,$date,$reference_id);

		
		if ($display!= '') {
			if (!in_array($extension, $valid_extension)) {
			    $_SESSION['error'] = 'Invalid File Type';
			    $valid = false;
			}else if ($file_size > 5242880) { //5MB Maximum file size
				$_SESSION['error'] = 'File size exceeds the maximum limit';
				$valid = false;
			}
			
			if ($valid) {

        $select=$conn->prepare("SELECT display_image FROM news WHERE reference_id=?");
        $select->bind_param('s',$reference_id);
        $select->execute();
        $result = $select->get_result();
        $row = $result->fetch_assoc();

				if(file_exists($_SERVER['DOCUMENT_ROOT'].$global_link.'/Portal/admin/uploads/news/'.$row['display_image'])){
					if (unlink($_SERVER['DOCUMENT_ROOT'].$global_link.'/Portal/admin/uploads/news/'.$row['display_image'])) {
					}
					
				}
				//move file
				move_uploaded_file($_FILES["display"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].$global_link.'/Portal/admin/uploads/news/'.$new_filename);
			}
		}

		if ($valid) {

			if($sql->execute()){
				$_SESSION['success'] = 'News updated successfully';
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

