

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajax JQ</title>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script>
      $(function(){

          $("#add").click(function(){

              var dataSer = $("#form").serialize(); 

              $.ajax({

                url:'test.php',
                type:'POST',
                data:dataSer,
                beforeSend: function() {
                  $(".alert").html("<img src='ounq1mw5kdxy.gif' width='50px' height='50px'>"); 
                },
                success:function(data){

                    $(".alert").html(data); 
                },


              }); 

                return false; 

          }); 



      }); 
  </script>
  
</head>
<body>

<div class="alert"></div>
<br>

   <form id="form">
     username: <input type="text" name="user" /><br><br>
     password: <input type="text" name="pass" /><br><br>
     <input type="submit" id="add" value="send">
   </form> 
    
</body>
</html>