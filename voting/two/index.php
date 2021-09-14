<?php 
	// connect to the database
	//$con = mysqli_connect('localhost', 'root', '', 'likee');
     include'connect.php'; 

	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
        $stmt=$con->prepare("SELECT * FROM posts WHERE id=$postid");
        $stmt->execute();
	    $rows=$stmt->fetchall(); 
        foreach($rows as $row ) {
		$n = $row['likes'];
        }
		$stmt=$con->prepare("INSERT INTO likes (userid, postid) VALUES (2, $postid)");
        $stmt->execute();
		$stmt=$con->prepare("UPDATE posts SET likes=$n+1 WHERE id=$postid");
        $stmt->execute();
        
		echo $n+1;
		exit();
	}

	if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
		$stmt=$con->prepare("SELECT * FROM posts WHERE id=$postid");
        $stmt->execute();
		$rows = $stmt->fetchall();
        foreach($rows as $row ) {
		$n = $row['likes'];
        }

		$stmt=$con->prepare("DELETE FROM likes WHERE postid=$postid AND userid=2");
        $stmt->execute();
		$stmt=$con->prepare("UPDATE posts SET likes=$n-1 WHERE id=$postid");
        $stmt->execute();
		
		echo $n-1;
		exit();
	}

	// Retrieve posts from the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Like and unlike system</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<!-- display posts gotten from the database  -->
		<?php 
    
        	$posts = $stmt=$con->prepare("SELECT * FROM posts");
    
            $stmt->execute();


	        $rows=$stmt->fetchall(); 
 	
            foreach($rows as $row ) { ?>

			<div class="post">
				<?php echo $row['text']; ?>

				<div style="padding: 2px; margin-top: 5px;">
				<?php 
					// determine if user has already liked this post
					$stmt=$con->prepare("SELECT * FROM likes WHERE userid=2 AND postid=".$row['id']."");
                     $stmt->execute();
	                 $rows=$stmt->fetchall(); 


					if ($stmt->rowCount() == 1 ): ?>
                    
						<!-- user already likes post -->
						<span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
						<span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
					<?php else: ?>
						<!-- user has not yet liked post -->
						<span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
						<span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
					<?php endif ?>

					<span class="likes_count"><?php echo $row['likes']; ?> likes</span>
				</div>
			</div>

		<?php } ?>


<!-- Add Jquery to page -->
<script src="jquery-3.2.1.min.js"></script>
<script>
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});
</script>
</body>
</html>