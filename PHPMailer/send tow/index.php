<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();






$mail->Host = 'ssl://relay-hosting.secureserver.net:25'; 


$mail->SMTPAuth = true;

$mail->Username = 'Info@kolsha.com';
$mail->Password = 'y#Gera3r7Che';


$mail->Subject = 'SMTP email test';


$mail->Body = 'this is some body';



$mail->setFrom('Info@kolsha.com','testgodady');

$mail->addAddress('marcosgad@yahoo.com');



if ($mail->send()){
	
    echo "Mail sent";

}else{echo "wrong";

}

		 
?>