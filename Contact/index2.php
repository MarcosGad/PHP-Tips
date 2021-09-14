<?php 

  // check if user coming from A Request 

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      // Assign Variables    // hn3ml hmia ll 7kol da lakn mash moham l2na al 7gta da htro7a lla mail 
      
      $user = $_POST['username']; 
      $mail = $_POST['email']; 
      $cell = $_POST['cellphone']; 
      $msg  = $_POST['message']; 
      $userError = '';
      $msgError = '';
      
      if (strlen($user) <= 3){
          
          $userError = 'username must be larger than 3 character'; // b3mla $userError 3ashn atb3a fa al 7ta aly ana 3ezha w htkon t7ta al 7kla 
          
      }
      
      if (strlen($msg) < 10){
          
          $msgError = 'Message Can\'t be Less than 10 character' ; //  b3mla $msgError 3ashn atb3a fa al 7ta aly ana 3ezha w htkon t7ta al 7kla 
          
          
      }
      
      
      
      /*
      // creating Array of Errors 
      
      $formErrors = array(); 
      
      if (strlen($user) < 3){
          
          $formErrors[] = 'username must be larger than 3 character'; // b7ota 3onsr 5t2a goa al array 
          
      }
      
      if (strlen($msg) < 10){
          
          $formErrors[] = 'Message Can\'t be Less than 10 character' ; // b7ota 3onsr 5t2a goa al array 
          
      }
      */ 
      
  }
      
      
      
      
      
      
      
     /* echo $_POST['username'] . '<br>';
      echo $_POST['email'] . '<br>';
      echo $_POST['cellphone'] . '<br>';
      echo $_POST['message'] . '<br>'; w da ll t2kda mn anha gya mn al post */ 



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
            
               <div class="errors">
                <?php
                   /*
                   if (isset($formErrors)) { // lo mogwod w moham erro
                       
                   foreach($formErrors as $error){    // ntb3a al errors ale fa al array lo mafsh error mtatb3ash 
                       
                       echo $error . '<br />'; 
                       
                   }
                       
                   }
                   */ 
                   
                ?> 
               </div>
            
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <!-- $_SERVER['PHP_SELF'] 3ashn enfza al php aly f nfsa al page --> 
                <!-- w use post 3ashn mezhrsh al link mash GET --> 
    
              <input class="form-control" type="text" name="username" placeholder="Your Username"/>
              <i class="fa fa-user fa-fw"></i>  
              
                <?php
                  if (isset($userError)) {
                      
                      echo $userError; 
                  }
                
                ?> 
                
                
              <input class="form-control" type="email" name="email" placeholder="Your Email"/>
                 <i class="fa fa-envelope fa-fw"></i>
                
                
              <input class="form-control" type="text" name="cellphone" placeholder="Your Cell Phone "/>
                <i class="fa fa-phone fa-fw"></i>
                
                
              <textarea class="form-control" name="message" placeholder="Your Message!" ></textarea>
                
                 <?php
                  if (isset($msgError)) {
                      
                    echo $msgError; 
                  }
                
                ?>
                
                
              <input class="btn btn-success" type="submit" value="Send Message" /> 
               <i class="fa fa-send fa-fw send-icon"></i>
            
            </form>
        
        
        
        
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- end form -->
    
        
        
        
        
        
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </body>
</html>
