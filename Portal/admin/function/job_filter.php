<?php
	include '../includes/session.php';

	if(isset($_GET['filter'])){
		$filter = trim($_GET['filter']);
		$_SESSION['filter'] = $filter;
		echo json_encode($_SESSION['filter']);
	}

?>