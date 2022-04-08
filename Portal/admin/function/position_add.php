<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

		// prepared stmt
		$sql = $conn->prepare("INSERT INTO position (description, rate,type,grade,step) VALUES (?,?,?,?,?)");
    $sql->bind_param('sssss',$title,$rate,$type,$grade,$step);

    // get values
    $title = addslashes($_POST['title']);
    $rate = $_POST['rate'];
    $type = $_POST['type'];
    $grade = $_POST['sslx'];
    $step = $_POST['step'];

		if($sql->execute()){
			$_SESSION['success'] = 'Designation added successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../position.php');

?>