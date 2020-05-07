$(document).ready(function(){
  var a ="";
      $('.close').on('click', function(){
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
      });

      $("a").click(function(){
       
        var clase = $(this).attr("class");

        if(clase == "open"){
            a = $(this).attr("id");
            $('#popup').fadeIn('slow');
            $('.popup-overlay').fadeIn('slow');
            $('.popup-overlay').height($(window).height());
            return false;
        }
      })

      $("#borrar").click(function(){
        $.ajax({
          url:"../php/eliminarSocio.php",
          method:"POST",
          data: {a:a},
          cache:"false",
          success: function(data){
            if(data == 1){
              $('#popup').fadeOut('slow');
            $('.popup-overlay').fadeOut('slow');
            location. reload();
            return false;
            
            }
          }
        })
      })
})