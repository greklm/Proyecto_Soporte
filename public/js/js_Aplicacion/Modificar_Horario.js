$("#btn_Modificar_Horario").click(function(event){
   var Id_Usuario_Modificar = $('#Select_Usuario_Horario').val();

   $.get(Nombre_Dominio+'/Recuperar_Horario',{Id_Usuario:Id_Usuario_Modificar},function(data){

          $.fn.Limpiar_Horario();
          if((data!='')&&(data!=null))
          {
            for(var i=0;i<data.length;i++)
            {
              var Dia = data[i]['DIA'];
              var Hora_Entrada = parseInt(data[i]['HORA_ENTRADA'].substring(0,2));
              $("#"+Hora_Entrada+"-"+Dia).text("Seleccionado");
              $("#"+Hora_Entrada+"-"+Dia).css('backgroundColor', '#1C6292');
            }
          }
        });

    $('#Mo_Modificar_Horario').modal({
    show:'true'
    });
});

$('#Select_Usuario_Horario').on('change', function() {

 var Id_Usuario_Modificar = $(this).val();
    $.get(Nombre_Dominio+'/Recuperar_Horario',{Id_Usuario:Id_Usuario_Modificar},function(data){

      $.fn.Limpiar_Horario();
      if((data!='')&&(data!=null))
      {
          for(var i=0;i<data.length;i++)
          {
            var Dia = data[i]['DIA'];
            var Hora_Entrada = parseInt(data[i]['HORA_ENTRADA'].substring(0,2));
            $("#"+Hora_Entrada+"-"+Dia).text("Seleccionado");
            $("#"+Hora_Entrada+"-"+Dia).css('backgroundColor', '#1C6292');
          }
      }
    });
})


$.fn.Limpiar_Horario = function(){
      $("#Tbody_Horario").find("td").each(function() {
          if($(this).text() ==='Seleccionado'){
            $(this).css('backgroundColor', '#A8D5F2');
            $(this).text('');
          }
        });
  }


  $(".Hora").click(function(event){

    if($(this).css('backgroundColor').replace(/\s+/g, '') ==='rgb(168,213,242)'){
        $(this).css('backgroundColor', '#1C6292');
        $(this).text('Seleccionado');
    }else {
        $(this).css('backgroundColor', '#A8D5F2');
        $(this).text('');
    }
  });

$('#btn_Guardar_Horario').click(function(event){
  var Arreglo_Horarios = [];
  $("#Tbody_Horario").find("td").each(function() {
    if($(this).text() ==='Seleccionado'){
      Arreglo_Horarios.push($(this).attr('id'));
    }
  });

  var Id_Usuario_Modificar = $('#Select_Usuario_Horario').val();

   $.get(Nombre_Dominio+'/Guardar_Horario',{Id_Usuario:Id_Usuario_Modificar,Horarios:Arreglo_Horarios},function(data){
    $("#Estado_Horario").empty();
    $("#Estado_Horario").append('<h3 align="center">Horario modificado</h3>');
     $('#Mo_Estado_Horario').modal({
                      show: 'true'
                      });
   });
});
