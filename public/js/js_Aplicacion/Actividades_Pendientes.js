
var P_Nro_Semanas_Actual = 0;
var P_Colores = ['#146271','#7A1212','#BF8254','#4C1254','#132883','#145FC0','#8B935B','#396A4D','#0B6D83','#1E6459','#0F7840','#609164','#9EA145','#AA7D29','#933C1C','#606597','#955A27'];
$(document).ready(function() {
  //Variable que controla el numero de semanas que  se Registro_Atenciones_Pendientes
  $('#btn_Actividades_Pendientes').click(function(event){
    P_Nro_Semanas_Actual = 0;
    //Obtener la fecha Actual
    var P_Fecha_Actual = moment();
    moment.locale('es');
    P_Fecha_Actual.locale(false);
    var P_Nro_Dia = P_Fecha_Actual.day();

    var Inicio_Semana = moment().startOf('week').format('dddd D [de] MMMM');
    var Fecha_Inicial = moment().startOf('week').format('L');
    var Fin_Semana = moment().endOf('week').subtract(1,'days').format('dddd D [de] MMMM');
    var Fecha_Final = moment().endOf('week').subtract(1,'days').format('L');

    $('#lbl_P_Intervalo_Fechas').text("Del "+Inicio_Semana+" al "+Fin_Semana);
    Recuperar_Horario_y_Tareas_Pendientes(Fecha_Inicial,Fecha_Final);
    $('#Mo_Actividades_Pendientes').modal({
        show: 'true'
      });
  });
});

function Recuperar_Horario_y_Tareas_Pendientes(Fecha_Inicial,Fecha_Final)
{

  $.get(Nombre_Dominio+'/Recuperar_Id_Usuario',{},function(data){
    var Id_Usuario = data;

    $.get(Nombre_Dominio+'/Recuperar_Horario',{Id_Usuario:Id_Usuario},function(data){

      $.fn.Limpiar_Horario_Tareas_Pendientes();

      if((data!='')&&(data!=null))
      {
        for(var i=0;i<data.length;i++)
        {
          var Dia = data[i]['DIA'];
          var Hora_Entrada = parseInt(data[i]['HORA_ENTRADA'].substring(0,2));
          $("#P_Tarea"+Hora_Entrada+"-"+Dia).css('backgroundColor', '#1A619C');
          $("#P_Tarea"+Hora_Entrada+"-"+Dia).css('cursor', 'pointer');
          $("#P_Tarea"+Hora_Entrada+"-"+Dia).css('color', 'white');
          $("#P_Tarea"+Hora_Entrada+"-"+Dia).text('DISPONIBLE');
          //$("#Tarea"+Hora_Entrada+"-"+Dia).text(data[i]['ID_USUARIO']);
          $("#P_Tarea"+Hora_Entrada+"-"+Dia).addClass('Hora_Disponible');
        }
      }
      var Id_Actividad = '';
      var Indice_Color = 0;
      $.get(Nombre_Dominio+'/Recuperar_Tareas',{Id_Usuario:Id_Usuario,Fecha_Inicial:Fecha_Inicial,Fecha_Final:Fecha_Final},function(data){

        if((data!='')&&(data!=null))
        {

          for(var i=0;i<data.length;i++)
          {
            var Hora_Inicial = parseInt(data[i]['HORA_INICIAL']);
            var Hora_Final = parseInt(data[i]['HORA_FINAL']);

            var Dia = data[i]['FECHA'];
            var Nro_Dia = moment(Dia).day();

            for(var j=Hora_Inicial;j<Hora_Final;j++)
            {
              var Dia = data[i]['DIA'];
              if(Id_Actividad!=data[i]['ID_ACTIVIDAD'])
              {
                Id_Actividad=data[i]['ID_ACTIVIDAD']
                Indice_Color++;
              }else {

              }
              $("#P_Tarea"+j+"-"+Nro_Dia).css('backgroundColor', P_Colores[Indice_Color]);
              $("#P_Tarea"+j+"-"+Nro_Dia).text('ASIGNADO');
              $("#P_Tarea"+j+"-"+Nro_Dia).css('border-radius', '6px');
              $("#P_Tarea"+j+"-"+Nro_Dia).css('cursor', 'pointer');
              $("#P_Tarea"+j+"-"+Nro_Dia).removeClass('Hora_Disponible').addClass('Hora_Asignada');
              $("#P_Tarea"+j+"-"+Nro_Dia).css('color', 'white');
              $("#P_Tarea"+j+"-"+Nro_Dia).attr('Id_Actividad', data[i]['ID_ACTIVIDAD']);
            }
          }
        }
      });
        $('#btn_P_Cargar_Semana_Anterior').prop('disabled', false);
        $('#btn_P_Cargar_Semana_Siguiente').prop('disabled', false);
    });

  });
}
$.fn.Limpiar_Horario_Tareas_Pendientes = function(){
      $("#Tbody_Horario_Tareas_Pendientes").find("td").each(function() {
        if($(this).hasClass('Hora_Tarea'))
        {
          $(this).css('cursor','not-allowed');
          $(this).css('backgroundColor', '#A8D5F2');
          $(this).removeClass('Hora_Disponible');
          $(this).removeClass('Hora_Asignada');
          $(this).css('border-radius', '0px');
          $(this).css('box-shadow','');
          $(this).text('');
        }
      });
  }
//Script para ir a la semana anterior
$('#btn_P_Cargar_Semana_Anterior').click(function(event){
  //Incrementar numero de smeanas atras
  $('#btn_P_Cargar_Semana_Anterior').prop('disabled', true);
  $('#btn_P_Cargar_Semana_Siguiente').prop('disabled', true);
  P_Nro_Semanas_Actual--;
  $.fn.P_Cargar_Semana_Siguiente(P_Nro_Semanas_Actual);
});
//Script para ir a la semana siguiente
$('#btn_P_Cargar_Semana_Siguiente').click(function(event){
  $('#btn_P_Cargar_Semana_Anterior').prop('disabled', true);
  $('#btn_P_Cargar_Semana_Siguiente').prop('disabled', true);
  P_Nro_Semanas_Actual++;
  $.fn.P_Cargar_Semana_Siguiente(P_Nro_Semanas_Actual);
});
$.fn.P_Cargar_Semana_Siguiente = function(Nro_Semanas){
  var Fecha_Actual = moment();
  moment.locale('es');
  Fecha_Actual.locale(false);
  var Nro_Dia = Fecha_Actual.day();

  var Inicio_Semana = moment().startOf('week').add(7*Nro_Semanas,'days').format('dddd D [de] MMMM');
  var Fecha_Inicial = moment().startOf('week').add(7*Nro_Semanas,'days').format('L');
  var Fin_Semana = moment().endOf('week').add(7*Nro_Semanas,'days').subtract(1,'days').format('dddd D [de] MMMM');
  var Fecha_Final = moment().endOf('week').add(7*Nro_Semanas,'days').subtract(1,'days').format('L');

  $('#lbl_P_Intervalo_Fechas').text("Del "+Inicio_Semana+" al "+Fin_Semana);
  //Cargar solo las actividades
  Recuperar_Horario_y_Tareas_Pendientes(Fecha_Inicial,Fecha_Final);
}

//script para mostrar informacion de una tarea ya asignada
$(document).on('click','.Hora_Asignada',function(e){
  var Id_Actividad = $(this).attr('Id_Actividad');
  var Fecha_Hora = $(this).attr('id').substring(2);

  $.get(Nombre_Dominio+'/Recuperar_Datos_Tarea',{Id_Actividad:Id_Actividad,Id_Actividad_Detalle:Fecha_Hora},function(data){

    $('#Datos_Actividad_Pendiente').empty();

    $('#Datos_Actividad_Pendiente').append("<p style='color:black'>Desde: "+data['HORA_INICIAL']+":00 Hasta: "+data['HORA_FINAL']+":00</p>");
    $('#Datos_Actividad_Pendiente').append("<p style='color:black'>Asignado por: "+data['ID_USUARIO_ORIGEN']+"</p>");
    $('#Datos_Actividad_Pendiente').append("<p style='color:black'>Descripción:</br>"+
    "<span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span><div style='font-size:14px;color:black;'>"+data['DESCRIPCION_ACTIVIDAD']+"</div></p>");
      $('#Datos_Actividad_Pendiente').dialog({
              modal: false,
              width: 316,
              title: data['ID_USUARIO']+", "+moment(data['FECHA']).format('dddd D [de] MMMM'),
              buttons: [{
                text:"Cerrar",
                "class":"btn-info",
                click:function(){
                    $(this).dialog("close");
                }
              }]
          });
  });
});

//Actualizar el número de actividades pendientes
setInterval(function(){
  $.get(Nombre_Dominio+'/Nro_Actividades_Pendientes_Hoy',{},function(data){
      if(data!=null)
      {
          $('#Nro_Actividades_Pendientes').text = data.length;
      }
  });
}, 10000);
