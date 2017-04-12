$('#btn_Mostrar_Modificar_Usuario').click(function(event){

  //Cargar los perfiles de usuario
    $('#Perfil_Modificar').empty();
    $.get(Nombre_Dominio+'/Listar_Perfiles',{},function(data){
      var Nombre_Perfil = "";
      for(var i=0;i<data.length;i++)
      {
        if(data[i]['NOMBRE_PERFIL']!=Nombre_Perfil)
        {
          Nombre_Perfil = data[i]['NOMBRE_PERFIL'];
           $('#Perfil_Modificar').append('<option value="'+data[i]['NOMBRE_PERFIL']+'">'+data[i]['NOMBRE_PERFIL']+'</option>');
        }
      }
      Cargar_Informacion_Usuario();
      $('#Mo_Modificar_Usuario').modal({
         show:'true'
      });
    });
});

$('#btn_Actualizar_Usuario').click(function(event){
  $.ajax({
   type: "GET",
   url: Nombre_Dominio+"/Actualizar_Usuario",
   data: $("#Form_Usuario_Actualizar").serialize(),
   success: function(msg) {

     $('#Datos_Mostrar').empty();
    var info = $('#Datos_Mostrar');
    info.append('<h4 align="center">'+msg+'</h4>');
     $('#Mo_Mensaje').modal({
        show: 'true'
        });
        $("#Mo_Modificar_Usuario").modal("hide");
   }
 });
});

function Cargar_Informacion_Usuario()
{
  var Usuario_Informacion = JSON.parse(document.getElementById("Id_Usuario_Modificar").value);
  document.getElementById("Id_Usuario_Modificar_Auxiliar").value = Usuario_Informacion['ID_USUARIO'];
  document.getElementById("Password_Modificar").value = Usuario_Informacion['USUARIO_PASSWORD'];
  document.getElementById("Nombres_Modificar").value = Usuario_Informacion['NOMBRES'];
  document.getElementById("Apellidos_Modificar").value = Usuario_Informacion['APELLIDOS'];
  document.getElementById("Telefono_Modificar").value = Usuario_Informacion['TELEFONO'];
  document.getElementById("Email_Modificar").value = Usuario_Informacion['EMAIL'];
  document.getElementById("Tipo_Usuario_Modificar").value = Usuario_Informacion['TIPO_USUARIO'];
  document.getElementById("Area_Modificar").value = Usuario_Informacion['AREA'];
  document.getElementById("Estado_Modificar").value = Usuario_Informacion['ESTADO'];
  document.getElementById("Perfil_Modificar").value = Usuario_Informacion['PERFIL'];
}
