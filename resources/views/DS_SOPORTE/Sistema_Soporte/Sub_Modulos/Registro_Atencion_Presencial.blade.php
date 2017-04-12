<section id="Reg_Atencion_Presencial" style="display:none">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="well well-sm">

              <form id="Form_Atencion_Presencial" class="form-horizontal" method = "POST" files="true" enctype="multipart/form-data">
                {!!csrf_field()!!}
                  <fieldset>

                      <legend class="text-center header"><div class="col-md-1"><label></label></div>Registro de Atención Presencial</legend><br>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-3 has-float-label">
                            <input id="Id_Atencion_Presencial" class="form-control" type="hidden" name="Id_Atencion_Presencial" required>
                            <input id="Id_Cliente_Atencion_Presencial" class="form-control" type="text" name="Id_Cliente_Atencion_Presencial" placeholder="Id Cliente" required>
                            <label for="Id_Cliente_Atencion_Presencial">Id de Cliente</label>
                          </div>
                          <div class="col-md-2" align="center">
                            <button name="btn_Recuperar_Comprobantes_Cliente_Atencion_Presencial" id="btn_Recuperar_Comprobantes_Cliente_Atencion_Presencial" type="button" class="btn btn-info">Recuperar Datos</button>
                          </div>
                          <div class="col-md-2" align="center">
                            <button name="btn_Recuperar_Atenciones_Cliente_Presencial" id="btn_Recuperar_Atenciones_Cliente_Presencial" type="button" class="btn btn-info">Recuperar Atenciones</button>
                          </div>
                      </div>

                      <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="	fa fa-briefcase bigicon"></i></span>
                        <div class="col-md-7 has-float-label">
                          <select class="form-control" id="Modalidad_Atencion_Presencial" name="Modalidad_Atencion_Presencial">
                            <option value ='GARANTIA'>GARANTIA</option>
                              <option value = 'FACTURADO'>FACTURADO</option>
                              <option value = 'ESPECIAL'>ESPECIAL</option>
                          </select>
                          <label for="Modalidad">Modalidad</label>
                        </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-laptop bigicon"></i></span>

                          <div class="col-md-7 has-float-label">
                              <select  id="Producto_Atencion_Presencial" name="Producto_Atencion_Presencial" data-placeholder="Seleccione el Producto Utilizado" class="form-control" required>
                                <option value="DS-CONT PERSONAL">DS-CONT PERSONAL</option>
                                <option value="DS-CONT PROFESIONAL">DS-CONT PROFESIONAL</option>
                                <option value="DS-CONT EMPRESARIAL">DS-CONT EMPRESARIAL</option>
                                <option value="FACEL">FACEL</option>
                                <option value="DS BUSINESS">DS BUSINESS</option>
                            </select>
                            <label for="Modalidad">Producto</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-clock-o bigicon"></i></span>
                          <div class="col-md-2">
                              <label>Hora Inicio</label>
                          </div>
                          <div class="col-md-1">
                            <select class="form-control" id="Hora_Inicio_Atencion_Presencial" name="Hora_Inicio_Atencion_Presencial">
                              @for($i=7;$i<22;$i++)
                              {
                                <?php If ($i < 10)
                                {
                                ?>
                                <option value = "0{!!$i!!}">0{!!$i!!}</option>
                                <?php }
                                else{
                                  ?>
                                  <option value = "{!!$i!!}">{!!$i!!}</option>
                                <?php } ?>
                              }
                              @endfor
                            </select>
                          </div>
                          <div class="col-md-1" align="center">
                              <label>:</label>
                          </div>
                          <div class="col-md-1">

                            <select class="form-control" id="Minutos_Inicio_Atencion_Presencial" name="Minutos_Inicio_Atencion_Presencial">
                              @for($i=0;$i<60;$i++)
                              {
                                <?php If ($i < 10)
                                {
                                ?>
                                <option value = "0{!!$i!!}">0{!!$i!!}</option>
                                <?php }
                                else{
                                  ?>
                                  <option value = "{!!$i!!}">{!!$i!!}</option>
                                <?php } ?>
                              }
                              @endfor
                            </select>
                          </div>

                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                          <div class="col-md-2">
                              <label>Fecha</label>
                          </div>
                          <div class="col-md-2">
                            <input id="Fecha_Atencion_Presencial" name="Fecha_Atencion_Presencial" type="text" placeholder="DD/MM/AAAA" class="form-control" required >
                          </div>
                      </div>


                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-clock-o bigicon"></i></span>
                          <div class="col-md-2">
                              <label>Hora Fin</label>
                          </div>
                          <div class="col-md-1">
                            <select class="form-control" id="Hora_Fin_Atencion_Presencial" name="Hora_Fin_Atencion_Presencial">
                              @for($i=7;$i<22;$i++)
                              {
                                <?php If ($i < 10)
                                {
                                ?>
                                <option value = "0{!!$i!!}">0{!!$i!!}</option>
                                <?php }
                                else{
                                  ?>
                                  <option value = "{!!$i!!}">{!!$i!!}</option>
                                <?php } ?>
                              }
                              @endfor
                            </select>
                          </div>
                          <div class="col-md-1" align="center">
                              <label>:</label>
                          </div>
                          <div class="col-md-1">
                            <select class="form-control" id="Minutos_Fin_Atencion_Presencial" name="Minutos_Fin_Atencion_Presencial">
                              @for($i=0;$i<60;$i++)
                              {
                                <?php If ($i < 10)
                                {
                                ?>
                                <option value = "0{!!$i!!}">0{!!$i!!}</option>
                                <?php }
                                else{
                                  ?>
                                  <option value = "{!!$i!!}">{!!$i!!}</option>
                                <?php } ?>
                              }
                              @endfor
                            </select>
                          </div>
                      </div>


                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                              <input id="Persona_Contacto_Atencion_Presencial" name="Persona_Contacto_Atencion_Presencial" placeholder="Persona que reporta el problema:" class="form-control" rows="5" required></textarea>
                              <label for="Persona_Contacto_Atencion_Presencial">Persona que reporta el problema:</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                              <input id="Cargo_Persona_Contacto_Atencion_Presencial" name="Cargo_Persona_Contacto_Atencion_Presencial" placeholder="Cargo de la persona que reporta el problema:" class="form-control" rows="5" required></textarea>
                              <label for="Cargo_Persona_Contacto_Atencion_Presencial">Cargo ocupado:</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                              <input id="Telefono_Contacto_Atencion_Presencial" type="number" name="Telefono_Contacto_Atencion_Presencial" placeholder="Teléfono de contacto:" class="form-control" rows="5" required></textarea>
                              <label for="Telefono_Contacto_Atencion_Presencial">Teléfono de contacto:</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"></span>
                          <div class="col-md-7">
                            <label class="radio-inline">
                            <input type="radio" id='Oficina_DS_Atencion_Presencial'name="optradio">Oficina DS:
                            </label>
                            <label class="radio-inline">
                            <input type="radio" id='Local_Cliente_Atencion_Presencial' name="optradio">Local Cliente:
                            </label>
                            <label class="radio-inline">
                            <input type="radio" id='Direccion_Atencion_Presencial' name="optradio">Dirección:
                            </label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                              <input id="Lugar_Atencion_Presencial" name="Lugar_Atencion_Presencial" placeholder="Lugar de atención:" class="form-control" rows="5" required></textarea>
                              <label for="Persona_Contacto_Atencion_Presencial">Lugar de atención:</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                              <textarea id="Problema_Atencion_Presencial" name="Problema_Atencion_Presencial" placeholder="Problema reportado" class="form-control" rows="5" required></textarea>
                              <label for="Problema">Problema Reportado</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-wrench bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                              <textarea  id="Solucion_Atencion_Presencial" name="Solucion_Atencion_Presencial" placeholder="Solución brindada" class="form-control" rows="5"></textarea>
                              <label for="Solucion">Solución Brindada</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-7 has-float-label">
                            <input type="hidden" class="form-control" id="Estado_Atencion_Presencial" name="Estado_Atencion_Presencial">
                            <input type="hidden" id="Id_Origen_Atencion_Presencial" name="Id_Origen_Atencion_Presencial" class="form-control" rows="2">
                              <textarea id="Observaciones_Atencion_Presencial" name="Observaciones_Atencion_Presencial" placeholder="Observaciones" class="form-control" rows="2"></textarea>
                              <label for="OBservaciones">Observaciones</label>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12 text-center">
                            <div class="col-md-1"></div>
                            <input class="btn btn-primary" type="button" id="btn_Descargar_Formulario_Atencion_Presencial" name="btn_Descargar_Formulario_Atencion_Presencial" value="Mostrar Formulario">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12 text-center">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12 text-center">
                            <div class="col-md-1">
                                <label></label>
                            </div>

                            <input class="btn btn-primary" type="button" id="Continuar_Atencion_Presencial" name="Continuar_Atencion_Presencial" value="Continuar Después">
                            <input class="btn btn-primary" type="button" id="Concluir_Atencion_Presencial" name="Concluir_Atencion_Presencial" value="Concluir Atención">
                          </div>
                        </div>

                      <div class="form-group"><br>

                          <div class="col-md-5">
                              <label></label>
                          </div>
                          <div class="col-md-2" align="">
                            <select class="form-control" id="Id_Derivar_Atencion_Presencial" name="Id_Derivar_Atencion_Presencial">
                              @for($i=0;$i<count($Lista_Usuarios);$i++)
                              {

                                <?php If(($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"]) and ($Lista_Usuarios[$i]["TIPO_USUARIO"]=="USUARIO"))
                                {
                                ?>
                                  <option value = "{!!$Lista_Usuarios[$i]["ID_USUARIO"]!!}">{{$Lista_Usuarios[$i]["ID_USUARIO"]}}</option>
                                <?php }
                                else{
                                  ?>
                                <?php } ?>
                              }
                              @endfor
                            </select>
                          </div>
                          <div class="col-md-1" align="left">
                              <input class="btn btn-primary" type="button" id="Derivar_Atencion_Presencial" name="Derivar_Atencion_Presencial" value="Derivar">
                          </div>
                    </div>

                    <div class="form-group" align="center">
                      <div class="col-md-12" align="center">
                          <div class="col-md-1"></div>
                          <input class="btn btn-primary" type="button" id="btn_Subir_Adjunto_Atencion_Presencial"  name="btn_Subir_Adjunto_Atencion_Presencial" value="Añadir Adjuntos">
                      </div>
                    </div>
                  </fieldset>
              </form>
          </div>
      </div>
    </div>
    </div>
</section>


<!-- Modal para mostrar lista de clientes-->
<div class="modal fade" id="Mo_Lista_Clientes_Atencion_Presencial" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" align="center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Lista de Clientes</h4>
      </div>
      <div class="modal-body">
        <table id="Table_Clientes_Buscar_Atencion_Presencial" border="1px" class="table table-bordered">
          <thead>
            <tr valign="middle" style="vertical-align:middle;" id="firstrow_reporte"><th valign="middle">Id Cliente</th><th>Denominación</th><th>Persona de Contacto</th><th>Teléfono</th><th>Observaciones</th><th></th></tr>
          </thead>
          <tbody id='Tbody_Table_Clientes_Buscar_Atencion_Presencial'>
          </tbody>
        </table>
      </div>
      <div align="center" class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div id="Comprobantes_Cliente_Atencion_Presencial">
</div>

<div id="Atenciones_Cliente_Atencion_Presencial">
</div>
