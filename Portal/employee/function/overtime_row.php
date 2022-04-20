<?php 
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

		// get id
		$id = $_POST['id'];
    //prepared stmt
		$sql = $conn->prepare("SELECT otr.*,otr.id as otrid,o.overtime_name as otname, o.overtime_rate as otrx FROM overtime_request otr left join overtime o on o.id=otr.overtime_code WHERE otr.id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
    //fetch data
		$query = $sql->get_result();
		$row = $query->fetch_assoc();
		echo json_encode($row);

	} else {
    header('location: ../overtime.php');
  }


?>

