<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_GET['filter'])){
		$filter = trim($_GET['filter']);
		$_SESSION['filter'] = $filter;
		echo json_encode($_SESSION['filter']);
	}else{
    header('location: ../applicant.php');
  }

?>