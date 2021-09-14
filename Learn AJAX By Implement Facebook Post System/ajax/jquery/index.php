<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jQuery Ajax</title>
</head>
<body>
   Your Name : <input type="text" id="name"> <br>
   Your Age : <input type="text" id="age" > <br>
    <button type="button">Say Hello</button>
    <p></p>
    
    
    <script src="jquery-3.1.1.min.js"></script>
    <script>
        
        $("button").click(function() {
            var name = $("#name").val();
            var age  = $("#age ").val();
            //alert(name+" "+age);
            
//            $.ajax({
//                url: "server.php",
//                type: "POST",
//                data: {
//                    n: name,
//                    a: age
//                }
//            }).done(function(aa) {
//                $("p").html( aa );
//                $("#name").val("");
//                $("#age ").val("");
//            }).fail(function() {
//                alert("Error");
//            })
            
                $.post("server.php",
               {
                    n: name,
                    a: age
                }).done(function(e){
                    $("p").html(e);
                    $("#name").val("");
                    $("#age ").val("");}
                )
        })
        
    </script>
</body>
</html>