<style>
	body{
		padding: 0;
		margin: 0;
	}
</style>
<?php 

	session_start();
	include '../../Database/conn.php';

	$valid = false;
	$isImage = false;

	
	if (isset($_SESSION['id']) && isset($_GET['reference_id'])) {
		$id=$_SESSION['id'];
		$type = $_SESSION['type'];
		if ($_GET['reference_id']) {
			$reference_id = $_GET['reference_id'];
			$sql ="SELECT * FROM document_request ";
			$query=$conn->query($sql);
			while ($row=$query->fetch_assoc()) {
				if (password_verify($row['reference_id'],$reference_id)) {
					// EITHER THE ADMIN OR THE SPECIFIC EMPLOYEE CAN ACCESS THE REQUEST FILE
					if ($row['employee_id']==$id || $type=='admin') {
						$ext = '.'.pathinfo($row['request_file'])['extension'];
						$link = $row['reference_id'].$ext;
						$image = array(".jpg", ".jpeg", ".png");    
						if(in_array($ext, $image)){
							$isImage = true;
						}
						$valid=true;
					}
					break;
				}
			}
		}
	}

	

	if ($valid) {
		if ($isImage) {
	?>
		<img src="<?php echo $link; ?>" style="width: 100%;height: 100vh;">
	<?php
		}else{
	?>
		<iframe src="<?php echo $link; ?>" scrolling="no" frameBorder="0" style="margin: 0;padding: 0; width: 100%; height:100vh"></iframe>
	<?php }
	}else{
		header('location:../../Home/index.php');
	}

?>