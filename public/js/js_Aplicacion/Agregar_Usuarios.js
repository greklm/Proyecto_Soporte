$('#btn_Mostrar_Agregar_Usuario').click(function(event){
   $('#Perfil_Crear').empty();
   $.get(Nombre_Dominio+'/Listar_Perfiles',{},function(data){
     var Nombre_Perfil = "";
     for(var i=0;i<data.length;i++)
     {
       if(data[i]['NOMBRE_PERFIL']!=Nombre_Perfil)
       {
         Nombre_Perfil = data[i]['NOMBRE_PERFIL'];
          $('#Perfil_Crear').append('<option value="'+data[i]['NOMBRE_PERFIL']+'">'+data[i]['NOMBRE_PERFIL']+'</option>');
       }
     }
   });

    $('#Mo_Agregar_Usuario').modal({
       show:'true'
    });
});

$('#btn_Guardar_Nuevo_Usuario').click(function(event){
  $.ajax({
   type: "GET",
   url: Nombre_Dominio+"/Guardar_Nuevo_Usuario",
   data: $("#Form_Nuevo_Usuario").serialize(),
   success: function(msg) {

     $('#Datos_Mostrar').empty();
    var info = $('#Datos_Mostrar');
    info.append('<h4 align="center">'+msg+'</h4>');
     $('#Mo_Mensaje').modal({
        show: 'true'
        });
        $("#Mo_Agregar_Usuario").modal("hide");
   }
 });
});
