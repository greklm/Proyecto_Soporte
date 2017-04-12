@extends('DS_SOPORTE.Sistema_Soporte.Principal')
@section('Reportes')

  <script>
     location.href = "#Reportes";
  </script>

  <h1>Historial de atenciones</h1><br>

    <input type="hidden" name = "Id_Usuario" value = {!!$Datos_Usuario['ID_USUARIO']!!}></input>
    <div class="table-responsive">
  <table border="1px" class="table table-bordered" id="Table_Atenciones_Cliente">
    <thead>
      <tr id="firstrow_reporte"><th>Nro</th><th>Id Cliente</th><th>Denominación</th><th>Atendido por:</th><th>Modalidad</th><th>Fecha</th><th>Problema</th><th>Solución Brindada</th><th>Adjuntos</th></tr>
    </thead>
    <tbody>
        @for($i=0;$i<count($Datos_Reporte);$i++)

          <tr id="rows_reporte">
            <form method = "POST" action = {{action('UsuarioController@Descargar_Adjunto')}}>
          {{ csrf_field()}}
          <input type="hidden" name = "Id_Usuario" value = {!!$Datos_Usuario['ID_USUARIO']!!}></input>

          <td>{!!$i+1!!}</td>
          <td>{!!Form::label('hola',$Datos_Reporte[$i]["ID_CLIENTE"])!!}</td>
          <td>{!!$Datos_Reporte[$i]["DENOMINACION"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["ID_USUARIO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["MODALIDAD"]!!}</td>
          <td>{!!date("d-m-Y",strtotime($Datos_Reporte[$i]["FECHA"]))!!}</td>
          <td>{!!$Datos_Reporte[$i]["PROBLEMA_REPORTADO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["SOLUCION_BRINDADA"]!!}</td>
          <input type="hidden" id = "Id_Atencion_Descargar" name = "Id_Atencion_Descargar" value = "{{$Datos_Reporte[$i]["ID_ATENCION"]}}"></input>
          <td>
            <?php
              if($Datos_Reporte[$i]["ADJUNTO"]!='0')
              {
                ?>
                <button type="button" id="btn_Descargar_Adjunto" class="btn btn-primary btn_Descargar_Adjunto" value="{{$Datos_Reporte[$i]["ID_ATENCION"]}}">Ver Adjuntos</button>
                <!--<input type="submit" id="btn_Descargar_Adjunto" class="btn btn-primary" value="Descargar">-->
            <?php
              }else{

              }
            ?>
          </td>
          </form>
          </tr>

        @ENDFOR

  </tbody>
  </table>
  </div>

@endsection
@section('Scripts')
    <script>
    $(document).ready(function() {
        $('#Table_Atenciones_Cliente').DataTable({
                responsive: true
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('.btn_Descargar_Adjunto').click(function(event){
          var Id_Atencion = $(this).val();

          $.get(Nombre_Dominio+'/Recuperar_Adjuntos',{Id_Atencion:Id_Atencion},function(data){
            if(data!=null)
            {
                  $Table = $("<table class='table table-bordered dataTable no-footer'></table>");
                  $Header = $("<tr><th>Nro</th><th>Link</th></tr>");
                  $Table.append($Header);

                  for(var i=0;i<data.length;i++)
                  {
                    var Num = i+1;
                    var row = $('<tr href="#Reg_Atencion"><td style="color: white;">'+Num+'</td><td><form method="POST" action={{action("UsuarioController@Descargar_Adjunto")}}>{{ csrf_field()}}<input name="Url_Archivo" type="hidden" value="'+data[i]["URL_ARCHIVO"]+'"><input name="Nombre_Archivo" type="hidden" value="'+data[i]["NOMBRE_ARCHIVO"]+'"><button type="submit" class="btn btn-success">Descargar</button></td></form></tr>');
                    $Table.append(row);
                  }
                  $Dialog = $("<div></div>");
                  $Dialog.append($Table);
                  $Dialog.dialog({
                          modal: false,
                          width: 380,
                          height: 300,
                          title: "Lista de Adjuntos",
                          buttons: [
                          {
                            text:"Cerrar",
                            "class":"btn-primary",
                            click:function(){
                                $(this).dialog("close");
                            }
                          }]
                      });
            }
            //alert(JSON.stringify(data));

          });
        });
    });
    </script>
@endsection
