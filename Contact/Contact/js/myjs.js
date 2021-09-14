/*global $, alert, console*/

$(function () {
    
    'use strict';
    
    var userErrors = true,
        
        emailErrors = true,
        
        msgErrors = true; 
    
    /*function checkErrors () {// w ana h3ml fun 3ashn check 3la userErrors  emailErrors  msgErrors= true
        
        if(userErrors === true || emailErrors === true || msgErrors === true) {
            
            //console.log("bad") 
            
        }else {
            
            //console.log("good")
            
        }
        
    }*/
    
    
   // checkErrors (); // 3ashn 2ola ma abd2a tsht9la al fun 
    
    
    
    
    $('.username').blur(function (){ // 2ola ma tb3da 
        
        if($(this).val().length < 4) { // al7rofa tkon a2la mn 4 w hyd2 yzhra rslta al erro tb3n btrtyb
            
            $(this).css('border', '1px solid #F00'); // border al 7kla nfso 
            
            $(this).parent().find('.custom-alert').fadeIn(200); 
            
            $(this).parent().find('.asterisx').fadeIn(100); 
            
            userErrors = true; 
            
        }else{ // whna 3ashn lma yrg3a ysl7a al erro 
            
             $(this).css('border', '1px solid #080');
            
             $(this).parent().find('.custom-alert').fadeOut(200); 
            
             $(this).parent().find('.asterisx').fadeOut(100); 
            
            userErrors = false;
            
        } 
        
        
       // checkErrors (); 
        
    }); 
    
    
    
    $('.email').blur(function (){ // 2ola ma tb3da 
        
        if($(this).val() === '') { // lo fadya w hyd2 yzhra rslta al erro tb3n btrtyb
            
            $(this).css('border', '1px solid #F00'); // border al 7kla nfso 
            
            $(this).parent().find('.custom-alert').fadeIn(200); 
            
            $(this).parent().find('.asterisx').fadeIn(100); 
            
             emailErrors = true;
            
        }else{ // whna 3ashn lma yrg3a ysl7a al erro 
            
             $(this).css('border', '1px solid #080');
            
             $(this).parent().find('.custom-alert').fadeOut(200); 
            
             $(this).parent().find('.asterisx').fadeOut(100); 
            
             emailErrors = false;
            
        } 
        
       // checkErrors (); 
        
    });
    
    
     $('.message').blur(function (){ // 2ola ma tb3da 
        
        if($(this).val().length < 10) { // al7rofa tkon a2la mn 10 w hyd2 yzhra rslta al erro tb3n btrtyb
            
            $(this).css('border', '1px solid #F00'); // border al 7kla nfso 
            
            $(this).parent().find('.custom-alert').fadeIn(200); 
            
            $(this).parent().find('.asterisx').fadeIn(100); 
            
             msgErrors = true;
            
        }else{ // whna 3ashn lma yrg3a ysl7a al erro 
            
             $(this).css('border', '1px solid #080');
            
             $(this).parent().find('.custom-alert').fadeOut(200); 
            
             $(this).parent().find('.asterisx').fadeOut(100); 
            
             msgErrors = false;
            
        } 
         
         //checkErrors (); 
        
    });
    
    
    // submit btn 
    
    $('.contact-form').submit(function (e) { // w hn b2ol lo al 7kola mash mktob s7 w fyha errors bad
        
        if(userErrors === true || emailErrors === true || msgErrors === true) {
            
             e.preventDefault(); // hemn3a w zftha mash hyb3ta al form 
            
             $('.username , .email , .message').blur(); // ezhrlo 3ashn e2olo f erro 
            
        } else {
            
            
            // lo 9er kd eb3ta al form 3ady 
            
            
        }
        
    }); 

    
}); 