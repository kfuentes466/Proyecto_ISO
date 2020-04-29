$(document).ready(function(){
    var pagar = "no";
  
        $('input[type="button"]').click(function(){
          if($(this).val()=="Pagar"){
                var idSocio = $("#idSocio").val();
                var idEmpleado = $("#idEmpleado").val();
                var nombres = $("#nombres").val();
                var numt = $("#numt").val();

                if(pagar =="si"){
                    var idDeuda = $("#idDeuda").val();
                    var montoDeuda = $("#montoDeuda").val();
                    var monto = $("#monto").val();
                    if($.trim(monto).length < 1){
                        $("#resp2").html("<p>Selecciono que el usuario pagara la deuda, pero su pago esta vacio!</p>");
                        $("#monto").focus();
                    }
                }

                if(pagar == "no"){
                    var idDeuda = 0;
                    var montoDeuda = 0;
                    var monto = 0;
                }

                

                if(pagar=="si" && $.trim(idDeuda).length > 0 && $.trim(montoDeuda).length > 0  && $.trim(monto).length >0 || pagar=="no" && idDeuda==0 && montoDeuda==0 && monto==0){
                    $.ajax({
                        url:"../php/ingresoTransaccion.php",
                        method:"POST",
                        data: {idSocio:idSocio, idEmpleado:idEmpleado , idDeuda:idDeuda, monto:monto, montoDeuda:montoDeuda , nombres:nombres, numt:numt},
                        cache:"false",
                        beforeSend: function(){
                          $('#boton').val("Conectanto...");
                        },
                        success: function(data){
                          $("#quitar").remove();
                          $('#muestro').html(data);
                        }
                      })
                }
              }
        })

          if($("input[type='radio']")){
            $("input[type='radio']").change(function(){
          if($(this).val()=="Si"){
            $(".monto").show();
            $("#No").prop("checked",false);
            pagar = "si";
          }
          else{
            $(".monto").hide(); 
            $("#Si").prop("checked",false);
            pagar = "no";
          }
        });

          }
        
})