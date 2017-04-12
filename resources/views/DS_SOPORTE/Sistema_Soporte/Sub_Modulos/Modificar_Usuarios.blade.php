<!-- Modal para modificar usuario-->
<div class="modal fade" id="Mo_Modificar_Usuario" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" align="center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Modificar Usuario</h4>
      </div>
        <form role="form" method="post" action="/Modificar_Usuario" id="Form_Usuario_Actualizar" autocomplete="off">
          <div class="modal-body">
            <div class="row form-horizontal" align="center">

              <div class="form-group">
                <label align="right" for="Id_Usuario_Modificar" class="col-sm-3 control-label">Usuario:</label>
                  <div class="col-md-7">
                  <input id="Id_Usuario_Modificar_Auxiliar" name="Id_Usuario_Modificar_Auxiliar" type="hidden">
                  <select onchange="Cargar_Informacion_Usuario()" class="form-control" id="Id_Usuario_Modificar" name="Id_Usuario_Modificar">
                    @for($i=0;$i<count($Lista_Usuarios);$i++)
                    {
                      <?php If($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"])
                      {
                      ?>
                        <option value='<?php echo json_encode($Lista_Usuarios[$i])?>'>{{$Lista_Usuarios[$i]["ID_USUARIO"]}}</option>
                      <?php } ?>
                    }
                    @endfor
                  </select>
                </div>
              </div>

                <div class="form-group">
                      <label align="right" for="Password_Modificar" class="col-sm-3 control-label">Password:</label>
                      <div class="col-sm-7">
                        <input id="Password_Modificar" name="Password_Modificar" class="form-control" type="password" placeholder="Ingrese Password"/>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Nombres_Modificar" class="col-sm-3 control-label">Nombres:</label>
                      <div class="col-sm-7">
                        <input id="Nombres_Modificar" name="Nombres_Modificar" class="form-control" type="text" placeholder="Ingrese Nombres"/>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Apellidos_Modificarr" class="col-sm-3 control-label">Apellidos:</label>
                      <div class="col-sm-7">
                        <input id="Apellidos_Modificar" name="Apellidos_Modificar" class="form-control" type="text" placeholder="Ingrese Apellidos"/>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Telefono_Modificar" class="col-sm-3 control-label">Teléfono:</label>
                      <div class="col-sm-7">
                        <input id="Telefono_Modificar" name="Telefono_Modificar" class="form-control" type="number" placeholder="Ingrese Teléfono"/>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Email_Modificar" class="col-sm-3 control-label">E-Mail:</label>
                      <div class="col-sm-7">
                        <input id="Email_Modificar" name="Email_Modificar" class="form-control" type="email" placeholder="Ingrese E-Mail"/>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Tipo_Usuario_Modificar" class="col-sm-3 control-label">Tipo Usuario:</label>
                      <div class="col-sm-7">
                        <select class="form-control" id="Tipo_Usuario_Modificar" name="Tipo_Usuario_Modificar">
                          <option value ='USUARIO'>USUARIO</option>
                          <option value ='ADMINISTRADOR'>ADMINISTRADOR</option>
                        </select>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Area_Modificar" class="col-sm-3 control-label">Área:</label>
                      <div class="col-sm-7">
                        <select class="form-control" id="Area_Modificar" name="Area_Modificar">
                          <option value ='PRODUCCION'>PRODUCCIÓN</option>
                          <option value ='VENTAS'>VENTAS</option>
                          <option value ='GERENCIA'>GERENCIA</option>
                        </select>
                      </div>
                </div>

                <div class="form-group">
                      <label align="right" for="Estado_Modificar" class="col-sm-3 control-label">Estado:</label>
                      <div class="col-sm-7">
                        <select class="form-control" id="Estado_Modificar" name="Estado_Modificar">
                          <option value ='ACTIVO'>ACTIVO</option>
                          <option value = 'INACTIVO'>INACTIVO</option>
                        </select>
                      </div>
                </div>
                <div class="form-group">
                      <label align="right" for="Estado_Modificar" class="col-sm-3 control-label">Perfil:</label>
                      <div class="col-sm-7">
                        <select class="form-control" id="Perfil_Modificar" name="Perfil_Modificar">
                        </select>
                      </div>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <div align="center" class="form-group">
              <input id="btn_Actualizar_Usuario" type="button" class="btn btn-success" value="Aceptar">
              <input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancelar">
          </div>
          </div>
        </form>
     </div>
  </div>
</div>
