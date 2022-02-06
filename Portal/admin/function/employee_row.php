<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

    
	if(isset($_POST['id'])){
        

		$id = $_POST['id'];
		$sql = "SELECT *, employees.id as empid FROM employees 
		LEFT JOIN department_category dc ON dc.id=department_id
		LEFT JOIN employment_category ec ON ec.id=category_id
		LEFT JOIN position ON position.id=position_id
		WHERE employees.id = '$id'";
		
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


 

		echo json_encode($row);
        
	}
?>