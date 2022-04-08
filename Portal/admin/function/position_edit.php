<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    // get details
		$id = $_POST['id'];	
		$title = addslashes($_POST['title']);
		$rate = $_POST['rate'];
		$type = $_POST['type'];
		$grade = $_POST['sslx2'];
		$step = $_POST['step2'];
		$res = ($type!='Contractual (CNT)') ? 2: 1;

		$sql = $conn->prepare("UPDATE position SET description = ?, rate = ?, grade = ?,step =?, type = ? WHERE id = ? ");
    $sql->bind_param('ssssss',$title,$rate,$grade,$step,$res,$id);

		if($sql->execute()){
			$_SESSION['success'] = 'Designation updated successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../position.php');

?>