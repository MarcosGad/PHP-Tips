<!DOCTYPE html>
<html>
<head>
	<title>Ajax Upload file</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstraprtl.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<style>

.navbar{
		border-radius: 0;
	}	
.login{

	width: 300px;

	margin: 100px auto;
}

.login h4{
	color: #888;
}

.login input{

	margin-bottom: 10px;

}

.login .form-control{
	background-color: #eaeaea;
}

.login .btn{

background-color: #008dde;

}


</style>

<?php

include 'connect.php';

session_start();

if(isset($_SESSION['username'])){

	header('location:add-post.php');//redirect to dashboard page
}


//check if user coming from http post request


if($_SERVER['REQUEST_METHOD'] == 'POST'){


	$username=$_POST['user'];


	$password=$_POST['pass'];


	$hashpass=sha1($password);

	//check if the user exist in database


	$stmt=$con->prepare("select 
							            userid,username,password 


								from


										users


							    where 


										username=?


								and 


										password=?

								and 


								        groupid=1


										limit 1");


	$stmt->execute(array($username,$hashpass));


	$row=$stmt->fetch();


	$count=$stmt->rowCount();


	//if count>0 this mean the database contain record about this username


	if($count>0){





		print_r($row);





		$_SESSION['username']=$username;//register session name





		$_SESSION['id']=$row['userid'];//register session id





		header('location:add-post.php');//redirect to dashboard page





		exit();





	}





}





?>





<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">





<h4 class="text-center">تسجيل الدخول</h4>





<input type="text" class="form-control" name="user" placeholder="الاسم" autocomplete="off" />





<input type="password" class="form-control" name="pass" placeholder="كلمة السر" autocomplete="new-password" />





<input class="btn btn-primary btn-block" type="submit" value="دخول" />



</form>

</body>
</html>