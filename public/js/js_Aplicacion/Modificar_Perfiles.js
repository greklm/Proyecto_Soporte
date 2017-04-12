$('#btn_Modificar_Perfiles').click(function(event){


  //Hacer visible la seccion de perfiles
  $('#Seccion_Perfiles').show();

    location.href = "#Seccion_Perfiles";
    $('#Lista_Modulos_Perfil').empty();

    $.get(Nombre_Dominio+'/Listar_Modulos',{},function(data){
      var Cod_Modulo_Padre;
      var Contenedor_Hijos="";
      var Modulo_Padre="";
      var i=0;
      while(i<data.length)
      {
              Modulo_Padre+="<div class='panel panel-default'>"+
                              "<div class='panel-heading'>"+
                              "<input class='Check_Modulo_Padre' id='"+"Check"+data[i]['COD_MODULO']+"' type='checkbox' value='"+data[i]['COD_MODULO']+"'><label class='panel-title' data-toggle='collapse' data-parent='#Lista_Modulos_Perfil' href='#"+data[i]['COD_MODULO']+"'>"+data[i]['NOMBRE_MODULO']+"</label>"+
                              "</div>";

              Cod_Modulo_Padre = data[i]['COD_MODULO'];
              Contenedor_Hijos = "<div id='"+data[i]['COD_MODULO']+"'class='panel-collapse collapse in'>"+
                                  "<div class='panel-body'>";

            i++;
            while((i<data.length)&&(Cod_Modulo_Padre==data[i]['COD_MODULO_PADRE']))
            {
                Contenedor_Hijos+="<div style='padding-left:25px;' class='checkbox'><label><input id='"+"Check"+data[i]['COD_MODULO']+"' class='Check_Modulo_Hijo' type='checkbox' value='"+data[i]['COD_MODULO']+"' Padre='"+data[i]['COD_MODULO_PADRE']+"'>"+data[i]['NOMBRE_MODULO']+"</label></div>";
                i++;
            }
            Modulo_Padre+=Contenedor_Hijos;
            Modulo_Padre+="</div></div></div>";
      }
      $('#Lista_Modulos_Perfil').append(Modulo_Padre);
      $('.panel-collapse').collapse('hide');
    });

    //lISTAR LOS PERFILES
    $('#Lista_Perfiles_Modificar').empty();
    $.get(Nombre_Dominio+'/Listar_Perfiles',{},function(data){
      var Nombre_Perfil = "";
      for(var i=0;i<data.length;i++)
      {
        if(data[i]['NOMBRE_PERFIL']!=Nombre_Perfil)
        {
          Nombre_Perfil = data[i]['NOMBRE_PERFIL'];
          $('#Lista_Perfiles_Modificar').append('<option value="'+data[i]['NOMBRE_PERFIL']+'">'+data[i]['NOMBRE_PERFIL']+'</option>');
        }
      }
        $("#Lista_Perfiles_Modificar").trigger("change");
    });
    //TRigger el evento de cambio de perfil
});

//Recuperar todos los modulos y submodulos
$('#Lista_Perfiles_Modificar').on('change', function() {
  //Descheckear todos los modulos
  $("#Lista_Modulos_Perfil").find("input").each(function() {
    if($(this).is(':checkbox')){
      $(this).prop('checked', false);
    }
    });

   var Perfil = $(this).val();
    $.get(Nombre_Dominio+'/Listar_Perfiles',{},function(data){
      for(var i=0;i<data.length;i++)
      {
        if(Perfil==data[i]['NOMBRE_PERFIL'])
        {
          $('#Check'+data[i]['COD_MODULO']).prop('checked',true);
        }
      }
    });
});
//Checkear todos los hijos cunado el padre lo está
$(document).on('click','.Check_Modulo_Padre',function(e){
  var Cod_Mod_Padre = $(this).val();
  if ($(this).is(':checked')) {

    $("#Lista_Modulos_Perfil").find("input").each(function() {
      if(($(this).is(':checkbox'))&&(Cod_Mod_Padre==$(this).attr('Padre'))){
        $(this).prop('checked', true);
      }
    });
  }else {
    $("#Lista_Modulos_Perfil").find("input").each(function() {
      if(($(this).is(':checkbox'))&&(Cod_Mod_Padre==$(this).attr('Padre'))){
        $(this).prop('checked',false);
      }
    });
  }
});
//Checkear el padre cuando un jijo lo esta
$(document).on('click','.Check_Modulo_Hijo',function(e){
  var Padre = $(this).attr('Padre');
  var Bool="0";
  if($(this).is(':checked'))
  {
    $("#Check"+Padre).prop('checked',true);
  }else {
    $("#Lista_Modulos_Perfil").find("input").each(function() {
      if(($(this).is(':checkbox'))&&(Padre==$(this).attr('Padre'))&&($(this).is(':checked'))){
        Bool="1";
      }
    });
    if(Bool=="0")
    {
      $("#Check"+Padre).prop('checked',false);
    }
  }
});

$('#btn_Cerrar_Modificar_Perfil').click(function(event){
  $('#Seccion_Perfiles').hide();
});

$('#btn_Mostrar_Crear_Perfil').click(function(event){
  $('#Mo_Crear_Perfil').modal({
     show: 'true'
     });
});

$('#btn_Guardar_Modificar_Perfil').click(function(event){
var Arreglo_Modulos = [];
var Perfil = $('#Lista_Perfiles_Modificar').val();
  $("#Lista_Modulos_Perfil").find("input").each(function() {
    if(($(this).is(':checkbox'))&&($(this).is(':checked'))){
        var Id_Modulo = $(this).attr('id');
        Arreglo_Modulos.push(Id_Modulo.substring(5,Id_Modulo.length));
    }
  });

    $.get(Nombre_Dominio+'/Guardar_Perfil',{Modulos:Arreglo_Modulos, Perfil:Perfil},function(data){
        $('#Datos_Mostrar').empty();
        $('#Datos_Mostrar').append(data);

        $('#Mo_Mensaje').modal({
           show: 'true'
           });
    });
    //Poner en invisible el modulo de perfiles

});
$('#btn_Guardar_Perfil_Basico').click(function(event){
    var Perfil = $('#Nombre_Perfil_Crear').val();
    $.get(Nombre_Dominio+'/Guardar_Perfil_Basico',{Perfil:Perfil},function(data){
      $('#Datos_Mostrar').empty();
      $('#Datos_Mostrar').append(data);
      $('#Mo_Mensaje').modal({
         show: 'true'
         });

      $("#btn_Modificar_Perfiles").trigger("click").done(function(){
          $("#Lista_Perfiles_Modificar").val(Perfil);
      });
    });
});

$('#btn_Eliminar_Perfil').click(function(event){
  var Perfil = $('#Lista_Perfiles_Modificar').val();
  $.get(Nombre_Dominio+'/Eliminar_Perfil',{Perfil:Perfil},function(data){
    $('#Datos_Mostrar').empty();
    $('#Datos_Mostrar').append(data);
    $('#Mo_Mensaje').modal({
       show: 'true'
       });
      $("#btn_Modificar_Perfiles").trigger("click");
  });
});
