$(document).ready(function(){
    
    
    var myLanguage = {
        errorTitle: 'يوجد أخطاء',
        
    };
    
    
   // $.validate();
    
    
    $.validate({
        
       form : '#form-add-post', // a7dad al form aly 3lyha al validate
        
       language : myLanguage, // nas w l9ta ktabta al Message
        
       modules : 'file , security', // ho a7dar mlfa w module file 3nd 3mla validate al file wa security 3ashn al password
        
       errorMessagePosition: 'top',    // mkan zhora al Message
        
       validateOnBlur : false, // al9ya al Message aly t7t al input 
        
  
    });
    
}); 




