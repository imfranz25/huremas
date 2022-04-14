<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
	require_once 'sendEmail.php';

	if(isset($_POST['add'])){

    //get details
		$employee_id = $_POST['employee_id'];
		$username = $_POST['username'];
		$type = $_POST['type'];

		//creating default password
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$default = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		$default = substr(str_shuffle($default), 0, 15);
		$hashed_password = password_hash($default, PASSWORD_DEFAULT);

    // prepared stmt
		$sql = $conn->prepare("INSERT INTO admin (`employee_id`, `username`, `password`, `default_password`, `type`) VALUES (?,?,?,?,?)");	
		$sql->bind_param('sssss',$employee_id,$username,$hashed_password,$default,$type);

		if($sql->execute()){
		  
      //get email
	    $sql1 = $conn->prepare("SELECT * FROM employees WHERE employee_id=? ");
      $sql1->bind_param('s',$employee_id);
      $sql1->execute();
	    $query = $sql1->get_result();
	    $row = $query->fetch_assoc();
	    
      // compose email
	    $gmail = $row['email'];
	    $subject="Account Created";
	    $message = "Hello!,<br><br>You may now login at : http://huremas-cvsuic.online/Portal  <br>Username: ".$username."<br>Default Password: ".$default." <br><br>Please change your password immediately!";
	    
      //send email
	    $res= sendEmail($gmail,$subject,$message);
		    
			$_SESSION['success'] = $res.' User created successfully';
		}
		else{
			$_SESSION['error'] = "Something went wrong";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../users.php');
?>