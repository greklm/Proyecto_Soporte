  <!DOCTYPE html>
  <html lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>DATA Service - Observaciones</title>

      <!-- Bootstrap Core CSS -->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
      <!-- Custom Fonts -->
      <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
      <link href='{{asset("https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800")}}' rel='stylesheet' type='text/css'>

      <link href='{{asset("https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic")}}' rel='stylesheet' type='text/css'>

      <!-- Plugin CSS -->
      <link href='{{asset("css/magnific-popup/magnific-popup.css")}}' rel="stylesheet">

      <!-- Theme CSS -->
      <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">

          <!-- Calendar -->
      <link rel="stylesheet" href="{{asset('//code.jquery.com/ui/1.11.2/themes/dark-hive/jquery-ui.css')}}">

      <!--Table design-->
      <link href="{{asset('css/Tables/table-general.css')}}" rel="stylesheet">

      <!--Calendario para agenda-->
      <link href="{{asset('css/Agenda/zabuto_calendar.css')}}" rel="stylesheet" type="text/css">

      <!-- Estilos para combobox -->
      <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
      <link rel="stylesheet" href="{{asset('css/prism.css')}}">

      <style>
      .cssTable td
      {
      text-align:center;

      }
      #Nro_Eventos_Futuros{
        background-color: #F0B32F;
      }
      </style>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>
<script>
    var Nombre_Dominio = '/DS_Soporte/public/';
</script>
  <body id="page-top">

      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                  </button>
                  <a class="navbar-brand page-scroll" href="#page-top">DATA SERVICE Observaciones</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                      <li>
                          <a class="page-scroll" href="#about">Enviar Observación</a>
                      </li>
                      <li>
                         <a id="btn_Enviar_Notificaciones" href="#">Enviar Notificación</a>
                     </li>
                      <li>
                          <a style="hover" href="#" class="page-scroll" data-toggle="dropdown"><span id="Nro_Eventos_Futuros" style="background-color_red" class="badge pull-right">0</span><span id="Nro_Eventos_Para_Hoy" class="badge pull-right">0</span>Agenda</a>

                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="btn_Mostrar_Agenda">Mostrar Agenda</a></li>
                            <li><a href="#" id="btn_Nuevo_Evento">Agregar Evento</a></li>
                            <li class="divider"></li>
                          </ul>

                      </li>
                      <li>
                          <a style="hover" href="#" class="page-scroll" data-toggle="dropdown"><span id="Nro_Notificaciones_Observaciones" class="badge pull-right">0</span>Reportes de observaciones</a>

                          <ul class="dropdown-menu" role="menu" style="width:300px; padding-left: 10px">
                            <li>
                                <a class="page-scroll" href="#services" ><span id="Nro_Observaciones_Pendientes" class="badge pull-right">{!!count($Observaciones_Pendientes)!!}</span>Observaciones Pendientes</a>
                            </li>
                             <li>
                                <a class="page-scroll" href="#Observaciones_Enviadas_Pendientes" ><span id="Nro_Observaciones_Enviadas_Pendientes" class="badge pull-right">{!!count($Observaciones_Enviadas_Pendientes)!!}</span>Observaciones Enviadas Pendientes</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#portfolio"><span id="Nro_Observaciones_Solucionadas" class="badge pull-right"> {!!count($Observaciones_Solucionadas)!!}</span>Observaciones Enviadas Solucionadas</a>
                            </li>
                            <li>
                              <a id="btn_Registro_Observaciones" class="button" style="cursor:pointer">Registro de Observaciones</a>
                            </li>
                            <li class="divider"></li>
                          </ul>

                      </li>
                      <li>
                          <a class="page-scroll" href={{action('UsuarioController@out')}}>Salir</a>
                      </li>
                  </ul>
              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
      </nav>

      <header>
          <div class="header-content">
              <div class="header-content-inner"><br>
                  <h1 id="homeHeading">SISTEMA DE REGISTRO DE OBSERVACIONES</h1><br>

                  <div id="date-popover" class="popover top" style="...">
                      <div id="date-popover-content" class="popover-content"></div>
                  </div>

                  <div align="center" id="my-calendar"></div>
              </div>
          </div>
      </header>

      <section class="bg-primary" id="about">
          <div class="container">
              <div class="row">
                  <legend class="text-center" style="color: #fff;">Registro de Observación</legend><br>

                  <div class="col-lg-8 col-lg-offset-2 text-center">

                    <form id="Form_Registrar_Observacion" role="form" method="post" action="/DS_Soporte/public/Observaciones" autocomplete="off">

                      <div class="form-group"><br>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="Id_Observacion" name="Id_Observacion" type="hidden" class="form-control">
                        <input id="Id_Usuario_Origen" name="Id_Usuario_Origen" type="hidden" value ='{{$Datos_Usuario["ID_USUARIO"]}}'>
                        <span class="col-md-1 col-md-offset-2"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-3" align="left"><a1>Usuario Destino:</a1></div>
                        <div class="col-md-4">
                          <select class="form-control" id="Id_Usuario_Destino" name="Id_Usuario_Destino">
                            @for($i=0;$i<count($Lista_Usuarios);$i++)
                            {
                              <?php If(($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"]) and ($Lista_Usuarios[$i]["TIPO_USUARIO"]=="USUARIO")and ($Lista_Usuarios[$i]["AREA"]=="PRODUCCION"))
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
                      </div></br></br>

                      <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-laptop bigicon"></i></span>
                        <div class="col-md-2" align="left"><a1>Proyecto:</a1></div>
                        <div class="col-md-5">
                            <select  id="Proyecto" name="Proyecto" data-placeholder="Seleccione el Proyecto Utilizado" class="form-control" required>
                              <option value="MÓDULO DE COMPRAS">MÓDULO DE COMPRAS</option>
                              <option value="MÓDULO DE VENTAS">MÓDULO DE VENTAS</option>
                              <option value="MÓDULO DE TABLAS GENERALES">MÓDULO DE TABLAS GENERALES</option>
                              <option value="PUNTO DE OPERACIÓN">PUNTO DE OPERACIÓN</option>
                              <option value="CUENTAS POR COBRAR">CUENTAS POR COBRAR</option>
                              <option value="CUENTAS POR PAGAR">CUENTAS POR PAGAR</option>
                              <option value="PLANILLAS">PLANILLAS</option>
                              <option value="ACTIVOS FIJOS">ACTIVOS FIJOS</option>
                              <option value="ALMACEN">ALMACEN</option>
                              <option value="CONTABILIDAD">CONTABILIDAD</option>
                              <option value="FACEL">FACEL</option>
                              <option value="DS-CONT">DS-CONT</option>

                          </select>
                        </div>
                      </div></br></br>

                       <div class="form-group">
                          <span align="rigth" class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-4" align="left"><a1>Observación reportada:</a1></div>
                        </div>
                        <div class="col-md-12" >
                          <div class="col-md-3"></div>
                          <div class="col-md-7" align="center">
                            <textarea id="Problema" name="Problema" placeholder="Observación reportada" class="form-control" rows="5" required></textarea></br>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                          <div class="col-md-5" align="left"><a1>Fecha Límite para ser atendido:</a1></div>
                        </div>
                        <div class="col-md-12" >
                          <div class="col-md-3"></div>
                            <div class="col-md-7">
                              <input id="Fecha_Limite" name="Fecha_Limite" placeholder="Fecha Límite" class="form-control" readonly="readonly" required></input></br>
                            </div>
                      </div>


                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-4" align="left"><a1>Observaciones Adicionales:</a1></div>
                        </div>
                        <div class="col-md-12" >
                          <div class="col-md-3"></div>
                          <div class="col-md-7">
                            <textarea id="Observaciones" name="Observaciones" placeholder="Observaciones" class="form-control" rows="2"></textarea></br>
                          </div>
                        </div>

                    </form>

                    
                        <div class="form-group" align="center">
                          <div class="col-md-12" align="center">
                            <div class="col-md-1"></div>
                            <button type="button" class="btn btn-primary" id="uploadFile">Añadir Adjunto</button>
                          </div>
                        </div>

                      <div class="form-group" align="center">
                          <div class="col-md-12" align="center"></br>
                              <div class="col-md-1"></div>
                              <input form="Form_Registrar_Observacion" class="btn btn-primary" type="submit" id="Enviar"  name="Enviar" value="Enviar">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>


      <section style="display:none" class="bg-primary" id="Sec_Atender_Observacion">
          <div class="container">
              <div class="row">
                  <legend class="text-center" style="color: #fff;">Registro de Observación</legend><br>

                  <div class="col-lg-7 col-lg-offset-2 text-center">

                    <form id="Form_Atender_Observacion" role="form" method="post" action={{action("ObservacionController@Enviar")}} autocomplete="off">

                      {{csrf_field()}}

                      <div class="form-group"><br>
                        <input id="Id_Observacion_Atender" name="Id_Observacion_Atender" type="hidden" class="form-control">

                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-3"><a1>Usuario Origen:</a1></div>
                        <div class="col-md-5">
                          <input id="Id_Usuario_Atender" name="Id_Usuario_Atender" type="hidden" class="form-control" value="{{$Datos_Usuario["ID_USUARIO"]}}">
                          <input class="form-control" id="Id_Usuario_Origen_Atender" name="Id_Usuario_Origen_Atender" readonly="readonly">
                        </div>
                      </div></br></br>

                      <div style="display:none" id="Div_Id_Usuario_Derivador_Atender" class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-3"><a1>Derivado por:</a1></div>
                        <div class="col-md-5">
                           <input class="form-control" id="Id_Usuario_Derivador_Atender" name="Id_Usuario_Derivador_Atender" readonly="readonly">
                        </div></br></br>
                      </div>

                      <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-laptop bigicon"></i></span>
                        <div class="col-md-3"><a1>Proyecto:</a1></div>
                        <div class="col-md-5">
                           <input class="form-control" id="Proyecto_Atender" name="Proyecto_Atender" readonly="readonly">
                        </div></br></br>
                      </div>


                      <div class="form-group">
                        <div class="col-md-11">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-5"><a1>Observación reportada:</a1></div>
                        </div>
                        <div class="col-md-12" >
                          <div class="col-md-3"></div>
                          <div class="col-md-8" align="center">
                            <textarea id="Problema_Atender" name="Problema_Atender" placeholder="Observación reportada" class="form-control" rows="5" required></textarea></br>
                          </div>
                        </div>
                      </div>




                      <div class="form-group">
                        <div class="col-md-11">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                          <div class="col-md-6"><a1>Fecha Límite para ser atendido:</a1></div>
                        </div>
                         <div class="col-md-12" >
                          <div class="col-md-3"></div>
                            <div class="col-md-8">
                              <input id="Fecha_Atender" name="Fecha_Atender" type="hidden" class="form-control">
                              <input id="Id_Origen_Atender" name="Id_Origen_Atender" type="hidden" class="form-control">

                              <input id="Fecha_Limite_Atender" name="Fecha_Limite_Atender" placeholder="Fecha Límite" class="form-control" readonly="readonly"></br>
                            </div>
                          </div>
                      </div>


                      <div class="form-group">
                        <div class="col-md-11">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-4"><a1>Observaciones:</a1></div>
                        </div>
                        <div class="col-md-12" >
                          <div class="col-md-3"></div>
                          <div class="col-md-8">
                              <textarea id="Observaciones_Atender" name="Observaciones_Atender" placeholder="Observaciones" class="form-control" rows="2" value=' '></textarea></br>
                          </div>
                        </div>
                      </div></br></br>

                      <div class="form-group">
                        <div class="col-md-11">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                          <div class="col-md-3"><a1>Solución:</a1></div>
                        </div>
                        <div class="col-md-12" >
                          <div class="col-md-3"></div>
                          <div class="col-md-8">
                              <textarea id="Solucion_Atender" name="Solucion_Atender" placeholder="Solución" class="form-control" rows="2"></textarea></br>
                          </div>
                        </div>
                      </div></br></br>
                    </form>

                        <div class="form-group" align="center">
                          <div class="col-md-12" align="center"></br>
                            <div class="col-md-2"></div>
                            <button type="button" class="btn btn-primary" id="uploadFile2">Añadir Adjunto</button>
                          </div>
                        </div>
                      <div class="form-group" align="center">
                          <div class="col-md-12" align="center"></br>
                             <div class="col-md-4"></div>

                            <div class="col-md-4">
                              <select form="Form_Atender_Observacion" class="form-control" id="Id_Usuario_Destino" name="Id_Usuario_Destino">
                                @for($i=0;$i<count($Lista_Usuarios);$i++)
                                {
                                  <?php If(($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"]) and ($Lista_Usuarios[$i]["TIPO_USUARIO"]=="USUARIO")and ($Lista_Usuarios[$i]["AREA"]=="PRODUCCION"))
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
                            <div class="col-md-2">
                            <input form="Form_Atender_Observacion" class="btn btn-primary" type="submit" id="Derivar" name="Derivar" value="Derivar"></br></br>
                            </div>
                          </div>
                      </div>


                    <div class="form-group" align="center">
                        <div class="col-md-12" align="center"></br>
                          <div class="col-md-2"></div>
                          <table id = "Table_Adjuntos" class="general">
                            <thead>
                              <tr class="head" id="firstrow"><th>Nro Adjunto</th><th>Link de Descarga</th></tr>
                            </thead>
                            <tbody id="tbody_Adjuntos">
                            </tbody>
                          </table>
                        </div>
                      </div>


                      <div class="form-group" align="center">
                          <div class="col-md-12" align="center"></br>
                              <div class="col-md-2"></div>
                              <input form="Form_Atender_Observacion" class="btn btn-primary" type="submit" id="Enviar"  name="Enviar" value="Enviar">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section id="services">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <h2 class="section-heading">Observaciones pendientes</h2>
                      <hr class="primary">
                        <div class="table-responsive">
                          <table id="Table_Observaciones_Pendientes" class="general" align="center">
                            <thead>
                              <tr class="head" id="firstrow"><th></th><th>Reportado por:</th><th>Derivado por:</th><th>Fecha</th><th>Fecha Límite</th><th>Proyecto</th><th>Problema Reportado</th><th>Observaciones</th></tr>
                            </thead>
                              <tbody id="tbody_Observaciones_Pendientes">

                              @for($i=0;$i<count($Observaciones_Pendientes);$i++)
                                <tr href="#Reg_Atencion">
                                <td onclick='Atender_Observacion(<?php echo json_encode($Observaciones_Pendientes[$i])?>)'><button  class="btn btn-primary btn_Atender_Observacion">Atender</button></td>
                                <td>{!!Form::label('hola',$Observaciones_Pendientes[$i]["ID_USUARIO_ORIGEN"])!!}</td>
                                <td>{!!$Observaciones_Pendientes[$i]["ID_USUARIO_DERIVADOR"]!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Pendientes[$i]["FECHA"]))!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Pendientes[$i]["FECHA_LIMITE"]))!!}</td>
                                <td>{!!$Observaciones_Pendientes[$i]["PROYECTO"]!!}</td>
                                <td>{!!$Observaciones_Pendientes[$i]["PROBLEMA_REPORTADO"]!!}</td>
                                @if($Observaciones_Pendientes[$i]["OBSERVACIONES"]!=null)
                                <td>{!!$Observaciones_Pendientes[$i]["OBSERVACIONES"]!!}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>
                              @ENDFOR

                              </tbody>

                          </table>
                        </div>
                      </div>



                  </div>
              </div>
          </div>
      </section>

  <section id="Observaciones_Enviadas_Pendientes">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <h2 class="section-heading">Observaciones enviadas pendientes</h2>
                      <hr class="primary">
                        <div class="table-responsive">
                          <table id="Table_Observaciones_Pendientes" class="general" align="center">
                            <thead>
                              <tr class="head" id="firstrow"><th></th><th>Reportado a:</th><th>Fecha de envío:</th><th>Fecha Límite</th><th>Dias de atraso</th><th>Proyecto</th><th>Problema Reportado</th><th>Observaciones</th></tr>
                            </thead>
                              <tbody id="tbody_Observaciones_Enviadas_Pendientes">

                              @for($i=0;$i<count($Observaciones_Enviadas_Pendientes);$i++)
                                <td><button class='btn btn-primary btn_Enviar_Notificacion' onclick='$(this).Enviar_Notificacion(<?php echo json_encode($Observaciones_Enviadas_Pendientes[$i]["ID_USUARIO_DESTINO"])?>)'>Enviar Notificación</button></td>
                                <td>{!!Form::label('hola',$Observaciones_Enviadas_Pendientes[$i]["ID_USUARIO_DESTINO"])!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Enviadas_Pendientes[$i]["FECHA"]))!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Enviadas_Pendientes[$i]["FECHA_LIMITE"]))!!}</td>
                                <td>{!!$Observaciones_Enviadas_Pendientes[$i]["DIAS_ATRASO"]!!}</td>
                                <td>{!!$Observaciones_Enviadas_Pendientes[$i]["PROYECTO"]!!}</td>
                                <td>{!!$Observaciones_Enviadas_Pendientes[$i]["PROBLEMA_REPORTADO"]!!}</td>
                                @if($Observaciones_Enviadas_Pendientes[$i]["OBSERVACIONES"]!=null)
                                <td>{!!$Observaciones_Enviadas_Pendientes[$i]["OBSERVACIONES"]!!}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>
                              @ENDFOR

                              </tbody>

                          </table>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>



      <section id="portfolio">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <h2 class="section-heading">Observaciones Enviadas Solucionadas</h2>
                      <hr class="primary">
                        <div class="table-responsive">
                          <table class="general" align="center">
                            <thead>
                              <tr class="head" id="firstrow"><th></th><th>Adjuntos</th><th>Atendido por:</th><th>Derivado por:</th><th>Fecha</th><th>Fecha Límite</th><th>Fecha Atendido</th><th>Proyecto</th><th>Problema Reportado</th><th>Solución</th><th>Observaciones</th></tr>
                            </thead>
                              <tbody id="tbody_Observaciones_Solucionadas">

                              @for($i=0;$i<count($Observaciones_Solucionadas);$i++)
                                <tr href="#Reg_Atencion">
                                <td><button class="btn btn-primary btn_Aceptar" onclick="$(this).Aceptar_Solucion('{!!$Observaciones_Solucionadas[$i]["ID_OBSERVACION"]!!}')">Aceptar</button></td>
                                <td><button class="btn btn-success" onclick="Mostrar_Adjuntos('{!!$Observaciones_Solucionadas[$i]["ID_OBSERVACION"]!!}')">Ver Adjuntos</button></td>
                                <td>{!!Form::label('Nombre',$Observaciones_Solucionadas[$i]["ID_USUARIO_DESTINO"])!!}</td>
                                <td>{!!$Observaciones_Solucionadas[$i]["ID_USUARIO_DERIVADOR"]!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Solucionadas[$i]["FECHA"]))!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Solucionadas[$i]["FECHA_LIMITE"]))!!}</td>
                                <td>{!!date("d-m-Y",strtotime($Observaciones_Solucionadas[$i]["FECHA_SOLUCIONADO"]))!!}</td>
                                <td>{!!$Observaciones_Solucionadas[$i]["PROYECTO"]!!}</td>
                                <td>{!!$Observaciones_Solucionadas[$i]["PROBLEMA_REPORTADO"]!!}</td>
                                <td>{!!$Observaciones_Solucionadas[$i]["SOLUCION_BRINDADA"]!!}</td>

                                @if($Observaciones_Solucionadas[$i]["OBSERVACIONES"]!=null)
                                <td>{!!$Observaciones_Solucionadas[$i]["OBSERVACIONES"]!!}</td>
                                @else
                                <td></td>
                                @endif
                                </tr>
                              @ENDFOR

                              </tbody>

                          </table>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <aside class="bg-dark">
          <div class="container text-center">
              <div class="call-to-action">
                <!--
                  <h2>Free Download at Start Bootstrap!</h2>
                  <a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
                -->
              </div>
          </div>
      </aside>

      <section id="contact">
          <div class="container">
              <div class="row">

                  <div class="col-lg-8 col-lg-offset-2 text-center">
                      <h2 class="section-heading">Let's Get In Touch!</h2>
                      <hr class="primary">
                      <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                  </div>
                  <div class="col-lg-4 col-lg-offset-2 text-center">
                      <i class="fa fa-phone fa-3x sr-contact"></i>
                      <p>123-456-6789</p>
                  </div>
                  <div class="col-lg-4 text-center">
                      <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                      <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                  </div>
              </div>
          </div>
      </section>


      <!-- Modal-->

    <div class="modal fade" id="Mo_Estado_Subida" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content" align="center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">Estado de Adjunto</h4>
          </div>
            <form role="form" method="post" action="/reservas" autocomplete="off">
              <div class="modal-body">

                <div id="Datos_Mostrar">

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


     <!-- Modal-->

    <div align="center" class="modal fade text-center col-md-6 col-lg-6 col-sm-6 col-xs-6" id="Mo_Agenda" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" align="center">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">Agenda</h4>

          </div>
          <div  class="modal-body">
            <div align="center" id="my-calendar2">

            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal para agregar eventos-->

   <div class="modal fade" id="Mo_Nuevo_Evento" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content" align="center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" align="center">Nuevo Evento</h3>
           </div>

              <div class="modal-body">
                 <div class="row">
                    <div class="form-group">
                      <label>Título de evento:</label>
                      <div class="col-md-12">
                        <input class="form-control" id="Evento_Titulo" style="text-align: center;" placeholder="Título" required>
                      </div>
                    </div></br></br>

                    <div class="form-group">
                      <label>Descripción de evento:</label>
                      <div class="col-md-12">
                        <input class="form-control" id="Evento_Descripcion" style="text-align: center;" placeholder="Descripción" required>
                      </div>
                    </div></br></br>

                    <div class="form-group">
                      <div class="col-md-12">
                        <label>Participantes:</label>
                      </div>
                      <div class="col-md-12">
                        <select type="input" id="Evento_Participantes" data-placeholder="Participantes" style="text-align: center;" multiple class="form-control chosen-select chosen-rtl" tabindex="14">
                                <option selected value = "{!!$Datos_Usuario["ID_USUARIO"]!!}">{{$Datos_Usuario["ID_USUARIO"]}}</option>
                          @for($i=0;$i<count($Lista_Usuarios);$i++)
                              {
                                <?php If(($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"]) and ($Lista_Usuarios[$i]["TIPO_USUARIO"]=="USUARIO")and ($Lista_Usuarios[$i]["AREA"]=="PRODUCCION"))
                                {
                                ?>
                                  <option value = "{!!$Lista_Usuarios[$i]["ID_USUARIO"]!!}">{{$Lista_Usuarios[$i]["ID_USUARIO"]}}</option>
                                <?php }
                                else{
                                  ?>
                                <?php } ?>
                              }
                          @endfor
                        </select></br></br>
                      </div>
                    </div>


                    <div class="form-group">
                      <label>Información adicional:</label>
                      <div class="col-md-12">
                      <input class="form-control" id="Evento_Add_Info" style="text-align: center;" placeholder="Información adicional">
                    </div>
                    </div></br></br>

                    <div class="form-group">
                      <div class="col-md-12">
                      <label>Fecha de evento:</label>
                      </div>
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                      <input class="form-control" id="Evento_Fecha" style="text-align: center;" placeholder="Fecha" required></br>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                      <label>Hora: </label>
                      </div>
                      <div class="col-md-5">
                        <select type="input" class="form-control" id="Evento_Hora">
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
                       <div class="col-md-2">
                      <label> : </label>
                      </div>
                       <div class="col-md-5">
                        <select type="input" class="form-control" id="Evento_Minutos">
                          @for($i=00;$i<60;$i++)
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
              </div>
              <div align="center" class="modal-footer">
                <button  id="btn_Guardar_Evento" class="btn btn-primary">Aceptar</button>
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>

        </div>
      </div>
      </div>
    </div>


     <!-- Modal para mostrar envío de notyificación -->
   <div align="center" style="margin: 0 auto;" class="modal fade text-center col-md-6 col-lg-6 col-sm-6 col-xs-6" id="Mo_Notificacion" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" align="center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Enviar notificación</h4>
          </div>
          <div  class="modal-body" id ="Mo_Body_Notificacion">
            <div class="form-group">
              <label>Para:</label>
              <input text-align="center" id="Id_Usuario_Notificacion_Destino" class="form-control" readonly="readonly"></br>
              <label>Mensaje:</label>
              <textarea type="input" id="Id_Notificacion_Mensaje" class="form-control"></textarea>

            </div>
          </div>
          <div class="modal-footer">
              <div align="center" class="form-group">
                <button id="btn_Enviar_Nueva_Notificacion" align="center" type="input" class="btn btn-success">Enviar</button>
              </div>
          </div>
        </div>
      </div>
    </div>




     <!-- Modal para mostrar envío de notyificaciones -->
       <div align="center" style="margin: 0 auto;" class="modal fade text-center col-md-6 col-lg-6 col-sm-6 col-xs-6" id="Mo_Notificaciones" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content" align="center">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enviar notificación</h4>
              </div>
              <div  class="modal-body" id ="Mo_Body_Notificacion">
                <div class="form-group">
                  <label>Para:</label>
                  <select type="input" id="Usuarios_a_Notificar" data-placeholder="Para:" style="text-align: center;" multiple class="form-control chosen-select chosen-rtl" tabindex="14">

                              @for($i=0;$i<count($Lista_Usuarios);$i++)
                                  {
                                    <?php If(($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"]) and ($Lista_Usuarios[$i]["TIPO_USUARIO"]=="USUARIO")and ($Lista_Usuarios[$i]["AREA"]=="PRODUCCION"))
                                    {
                                    ?>
                                      <option value = "{!!$Lista_Usuarios[$i]["ID_USUARIO"]!!}">{{$Lista_Usuarios[$i]["ID_USUARIO"]}}</option>
                                    <?php }
                                    else{
                                      ?>
                                    <?php } ?>
                                  }
                              @endfor
                            </select></br></br>
                  <label>Mensaje:</label>
                  <textarea type="input" id="Id_Notificaciones_Mensaje" class="form-control"></textarea>

                </div>
              </div>
              <div class="modal-footer">
                  <div align="center" class="form-group">
                    <button id="btn_Enviar_Nuevas_Notificaciones" align="center" type="input" class="btn btn-success">Enviar</button>
                  </div>
              </div>
            </div>
          </div>
        </div>


    <div id="Dialog_Registro_Observaciones" style="display:none">
    </div>

    <div id="Dialog_Adjuntos" style="display:none">
        <table id="Table_Lista_Adjuntos" class="general">
          <thead>
            <tr class="head" id="firstrow"><th>Nro Adjunto</th><th>Link de Descarga</th></tr>
          </thead>
          <div class="table-responsive">
            <tbody id="tbody_Lista_Adjuntos">
            </tbody>
          <div>
        </table>
    </div>



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
            <form id="upload" method="post" action="/DS_Soporte/public/upload_observacion.php" enctype="multipart/form-data">
              <input id="Id_Observacion_Auxiliar" name="Id_Observacion_Auxiliar" type="hidden">
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

      <!-- Calendar -->
      <script src={{ asset('//code.jquery.com/jquery-1.10.2.js')}}></script>


      <!-- jQuery -->
      <script src={{ asset('jquery/jquery.min.js') }}></script>

      <!-- Bootstrap Core JavaScript -->
      <script src={{ asset('js/bootstrap.min.js') }}></script>

      <!-- Table pluggins -->
      <script src={{ asset('js/jquery.dataTables.min.js')}}></script>
      <script src={{ asset('js/dataTables.bootstrap.min.js')}}></script>

      <!-- Plugin JavaScript -->
      <script src={{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}></script>
      <script src={{ asset('js/scrollreveal.min.js')}}></script>
      <script src={{ asset('js/jquery.magnific-popup.min.js')}}></script>

      <!-- Theme JavaScript -->
      <script src={{ asset('js/creative.min.js')}}></script>

      <!--Calendar-->
      <script src={{ asset('//code.jquery.com/ui/1.11.2/jquery-ui.js')}}></script>

      <script src={{ asset('js/Agenda/zabuto_calendar.js')}}></script>

      <!--Notificaciones-->
      <script src={{ asset('js/Notificaciones/notify.js')}}></script>

      <!-- Combo box dinámico-->
      <script src={{ asset('js/chosen.jquery.min.js')}}></script>


      <script src={{ asset("assets/js/jquery.knob.js")}}></script>

      <!-- jQuery File Upload Dependencies -->

      <script src={{ asset("assets/js/jquery.iframe-transport.js")}}></script>
      <script src={{ asset("assets/js/jquery.fileupload.js")}}></script>
      <script src={{ asset('js/jquery.dataTables.min.js')}}></script>

      <!-- Our main JS file -->
      <script src={{ asset("js/js_Aplicacion/Script.js")}}></script>
  <!--
  <script>
  $('#Descargar_Adjuntos').click( function() {
    var Id_Observacion = $('#Id_Observacion_Atender').val();
          $.post("/Descargar_Adjunto_Observacion",{Id_Observacion:Id_Observacion},function(data){

             });
  });
  </script>
  -->

  <script>
  //Script que guarda el nuevo evento
  $('#btn_Guardar_Evento').click( function() {

    Id_Usuario = $("#Id_Usuario_Origen").val();
    Fecha = $("#Evento_Fecha").val();
    Hora = $("#Evento_Hora").val();
    Minutos = $("#Evento_Minutos").val();
    Titulo_Evento = $("#Evento_Titulo").val();
    Descripcion = $("#Evento_Descripcion").val();
    Informacion_Adicional = $("#Evento_Add_Info").val();
    Participantes = $("#Evento_Participantes").val();

   $.get(Nombre_Dominio + "/Crear_Evento",{Id_Usuario:Id_Usuario,Fecha:Fecha,Hora:Hora,Minutos:Minutos,Titulo_Evento:Titulo_Evento,Descripcion:Descripcion,Informacion_Adicional:Informacion_Adicional,Participantes:Participantes},function(data){
              $('#Mo_Nuevo_Evento').modal('hide');

              //Se crea el modal de guardado exitoso
              var $modalBody = $('<div align="center" class="modal-body">Guardado exitosamente</div>');
              var $modalFooter = $('<div class="modal-footer"></div>');
              var $modalContent = $('<div class="modal-content"></div>');
              $modalContent.append($modalBody);
              $modalContent.append($modalFooter);
              $modalContent.append($(' <p align="center"><button class="btn btn-success" data-dismiss="modal">Aceptar</button></p>'))

              var $modalDialog = $('<div class="modal-dialog modal-sm"></div>');
              $modalDialog.append($modalContent);

              var $modalFade = $('<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>');
              $modalFade.append($modalDialog);
              $modalFade.modal('show');
             });
  });
  </script>

  <script>
//Script para subir adjunto
  $('#uploadFile').click( function() {
    var formData = new FormData($("#upload-doc")[0]);

     if(($("#Id_Observacion").val()=="")||($("#Id_Observacion").val()==null)){
                            var dt = new Date($.now());
                            //dt.setUTCHours(5);
                            var Dia;
                            var Mes;
                            if(dt.getDate()<10){
                              Dia = '0'+ dt.getDate();
                            }else {
                              Dia = dt.getDate();
                            }

                            if(dt.getMonth()<10){
                              Mes = '0'+(dt.getMonth()+1);
                            }else {
                              Mes = (dt.getMonth()+1);
                            }

                            var Fecha =dt.getFullYear() + "-" + Mes + "-" + Dia+' '+dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                            $("#Id_Observacion").val(Fecha);
                          }

                          $("#Id_Observacion_Auxiliar").val($("#Id_Observacion").val());

      $('#Mo_Mostrar_Subir_Adjuntos').modal({
          show:'true'
      });
  });
  </script>

<script>
//Script para subir adjunto para derivarla
  $('#uploadFile2').click( function() {
    $("#Id_Observacion_Auxiliar").val($("#Id_Observacion_Atender").val());

      $('#Mo_Mostrar_Subir_Adjuntos').modal({
          show:'true'
      });
  });
  </script>

  <script>

    function Atender_Observacion(Id_Observacion)
    {

      location.href = "#Sec_Atender_Observacion"

      document.getElementById('Sec_Atender_Observacion').style="display:visible"

      //Pone el valor a todos los campos del formulario
      document.getElementById('Id_Observacion_Atender').value = Id_Observacion['ID_OBSERVACION'];
      document.getElementById('Id_Usuario_Origen_Atender').value = Id_Observacion['ID_USUARIO_ORIGEN'];
      document.getElementById('Id_Usuario_Derivador_Atender').value = Id_Observacion['ID_USUARIO_DERIVADOR'];


      var Fecha = new Date(Id_Observacion['FECHA']);
      Fecha.setUTCHours(5);
      var Dia;
      var Mes;
      if(Fecha.getDate()<10){
        Dia = '0'+ Fecha.getDate();
      }else {
        Dia = Fecha.getDate();
      }

      if(Fecha.getMonth()<10){
        Mes = '0'+(Fecha.getMonth()+1);
      }else {
        Mes = (Fecha.getMonth()+1);
      }
      var Fecha_Atender = Dia + "/" + Mes + "/" + Fecha.getFullYear();



      var Fecha_L = new Date(Id_Observacion['FECHA_LIMITE']);
      Fecha_L.setUTCHours(5);
      var Dia;
      var Mes;
      if(Fecha_L.getDate()<10){
        Dia = '0'+ Fecha_L.getDate();
      }else {
        Dia = Fecha_L.getDate();
      }

      if(Fecha_L.getMonth()<10){
        Mes = '0'+(Fecha_L.getMonth()+1);
      }else {
        Mes = (Fecha_L.getMonth()+1);
      }
      var Fecha_Limite_Atender = Dia + "/" + Mes + "/" + Fecha_L.getFullYear();


      document.getElementById('Fecha_Atender').value = Fecha_Atender;
      document.getElementById('Fecha_Limite_Atender').value = Fecha_Limite_Atender;
      document.getElementById('Problema_Atender').value = Id_Observacion['PROBLEMA_REPORTADO'];
      document.getElementById('Proyecto_Atender').value = Id_Observacion['PROYECTO'];
      document.getElementById('Observaciones_Atender').value = Id_Observacion['OBSERVACIONES'];
      document.getElementById('Solucion_Atender').value = Id_Observacion['SOLUCION_BRINDADA'];
      document.getElementById('Id_Origen_Atender').value = Id_Observacion['ID_ORIGEN'];
      if((Id_Observacion['ID_USUARIO_DERIVADOR']!="")&&(Id_Observacion['ID_USUARIO_DERIVADOR']!="null")){
        document.getElementById('Div_Id_Usuario_Derivador_Atender').style="display:visible";
      }
      else  {
        document.getElementById('Div_Id_Usuario_Derivador_Atender').style="display:none";
      }
    }
  </script>


  <script>
  //Script en jquery para obtener la lista de adjuntos
  $('#tbody_Observaciones_Pendientes').on('click','.btn_Atender_Observacion',function(){
       window.setTimeout(function(){

          var table = $('#tbody_Adjuntos');
          table.empty();

          var Id_Observacion = $('#Id_Observacion_Atender').val();

          $.get(Nombre_Dominio+"/Listar_Adjuntos",{Id_Observacion_Auxiliar:Id_Observacion},function(data){

              var table = $('#tbody_Adjuntos');
              table.empty();

              for(i=0; i<data.length; i++){
                var Num = i+1;

                    var row = $('<tr href="#Reg_Atencion"><td style="color: black;">'+Num+'</td><td><form method="POST" action={{action("ObservacionController@Descargar_Adjunto")}}>{{ csrf_field()}}<input id="URL_ARCHIVO" name="URL_ARCHIVO" type="hidden" value="'+data[i]["URL_ARCHIVO"]+'"><input id="NOMBRE_ARCHIVO" name="NOMBRE_ARCHIVO" type="hidden" value="'+data[i]["NOMBRE_ARCHIVO"]+'"><button type="submit" class="btn btn-primary">Descargar</button></td></form></tr>');
                    //var row = $("<tr href='#Reg_Atencion'><td style='color: black;'>"+Num+"</td><td><button onclick='$(this).Descargar_Adjunto("+JSON.stringify(data[i]['URL_ARCHIVO'])+","+JSON.stringify(data[i]['NOMBRE_ARCHIVO'])+")' class='btn btn-primary'>Descargar</button></td></tr>");
                    table.append(row);
                  }
          });
      }, 50);

  });

  </script>


  <script>
  //Función para descargar adjunto
  /*
  $.fn.Descargar_Adjunto = function(URL_ARCHIVO,NOMBRE_ARCHIVO) {
          var URL_ARCHIVO = URL_ARCHIVO;
          var NOMBRE_ARCHIVO = NOMBRE_ARCHIVO;
          alert(NOMBRE_ARCHIVO);
          $.post("/Descargar_Adjunto_Observacion",{URL_ARCHIVO:URL_ARCHIVO,NOMBRE_ARCHIVO:NOMBRE_ARCHIVO},function(data){

             });
  };
  */
  </script>
      <script>
        $(function() {
          $( "#Fecha_Limite").datepicker();
        });
      </script>

      <script>
      //Script para actualizar la tabla de Observaciones pendientes
         setInterval(function(){
                var user = $("#Id_Usuario_Origen").val();
                $.get(Nombre_Dominio+"/Actualizar_Observaciones_Pendientes",{Usuario:user},function(data){

                  if((data!='')&&(data!=null))
                  {

                    $("#Nro_Observaciones_Pendientes").text(data.length);

                    //$('#chatAudio')[0].play();
                    //Actualizar el número total de notificaciones en cuanto a observaciones


                    var table = $('#tbody_Observaciones_Pendientes');
                    table.empty();
                    for(i=0; i<data.length; i++){
                          var row = $("<tr href='#Reg_Atencion'><td><button class='btn btn-primary btn_Atender_Observacion' onclick='Atender_Observacion("+JSON.stringify(data[i])+")'>Atender</button></td><td>"+data[i]['ID_USUARIO_ORIGEN']+"</td><td>"+data[i]['ID_USUARIO_DERIVADOR']+"</td><td>"+data[i]['FECHA'].substring(0,10)+"</td><td>"+data[i]['FECHA_LIMITE'].substring(0,10)+"</td><td>"+data[i]['PROYECTO']+"</td><td>"+data[i]['PROBLEMA_REPORTADO']+"</td><td>"+data[i]['OBSERVACIONES']+"</td>");
                          table.append(row);
                    }
                  }
                });

                    var N_Observaciones_Pendientes = parseInt($("#Nro_Observaciones_Pendientes").text(),10);
                    var N_Observaciones_Solucionadas = parseInt($("#Nro_Observaciones_Solucionadas").text(),10);
                    var N_Observaciones_Enviadas_Pendientes = parseInt($("#Nro_Observaciones_Enviadas_Pendientes").text(),10);

                    $("#Nro_Notificaciones_Observaciones").text(N_Observaciones_Pendientes+N_Observaciones_Solucionadas+N_Observaciones_Enviadas_Pendientes);

                }, 10000); // send request each 60 seconds
      </script>

      <script>
      //Script para actualizar la tabla de Observaciones enviadas pendientes
         setInterval(function(){
                var user = $("#Id_Usuario_Origen").val();
                $.get(Nombre_Dominio+"/Actualizar_Observaciones_Enviadas_Pendientes",{Usuario:user},function(data){

                  if((data!='')&&(data!=null))
                  {

                    $("#Nro_Observaciones_Enviadas_Pendientes").text(data.length);

                    //$('#chatAudio')[0].play();

                    var table = $('#tbody_Observaciones_Enviadas_Pendientes');
                    table.empty();
                    for(i=0; i<data.length; i++){
                          var row = $("<tr href='#Reg_Atencion'><td><button class='btn btn-primary btn_Enviar_Notificacion' onclick='$(this).Enviar_Notificacion("+JSON.stringify(data[i]['ID_USUARIO_DESTINO'])+")'>Enviar Notificación</button></td><td>"+data[i]['ID_USUARIO_DESTINO']+"</td><td>"+data[i]['FECHA'].substring(0,10)+"</td><td>"+data[i]['FECHA_LIMITE'].substring(0,10)+"</td><td>"+data[i]['DIAS_ATRASO']+"</td><td>"+data[i]['PROYECTO']+"</td><td>"+data[i]['PROBLEMA_REPORTADO']+"</td><td>"+data[i]['OBSERVACIONES']+"</td>");
                          table.append(row);
                    }
                  }

                });

                }, 10000); // send request each 60 seconds
      </script>

      <script>
      //Script para archivar la solución solucionadas
      $.fn.Aceptar_Solucion = function(Datos) {
          var Id_Observacion = Datos;
          $.get(Nombre_Dominio+"/Archivar_Observacion",{Id_Observacion:Id_Observacion},function(data){
            $('#tbody_Observaciones_Solucionadas').empty();
            Actualizar_Observaciones_Solucionadas();
             });
      };
          //Script para enviar notificación de una observación
      $.fn.Enviar_Notificacion = function(Datos) {
          var Id_Usuario_Destino = Datos;
          $(Id_Usuario_Notificacion_Destino).val(Id_Usuario_Destino);
                    $('#Mo_Notificacion').modal({
                      show:'true'
                    });
      };
      </script>

       <script>
      //Script para actualizar la tabla de Observaciones solucionadas
        setInterval(function(){
                Actualizar_Observaciones_Solucionadas();
                }, 10000); // send request each 60 seconds
      </script>

      <script>
      //Funcion para actualizar las observaciones solusionadas
      function Actualizar_Observaciones_Solucionadas()
      {
        var user = $("#Id_Usuario_Origen").val();
        $.get(Nombre_Dominio+"/Actualizar_Observaciones_Solucionadas",{Usuario:user},function(data){

          if(data!='')
          {
            $("#Nro_Observaciones_Solucionadas").text(data.length);

              //$('#chatAudio')[0].play();
              var table = $('#tbody_Observaciones_Solucionadas');
              table.empty();
              for(i=0; i<data.length; i++){
                    var row = $("<tr href='#Reg_Atencion'><td><button class='btn btn-primary btn_Aceptar' onclick='$(this).Aceptar_Solucion("+JSON.stringify(data[i]['ID_OBSERVACION'])+")'>Aceptar</button></td><td><button class='btn btn-success' onclick='Mostrar_Adjuntos("+JSON.stringify(data[i]['ID_OBSERVACION'])+")'>Ver Adjuntos</button></td><td>"+data[i]['ID_USUARIO_DESTINO']+"</td><td>"+data[i]['ID_USUARIO_DERIVADOR']+"</td><td>"+data[i]['FECHA'].substring(0,10)+"</td><td>"+data[i]['FECHA_LIMITE'].substring(0,10)+"</td><td>"+data[i]['FECHA_SOLUCIONADO'].substring(0,10)+"</td><td>"+data[i]['PROYECTO']+"</td><td>"+data[i]['PROBLEMA_REPORTADO']+"</td><td>"+data[i]['SOLUCION_BRINDADA']+"</td><td>"+data[i]['OBSERVACIONES']+"</td>");
                    table.append(row);
            }
          }
        });
      }
      </script>
      <script>
      //Script pra mostrar el datapicker
        $(function() {
          $( "#Fecha_Limite").datepicker();
          $( "#Evento_Fecha").datepicker();
        });
      </script>

       <!--Script para los combobox-->
    <script type="text/javascript">
      var config = {
        '.chosen-select' : {width: "250px"},
      }
      for (var selector in config) {
        $(selector).chosen(config[selector]);
      }
    </script>

      <script>
      //Script para recuperar las notificaciones pendientes
  $(document).ready(function () {
    var Notificaciones=0;
      setInterval(function(){
                var user = $("#Id_Usuario_Origen").val();
                $.get(Nombre_Dominio+"/Recuperar_Notificaciones_Pendientes",{Usuario:user},function(data){
                  
                  if((data!='')&&(data!=null))
                  {

                    if(data.length!=Notificaciones)
                    {


                      for(i=Notificaciones; i<data.length; i++){
                        $.notify.addStyle("foo", {
                            html: "<div class='bg-warning'>" +
                                    "<div class='bg-warning clearfix' style='border-radius: 5px;min-width:200px;'>" +
                                      "<div style='max-width:400px' class='title' data-notify-html='title'/>" +
                                      "<div align='right' class='buttons'>" +
                                        "<button class='button1 no' data-content='"+data[i]['ID_NOTIFICACION']+"'>Cerrar</button>" +
                                        "<button class='button1 yes' data-notify-text='button' data-content='"+data[i]['ID_USUARIO_ORIGEN']+"'></button>" +
                                      "</div>" +
                                    "</div>" +
                                  "</div>"
                          });
                        $.notify({
                            title:data[i]['ID_USUARIO_ORIGEN']+": "+data[i]['MENSAJE'],
                            button: 'Responder',
                            }, {
                            style: 'foo',
                            globalPosition: 'botton left',
                            autoHide: false
                          });
                      }
                       Notificaciones = data.length;
                    }
                  }
                });

                }, 5000);
  //listen for click events from this style
                $(document).on('click', '.notifyjs-foo-base .no', function() {
                    var Id_Notificacion = $(this).attr('data-content');
                    $.get(Nombre_Dominio+"/Marcar_Notificacion_Leida",{Id_Notificacion:Id_Notificacion},function(data){
                    });
                });
                $(document).on('click', '.notifyjs-foo-base .yes', function(e) {
                //hide notification

                  var Mo_Notificacion = $('#Mo_Body_Notificacion');

                    $(Id_Usuario_Notificacion_Destino).val($(this).attr('data-content'));

                    $('#Mo_Notificacion').modal({
                      show:'true'
                    });
                });

        $('#btn_Enviar_Nueva_Notificacion').click(function() {
            var Id_Usuario_Destino = $('#Id_Usuario_Notificacion_Destino').val();
            var Mensaje = $('#Id_Notificacion_Mensaje').val();
            

            $.get(Nombre_Dominio+"/Enviar_Notificacion",{Id_Usuario_Destino:Id_Usuario_Destino,Mensaje:Mensaje},function(data){
              
               $('#Mo_Notificacion').modal("hide");
            });

        });

       });

      </script>

      <script>
        //Script que recupera todos los eventos pendientes

  $(document).ready(function () {
     var Nro_Eventos_Hoy = 0;
     setInterval(function(){
        Nro_Eventos_Hoy = 0;
    },1800000);

      setInterval(function(){
                var user = $("#Id_Usuario_Origen").val();
                $.get(Nombre_Dominio+"/Recuperar_Eventos_Pendientes",{Usuario:user},function(data){

                  var Pendientes_Futuro = data[0];
                  if((Pendientes_Futuro!='')&&(Pendientes_Futuro!=null))
                  {
                    $("#Nro_Eventos_Futuros").text(Pendientes_Futuro.length);
                  }
                  var Pendientes_Hoy = data[1];

                  if((Pendientes_Hoy!='')&&(Pendientes_Hoy!=null))
                  {
                    if(Nro_Eventos_Hoy != Pendientes_Hoy.length)
                    {


                      //Asignar el número de eventos para el día de hoy
                      $("#Nro_Eventos_Para_Hoy").text(Pendientes_Hoy.length);

                      for(i=Nro_Eventos_Hoy; i<Pendientes_Hoy.length; i++){

                        $.notify(Pendientes_Hoy[i]['NOMBRE_EVENTO']+": "+Pendientes_Hoy[i]['DESCRIPCION']+", Hora: "+Pendientes_Hoy[i]['FECHA'].substring(11,16),
                          {
                            className: 'info',
                            autoHideDelay: 1800000,
                            globalPosition: 'bottom left'
                          });

                      }
                      Nro_Eventos_Hoy = Pendientes_Hoy.length;
                    }
                  }
                });

                }, 5000);
              }); // send request each 60 seconds

      </script>



  <script>
  //Script para mostrar la agenda
  $('#btn_Mostrar_Agenda').click( function() {
      $("#date-popover").popover();
      var eventData = [];

      var user = $("#Id_Usuario_Origen").val();

      var Fecha = "";
      var body = "";
      $.get(Nombre_Dominio+"/Recuperar_Eventos",{Usuario:user},function(data){


      $("#my-calendar2").html("");
      //$("#Z_Calendario").zabuto_calendar({data:false});
      $("#my-calendar2").append('<div align="center" id="Z_Calendario"></div>');

      if(data.length>0)
      {
           for(i=0; i<data.length; i++)
           {
              if(data[i]['FECHA'].substring(0,10)==Fecha)
              {
                body = body + "<p>De:"+data[i]['ID_USUARIO_ORIGEN']+"</br>"+data[i]['NOMBRE_EVENTO']+": "+data[i]['DESCRIPCION']+"</br>Hora: "+data[i]['FECHA'].substring(11,16)+"</p>";
              }
              else
              {

                if(Fecha=="")
                {
                  body = body + "<p>De:"+data[i]['ID_USUARIO_ORIGEN']+"</br>"+data[i]['NOMBRE_EVENTO']+": "+data[i]['DESCRIPCION']+"</br>Hora "+data[i]['FECHA'].substring(11,16)+"</p>";
                  Fecha = data[i]['FECHA'].substring(0,10);
                }
                else
                {
                  eventData.push({"date":data[i-1]['FECHA'].substring(0,10),"badge":true,"title":data[i-1]['FECHA'].substring(0,10),"body":body,"footer":"","classname":"purple-event","modal":true});
                  body = "<p> De:"+data[i]['ID_USUARIO_ORIGEN']+"</br>"+data[i]['NOMBRE_EVENTO']+": "+data[i]['DESCRIPCION']+"</br>Hora: "+data[i]['FECHA'].substring(11,16)+"</p>";
                  Fecha = data[i]['FECHA'].substring(0,10);
                }
              }
           }
           eventData.push({"date":data[data.length-1]['FECHA'].substring(0,10),"badge":true,"title":data[data.length-1]['FECHA'].substring(0,10),"body":body,"footer":"","classname":"purple-event","modal":true});
      }


      $("#Z_Calendario").zabuto_calendar({
        language: "es",
        data: eventData,
        action: function () {
            return myDateFunction(this.id, false);
        },
        action_nav: function () {
            return myNavFunction(this.id);
        },
        action: function () {
            return myDateFunction(this.id, false);
        },
        action_nav: function () {
            return myNavFunction(this.id);
        },
        nav_icon: {
            prev: '<i class="fa fa-chevron-circle-left"></i>',
            next: '<i class="fa fa-chevron-circle-right"></i>'
          },
      });
  });
  function myDateFunction(id, fromModal) {
          $("#date-popover").hide();
          if (fromModal) {
              $("#" + id + "_modal").modal("hide");
          }
          var date = $("#" + id).data("date");
          var hasEvent = $("#" + id).data("hasEvent");

          var evento = $("#" + id).attr("title");
          //alert(date +"/"+hasEvent+"/"+evento);
          if (hasEvent && !fromModal) {
              return false;
          }


          return true;
      }

  function myNavFunction(id) {
          $("#date-popover").hide();
          var nav = $("#" + id).data("navigation");
          var to = $("#" + id).data("to");
      }
      $('#Mo_Agenda').modal({
        show:'true'
      });
  });

  $('#btn_Nuevo_Evento').click( function() {
      $('#Mo_Nuevo_Evento').modal({
        show:'true'
      });
  });
</script>
<script>
//Script para enviar notificacines
$('#btn_Enviar_Notificaciones').click( function() {

      Participantes = $("#Usuarios_a_Notificar").val();

            $('#Mo_Notificaciones').modal({
              show:'true'
            });

});

$('#btn_Enviar_Nuevas_Notificaciones').click(function() {
            var Id_Usuario_Destino = $('#Usuarios_a_Notificar').val();
            var Mensaje = $('#Id_Notificaciones_Mensaje').val();

             $.get(Nombre_Dominio+"/Enviar_Notificacion",{Id_Usuario_Destino:Id_Usuario_Destino,Mensaje:Mensaje},function(data){
              
               $('#Mo_Notificaciones').modal("hide");
               alert(data);
            });
             
        });
</script>
<script>
$('#btn_Registro_Observaciones').click(function(){
  $.get(Nombre_Dominio+"/Registro_Observaciones",{},function(data){
    var tBody = $('#tbody_Registro_Observaciones');
    for(var i=0;i<data.length;i++)
    {
        tBody.append('<tr><td>'+data[i]['TIPO']+'</td><td>'+data[i]['ID_USUARIO_ORIGEN']+'</td><td>'+data[i]['ID_USUARIO_DESTINO']+'</td><td>'+data[i]['ID_USUARIO_DERIVADOR']+'</td><td>'+data[i]['FECHA']+'</td><td>'+data[i]['FECHA_LIMITE']+'</td><td>'+data[i]['FECHA_SOLUCIONADO']+'</td><td>'+data[i]['PROYECTO']+
        '</td><td>'+data[i]['PROBLEMA_REPORTADO']+'</td><td>'+data[i]['SOLUCION_BRINDADA']+'</td><td>'+data[i]['OBSERVACIONES']+'</td><td><button class="btn btn-primary" onclick="Mostrar_Adjuntos('+data[i]['ID_OBSERVACION']+')"></button></td></tr>');
    }
    $('#Mo_Registro_Observaciones').modal("show");

 });

});
</script>
<script>
$('#btn_Registro_Observaciones').click(function(){
  $.get(Nombre_Dominio+"/Registro_Observaciones",{},function(data){
    
    var Tabla = '<table id="Table_Registro_Observaciones" class="general" align="center">'+
      '<thead>'+
        '<tr class="head" id="firstrow"><th>Tipo</th><th>Reportado por:</th><th>Enviado a:</th><th>Derivado por:</th><th>Fecha</th><th>Fecha Límite</th><th>Fecha Solucionado</th><th>Proyecto</th><th>Problema Reportado</th><th>Solución Brindada</th><th>Observaciones</th><th>Adjuntos</th></tr>'+
      '</thead>'+
        '<tbody id="tbody_Registro_Observaciones" style="color:black">'+
        '</tbody>'+
    '</table>';

    $('#Dialog_Registro_Observaciones').empty();
    $('#Dialog_Registro_Observaciones').append(Tabla);

    var tBody = $('#tbody_Registro_Observaciones');
    tBody.empty();
    for(var i=0;i<data.length;i++)
    {
      var Row = "<tr><td>"+data[i]['TIPO']+"</td><td>"+data[i]['ID_USUARIO_ORIGEN']+"</td><td>"+data[i]['ID_USUARIO_DESTINO']+
                "</td><td>"+data[i]['ID_USUARIO_DERIVADOR']+"</td><td>"+data[i]['FECHA']+"</td><td>"+data[i]['FECHA_LIMITE']+
                "</td><td>"+data[i]['FECHA_SOLUCIONADO']+"</td><td>"+data[i]['PROYECTO']+"</td><td>"+data[i]['PROBLEMA_REPORTADO']+
                "</td><td>"+data[i]['SOLUCION_BRINDADA']+"</td><td>"+data[i]['OBSERVACIONES']+
                "</td><td><button class='btn btn-primary' onclick='Mostrar_Adjuntos("+JSON.stringify(data[i]['ID_OBSERVACION'])+")' type='button'>Ver Adjuntos</button></td></tr>";
        tBody.append(Row);
    }


  $('#Table_Registro_Observaciones').DataTable({
          responsive: true
  });

    $('#Dialog_Registro_Observaciones').dialog({
            modal: false,
            width: '100%',
            height: 500,
            title: "Registro de Observaciones",
            buttons: [
            {
              text:"Cerrar",
              "class":"btn-primary",
              click:function(){
                  $(this).dialog("close");
              }
            }]
        });
 });

});

function Mostrar_Adjuntos(Id_Observacion){

  $.get(Nombre_Dominio+"/Listar_Adjuntos",{Id_Observacion_Auxiliar:Id_Observacion},function(data){

      var table = $('#tbody_Lista_Adjuntos');
      table.empty();

      for(i=0; i<data.length; i++){
        var Num = i+1;
            var row = $('<tr href="#Reg_Atencion"><td style="color: black;">'+Num+'</td><td><form method="POST" action={{action("ObservacionController@Descargar_Adjunto")}}>{{ csrf_field()}}<input id="URL_ARCHIVO" name="URL_ARCHIVO" type="hidden" value="'+data[i]["URL_ARCHIVO"]+'"><input id="NOMBRE_ARCHIVO" name="NOMBRE_ARCHIVO" type="hidden" value="'+data[i]["NOMBRE_ARCHIVO"]+'"><button type="submit" class="btn btn-primary">Descargar</button></td></form></tr>');
            //var row = $("<tr href='#Reg_Atencion'><td style='color: black;'>"+Num+"</td><td><button onclick='$(this).Descargar_Adjunto("+JSON.stringify(data[i]['URL_ARCHIVO'])+","+JSON.stringify(data[i]['NOMBRE_ARCHIVO'])+")' class='btn btn-primary'>Descargar</button></td></tr>");
            table.append(row);
          }

          $('#Dialog_Adjuntos').dialog({
                  modal: false,
                  width: 380,
                  height: 300,
                  title: "Adjuntos",
                  buttons: [
                  {
                    text:"Cerrar",
                    "class":"btn-primary",
                    click:function(){
                        $(this).dialog("close");
                    }
                  }]
              });

  });
}
</script>

  </body>

  </html>
