<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();





//$mail->isSMTP();
//$mail->Host = 'relay-hosting.secureserver.net';
//$mail->Port = 25;
//$mail->SMTPAuth = false;
//$mail->SMTPSecure = false;

//\$mail->SMTPSecure = 'ssl';
//$mail->Host = 'smtp.gmail.com';
//$mail->Port = 465;
//or more succinctly:
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