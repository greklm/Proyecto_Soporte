$('#Registrar_Atencion_Remota').click(function(event){

  $('#Tbody_Table_Clientes_Buscar_Atencion_Remota').empty();
  $.get(Nombre_Dominio+"/Recuperar_Clientes",{},function(data){

    for(var i=0;i<data.length;i++)
    {
      var row = $("<tr><td bgcolor='white'>"+data[i]['ID_CLIENTE']+"</td><td bgcolor='white'>"+data[i]['DENOMINACION']+"</td><td bgcolor='white'>"+data[i]['PERSONA_CONTACTO']+"</td><td bgcolor='white'>"+data[i]['TELEFONO_CONTACTO']+"</td><td bgcolor='white'>"+data[i]['OBSERVACIONES']+"</td><td bgcolor='white'><button onclick='Seleccionar_Cliente_Atencion_Remota("+JSON.stringify(data[i])+")' type='button' class='btn btn-info'>Seleccionar</button></td></tr>");
      $('#Tbody_Table_Clientes_Buscar_Atencion_Remota').append(row);
    }

    $('#Table_Clientes_Buscar_Atencion_Remota').DataTable({
        bDestroy: true,
        responsive: true
      });
      $('#Mo_Lista_Clientes_Atencion_Remota').modal({
      show:'true'
      });
  });

});

function Seleccionar_Cliente_Atencion_Remota(Datos_Cliente)
{
  var Id_Cliente = Datos_Cliente['ID_CLIENTE'];
  moment.locale('es');
  var Fecha_Actual = moment();
  Fecha_Actual.locale(false);
  $('#Mo_Lista_Clientes_Atencion_Remota').modal('hide');

  //Crear el id de la atencion
  var Id_Atencion = Id_Cliente +"-"+ Fecha_Actual.format('DD-MM-YYYY HH:mm:SS' );

  Limpiar_Formulario_Atencion_Remota();
  $('#Id_Atencion_Remota').val(Id_Atencion);

  $('#Id_Cliente_Atencion_Remota').val(Id_Cliente);
  $('#Reg_Atencion_Remota').show();
  $('#Hora_Inicio_Atencion_Remota').val(moment().format('HH'));
  $('#Minutos_Inicio_Atencion_Remota').val(moment().format('mm'));
  $('#Hora_Fin_Atencion_Remota').val(moment().format('HH'));
  $('#Minutos_Fin_Atencion_Remota').val(moment().format('mm'));
  $('#Fecha_Atencion_Remota').val(Fecha_Actual.format('L'));

  //Asignar telefono, persona y persona de contacto
  $('#Persona_Contacto_Atencion_Remota').val(Datos_Cliente['PERSONA_CONTACTO']);
  $('#Telefono_Contacto_Atencion_Remota').val(Datos_Cliente['TELEFONO_CONTACTO']);

  location.href = "#Reg_Atencion_Remota";
}

//Mostrar comprobantes de pago
$('#btn_Recuperar_Comprobantes_Cliente_Atencion_Remota').click(function(event){
    $('#Comprobantes_Cliente_Atencion_Remota').empty();
    var Id_Cliente = $('#Id_Cliente_Atencion_Remota').val();
    var table = $('<table id="Table_Cliente" border="1px" class="table table-bordered" style="color-black"></table>');
    table.append('<tr id="firstrow_reporte"><th>ID CLIENTE</th><th>DENOMINACION</th><th>FECHA DE EMISION</th><th>ARTICULO</th><th>DESCRIPCION DE ARTICULO</th><th>IMPORTE</th></tr>')
    $.get(Nombre_Dominio+'/Recuperar_Datos_Cliente',{Ruc:Id_Cliente},function(data){
      for(var i=0;i<data.length;i++)
      {

        var Fecha = moment(data[i]["FECHA_EMISION"]);
        Fecha.locale(false);
        var Importe = data[i]['IMPORTE'].toFixed(2);

        var row = $('<tr style="color:black"><td bgcolor="white">'+data[i]['ID_CLIENTE']+'</td><td bgcolor="white">'+data[i]['DENOMINACION']+'</td><td bgcolor="white">'+Fecha.format('L')+'</td><td bgcolor="white">'+data[i]['ARTICULO']+'</td><td bgcolor="white">'+data[i]['DES_ARTICULO']+'</td><td bgcolor="white">'+Importe+'</td></tr>');
        table.append(row);
      }
      $('#Comprobantes_Cliente_Atencion_Remota').append(table);

      $('#Comprobantes_Cliente_Atencion_Remota').dialog({
              modal: false,
              width: 700,
              height: 400,
              title: "Historial de Comprobantes de pago",
              buttons: [{
                text:"Cerrar",
                "class":"btn-primary",
                click:function(){
                    $(this).dialog("close");
                }
              }]
          });
  });
});
$('#btn_Recuperar_Atenciones_Cliente_Remota').click(function(event){

  $('#Atenciones_Cliente_Atencion_Remota').empty();
  var Id_Cliente = $('#Id_Cliente_Atencion_Remota').val();
  var table = $('<table id="Table_Cliente" border="1px" class="table table-bordered" style="color-black"></table>');

  table.append('<tr id="firstrow_reporte"><th>Nro</th><th>Id Cliente</th><th>Denominación</th><th>Atendido por:</th><th>Modalidad</th><th>Fecha</th><th>Problema</th><th>Solución Brindada</th><th>Adjuntos</th></tr>')


  $.get(Nombre_Dominio+'/Recuperar_Atenciones_Cliente',{Id_Cliente:Id_Cliente},function(data){

    for(var i=0;i<data.length;i++)
    {
        var Fecha = moment(data[i]["FECHA"]);
        Fecha.locale(false);

        var row = $('<tr id="rows_reporte" style="color:black"><td>'+(i+1)+'</td><td>'+data[i]["ID_CLIENTE"]+'</td><td>'+data[i]["DENOMINACION"]+'</td><td>'+data[i]["ID_USUARIO"]+'</td><td>'+data[i]["MODALIDAD"]+'</td><td>'+Fecha.format('L')+'</td><td>'+data[i]["PROBLEMA_REPORTADO"]+'</td><td>'+data[i]["SOLUCION_BRINDADA"]+'</td><tr>');
        table.append(row);
    }
    $('#Atenciones_Cliente_Atencion_Remota').append(table);

    $('#Atenciones_Cliente_Atencion_Remota').dialog({
      modal: false,
      width: 800,
      height: 400,
      title: "Historial de Comprobantes de pago",
      buttons: [{
        text:"Cerrar",
        "class":"btn-primary",
        click:function(){
            $(this).dialog("close");
        }
      }]
    });
});
});


$('#btn_Subir_Adjunto_Atencion_Remota').click(function(event){
  var Id_Atencion = $('#Id_Atencion_Remota').val();
  $('#Id_Atencion_Auxiliar').val(Id_Atencion);
  $('#Mo_Mostrar_Subir_Adjuntos').modal({
    show:'true'
  });
});

$('#Concluir_Atencion_Remota').click(function(event){

  var Result = Validar_Concluir_Atencion_Remota();
  if(Result)
  {
    var Form = $('#Form_Atencion_Remota');
    Form.attr('action',Nombre_Dominio+'/Concluir_Atencion_Remota');
    Form.submit();
  }else {
    //Mostrar modal
    var Contenido =   '<div class="modal fade" role="dialog">'+
                        '<div class="modal-dialog modal-sm">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<span class="close" data-dismiss="modal">&times;</span>'+
                              '<h3 align="center">Completar</h3>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<p align="center">Se deben completar todos los campos obligatorios</p>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button align="center" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'+
                            '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
   $(Contenido).modal('show');
  }
});

$('#Derivar_Atencion_Remota').click(function(event){
  var Result = Validar_Derivar_Atencion_Remota();
  if(Result)
  {
    var Form = $('#Form_Atencion_Remota');
    Form.attr('action',Nombre_Dominio+'/Derivar_Atencion_Remota');
    Form.submit();
  }
  else {
    //Mostrar modal
    var Contenido =   '<div class="modal fade" role="dialog">'+
                        '<div class="modal-dialog modal-sm">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<span class="close" data-dismiss="modal">&times;</span>'+
                              '<h3 align="center">Completar</h3>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<p align="center">Se deben completar todos los campos obligatorios</p>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button align="center" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'+
                            '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
   $(Contenido).modal('show');
  }
});

$('#Continuar_Atencion_Remota').click(function(event){
  var Result = Validar_Derivar_Atencion_Remota();
  if(Result)
  {
    var Form = $('#Form_Atencion_Remota');
    Form.attr('action',Nombre_Dominio+'/Continuar_Atencion_Remota');
    Form.submit();
  }
  else {
    //Mostrar modal
    var Contenido =   '<div class="modal fade" role="dialog">'+
                        '<div class="modal-dialog modal-sm">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<span class="close" data-dismiss="modal">&times;</span>'+
                              '<h3 align="center">Completar</h3>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<p align="center">Se deben completar todos los campos obligatorios</p>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button align="center" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'+
                            '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
   $(Contenido).modal('show');
  }
});

function Limpiar_Formulario_Atencion_Remota()
{
  document.getElementById('Id_Atencion_Remota').value = "";
  document.getElementById('Id_Cliente_Atencion_Remota').value = "";
  document.getElementById("Modalidad_Atencion_Remota").value = "";
  document.getElementById("Producto_Atencion_Remota").selected = "";
  document.getElementById("Persona_Contacto_Atencion_Remota").value = "";
  document.getElementById("Cargo_Persona_Contacto_Atencion_Remota").value = "";
  document.getElementById("Telefono_Contacto_Atencion_Remota").value = "";
  document.getElementById("Problema_Atencion_Remota").value = "";
  document.getElementById("Solucion_Atencion_Remota").value = "";
  document.getElementById("Team_Viewer_ID_Atencion_Remota").value = "";
  document.getElementById("Team_Viewer_Password_Atencion_Remota").value = "";
  document.getElementById("Observaciones_Atencion_Remota").value = "";
  document.getElementById("Estado_Atencion_Remota").value = "";
  document.getElementById("Id_Origen_Atencion_Remota").value="";

}

function Validar_Concluir_Atencion_Remota()
{
  var Correcto = true;
  $('#Form_Atencion_Remota :input').each(function(){
    if($(this).prop('required')){
      if($(this).val()==''){
        $(this).css('border-color','#A43B3B');
        $(this).css('border-width','2px');
        Correcto = false;
      }
    }
    });

    if($('#Solucion_Atencion_Remota').val()=='')
    {
      $('#Solucion_Atencion_Remota').css('border-color','#A43B3B');
      $('#Solucion_Atencion_Remota').css('border-width','2px');
      Correcto = false;
    }
  return Correcto;
}
function Validar_Derivar_Atencion_Remota()
{
  var Correcto = true;
  $('#Form_Atencion_Remota :input').each(function(){
    if($(this).prop('required')){
      if($(this).val()==''){
        $(this).css('border-color','#A43B3B');
        $(this).css('border-width','2px');
        Correcto = false;
      }
    }
    });
  return Correcto;
}
