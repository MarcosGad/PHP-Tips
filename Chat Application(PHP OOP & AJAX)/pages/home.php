<?php 
session_start(); 
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>Welcame to chatapp</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=decice-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){

			$('#chattext').keyup(function(e){

				if(e.keyCode == 13){

					var chattext = $("#chattext").val(); 
					$.ajax({
						type:'POST',
						url:'insertmessage.php', 
						data:{chattext:chattext}, 
						success:function(){

							$('#chatmessage').load('displaymessages.php');
							$('#chattext').val(""); 
						}
					}); 
				}
			}); 

			setInterval(function(){

				$('#chatmessage').load('displaymessages.php');
				
			},1500); 

			$('#chatmessage').load('displaymessages.php'); 
		}); 


    </script>
</head>
<body>
     <h2>Welcome<span style="color:green"><?php echo $_SESSION['username']; ?></span></h2>
     <h3><a href="../logout.php">LogOut</a></h3>
     <br>
     <div id="chatbig">
    	 <div id="chatmessage">
    	 </div>

    	 <textarea id="chattext" name="chattext"></textarea>
    	 
     </div>


</body>
</html>