 <?php 
 include_once("db.php");

 $reqTupe = $_REQUEST['req']; 

 $user =  $_REQUEST['u']; 
 $post =  $_REQUEST['p'];

 $id = $_REQUEST['id'];


if($reqTupe != ''){

      if($reqTupe == 'add') {
        $ins = "INSERT INTO posts (user,postText) VALUES ('$user','$post')";
        $run = mysqli_query($conn, $ins);
    }

    else if($reqTupe == 'del'){

        $del = "DELETE FROM posts WHERE id = $id";
        $run = mysqli_query($conn, $del);
    } else if($reqTupe == 'edit'){

    	$upd = " UPDATE posts SET postText = '$post' WHERE id = '$id' "; 
    	$run = mysqli_query($conn, $upd);
    }

}


 $sel = "SELECT * FROM posts ORDER BY id DESC"; 
 $run = mysqli_query($conn,$sel); 

 while ($rows = mysqli_fetch_assoc($run)) {
 ?> 

 <div class="card-panel post">
        <i class="small material-icons right action" onclick="post('del',<?php echo $rows['id'] ?>)">delete</i>
        <i class="small material-icons right action edit" data-id="<?php echo $rows['id'] ?>">edit</i>
        <h5><?php echo $rows['user'] ?></h5>
        <small><i class="tiny material-icons">query_builder</i><?php echo $rows['time'] ?></small>
        <p>
          <?php echo $rows['postText'] ?>
        </p>
</div> <!-- post -->



<?php } ?> 