
<div class="modal fade" id="Mo_Mostrar_Subir_Adjuntos" role="dialog">
  <div class="modal-dialog" style="width:400px">
  <!-- Modal content-->
  <div class="modal-content" align="center">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" align="center">Subir Adjuntos</h4>
    </div>
        <div class="modal-body">
          <div class="row form-horizontal" align="center">
          	<form id="upload" method="post" action="/DS_Soporte/public/upload.php" enctype="multipart/form-data">
              <input id="Id_Atencion_Auxiliar" name="Id_Atencion_Auxiliar" type="hidden">
          		<div id="drop" class="Cuadro_Descarga">
          			<a1>Soltar aquí los archivos<a1>
          			<a>Explorar</a>
                <input type="file" name="upl" multiple />
          		</div>

          		<ul>
          			<!-- The file uploads will be shown here -->
          		</ul>

          	</form>
          </div>
        </div>

      </div>
    </div>
</div>

		<!-- JavaScript Includes -->

		<script src={{ asset("assets/js/jquery.knob.js")}}></script>

		<!-- jQuery File Upload Dependencies -->

		<script src={{ asset("assets/js/jquery.iframe-transport.js")}}></script>
		<script src={{ asset("assets/js/jquery.fileupload.js")}}></script>
    <script src={{ asset('js/jquery.dataTables.min.js')}}></script>

		<!-- Our main JS file -->
		<script src={{ asset("js/js_Aplicacion/Script.js")}}></script
