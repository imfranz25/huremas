<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

  //prepared statement for selecting news infos
  $get_news = $conn->prepare("SELECT * FROM news WHERE reference_id = ? ");
  $get_news->bind_param('s',$id);

	if(isset($_POST['id'])){
    global $get_news;
		
    $id = $_POST['id'];
		$get_news->execute();
    $result = $get_news->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);

	}else if(isset($_POST['ids'])){
    global $get_news;

		// initilization
		$ids =$_POST['ids'];
		$headline = array();

		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$get_news->execute();
			$result = $get_news->get_result();
			$row = $result->fetch_assoc();
			array_push($headline, $row['news_headline']);
		}
		echo json_encode($headline);
	}
?>