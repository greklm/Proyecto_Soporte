
var Nro_Semanas_Actual = 0;
var Colores = ['#146271','#7A1212','#BF8254','#4C1254','#132883','#145FC0','#8B935B','#396A4D','#0B6D83','#1E6459','#0F7840','#609164','#9EA145','#AA7D29','#933C1C','#606597','#955A27'];
$(document).ready(function() {
  //Variable que controla el numero de semanas que  se Registro_Atenciones_Pendientes
  $('#btn_Asignar_Tareas').click(function(event){
    Nro_Semanas_Actual = 0;

    //Obtener la fecha Actual
    var Fecha_Actual = moment();
    moment.locale('es');
    Fecha_Actual.locale(false);
    var Nro_Dia = Fecha_Actual.day();

    var Inicio_Semana = moment().startOf('week').format('dddd D [de] MMMM');
    var Fecha_Inicial = moment().startOf('week').format('L');
    var Fin_Semana = moment().endOf('week').subtract(1,'days').format('dddd D [de] MMMM');
    var Fecha_Final = moment().endOf('week').subtract(1,'days').format('L');

    $('#lbl_Intervalo_Fechas').text("Del "+Inicio_Semana+" al "+Fin_Semana);

    $.get(Nombre_Dominio+'/Listar_Usuarios',{},function(data){
      $('#Lista_Usuarios_Asignar_Tarea').empty();
      var Usuarios="";
      for(var i=0;i<data.length;i++)
      {
          Usuarios+="<li id='li_Usuarios_"+data[i]['ID_USUARIO']+"' value='"+data[i]['ID_USUARIO']+"' class='Usuario_Asignar_Tarea'><a href='#'>"+data[i]['ID_USUARIO']+"</a></li>";
      }
      $('#Lista_Usuarios_Asignar_Tarea').append(Usuarios);

      $('#btn_Cambiar_Usuario').text(data[0]['ID_USUARIO']);

      Recuperar_Horario_y_Tareas(data[0]['ID_USUARIO'],Fecha_Inicial,Fecha_Final);

      $('#Mo_Asignar_Tarea').modal({
          show: 'true'
        });
    })
  });
});

$(document).on('click','.Usuario_Asignar_Tarea',function(event){
  Nro_Semanas_Actual = 0;
  var Fecha_Actual = moment();
  moment.locale('es');
  Fecha_Actual.locale(false);
  var Nro_Dia = Fecha_Actual.day();

  var Inicio_Semana = moment().startOf('week').format('dddd D [de] MMMM');
  var Fecha_Inicial = moment().startOf('week').format('L');
  var Fin_Semana = moment().endOf('week').subtract(1,'days').format('dddd D [de] MMMM');
  var Fecha_Final = moment().endOf('week').subtract(1,'days').format('L');

  $('#lbl_Intervalo_Fechas').text("Del "+Inicio_Semana+" al "+Fin_Semana);
  var Id_Usuario = $(this).text();
  $('#btn_Cambiar_Usuario').text(Id_Usuario);
  Recuperar_Horario_y_Tareas(Id_Usuario,Fecha_Inicial,Fecha_Final);
});

function Recuperar_Horario_y_Tareas(Id_Usuario,Fecha_Inicial,Fecha_Final)
{
  $.get(Nombre_Dominio+'/Recuperar_Horario',{Id_Usuario:Id_Usuario},function(data){
    $.fn.Limpiar_Horario_Tareas();

    if((data!='')&&(data!=null))
    {
      for(var i=0;i<data.length;i++)
      {
        var Dia = data[i]['DIA'];
        var Hora_Entrada = parseInt(data[i]['HORA_ENTRADA'].substring(0,2));
        $("#Tarea"+Hora_Entrada+"-"+Dia).css('backgroundColor', '#1A619C');
        $("#Tarea"+Hora_Entrada+"-"+Dia).css('cursor', 'pointer');
        $("#Tarea"+Hora_Entrada+"-"+Dia).css('color', 'white');
        $("#Tarea"+Hora_Entrada+"-"+Dia).text('DISPONIBLE');
        //$("#Tarea"+Hora_Entrada+"-"+Dia).text(data[i]['ID_USUARIO']);
        $("#Tarea"+Hora_Entrada+"-"+Dia).addClass('Hora_Disponible');
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
            $("#Tarea"+j+"-"+Nro_Dia).css('backgroundColor', Colores[Indice_Color]);
            $("#Tarea"+j+"-"+Nro_Dia).text('ASIGNADO');
            $("#Tarea"+j+"-"+Nro_Dia).css('border-radius', '6px');
            $("#Tarea"+j+"-"+Nro_Dia).css('cursor', 'pointer');
            $("#Tarea"+j+"-"+Nro_Dia).removeClass('Hora_Disponible').addClass('Hora_Asignada');
            $("#Tarea"+j+"-"+Nro_Dia).css('color', 'white');
            $("#Tarea"+j+"-"+Nro_Dia).attr('Id_Actividad', data[i]['ID_ACTIVIDAD']);
          }
        }
      }
    });
      $('#btn_Cargar_Semana_Anterior').prop('disabled', false);
      $('#btn_Cargar_Semana_Siguiente').prop('disabled', false);
      $('#btn_Cambiar_Usuario').prop('disabled', false);
  });
}
$.fn.Limpiar_Horario_Tareas = function(){
      $("#Tbody_Horario_Tareas").find("td").each(function() {
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
$(document).on('click','#btn_Cambiar_Usuario',function(e){
  $('#btn_Cambiar_Usuario').prop('disabled', true);
  Nro_Semanas_Actual = 0;
  //Obtener la fecha Actual
  var Fecha_Actual = moment();
  moment.locale('es');
  Fecha_Actual.locale(false);
  var Nro_Dia = Fecha_Actual.day();

  var Inicio_Semana = moment().startOf('week').format('dddd D [de] MMMM');
  var Fecha_Inicial = moment().startOf('week').format('L');
  var Fin_Semana = moment().endOf('week').subtract(1,'days').format('dddd D [de] MMMM');
  var Fecha_Final = moment().endOf('week').subtract(1,'days').format('L');

  $('#lbl_Intervalo_Fechas').text("Del "+Inicio_Semana+" al "+Fin_Semana);

  var usuario = $(this).text();
  var Indice = $('#li_Usuarios_'+usuario).index();
  var Nro_Elementos = $('ul#Lista_Usuarios_Asignar_Tarea li').length;
  var Nuevo_Foco="";
  if(Indice + 1 != Nro_Elementos)
  {
    Nuevo_Foco = $('ul#Lista_Usuarios_Asignar_Tarea li').get(Indice+1);
  }else {
    Nuevo_Foco = $('ul#Lista_Usuarios_Asignar_Tarea li').get(0);
  }
  var Nuevo_Usuario = $(Nuevo_Foco).attr('value');
  //Asignar nuevo valor al boton de Usuarios
  $('#btn_Cambiar_Usuario').text(Nuevo_Usuario);
  Recuperar_Horario_y_Tareas(Nuevo_Usuario,Fecha_Inicial,Fecha_Final);
});
//Script para ir a la semana anterior
$('#btn_Cargar_Semana_Anterior').click(function(event){
  //Incrementar numero de smeanas atras
  $('#btn_Cargar_Semana_Anterior').prop('disabled', true);
  $('#btn_Cargar_Semana_Siguiente').prop('disabled', true);
  Nro_Semanas_Actual--;
  $.fn.Cargar_Semana_Siguiente(Nro_Semanas_Actual);
});
//Script para ir a la semana siguiente
$('#btn_Cargar_Semana_Siguiente').click(function(event){
  $('#btn_Cargar_Semana_Anterior').prop('disabled', true);
  $('#btn_Cargar_Semana_Siguiente').prop('disabled', true);
  Nro_Semanas_Actual++;
  $.fn.Cargar_Semana_Siguiente(Nro_Semanas_Actual);
});
$.fn.Cargar_Semana_Siguiente = function(Nro_Semanas){
  var Fecha_Actual = moment();
  moment.locale('es');
  Fecha_Actual.locale(false);
  var Nro_Dia = Fecha_Actual.day();

  var Inicio_Semana = moment().startOf('week').add(7*Nro_Semanas,'days').format('dddd D [de] MMMM');
  var Fecha_Inicial = moment().startOf('week').add(7*Nro_Semanas,'days').format('L');
  var Fin_Semana = moment().endOf('week').add(7*Nro_Semanas,'days').subtract(1,'days').format('dddd D [de] MMMM');
  var Fecha_Final = moment().endOf('week').add(7*Nro_Semanas,'days').subtract(1,'days').format('L');

  $('#lbl_Intervalo_Fechas').text("Del "+Inicio_Semana+" al "+Fin_Semana);
  //Cargar solo las actividades
  var Id_Usuario = $('#btn_Cambiar_Usuario').text();
  Recuperar_Horario_y_Tareas(Id_Usuario,Fecha_Inicial,Fecha_Final);
}

//script para mostrar informacion de una tarea ya asignada
$(document).on('click','.Hora_Asignada',function(e){
  var Id_Actividad = $(this).attr('Id_Actividad');
  var Fecha_Hora = $(this).attr('id');

  $.get(Nombre_Dominio+'/Recuperar_Datos_Tarea',{Id_Actividad:Id_Actividad,Id_Actividad_Detalle:Fecha_Hora},function(data){

    $('#Datos_Actividad').empty();

    $('#Datos_Actividad').append("<p style='color:black'>Desde: "+data['HORA_INICIAL']+":00 Hasta: "+data['HORA_FINAL']+":00</p>");
    $('#Datos_Actividad').append("<p style='color:black'>Asignado por: "+data['ID_USUARIO_ORIGEN']+"</p>");
    $('#Datos_Actividad').append("<p style='color:black'>Descripción:</br>"+
    "<span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span><div style='font-size:14px;color:black;'>"+data['DESCRIPCION_ACTIVIDAD']+"</div></p>");
      $('#Datos_Actividad').dialog({
              modal: false,
              width: 316,
              title: data['ID_USUARIO']+", "+moment(data['FECHA']).format('dddd D [de] MMMM'),
              buttons: [{
                text:"Eliminar Tarea",
                "class":"btn-info",
                click:function(){
                    Eliminar_Tarea(data['ID_ACTIVIDAD'],data['ID_ACTIVIDAD_DETALLE']);
                    $(this).dialog("close");
                }
              },
              {
                text:"Eliminar Actividad",
                "class":"btn-danger",
                click:function(){
                  Eliminar_Actividad(data['ID_ACTIVIDAD']);
                    $(this).dialog("close");
                }
              }]
          });
  });

});
//Script para asignar tareas
$(document).ready(function () {
  $(document).on('click','.Hora_Disponible',function(e){
    var Celda = $(this);
    if(Celda.hasClass('Hora_Seleccionada'))
    {
      Celda.removeClass('Hora_Seleccionada');
      Celda.css('background-color','#1A619C');
      Celda.css('box-shadow','');

    }else {
      Celda.addClass('Hora_Seleccionada');
      Celda.css('background-color','#8CCEFA');
      Celda.css('box-shadow','inset 0 0 0 1px #27496d,inset 0 5px 30px #193047');
    }
  });
});

$(document).on('dblclick','.Hora_Seleccionada',function(e){

  $('#tb_Descripcion_Actividad').val('');
  $('#Form_Nueva_Tarea').dialog({
          modal: false,
          title:"Nueva Tarea",
          width: 300,
          height: 370,
          buttons: [{
              text:"Guardar",
              "class":"btn-info",
              id:"btn_Guardar_Nueva_Tarea"
          }]
      });
});

$(document).on('click','#btn_Guardar_Nueva_Tarea',function(e){
  //alert($('#tb_Descripcion_Actividad').val());
  Guardar_Tarea();
  $('#Form_Nueva_Tarea').dialog('close');
});
function Guardar_Tarea()
{
  var Id_Usuario = $('#btn_Cambiar_Usuario').text();
  var Descripcion = $('#tb_Descripcion_Actividad').val();
  var Horarios_Seleccionados = [];
    $("#Tbody_Horario_Tareas").find("td").each(function() {
      if($(this).hasClass('Hora_Seleccionada'))
      {
        Horarios_Seleccionados.push($(this).attr('id'));
      }
    });

    $.get(Nombre_Dominio+'/Guardar_Asignar_Tarea',{Id_Usuario:Id_Usuario,Descripcion:Descripcion,Horarios_Seleccionados:Horarios_Seleccionados,Nro_Semanas:Nro_Semanas_Actual},function(data){
        $.fn.Cargar_Semana_Siguiente(Nro_Semanas_Actual);

      $("#Tbody_Horario_Tareas").find("td").each(function() {
        if($(this).hasClass('Hora_Seleccionada'))
        {
          $(this).removeClass('Hora_Seleccionada');
        }
      });

    });
}
function Eliminar_Tarea(Id_Actividad,Id_Actividad_Detalle)
{
  $.get(Nombre_Dominio+'/Eliminar_Actividad_Detalle',{Id_Actividad:Id_Actividad,Id_Actividad_Detalle:Id_Actividad_Detalle},function(data){
      $.fn.Cargar_Semana_Siguiente(Nro_Semanas_Actual);
    });
}
function Eliminar_Actividad(Id_Actividad)
{
  $.get(Nombre_Dominio+'/Eliminar_Actividad',{Id_Actividad:Id_Actividad},function(data){

      $.fn.Cargar_Semana_Siguiente(Nro_Semanas_Actual);
    });
}
