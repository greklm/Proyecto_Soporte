
<div class="modal fade" id="Mo_Asignar_Tarea" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content" align="center">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="row">
          <h4 class="modal-title" align="center">Asignar Tareas</h4>
          <button class="arrow_left" id="btn_Cargar_Semana_Anterior"></button><a1 id="lbl_Intervalo_Fechas"class="modal-title" align="center"></a1><button class="arrow_right" id="btn_Cargar_Semana_Siguiente"></button>
      </div>
    </div>
      <form role="form" method="post" action="/Guardar_Horario" autocomplete="off">
        <div class="modal-body">
          <table class="table table-bordered table-condensed Tabla_Horario" >
            <thead >
                <tr>
                  <th class="bg bg-success" style='white-space:nowrap;padding:2px;'>
                    <div class="btn-group">
                      <button type="button" id="btn_Cambiar_Usuario" style="font-size:10px;" class="btn btn-info"></button>
                      <button type="button" style="font-size:10px;width:5px;padding-left:1px" class="btn btn-info dropdown-toggle"data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu menu_usuarios" id="Lista_Usuarios_Asignar_Tarea" role="menu">

                      </ul>
                    </div>
                  </th><th class="Dia_Semana">Lunes</th><th class="Dia_Semana">Martes</th><th class="Dia_Semana">Miércoles</th><th class="Dia_Semana">Jueves</th><th class="Dia_Semana">Viernes</th><th class="Dia_Semana">Sábado</th></tr>
            </thead>
            <tbody id="Tbody_Horario_Tareas">
              @for($i=7;$i<22;$i++)

                <tr>
                @if($i<9)
                  <td style="background-color:#4283AF;color: white;">{{'0'.$i.':00 - 0'.($i+1).':00'}}</td>
                @elseif($i==9)
                  <td style="background-color:#4283AF;color: white;">{{'0'.$i.':00 - '.($i+1).':00'}}</td>
                @else
                  <td style="background-color:#4283AF;color: white;">{{$i.':00 - '.($i+1).':00'}}</td>
                @endif
                @for($j=1;$j<7;$j++)
                  <td class="Hora_Tarea" style="cursor:not-allowed;" type="button" id="Tarea{{$i.'-'.$j}}"></td>
                @endfor
                </tr>
              @endfor
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <div align="center" class="form-group">
            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
          </div>
        </div>
      </form>
   </div>
</div>
</div>

<div id="Form_Nueva_Tarea" style="display:none">
  <div class="row">
    <div class="form-group">
      <div class="col-md-12" >
            <label style="color:black">Actividad:</label><textarea id="tb_Descripcion_Actividad" type="input" name="tb_Descripcion_Actividad" rows="8" placeholder="Descripción de la actividad" class="form-control" required></textarea></br>
      </div>
    </div>
  </div>
</div>

<div id="Datos_Actividad">
</div>
