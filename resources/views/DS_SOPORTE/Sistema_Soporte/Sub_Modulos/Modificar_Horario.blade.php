<!-- Modal para modificar horario-->

<div class="modal fade" id="Mo_Modificar_Horario" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content" align="center">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="row">
          <h4 class="modal-title" align="center">Horario</h4>
          <div class="col-md-5 col-centered">
          <select id="Select_Usuario_Horario" text-align="center" type="input" class="form-control">
          @for($i=0;$i<count($Lista_Usuarios);$i++)
          {
              <option value="{{$Lista_Usuarios[$i]["ID_USUARIO"]}}">{{$Lista_Usuarios[$i]["ID_USUARIO"]}}</option>
          }
          @endfor
        </select>
      </div>
      </div>
    </div>
      <form role="form" method="post" action="/Guardar_Horario" autocomplete="off">
        <div class="modal-body">
          <table class="table table-bordered table-condensed Tabla_Horario" >
            <thead >
                <tr><th  style="background-color:#086FB3;color: white;">Hora</th><th class="Dia_Semana">Lunes</th><th class="Dia_Semana">Martes</th><th class="Dia_Semana">Miércoles</th><th class="Dia_Semana">Jueves</th><th class="Dia_Semana">Viernes</th><th class="Dia_Semana">Sábado</th></tr>
            </thead>
            <tbody id="Tbody_Horario">
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
                  <td class="Hora" type="button" id="{{$i.'-'.$j}}"></td>
                @endfor
                </tr>
              @endfor
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <div align="center" class="form-group">
            <input id="btn_Guardar_Horario" type="button" class="btn btn-primary" value="Aceptar">
            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
          </div>
        </div>
      </form>
   </div>
 </div>
</div>


<!-- Modal de mensaje al modificar horario-->
<div class="modal fade" id="Mo_Estado_Horario" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content" align="center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Horario</h4>
        </div>
          <form role="form" method="post" action="/reservas" autocomplete="off">
            <div class="modal-body">

              <div id="Estado_Horario">

              </div>
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div align="center" class="modal-footer">
              <input type="button" class="btn btn-primary" data-dismiss="modal" value="Aceptar">
            </div>
          </form>
      </div>

    </div>
  </div>
