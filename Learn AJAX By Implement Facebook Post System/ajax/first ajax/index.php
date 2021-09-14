<?php
if(isset($_REQUEST['n']) && isset($_REQUEST['a'])){
$name = $_REQUEST['n'];
$age  = $_REQUEST['a'];

echo "Hello " . $name . " Your age is " . $age;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Ajax</title>
</head>
<body>
   
    your name ? <br>
   <input type="text" id="name"> <br>
   your age ? <br>
   <input type="text" id="age"> <br>
   <button type="button" id="btn" onclick="syaHello()" >Say Hello</button>
   <p id="txt"></p>
    
    
    <script>
    
        function syaHello () {
            
            var xhr = new XMLHttpRequest();
            
            var name = document.getElementById("name").value;
            var age  = document.getElementById("age").value;
            
            xhr.onreadystatechange = function() {
                
                if(xhr.readyState == 4 && xhr.status == 200 ) {
                    document.getElementById("txt").innerHTML = xhr.responseText;
                }
                
            }
            
            xhr.open("POST", "index.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("n="+name+"&a="+age);
        }
    
    </script>
</body>
</html>