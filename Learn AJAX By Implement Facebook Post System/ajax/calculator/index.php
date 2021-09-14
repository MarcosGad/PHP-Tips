<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
   
  No #1 : <input type="text" id="no1"> <br>
  No #2 : <input type="text" id="no2"> <br> 
  <button type="button" onclick="calc('add')">+</button>    
  <button type="button" onclick="calc('sub')">-</button>    
  <button type="button" onclick="calc('mult')">*</button>    
  <button type="button" onclick="calc('div')">/</button>  <br> <br> 
  Result : <span id="result"></span>     
    
    <script>
    
        function calc (reqType) {
            
            var xhr = new XMLHttpRequest();
            
            var no1 = document.getElementById("no1").value;
            var no2 = document.getElementById("no2").value;
            
            xhr.onreadystatechange = function() {
                
                if(xhr.readyState == 4 && xhr.status == 200 ) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
                
            }
            
            xhr.open("GET", "server.php?req="+reqType+"&n1="+no1+"&n2="+no2, true);
            //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send();
        }
    
    </script>
</body>
</html>