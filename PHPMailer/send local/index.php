<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();


$mail->Host = "smtp.gmail.com";

//$mail->isSMTP();


$mail->SMTPAuth = true;

$mail->Username = 'marcosgaad@gmail.com';
$mail->Password = '+U6*X@34AraGA*esPAre';

$mail->SMTPSecure = "ssl";

$mail->Port = 465;

$mail->Subject = 'SMTP email test';


$mail->Body = 'this is some body';



$mail->setFrom('marcosgaad@gmail.com','SB');

$mail->addAddress('marcosgad@yahoo.com');



if ($mail->send()){
	
    echo "Mail sent";

}else{echo "wrong";

}

		 
?>