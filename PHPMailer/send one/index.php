<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();


$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
//or more succinctly:
$mail->Host = 'ssl://smtp.gmail.com:465'; 


$mail->SMTPAuth = true;

$mail->Username = 'marcosgaad@gmail.com';
$mail->Password = '';


$mail->Subject = 'SMTP email test';


$mail->Body = 'this is some body';



$mail->setFrom('marcosgaad@gmail.com','SB');

$mail->addAddress('marcosgad@yahoo.com');



if ($mail->send()){
	
    echo "Mail sent";

}else{echo "wrong";

}

		 
?>