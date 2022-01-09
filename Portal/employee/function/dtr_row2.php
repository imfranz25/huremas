<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$progress = $conn->query("SELECT * FROM attendance_correction where attendance_id = '$id' order by unix_timestamp(date_created) desc ");

		
		$rows=array();

		if($progress->num_rows > 0){
              while($row = $progress->fetch_assoc()){
              	array_push($rows,$row);
              }
		}
		echo json_encode($rows);
	}



?>

