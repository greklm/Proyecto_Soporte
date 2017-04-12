
<!DOCTYPE html>
<html>
<head>
<title>Data Service-Soporte de Atención</title>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Theme CSS -->
<link href="css/freelancer.min.css" rel="stylesheet">

<link href="css/freelancer.min.css" rel="stylesheet">
<style>
#content {
    position: relative;
}
#content img {
    position: absolute;
    width: 3%;
    height: : 3%;
    top: 0px;
    left: 225px;
}
@media print{

  body
  {
    margin-top: 0mm;
  }
  .col-sm-7-print{
    display: inline-block !important;
    width: 60%;
  }
  .col-sm-3-print{
    display: inline-block !important;
    width: 27%;
    text-align: left;
  }
  .col-sm-1-print{
    display: inline-block !important;
    width: 10%;
    text-align: left;
  }
  .col-sm-2-print{
    display: inline-block !important;
    width: 16%;
    text-align: left;
  }
  .col-sm-4-print{
    display: inline-block !important;
    width: 30%;
    text-align: left;
  }
  .col-sm-5-print{
    display: inline-block !important;
    width: 40%;
    text-align: left;
  }
  .col-sm-1-5-print{
    display: inline-block !important;
    width: 13%;
    text-align: left;
  }
  .col-sm-2-5-print{
    display: inline-block !important;
    width: 21%;
    text-align: left;
  }
  .row-print{
    padding-left: 5%;
  }
  .content-footer_print{
      padding-top: 40px;
  }
  .content-print{
    border-top-right-radius:10%;
    border-top-left-radius:10%;
  }
  .sign_label{
    margin-bottom: -10px;

  }
}
</style>
</head>
<body background="img/bi_wallpaper.jpg">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
              <div id="content">
                  <img src="img/DSCONTLogo.jpg" class="ribbon"/>
              </div>
                <form class="form-horizontal" method = "POST" files="true">
                    <fieldset>

                        <legend class="text-center header"><h3>Data Service Capacitación S. R. Ltda.</h3></legend>
                        <div align="center" class="col-sm-12 col-md-12">
                          <h4 text-align="center">Ficha de Atención al Cliente</h4>
                        <div>
                        <div align="left" class="col-sm-12 col-md-12">
                          <label text-align="left">Datos Generales del Cliente:</label>
                        </div>
                        <div class="form-group content-print">
                          <div class="form-group row-print">
                                <label text-align="right" class="col-sm-3 col-sm-3-print control-label">Nombre de la Organización:</label>
                                <div class="col-sm-7 col-sm-7-print">
                                  <input class="form-control" type="text" placeholder="Ingrese el nombre de la Organización" value="{{$Razon_Social}}">
                                </div>
                          </div>

                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Nombre del Representante Legal:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="text" placeholder="Ingrese el nombre del Representante Legal" value="{{$Persona_Contacto}}">
                                 </div>
                           </div>

                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Dirección Fiscal:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="text" placeholder="Dirección Fiscal" value="{{$Direccion_Fiscal}}">
                                 </div>
                           </div>

                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Teléfonos:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="text" placeholder="Teléfonos" value="{{$Telefono}}">
                                 </div>
                           </div>

                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Correo Electrónico:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="email" placeholder="E-Mail" value="{{$Email}}">
                                 </div>
                           </div>
                         </div>

                        <div align="left" class="col-sm-12 col-md-12">
                          <label text-align="left">Datos del Problema Reportado:</label>
                        </div>
                         <div class="form-group content-print">
                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Sistema:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="text" placeholder="Ingrese el Sistema" value="{{$Sistema}}">
                                 </div>
                           </div>

                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Llamada:</label>

                                 <label align="right" class="col-sm-1 col-sm-1-print control-label">Fecha:</label>
                                 <div class="col-sm-2 col-sm-2-print">
                                   <input class="form-control" type="text" placeholder="Ingrese el Sistema" value="{{$Fecha}}">
                                 </div>
                                 <label align="right" class="col-sm-1 col-sm-1-print control-label">Hora:</label>
                                 <div class="col-sm-2 col-sm-2-print">
                                   <input class="form-control" type="text" placeholder="Ingrese el Sistema" value="{{$Hora_Inicio}}">
                                 </div>
                           </div>

                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Descripción:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <textarea class="form-control" type="text" placeholder="Descripción de Problema" rows="2">{{$Problema_Real}}</textarea>
                                 </div>
                           </div>
                         </div>

                        <div align="left" class="col-sm-12 col-md-12">
                          <label align="left">Datos de Atención:</label>
                        </div>
                         <div class="form-group content-print">
                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Lugar de Soporte:</label>
                                 <label align="left" class="col-sm-2 col-sm-2-print control-label">{{$Lugar_Soporte}}</label>
                                 <div class="col-sm-4 col-sm-4-print">
                                   <input class="form-control" type="text" placeholder="Dirección" value="{{json_decode($Direccion)}}">
                                 </div>
                           </div>
                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Modalidad de Soporte:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="text" placeholder="Modalidad de Soporte" value="{{$Modalidad}}">
                                 </div>
                           </div>
                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Persona que Atiende:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <input class="form-control" type="text" placeholder="Persona que atiende" value="{{$Id_Usuario}}">
                                 </div>
                           </div>
                           <div class="form-group row-print">
                                 <label align="left" class="col-sm-3 col-sm-3-print control-label">Fecha/Hora Inicio:</label>
                                 <div class="col-sm-2 col-sm-2-print">
                                   <input class="form-control" type="text" placeholder="Persona que atiende" value="{{$Fecha." ".$Hora_Inicio}}">
                                 </div>
                                 <label align="left" class="col-sm-2 col-sm-2-print control-label">Fecha/Hora Fin:</label>
                                 <div class="col-sm-2 col-sm-2-print">
                                   <input class="form-control" type="text" placeholder="Persona que atiende" value="{{$Fecha." ".$Hora_Fin}}">
                                 </div>
                           </div>
                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Problema Real:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <textarea class="form-control" type="text" placeholder="Descripción de Problema Real" rows="2">{{$Problema_Real}}</textarea>
                                 </div>
                           </div>
                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Solución Brindada:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <textarea class="form-control" type="text" placeholder="Solución brindada" rows="2">{{$Solucion}}</textarea>
                                 </div>
                           </div>
                           <div class="form-group row-print">
                                 <label align="right" class="col-sm-3 col-sm-3-print control-label">Observaciones:</label>
                                 <div class="col-sm-7 col-sm-7-print">
                                   <textarea class="form-control" type="text" placeholder="Observaciones" rows="2">{{$Observaciones}}</textarea>
                                 </div>
                           </div>

                         </div>
                        <div align="left" class="col-sm-12 col-md-12">
                          <label text-align="left">Cargo de Entrega:</label>
                        </div>
                         <div class="content-print">
                           <div class="form-group row-print">
                                <label align="left" class="col-sm-3-print control-label"></label>
                                 <label align="left" class="col-sm-2 col-sm-2-print control-label">Manual</label>
                                 <label align="left" class="col-sm-2 col-sm-2-print control-label">CD Instalador</label>
                                 <label align="left" class="col-sm-2 col-sm-2-print control-label">USB/Llave</label>
                                 <label align="left" class="col-sm-2 col-sm-2-print control-label">N/A</label>
                           </div>
                         <div>

                    </fieldset>
                    <div class="content-footer_print" style="padding-top:40px">
                      <div class="form-group row-print">
                           <label align="left" class="col-sm-2-print control-label"></label>
                            <label align="left" class="col-sm-5 col-sm-5-print sign_label control-label">______________</label>
                            <label align="left" class="col-sm-5 col-sm-5-print sign_label control-label">________________</label>
                      </div>
                      <div class="form-group row-print" style="margin-top:-20px">
                            <label align="left" class="col-sm-2-print control-label"></label>
                            <label align="center" class="col-sm-5 col-sm-5-print control-label">Firma del Cliente</label>
                            <label align="center" class="col-sm-5 col-sm-5-print control-label">Firma del Personal</label>
                      </div>
                      <div class="form-group row-print">
                          <label align="left" class="col-sm-3 col-sm-2-5-print control-label">Nombres y Apellidos:</label>
                          <div class="col-sm-4 col-sm-3-print">
                            <input class="form-control" type="text" placeholder="Nombres y Apellidos" value="{{$Persona_Contacto}}">
                          </div>
                          <label align="left" class="col-sm-1 col-sm-1-print control-label">Nombre(s):</label>
                          <div class="col-sm-3 col-sm-3-print">
                            <input class="form-control" type="text" placeholder="Nombres de Personal" value="{{$Id_Usuario}}">
                          </div>
                      </div>
                      <div class="form-group row-print">
                          <label align="left" class="col-sm-3 col-sm-2-5-print control-label">Documento de Identidad:</label>
                          <div class="col-sm-3 col-sm-3-print">
                            <input class="form-control" type="text" placeholder="Documento de Identidad">
                          </div>
                      </div>
                      <div class="form-group row-print">
                          <label align="left" class="col-sm-3 col-sm-2-5-print control-label">Relación con el Titular:</label>
                          <div class="col-sm-3 col-sm-3-print">
                            <input class="form-control" type="text" placeholder="Relación con el Titular">
                          </div>
                      </div>
                    <div>
                </form>
            </div><br>
            <div class="form-group row-print">
                 <label align="left" class="col-sm-2-print control-label"></label>
                  <label align="center" class="col-sm-3 col-sm-3-print sign_label control-label" style="font-size:10px">Lima: 01-2968849</label>
                  <label align="center" class="col-sm-3 col-sm-3-print sign_label control-label" style="font-size:10px">Cusco: 084-222272</label>
                  <label align="center" class="col-sm-3 col-sm-3-print sign_label control-label" style="font-size:10px">www.dscont.pe</label>
            </div>
            <div class="form-group row-print" style="margin-top:-20px; align:center; text-allign:center;">
                 <label align="left" class="col-sm-3 col-sm-1-5-print control-label"></label>
                  <label align="center" class="col-sm-3 col-sm-3-print sign_label control-label" style="font-size:10px">Calle Mariano Carranza 226 Of.301</label>
                  <label align="center" class="col-sm-3 col-sm-3-print sign_label control-label" style="font-size:10px">Jr. Cuba I-12 A Urb. Quispicanchi</label>
            </div>
        </div>
      </div>
      </div>
  </section>
</body>
</body>
</html>
<body>
