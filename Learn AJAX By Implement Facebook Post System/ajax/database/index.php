<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database</title>
</head>
<body onload="syaHello()">
   
    your name ? <br>
   <input type="text" id="name"> <br>
<!--
   your age ? <br>
   <input type="text" id="age"> <br>
-->
   <button type="button" id="btn" onclick="syaHello()" >Say Hello</button>
<!--   <p id="txt"></p>-->
  <br>
  <br>
  <br>
   <table border="1">
       <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody id="txt">
           
       </tbody>
   </table>
    
    
    <script>
    
        function syaHello (id) {
            
            var xhr = new XMLHttpRequest();
            
            var name = document.getElementById("name").value;
            //var age  = document.getElementById("age").value;
            
            if(id == undefined) {
                id = '';
            }
            else {
                var a = window.confirm("are you sure ?!");
                if(a == false) {
                    id = '';
                }
            }
            
            xhr.onreadystatechange = function() {
                
                if(xhr.readyState == 4 && xhr.status == 200 ) {
                    document.getElementById("txt").innerHTML = xhr.responseText;
                    document.getElementById("name").value = "";
                }
                
            }
            
            xhr.open("GET", "server.php?id="+id+"&n="+name, true);
            //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send();
            
            return false;
        }
    
    </script>
</body>
</html>