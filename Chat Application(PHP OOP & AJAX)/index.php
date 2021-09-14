<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>Welcame to chatapp</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=decice-width, initial-scale=1">
</head>
<body>

	<div class="login" id="loginDIV">
		<h2>Login Form</h2>
		<form method="post" action="pages/userlogin.php">
			<table>
				<tr>
					<td>Email:</td><td><input type="email" name="UserMailLogin" autocomplete="new"></td>
				</tr>
				<tr>
					<td>Password:</td><td><input type="Password" name="UserPasswordLogin" autocomplete="new-password"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" value="Login"></td>
				</tr>
				<?php 

					if(isset($_GET['error'])){

				?> 

                    <tr>
						<td></td><td><span style="color:red">Error Login</span></td>
				   </tr>

				<?php } ?>

			</table>
		</form>
	</div>

       
       <br><br><br>


	<div class="singup" id="singupDIV">
		<h2>SignUp Form</h2>
		<form method="post" action="pages/insertuser.php">
			<table>
				<tr>
					<td>Your Name:</td><td><input type="text" name="UserName" autocomplete="new"></td>

				</tr>
				<tr>
					<td>Your Email:</td><td><input type="email" name="UserMail" autocomplete="new"></td>

				</tr>
				<tr>
					<td>Your Password:</td><td><input type="Password" name="UserPassword" autocomplete="new-password"></td>

				</tr>

				<tr>
					<td></td><td><input type="submit" value="submit"></td>

				</tr>

				<?php 
				if(isset($_GET['success'])){ // get 3ashn ngeba al url 
				?> 

				<tr>
					<td></td><td><span style="color:green">User Inserted</span></td>

				</tr>

				<?php } ?> 

				
			</table>
		</form>
	</div>

</body>
</html>