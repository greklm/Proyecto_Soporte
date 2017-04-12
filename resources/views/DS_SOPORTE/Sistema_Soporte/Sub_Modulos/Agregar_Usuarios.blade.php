<!-- Modal para agregar usuario-->

<div class="modal fade" id="Mo_Agregar_Usuario" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
    <div class="modal-content" align="center">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" align="center">Crear Usuario</h4>
    </div>
      <form id="Form_Nuevo_Usuario" role="form" method="post" action="/Agregar_Usuario" autocomplete="off">
        <div class="modal-body">
          <div class="row form-horizontal" align="center">

             <div class="form-group">
                  <label align="right" for="Id_Usuario_Crear" class="col-sm-3 control-label">Id Usuario:</label>
                  <div class="col-sm-7">
                    <input id="Id_Usuario_Crear" name="Id_Usuario_Crear" class="form-control" type="text" placeholder="Ingrese Id de Usuario"/>
                  </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Password_Crear" class="col-sm-3 control-label">Password:</label>
                    <div class="col-sm-7">
                      <input id="Password_Crear" name="Password_Crear" class="form-control" type="password" placeholder="Ingrese Password" />
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Nombres_Crear" class="col-sm-3 control-label">Nombres:</label>
                    <div class="col-sm-7">
                      <input id="Nombres_Crear" name="Nombres_Crear" class="form-control" type="text" placeholder="Ingrese Nombres" />
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Apellidos_Crear" class="col-sm-3 control-label">Apellidos:</label>
                    <div class="col-sm-7">
                      <input id="Apellidos_Crear" name="Apellidos_Crear" class="form-control" type="text" placeholder="Ingrese Apellidos" />
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Telefono_Crear" class="col-sm-3 control-label">Teléfono:</label>
                    <div class="col-sm-7">
                      <input id="Telefono_Crear" name="Telefono_Crear" class="form-control" type="number" placeholder="Ingrese Teléfono" />
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Email_Crear" class="col-sm-3 control-label">E-Mail:</label>
                    <div class="col-sm-7">
                      <input id="Email_Crear" name="Email_Crear" class="form-control" type="email" placeholder="Ingrese E-Mail" />
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Tipo_Usuario_Crear" class="col-sm-3 control-label">Tipo Usuario:</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="Tipo_Usuario_Crear" name="Tipo_Usuario_Crear">
                        <option value ='USUARIO'>USUARIO</option>
                        <option value = 'ADMINISTRADOR'>ADMINISTRADOR</option>
                      </select>
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Area_Crear" class="col-sm-3 control-label">Área:</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="Area_Crear" name="Area_Crear">
                        <option value ='PRODUCCION'>PRODUCCIÓN</option>
                        <option value = 'VENTAS'>VENTAS</option>
                        <option value = 'GERENCIA'>GENERNCIA</option>
                      </select>
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Estado_Crear" class="col-sm-3 control-label">Estado:</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="Estado_Crear" name="Estado_Crear">
                        <option value ='ACTIVO'>ACTIVO</option>
                        <option value = 'INACTIVO'>INACTIVO</option>
                      </select>
                    </div>
              </div>
              <div class="form-group">
                <label align="right" for="Perfil_Crear" class="col-sm-3 control-label">Perfil:</label>
                <div class="col-sm-7">
                  <select class="form-control" id="Perfil_Crear" name="Perfil_Crear">
                  </select>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <div align="center" class="form-group">
            <input id="btn_Guardar_Nuevo_Usuario" type="button" class="btn btn-success" value="Aceptar">
            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancelar">
        </div>
        </div>
      </form>
   </div>
 </div>
</div>
