<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();


$mail->Host = 'ssl://smtp.gmail.com:465'; 


$mail->SMTPAuth = true;

$mail->Username = 'marcosgaad@gmail.com';
$mail->Password = '+U6*X@34AraGA*esPAre';


$mail->Subject = 'testtesttesttesttest';


$mail->Body = 'testtesttesttesttest';



$mail->setFrom('marcosgaad@gmail.com','testtesttesttesttest');

$mail->addAddress('marcosgad@yahoo.com');



if ($mail->send()){
	
    echo "Mail sent";

}else{echo "wrong";

}

		 
?>