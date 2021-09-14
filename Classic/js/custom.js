/*global $, alert, console*/ 

$(function () {
    'use strict';
    
    // header hight 
    
    var myheader = $('.header'); 
     
    myheader.height($(window).height()); 
    
    $(window).resize(function(){
        
        myheader.height($(window).height());
    }); 
    
    // add active navbar 
    
    $('.links li a').click(function(){
        $(this).parent().addClass('active').siblings().removeClass('active'); 
        
    }); 
    
    
    // BX slider 
    
        /*$('.bxslider').bxSlider({
        pager: false // l2l5a2 al no2at 
    });*/
    
    
    // smooth scroll to div 
    
    $('.links li a').click(function(){
        
        $('html , body').animate({
            
            scrollTop: $('#' + $(this).data('value')).offset().top // $(  ) asma al dav ale lma adosa 3la yro7a lmkno 
            
        }, 1000); 
        
        console.log('#' + $(this).data('value')); 
                
    }); 
    
    // my slider w 3ashn t5la sh9la 3ltoll a3ml fun btsht9la lw7di7a
    
    (function autoSlider() {
        
        $('.slider .active').each(function(){
            
            if(!$(this).is(':last-child')) {
                
                $(this).delay(3000).fadeOut(1000, function () {
                    
                    $(this).removeClass('active').next().addClass('active').fadeIn(); 
                    
                    autoSlider(); 
                    
                }); 
                
            } else{
                
                $(this).delay(3000).fadeOut(1000 , function(){
                    
                    $(this).removeClass('active'); 
                    
                    $('.slider div').eq(0).addClass('active').fadeIn(); 
                    
                    autoSlider();
                }); 
            }
            
        }); 
        
    }()); 
    
    
    // tsh9el al shufal momkn nshof al option mn al mok3a {} 
    
var mixer = mixitup("#Container");
    
    
    
}); 



