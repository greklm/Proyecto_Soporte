var Direccion_Cliente='';
var Razon_Social_Atencion_Presencial='';
var Email_Contacto_Atencion_Presencial='';

$('#Registrar_Atencion_Presencial').click(function(event){

  $('#Tbody_Table_Clientes_Buscar_Atencion_Presencial').empty();
  $.get(Nombre_Dominio+"/Recuperar_Clientes",{},function(data){
    for(var i=0;i<data.length;i++)
    {
      var row = $("<tr><td bgcolor='white'>"+data[i]['ID_CLIENTE']+"</td><td bgcolor='white'>"+data[i]['DENOMINACION']+"</td><td bgcolor='white'>"+data[i]['PERSONA_CONTACTO']+"</td><td bgcolor='white'>"+data[i]['TELEFONO_CONTACTO']+"</td><td bgcolor='white'>"+data[i]['OBSERVACIONES']+"</td><td bgcolor='white'><button onclick='Seleccionar_Cliente_Atencion_Presencial("+JSON.stringify(data[i])+")' type='button' class='btn btn-info'>Seleccionar</button></td></tr>");
      $('#Tbody_Table_Clientes_Buscar_Atencion_Presencial').append(row);
    }

    $('#Table_Clientes_Buscar_Atencion_Presencial').DataTable({
        bDestroy: true,
        responsive: true
      });
      $('#Mo_Lista_Clientes_Atencion_Presencial').modal({
      show:'true'
      });
  });
});

function Seleccionar_Cliente_Atencion_Presencial(Datos_Cliente)
{
  var Id_Cliente = Datos_Cliente['ID_CLIENTE'];
  moment.locale('es');
  var Fecha_Actual = moment();
  Fecha_Actual.locale(false);
  $('#Mo_Lista_Clientes_Atencion_Presencial').modal('hide');
  //Crear el id de la atencion
  var Id_Atencion = Id_Cliente +"-"+ Fecha_Actual.format('DD-MM-YYYY HH:mm:SS' );

  Limpiar_Formulario_Atencion_Presencial();

  $('#Id_Atencion_Presencial').val(Id_Atencion);

  $('#Id_Cliente_Atencion_Presencial').val(Id_Cliente);
  $('#Reg_Atencion_Presencial').show();
  $('#Hora_Inicio_Atencion_Presencial').val(moment().format('HH'));
  $('#Minutos_Inicio_Atencion_Presencial').val(moment().format('mm'));
  $('#Hora_Fin_Atencion_Presencial').val(moment().format('HH'));
  $('#Minutos_Fin_Atencion_Presencial').val(moment().format('mm'));
  $('#Fecha_Atencion_Presencial').val(Fecha_Actual.format('L'));

  //Asignar el local DS por defecto
  Direccion_Cliente = Datos_Cliente['DIRECCION'];
    Razon_Social_Atencion_Presencial = Datos_Cliente['DENOMINACION'];
  Email_Contacto_Atencion_Presencial = Datos_Cliente['EMAIL'];

  $('#Oficina_DS_Atencion_Presencial').attr('checked',true);
  $('#Lugar_Atencion_Presencial').val(Direccion_Oficina);

  //Asignar telefono, persona y persona de contacto
  $('#Persona_Contacto_Atencion_Presencial').val(Datos_Cliente['PERSONA_CONTACTO']);
  $('#Telefono_Contacto_Atencion_Presencial').val(Datos_Cliente['TELEFONO_CONTACTO']);
  location.href = "#Reg_Atencion_Presencial";
}


//Mostrar comprobantes de pago
$('#btn_Recuperar_Comprobantes_Cliente_Atencion_Presencial').click(function(event){
    $('#Comprobantes_Cliente_Atencion_Presencial').empty();
    var Id_Cliente = $('#Id_Cliente_Atencion_Presencial').val();
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
      $('#Comprobantes_Cliente_Atencion_Presencial').append(table);

      $('#Comprobantes_Cliente_Atencion_Presencial').dialog({
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
$('#btn_Recuperar_Atenciones_Cliente_Presencial').click(function(event){

  $('#Atenciones_Cliente_Atencion_Presencial').empty();
  var Id_Cliente = $('#Id_Cliente_Atencion_Presencial').val();
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
    $('#Atenciones_Cliente_Atencion_Presencial').append(table);

    $('#Atenciones_Cliente_Atencion_Presencial').dialog({
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


$('#btn_Subir_Adjunto_Atencion_Presencial').click(function(event){
  var Id_Atencion = $('#Id_Atencion_Presencial').val();
  $('#Id_Atencion_Auxiliar').val(Id_Atencion);
  $('#Mo_Mostrar_Subir_Adjuntos').modal({
    show:'true'
  });
});

$('#Concluir_Atencion_Presencial').click(function(event){

  var Result = Validar_Concluir_Atencion_Presencial();
  if(Result)
  {
    var Form = $('#Form_Atencion_Presencial');
    Form.attr('action',Nombre_Dominio+'/Concluir_Atencion_Presencial');
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

$('#Derivar_Atencion_Presencial').click(function(event){

  var Result = Validar_Derivar_Atencion_Presencial();
  if(Result)
  {
    var Form = $('#Form_Atencion_Presencial');
    Form.attr('action',Nombre_Dominio+'/Derivar_Atencion_Presencial');
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

$('#Continuar_Atencion_Presencial').click(function(event){
  var Result = Validar_Derivar_Atencion_Presencial();
  if(Result)
  {
    var Form = $('#Form_Atencion_Presencial');
    Form.attr('action',Nombre_Dominio+'/Continuar_Atencion_Presencial');
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

function Limpiar_Formulario_Atencion_Presencial()
{
  document.getElementById('Id_Atencion_Presencial').value = "";
  document.getElementById('Id_Cliente_Atencion_Presencial').value = "";
  document.getElementById("Modalidad_Atencion_Presencial").value = "";
  document.getElementById("Persona_Contacto_Atencion_Presencial").value = "";
  document.getElementById("Cargo_Persona_Contacto_Atencion_Presencial").value = "";
  document.getElementById("Telefono_Contacto_Atencion_Presencial").value = "";
  document.getElementById("Lugar_Atencion_Presencial").value = "";
  document.getElementById("Producto_Atencion_Presencial").selected = "";
  document.getElementById("Problema_Atencion_Presencial").value = "";
  document.getElementById("Solucion_Atencion_Presencial").value = "";
  document.getElementById("Observaciones_Atencion_Presencial").value = "";
  document.getElementById("Estado_Atencion_Presencial").value = "";
  document.getElementById("Id_Origen_Atencion_Presencial").value="";
}

//Eventos para cada checkbox
$("#Oficina_DS_Atencion_Presencial").click( function(){
   if( $(this).is(':checked') )
   $('#Lugar_Atencion_Presencial').val(Direccion_Oficina);;
});
$("#Local_Cliente_Atencion_Presencial").click( function(){
   if( $(this).is(':checked') )
   $('#Lugar_Atencion_Presencial').val(Direccion_Cliente);;
});
$("#Direccion_Atencion_Presencial").click( function(){
   if( $(this).is(':checked') )
   $('#Lugar_Atencion_Presencial').val('');;
});

  function Validar_Concluir_Atencion_Presencial()
  {
    var Correcto = true;
    $('#Form_Atencion_Presencial :input').each(function(){
      if($(this).prop('required')){
        if($(this).val()==''){
          $(this).css('border-color','#FB7272');
          $(this).css('border-width','2px');
          Correcto = false;
        }
      }
      });

      if($('#Solucion_Atencion_Presencial').val()=='')
      {
        $('#Solucion_Atencion_Presencial').css('border-color','#FB7272');
        $('#Solucion_Atencion_Presencial').css('border-width','2px');
        Correcto = false;
      }
    return Correcto;
  }
  function Validar_Derivar_Atencion_Presencial()
  {
    var Correcto = true;
    $('#Form_Atencion_Presencial :input').each(function(){
      if($(this).prop('required')){
        if($(this).val()==''){
          $(this).css('border-color','#FB7272');
          $(this).css('border-width','2px');
          Correcto = false;
        }
      }
      });
    return Correcto;
  }
//Validacion de campos

$('#btn_Descargar_Formulario_Atencion_Presencial').click(function(event){

      var Modalidad = $('#Modalidad_Atencion_Presencial').val();
      var Producto = $('#Producto_Atencion_Presencial').val();
      var Hora_Inicio = $('#Hora_Inicio_Atencion_Presencial').val()+":"+$('#Minutos_Inicio_Atencion_Presencial').val();
      var Hora_Fin = $('#Hora_Fin_Atencion_Presencial').val()+":"+$('#Minutos_Fin_Atencion_Presencial').val();
      var Fecha = $('#Fecha_Atencion_Presencial').val();
      var Persona_Contacto = $('#Persona_Contacto_Atencion_Presencial').val();
      var Cargo = $('#Cargo_Persona_Contacto_Atencion_Presencial').val();
      var Telefono = $('#Telefono_Contacto_Atencion_Presencial').val();
      var Problema_Real = $('#Problema_Atencion_Presencial').val();
      var Observaciones = $('#Observaciones_Atencion_Presencial').val();
      var Solucion = $('#Solucion_Atencion_Presencial').val();
      var Lugar_Soporte='';

      if($('#Oficina_DS_Atencion_Presencial').is(':checked'))
      {
        Lugar_Soporte = $('#Oficina_DS_Atencion_Presencial').attr('Lugar');
      }else if( $('#Local_Cliente_Atencion_Presencial').is(':checked') )
      {
        Lugar_Soporte = $('#Local_Cliente_Atencion_Presencial').attr('Lugar');
      }else{
        Lugar_Soporte = "Otra Direccion:";
      }

      var Razon_Social = Razon_Social_Atencion_Presencial;
      var Email = Email_Contacto_Atencion_Presencial;
      var Direccion_Fiscal = Direccion_Cliente;

      var Direccion = $('#Lugar_Atencion_Presencial').val();
      var Cadena_Ruta = Nombre_Dominio+'/Prueba?'+
                        'Sistema='+Producto+
                        '&Modalidad='+Modalidad+
                        '&Hora_Inicio='+Hora_Inicio+
                        '&Hora_Fin='+Hora_Fin+
                        '&Fecha='+Fecha+
                        '&Persona_Contacto='+Persona_Contacto+
                        '&Cargo='+Cargo+
                        '&Telefono='+Telefono+
                        '&Problema_Real='+Problema_Real+
                        '&Observaciones='+Observaciones+
                        '&Solucion='+Solucion+
                        '&Lugar_Soporte='+Lugar_Soporte+
                        '&Direccion='+Direccion+
                        '&Razon_Social='+Razon_Social+
                        '&Direccion_Fiscal='+Direccion_Fiscal+
                        '&Email='+Email;
      window.open(Cadena_Ruta,'_blank');
      //window.open('/Formulario_Atencion_Presencial?Sistema='+Producto+',Modalidad='+Modalidad+'','_blank');

    });