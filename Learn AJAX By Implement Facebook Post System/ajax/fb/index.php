<?php
include_once("db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Post System</title>
     
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="blue lighten-1" onload="post()">
   
   <div class="container">
       <div class="row">
           <div class="col m10 offset-m1">
               <h2 class="center white-text">Facebook Post System</h2>
               
               <div class="card-panel">
                   <form>
                       <div class="input-field">
                           <label for="post-text">Write something here</label>
                           <textarea id="post-text" onkeyup="check()" class="materialize-textarea"></textarea>
                       </div>
                       <input type="submit" id="post-btn" class="btn blue darken-3" value="Post" onclick="post('add')" disabled>
                   </form>
               </div> <!-- /.card-panel -->
               <br>
               
               <div id="posts-container">
                  
                   
                   
                   
               </div> <!-- /#posts-container -->
               
           </div> <!-- /.col -->
       </div> <!-- /.row -->
   </div> <!-- /.container -->
   
   
   
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <form>
               <div class="input-field">
                   <textarea id="edit-post-text" onkeyup="check()" autofocus class="materialize-textarea"></textarea>
               </div>
               <input type="submit" id="edit-post-btn" class="btn blue darken-3 modal-close" value="Edit" onclick="post('edit')">
               <input type="hidden" id="post-id">
           </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
    </div>
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        
        
        $(document).ready(function(){
            $('.modal').modal();
            
//            $(".edit").click(function(){
//                $('#modal1').modal('open');
//            })
            $("#posts-container").on("click",".edit", function(){
                $('#modal1').modal('open');
                $("#post-id").val($(this).data("id"));
                $("#edit-post-text").val( $(this).siblings("p").text() );
            })
            
        });
        
        
        
        function check(){
            if(document.getElementById("post-text").value != ""){
                document.getElementById("post-btn").removeAttribute("disabled");
            }else {
                document.getElementById("post-btn").setAttribute("disabled","disabled");
            }
        }
        
        function post(reqType, id) {
            
            var user = "Mohammed Naji";
            var post = document.getElementById("post-text").value;
            
            var xhr = new XMLHttpRequest();
            
            if(reqType == undefined && id == undefined){
                reqType = '';
                id = '';
            }else if (reqType == 'add') {
                id = '';
            }else if (reqType == 'del') {
                var a = window.confirm("are you sure ?!");
                if(a == false) {
                    id = '';
                }
            }else if (reqType == 'edit') {
                post = document.getElementById("edit-post-text").value;
                id   = document.getElementById("post-id").value;
            }
            
            xhr.onreadystatechange = function() {
                
                if(xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("posts-container").innerHTML = xhr.responseText;
                    document.getElementById("post-text").value = "";
                }
                
            }
            
            xhr.open("GET","server.php?req="+reqType+"&id="+id+"&u="+user+"&p="+post,"true");
            xhr.send();
        }
    
        $("form").submit(function(a){
            a.preventDefault();
        })
        
    </script>
</body>
</html>