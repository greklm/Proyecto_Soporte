@extends('DS_SOPORTE.Sistema_Soporte.Principal')
@section('Reportes')

  <script>
     location.href = "#Reportes";
     document.getElementById("Form_Buscar_Cliente").style="display:none";
     document.getElementById("Form_Registro_Atenciones").style="display:none"
  </script>


  <h1>Atenciones Derivadas y aún pendientes</h1><br>
  <div class="table-responsive">
  <table border="1px" class="table table-bordered">
    <thead>
      <tr id="firstrow_reporte"><th>Nro</th><th>Id Cliente</th><th>Denominación</th><th>Derivado a:</th><th>Modalidad</th><th>Problema Reportado</th><th>Fecha</th><th>Tipo</th><th>Total días pendiente</th></tr>
    </thead>
    <tbody>
        @for($i=0;$i<count($Datos_Reporte);$i++)
          <tr id="rows_reporte">
          <td>{!!$i+1!!}</td>
          <td>{!!Form::label('hola',$Datos_Reporte[$i]["ID_CLIENTE"])!!}</td>
          <td>{!!$Datos_Reporte[$i]["DENOMINACION"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["ID_USUARIO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["MODALIDAD"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["PROBLEMA_REPORTADO"]!!}</td>
          <td>{!!date("d-m-Y",strtotime($Datos_Reporte[$i]["FECHA"]))!!}</td>
          <td>{!!$Datos_Reporte[$i]["TIPO"]!!}</td>
          <td>{!!$Datos_Reporte[$i]["DIAS_PENDIENTE"]!!}</td>
          </tr>
        @ENDFOR

  </tbody>

  </table>
  </div>
@endsection
