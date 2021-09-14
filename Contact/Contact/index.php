<?php 

  // check if user coming from A Request 

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      // Assign Variables    // hn3ml hmia ll 7kol da lakn mash moham l2na al 7gta da htro7a lla mail 
      
      $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING); 
      $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
      $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT); 
      $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING); 
      
      
    
      /* echo $user . '<br>'; 
       echo $mail . '<br>'; 
       echo $cell . '<br>'; 
       echo $msg  . '<br>'; /* a5tbar al filter */ 
      
      
      // creating Array of Errors 
      
      $formErrors = array(); 
      
      if (strlen($user) < 3){
          
          $formErrors[] = 'username must be larger than <strong>3</strong> character'; // b7ota 3onsr 5t2a goa al array 
          
      }
      
      if (strlen($msg) < 10){
          
          $formErrors[] = 'Message Can\'t be Less than <strong>10</strong> character' ; // b7ota 3onsr 5t2a goa al array 
          
      }
      
      
      // if no Errors Send the Email [mail(to , subject , message, headers, parameters)]
      
      $headers = 'From: ' . $mail . '\r\n'; 
      $myEmail = 'marcosgad@yahoo.com'; 
      $subject = 'Contact Form'; 
      
      if(empty($formErrors)) {
          
          mail($myEmail, $subject, $msg, $headers);
          
          // b3d nga7 al send fdya al 7kol
          
          $user =''; 
          $mail ='';
          $cell ='';
          $msg ='';
          
          $success = '<div class="alert alert-success">We Have Recieved Your Message</div>'; 
          
      }
      
      
  }
            
      /*echo $_POST['username'] . '<br>';
      echo $_POST['email'] . '<br>';
      echo $_POST['cellphone'] . '<br>';
      echo $_POST['message'] . '<br>'; /*w da ll t2kda mn anha gya mn al post */



?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <!-- ie compatibility meta--> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- first mobile meta --> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700,900">
        <!-- nt5la 3la CUSTOMIZE w nzoda b3d al option --> 


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        
        <!-- start form --> 
        
        <div class="container">
                <h1 class="text-center">Contact Me</h1>
            
             
            
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <!-- $_SERVER['PHP_SELF'] 3ashn enfza al php aly f nfsa al page --> 
                <!-- w use post 3ashn mezhrsh al link mash GET --> 
                
                  
                      
                  <?php  if (! empty($formErrors)) { ?>  <!-- lo hya fady empty kaml 3ady --> 
                      
                    <!-- ft7na php w 2fln php da 3ashn tnsek BS Alerts --> 
                      
                  <div class="alert alert-danger alert-dismissible" role="start">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                  <?php 
                       
                   foreach($formErrors as $error){ // ntb3a al errors ale fa al array lo mafsh error mtatb3ash 
                       
                       echo $error . '<br />'; 
                       
                   }
    
                   ?> 
                  </div>
                
                <?php   }   ?>  <!-- 2flta al if al 2ola --> 
                    
            <?php if (isset($success)) { echo $success; } ?>   <!-- lo al send ng7a betb3a al msg -->  
               
              <div class="form-group">
              <input class="form-control username" type="text" name="username" placeholder="Your Username" value="<?php if(isset($user)) {echo $user;} ?>"/>
              <i class="fa fa-user fa-fw"></i>
              <span class="asterisx">*</span>
              <div class="alert alert-danger custom-alert">
                  
                  username must be larger than <strong>3</strong> character
                  
              </div>
              </div>
                
                
              <div class="form-group">
              <input class="form-control email" type="email" name="email" placeholder="Your Email"
              value="<?php if(isset($mail)) {echo $mail;} ?>"/>
                 <i class="fa fa-envelope fa-fw"></i>
                 <span class="asterisx">*</span>
                   <div class="alert alert-danger custom-alert">
                  
                 Email Can't Be <strong>Empty</strong> 
                  
              </div>
               </div>
                
                
             
              <input class="form-control" type="text" name="cellphone" placeholder="Your Cell Phone " value="<?php if(isset($cell)) {echo $cell;} ?>"/>
                <i class="fa fa-phone fa-fw"></i>
              
                
              <div class="form-group">
              <textarea class="form-control message" name="message" placeholder="Your Message!" ><?php if(isset($msg)) {echo $msg;} ?></textarea>
               <span class="asterisx">*</span>
              <div class="alert alert-danger custom-alert">
                  
                 Message Can't be Less than <strong>10</strong> character
                  
              </div>
              </div>
              
              
                
                
                
              <input class="btn btn-success" type="submit" value="Send Message" /> 
               <i class="fa fa-send fa-fw send-icon"></i>
            
            </form>
        
        </div>
        
        <!-- end form -->
    
        
        
        
        
        
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
    </body>
</html>
