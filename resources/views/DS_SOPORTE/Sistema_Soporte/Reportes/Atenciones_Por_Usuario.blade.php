@extends('DS_SOPORTE.Sistema_Soporte.Principal')
@section('Reportes')

  <script>
     location.href = "#Reportes";
  </script>

  <h1>Historial de atenciones de {!!$Datos_Usuario['ID_USUARIO']!!}</h1>

  <div class="col-md-12" align="center">
    <button align="center" class="btn btn-primary" id="btn_Exportar">Exportar a Excel</button>
  </div><br><br><br>
  <div class="table-responsive">
  <table border="1px" class="table table-bordered" id ="Table_Atenciones_Usuario">
    <thead>
      <tr id="firstrow_reporte" style="cursor: pointer"><th>Nro</th><th>Id Cliente</th><th>Denominación</th><th>Persona Atendida</th><th>Tipo Atención</th><th>Atendido por:</th><th>Modalidad</th><th>Producto</th><th>Fecha</th><th style="display:none">Hora Inicio</th><th style="display:none">Hora Fin</th><th>Problema</th><th>Solución Brindada</th><th>Estado</th><th style="display:none">Observaciones</th><th>Adjuntos</th></tr>
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
          <td>{!!$Datos_Reporte[$i]["TIPO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["ID_USUARIO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["MODALIDAD"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["PRODUCTO_SISTEMA"]!!}</td>
          <td>{!!date("d-m-Y",strtotime($Datos_Reporte[$i]["FECHA"]))!!}</td>
          <td style="display:none">{!!date("h:i:s",strtotime($Datos_Reporte[$i]["HORA_INICIO"]))!!}</td>
          <td style="display:none">{!!date("h:i:s",strtotime($Datos_Reporte[$i]["HORA_FIN"]))!!}</td>
          <td>{!!$Datos_Reporte[$i]["PROBLEMA_REPORTADO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["SOLUCION_BRINDADA"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["ESTADO"]!!}</td>
          <td style="display:none">{!!$Datos_Reporte[$i]["OBSERVACIONES"]!!}</td>
          <input type="hidden" id = "Id_Atencion_Descargar" name = "Id_Atencion_Descargar" value = "{{$Datos_Reporte[$i]["ID_ATENCION"]}}"></input>
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
