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
      $sql1 = $conn->prepare("UPDATE schedules SET isCheck='1' WHERE id = ? AND employee_id=? ");
      $sql1->bind_param('ss',$eid,$id_param);
      for ($i=0; $i < count($id); $i++) { 
        $id_param = $id[$i];
        $sql1->execute();
      }
			$_SESSION['success'] = 'Schedule updated successfully';
		}

	}else{
    
  }
?>