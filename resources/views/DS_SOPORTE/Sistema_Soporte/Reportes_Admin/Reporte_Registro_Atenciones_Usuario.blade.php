@extends('DS_SOPORTE.Sistema_Soporte.Principal')
@section('Reportes')

  <script>
     location.href = "#Reportes";
  </script>

  <h1>Historial de atenciones de {!!$Id_Usuario_Reporte!!}</h1><br>

    <input type="hidden" name = "Id_Usuario" value = {!!$Datos_Usuario['ID_USUARIO']!!}></input>
    <div class="table-responsive">
  <table border="1px" class="table table-bordered" id="Table_Atenciones_Usuario">
    <thead>
      <tr id="firstrow_reporte"><th>Nro</th><th>Id Cliente</th><th>Denominación</th><th>Persona Atendida</th><th>Atendido por:</th><th>Modalidad</th><th>Fecha</th><th>Problema</th><th>Solución Brindada</th><th>Tipo</th><th>Estado</th><th>Adjuntos</th></tr>
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
          <td>{!!$Datos_Reporte[$i]["PERSONA_ATENDIDA"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["ID_USUARIO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["MODALIDAD"]!!}</td>
          <td>{!!date("d-m-Y",strtotime($Datos_Reporte[$i]["FECHA"]))!!}</td>
          <td>{!!$Datos_Reporte[$i]["PROBLEMA_REPORTADO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["SOLUCION_BRINDADA"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["TIPO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["ESTADO"]!!}</td>
          <input type="hidden" name = "Id_Atencion_Descargar" value = {!!$Datos_Reporte[$i]["ID_ATENCION"]!!}></input>
          <td>
            <?php
              if($Datos_Reporte[$i]["ADJUNTO"]!='0')
              {
                ?>
                <input type="submit" id="btn_Descargar_Adjunto" class="btn btn-primary" value="Descargar">
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
        $('#Table_Atenciones_Usuario').DataTable({
                responsive: true
        });
    });
    </script>
@endsection
