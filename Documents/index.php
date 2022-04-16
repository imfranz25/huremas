<style>
	body{
		padding: 0;
		margin: 0;
	}
</style>

<?php 
  require_once '../Portal/includes/path.php';
	require_once '../Portal/admin/includes/session.php';

	$valid = false;
	$isImage = false;

	if ($_GET['document_id']) {
		$document_id = $_GET['document_id'];
		$sql ="SELECT * FROM documents WHERE document_archive=0 ";
		$query=$conn->query($sql);
		while ($row=$query->fetch_assoc()) {
			if (password_verify($row['document_id'],$document_id)) {
				$ext = '.'.pathinfo($row['document_file'])['extension'];
				$link = $row['document_id'].$ext;
				$image = array(".jpg", ".jpeg", ".png");    
				if(in_array($ext, $image)){
					$isImage = true;
				}
				if ($row['document_status']==1) {
					if(isset($_SESSION['id'])){
					  if ($_SESSION['type'] == 'admin') {$valid=true;}   
					}
				}else{$valid=true;}
				break;
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
		<iframe src="<?php echo $link; ?>" scrolling="no" frameBorder="0" style="margin: 0;padding: 0;width: 100%;height:100vh;"></iframe>
	<?php }
	}else{
		header('location:../Home/index.php');
	}

?>