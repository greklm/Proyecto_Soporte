<section id="Seccion_Perfiles" style="display:none">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 Estilo_Configuracion">
        <div class="form-horizontal">
          <div class="form-group col-sm-11"><br>
            <label align="right" for="Lista_Perfiles_Modificar" class="col-sm-3 control-label">Perfil:</label>
            <div class="col-sm-5">
              <select class="form-control" id="Lista_Perfiles_Modificar" name="Lista_Perfiles_Modificar">
              </select>
            </div>
            <div class="col-sm-4 input-group">
              <input type='button' id="btn_Eliminar_Perfil" class='btn btn-danger' value='Eliminar'>
              <input type='button' id="btn_Mostrar_Crear_Perfil" class='btn btn-success' value='Crear Nuevo'>
            </div>

              <br><br>

          </div>
          <div style="padding-left:120px" class="form-group col-sm-10"><br>

              <div class="panel-group" id="Lista_Modulos_Perfil">

              </div>
          </div>
          <div class="col-sm-12 input-group" align="center" style="text-align:center;">
            <input id="btn_Cerrar_Modificar_Perfil"type="button" class="btn btn-primary" value="Cancelar">
            <input id="btn_Guardar_Modificar_Perfil"type="button" class="btn btn-success" value="Guardar"><br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal para crear perfil-->
<div class="modal fade" id="Mo_Crear_Perfil" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" align="center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">Crear Perfil</h4>
          </div>
            <form class="form-horizontal" role="form" method="post" action="/reservas" autocomplete="off">
              <div class="modal-body">
                <div class="form-group">
                  <label align="right" for="Nombre_Perfil_Crear" class="col-sm-4 control-label">Nombre de Perfil:</label>
                  <div class="col-sm-6">
                    <input id="Nombre_Perfil_Crear" placeholder="Ingrese Nombre de Perfil" class="form-control" type="text">
                  </div>
                </div>
              </div>
              <div align="center" class="modal-footer">
                <input type="button" id='btn_Guardar_Perfil_Basico' class="btn btn-primary" data-dismiss="modal" value="Guardar">
              </div>
            </form>
        </div>
      </div>
    </div>
