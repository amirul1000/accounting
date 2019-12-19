$(document).ready(function() { 
  $("#menu .tt").addClass("JSCheck");
  $('.JSCheck').hover(  
    function() {  
      $(this).addClass('popup');  
    },  
    function() {  
      $(this).removeClass('popup');  
    }  
  );  
}); 


