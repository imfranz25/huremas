<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['datas'])){
    //get sched details
		$id = $_POST['datas'];
		$eid = $_POST['id'];

    //reset preapred stmt
		$sql = $conn->prepare("UPDATE schedules SET isCheck='0' WHERE employee_id=? ");
    $sql->bind_param('s',$eid);

		if($sql->execute()){
      //prepare stmt for updating new records for scheds
      $update = $conn->prepare("UPDATE schedules SET isCheck='1' WHERE id = ? AND employee_id= ? ");
      $update->bind_param('ss',$id_param,$eid);
      //execute via loop
      for ($i=0; $i < count($id); $i++) { 
        $id_param = $id[$i];
        $update->execute();
      }
			$_SESSION['success'] = 'Schedule updated successfully';
		}else{
      $_SESSION['error'] = 'Something went wrong, please try again';
    }

	}else{
    header('location:schedule.php');
  }
?>