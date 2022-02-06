<?php

require_once ("../PHPMailer/autoload.php");


function sendEmail($gmail,$subject,$message){

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();

$mail->SMTPDebug = 0;
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; 

$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'dailysurg1001@gmail.com';
$mail->Password = 'frewgod2956';

$mail->SetFrom('syratech@huremas-cvsuic.online');
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($gmail);
$mail->Send();

$res="";
if($mail->Send()){
    $res = "An e-mail has been sent to ".$gmail." ,";
}else{
    $res = "Failed to send an e-mail to ".$gmail." ,";
    
}

return $res;


}

?>

