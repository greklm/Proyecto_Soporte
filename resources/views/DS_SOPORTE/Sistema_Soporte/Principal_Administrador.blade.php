<!DOCTYPE html>
<html lang="en">
<script>
    var Nombre_Dominio = '';
</script>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Service-Soporte de Atención</title>
    


    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="{{asset('css/freelancer.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

    <!-- Calendar -->
    <link rel="stylesheet" href="{{asset('//code.jquery.com/ui/1.11.2/themes/dark-hive/jquery-ui.css')}}">


    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
.col-centered{
    float: none;
    margin: 0 auto;
}
.Estilo_Configuracion{
  border-style: groove;
  border-width: 10px; 
  border-color: #2E80A6;
}
.Hora{
  background-color:#A8D5F2;
  color: white;
}
.Hora:hover{
   cursor: pointer;
}
.Dia_Semana{
  background-color:#086FB3;
  color: white;
  width: 80px;
}
</style>
<body id="Inicio" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#Inicio">DATA SERVICE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#Inicio"></a>
                    </li>
                    <li class="page-scroll">

                        <a href="~/" class="dropdown-toggle" data-toggle="dropdown">Administración<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            {!!csrf_field()!!}
                            <li align="center">
                                <input type="hidden" name = "Id_Usuario" value = "{!!$Datos_Usuario['ID_USUARIO']!!}"></input>
                                <input onclick="Mostrar_Form_Crear_Usuario()" class="btn btn-primary" type="button" name="Crear_Usuario" value="Crear Nuevo Usuario">
                            </li>
                            <li align="center">
                              <input onclick="Mostrar_Form_Modificar_Usuario()" class="btn btn-primary" type="button" name="Registro_Atenciones_Cliente" value="Modificar Usuario">
                            </li>
                            <li align="center">
                              <input class="btn btn-primary" type="button" name="btn_Modificar_Horario" id="btn_Modificar_Horario" value="Modificar Horario">
                            </li>
                        </ul>
                    </li>

                    <li class="page-scroll">
                          <a href="~/" class="dropdown-toggle" data-toggle="dropdown">Reportes<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li align="center">
                                  <input onclick="Registro_Atenciones_Por_Usuario()" class="btn btn-primary" type="submit" name="Registro_de_atenciones_Usuario" value="Registro de atenciones por Usuario"></input>
                              </li>

                              <li align="center">
                                <input onclick="Registro_Atenciones_Por_Cliente()" class="btn btn-primary" type="button" name="Registro_Atenciones_Cliente" value="Registro de atenciones por Cliente"></input>
                              </li>

                              <Form method = "POST" action = {{action('AdminController@Reporte_Registro_Atenciones_Pendientes')}}>
                                {!!csrf_field()!!}
                              <li align="center">
                                <input type="hidden" class="form-control" id = "Id_Usuario_Auxiliar" name = "Id_Usuario_Auxiliar" value = "{!!$Datos_Usuario['ID_USUARIO']!!}">
                                <input class="btn btn-primary" type="submit" name="Registro_Atenciones_Pendientes" value="Registro de atenciones Pendientes"></input>
                              </li>
                              </Form>

                              <li align="center">
                                <input onclick="Mostrar_Buscar_Cliente()" class="btn btn-primary" type="button" name="Resumen_Registro_Atenciones" value="Resumen de registro de Atenciones"></input>
                              </li>

                          </ul>
                    </li>

                    <li class="page-scroll">
                        <a href="#Configuracion">Configuración</a>
                    </li>

                    <li class="page-scroll">
                        <a method = "GET" href = {{action('UsuarioController@out')}}>Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="{{asset('img/profile.png')}}" alt="">
                    <div class="intro-text">
                        <span class="name">Servicios de Atención Remota</span>
                        <hr class="star-light">
                        <span class="skills">BIENVENIDO {!!$Datos_Usuario['ID_USUARIO']!!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Portfolio Grid Section -->
    <section id="Administracion">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="well well-sm">

                  <form id="Form_Crear_Usuario" class="form-horizontal" style="display:none" method = "POST" action = {{action('AdminController@Crear_Usuario')}}>
                    {!!csrf_field()!!}
                      <fieldset>
                          <legend class="text-center header"><div class="col-md-1"><label></label></div>Crear nuevo Usuario</legend><br>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                              <div class="col-md-3">
                                  <input type="hidden" class="form-control" id = "Id_Usuario_Auxiliar" name = "Id_Usuario_Auxiliar" value = "{!!$Datos_Usuario['ID_USUARIO']!!}">

                                  <?php
                                    $Arreglo_Usuarios = '';
                                  ?>
                                  @for($i=0;$i<count($Usuarios);$i++)
                                  <?php
                                    $Arreglo_Usuarios = $Arreglo_Usuarios.','.$Usuarios[$i]["ID_USUARIO"];
                                  ?>
                                  @endfor

                                  <input onblur="Generar_Contraseña('{{$Arreglo_Usuarios}}',this)" id="Id_Usuario_Nuevo" name="Id_Usuario_Nuevo" placeholder="Id Usuario" class="form-control" required>

                              </div>
                          </div>


                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key bigicon"></i></span>
                              <div class="col-md-7">
                                  <input id="Contraseña_Nuevo" name="Contraseña_Nuevo" type="password" placeholder="Password" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="	fa fa-briefcase bigicon"></i></span>
                            <div class="col-md-7">
                              <select class="form-control" id="Estado_Nuevo" name="Estado_Nuevo">
                                <option value ='ACTIVO'>ACTIVO</option>
                                  <option value = 'INACTIVO'>INACTIVO</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
                              <div class="col-md-7">
                                  <input id="Telefono_Nuevo" name="Telefono_Nuevo" placeholder="Teléfono" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="	fa fa-briefcase bigicon"></i></span>
                            <div class="col-md-7">
                              <select class="form-control" id="Tipo_Usuario_Nuevo" name="Tipo_Usuario_Nuevo">
                                <option value ='USUARIO'>USUARIO</option>
                                  <option value = 'ADMINISTRADOR'>ADMINISTRADOR</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-12 text-center">
                                <div class="col-md-1">
                                    <label></label>
                                </div>
                                <input class="btn btn-primary" type="submit" name="GuardarCambios" value="Guardar">
                              </div>
                            </div>
                      </fieldset>
                  </form>


                  <form id="Form_Modificar_Usuario" class="form-horizontal" style="display:none" method = "POST" action = {{action('AdminController@Modificar_Usuario')}}>
                    {!!csrf_field()!!}
                      <fieldset>
                          <legend class="text-center header"><div class="col-md-1"><label></label></div>Modificar Usuario</legend><br>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                              <div class="col-md-7">
                                <input type="hidden" class="form-control" id = "Id_Usuario_Auxiliar" name = "Id_Usuario_Auxiliar" value = "{!!$Datos_Usuario['ID_USUARIO']!!}">
                              <select onclick="Cargar_Informacion_Usuario()" class="form-control" id="Id_Usuario_Modificar" name="Id_Usuario_Modificar">
                                @for($i=0;$i<count($Usuarios);$i++)
                                {
                                  <?php If($Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"])
                                  {
                                  ?>
                                    <option value = "{{$Usuarios[$i]["USUARIO_PASSWORD"]}},{{$Usuarios[$i]["ESTADO"]}},{{$Usuarios[$i]["TELEFONO"]}},{{$Usuarios[$i]["TIPO_USUARIO"]}}"><button onclick="Cargar_Informacion_Usuario()">{{$Usuarios[$i]["ID_USUARIO"]}}</button></option>
                                  <?php } ?>
                                }
                                @endfor
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-key bigicon"></i></span>
                              <div class="col-md-7">
                                  <input id="Contraseña_Modificar" name="Contraseña_Modificar" type="password" placeholder="Password" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="	fa fa-briefcase bigicon"></i></span>
                            <div class="col-md-7">
                              <select class="form-control" id="Estado_Modificar" name="Estado_Modificar">
                                <option value ='ACTIVO'>ACTIVO</option>
                                  <option value = 'INACTIVO'>INACTIVO</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
                              <div class="col-md-7">
                                  <input id="Telefono_Modificar" name="Telefono_Modificar" placeholder="Teléfono" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="	fa fa-briefcase bigicon"></i></span>
                            <div class="col-md-7">
                              <select class="form-control" id="Tipo_Usuario_Modificar" name="Tipo_Usuario_Modificar">
                                <option value ='USUARIO'>USUARIO</option>
                                  <option value = 'ADMINISTRADOR'>ADMINISTRADOR</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-12 text-center">
                                <div class="col-md-1">
                                    <label></label>
                                </div>
                                <input class="btn btn-primary" type="submit" name="GuardarCambios" value="Guardar">
                              </div>
                            </div>
                      </fieldset>
                  </form>

              </div>
          </div>
        </div>
        </div>
        <script>
            function Mostrar_Form_Crear_Usuario()
            {
              location.href = "#Administracion";
              document.getElementById("Form_Modificar_Usuario").style="display:none";
              document.getElementById("Form_Crear_Usuario").style="display:initial";
            }
            function Mostrar_Form_Modificar_Usuario()
            {
              location.href = "#Administracion";
              document.getElementById("Form_Crear_Usuario").style="display:none";
              document.getElementById("Form_Modificar_Usuario").style="display:initial";
            }

            function Cargar_Informacion_Usuario()
            {
              var Datos = document.getElementById("Id_Usuario_Modificar").value.split(",");
              document.getElementById("Contraseña_Modificar").value = Datos[0];
              document.getElementById("Estado_Modificar").value = Datos[1];
              document.getElementById("Telefono_Modificar").value = Datos[2];
              document.getElementById("Tipo_Usuario_Modificar").value = Datos[3];
            }

            function Generar_Contraseña(Arreglo_Usuarios, input)
            {
              var Usuarios = Arreglo_Usuarios.split(",");

              for (i = 0; i < Usuarios.length; i++)
              {
                  if(document.getElementById("Id_Usuario_Nuevo").value == Usuarios[i])
                  {
                    document.getElementById("Id_Usuario_Nuevo").value = "";
                    document.getElementById("Id_Usuario_Nuevo").placeholder = "El Id de Usuario ya existe";
                  }
              }
              document.getElementById("Contraseña_Nuevo").value = document.getElementById("Id_Usuario_Nuevo").value;
            }

            function Registro_Atenciones_Por_Usuario()
            {
              location.href = "#Reportes";
              Limpiar_Seccion_Reportes();
              document.getElementById("Form_Registro_Atenciones_Por_Usuario").style="display:initial";
            }

            function Registro_Atenciones_Por_Cliente()
            {
              location.href = "#Reportes";
              Limpiar_Seccion_Reportes();
              document.getElementById("Form_Registro_Atenciones_Por_Cliente").style="display:initial";
            }
            function Registro_Atenciones_Pendientes()
            {

            }
            function Limpiar_Seccion_Reportes()
            {
              document.getElementById("Form_Registro_Atenciones_Por_Cliente").style="display:none";
              document.getElementById("Form_Registro_Atenciones_Por_Usuario").style="display:none";
            }

        </script>
    </section>


    <!-- About Section -->
    <section class="Reportes" id="Reportes">
      <div class="container">
        <div class="row" >
          <div class="col-md-12" >
              <div class="well well-sm" id="Reportes-contenedor">
                <div class="container">


                <Form id="Form_Registro_Atenciones_Por_Usuario" style="display:none" method = "POST" action = {{action('AdminController@Reporte_Registro_Atenciones_Usuario')}}>
                    {{ csrf_field()}}
                  <legend class="text-center header">Registro de Atenciones por Usuario</legend>
                    <div class="form-group">
                      <div class="col-md-12" align="center">
                        <select class="form-control" id="Id_Usuario_Reporte" name="Id_Usuario_Reporte" style="width: 150px !important; min-width: 150px; max-width: 150px;">
                          @for($i=0;$i<count($Usuarios);$i++)
                          {
                            <?php If($Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"])
                              {?>
                                <option value ="{{$Usuarios[$i]["ID_USUARIO"]}}" >{{$Usuarios[$i]["ID_USUARIO"]}}</option>
                                <?php
                              }?>
                            }
                          @endfor
                        </select><br>
                      </div>
                    </div>
                    <div class="form-group" align="center">
                      <div class="colo-md-7">
                        <div class="col-md-1" align="center"></div>
                      <div class="col-md-1" align="center">
                        <label>Desde:</label>
                      </div>
                      <div class="col-md-3" align="center">
                        <input type="hidden" class="form-control" id = "Id_Usuario_Auxiliar" name = "Id_Usuario_Auxiliar" value = "{!!$Datos_Usuario['ID_USUARIO']!!}">
                        <input class="form-control" id="Fecha_Inicial_Reporte_Usuario" name="Fecha_Inicial_Reporte_Usuario" required>
                      </div>
                      <div class="col-md-1" align="center">
                        <label>Hasta:</label>
                      </div>
                      <div class="col-md-3" align="center">
                        <input class="form-control" id="Fecha_Final_Reporte_Usuario" name="Fecha_Final_Reporte_Usuario" required>
                      </div>
                        <div class="col-md-1" align="right">
                          <input class="btn btn-primary" type="submit" value="Recuperar" name="Consultar_Registro_Atenciones">
                        </div>
                      </div>

                  </div>
                </Form>


                <Form id="Form_Registro_Atenciones_Por_Cliente" style="display:none" method = "POST" action = {{action('AdminController@Reporte_Registro_Atenciones_Cliente')}}>
                    {{ csrf_field()}}
                  <legend class="text-center header">Registro de Atenciones por Cliente</legend>
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="col-md-5"></div>
                        <div class="col-md-2" align="center">
                          <input class="form-control" id="Id_Cliente_Reporte" align="center" name="Id_Cliente_Reporte" placeholder="Id de Cliente" required ></input><br>
                        </div>
                      </div>
                    </div>

                    <div class="form-group" align="center">
                      <div class="colo-md-7">
                        <div class="col-md-1" align="center"></div>
                      <div class="col-md-1" align="center">
                        <label>Desde:</label>
                      </div>
                      <div class="col-md-3" align="center">
                        <input type="hidden" class="form-control" id = "Id_Usuario_Auxiliar" name = "Id_Usuario_Auxiliar" value = "{!!$Datos_Usuario['ID_USUARIO']!!}">
                        <input class="form-control" id="Fecha_Inicial_Reporte_Cliente" name="Fecha_Inicial_Reporte_Cliente" required>
                      </div>
                      <div class="col-md-1" align="center">
                        <label>Hasta:</label>
                      </div>
                      <div class="col-md-3" align="center">
                        <input class="form-control" id="Fecha_Final_Reporte_Cliente" name="Fecha_Final_Reporte_Cliente" required>
                      </div>
                        <div class="col-md-1" align="right">
                          <input class="btn btn-primary" type="submit" value="Recuperar" name="Consultar_Registro_Atenciones">
                        </div>
                      </div>

                  </div>
                </Form>


              </div>
                @yield('Reportes')
              </div>
            </div>
        </div>
      </div>
    </section>





    <div class="col-lg-12 text-center">
        <h2 color = 'white'>Configuración</h2>
        <hr class="star-primary">
    </div>

    <!-- Contact Section -->
    <section id="Configuracion" class="Configuracion">
        <div class="container">
            <table id="racetimes">
            </table>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->

                    <form  method = "POST" action = {{action('UsuarioController@Editar_Datos_Usuario')}}>
                        {!!csrf_field()!!}
                        <div class="row control-group">
                            <div class="form-group col-xs-12 " align="center">

                                <label>{!!$Datos_Usuario['ID_USUARIO']!!}</label>
                                <input type="hidden" class="form-control" name = "Nombre_Usuario" value = "{!!$Datos_Usuario['ID_USUARIO']!!}">
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" placeholder="Contraseña" id="password1" name = "Password2" required data-validation-required-message="Ingrese la nueva clave.">
                                <input type="hidden" class="form-control" name = "Estado" value = "{!!$Datos_Usuario['ESTADO']!!}">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Contraseña</label>
                                <input onblur="Comprobar_Contraseña()" type="password" class="form-control" placeholder="Contraseña" id="password2" name="Password2" required data-validation-required-message="Ingrese la nueva clave de nuevo.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono</label>
                                <input rows="5" class="form-control" placeholder="Número telefónico" id="Telefono" name ="Telefono" required data-validation-required-message="Ingrese su número telefónico." value = "{!!$Datos_Usuario['TELEFONO']!!}"></textarea>
                                <p class="help-block text-danger"></p>
                                <input type="hidden" class="form-control"  id ="Tipo_Usuario" name = "Tipo_Usuario" value = "{!!$Datos_Usuario['TIPO_USUARIO']!!}">
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Freelancer</h3>
                        <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#Inicio">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



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
                @for($i=0;$i<count($Usuarios);$i++)
                {
                  <?php If($Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"])
                  {
                  ?>
                    <option value="{{$Usuarios[$i]["ID_USUARIO"]}}">{{$Usuarios[$i]["ID_USUARIO"]}}</option>
                  <?php } ?>
                }
                @endfor
              </select>
            </div>
            </div>
          </div>
            <form role="form" method="post" action="/Guardar_Horario" autocomplete="off">
              <div class="modal-body">
                <table class="table table-bordered table-condensed" >
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

    <!-- Portfolio Modals -->

   
    <!-- jQuery -->

    <script src={{ asset('jquery/jquery.min.js') }}></script>

 <!-- Calendar -->
    <script src={{ asset('//code.jquery.com/jquery-1.10.2.js')}}></script>
    <script src={{ asset('//code.jquery.com/ui/1.11.2/jquery-ui.js')}}></script>
    <!-- Bootstrap Core JavaScript -->

    <script src={{ asset('js/bootstrap.min.js') }}></script>
    <!-- Plugin JavaScript -->

    <script src={{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}></script>
    <!-- Contact Form JavaScript -->

    <script src={{ asset('js/jqBootstrapValidation.js') }}></script>
    <!-- Theme JavaScript -->

    <script src={{ asset('js/freelancer.min.js') }}></script>




    <!-- Table pluggins -->
    <script src={{ asset('js/jquery.dataTables.min.js')}}></script>
    <script src={{ asset('js/dataTables.bootstrap.min.js')}}></script>

  @yield('Scripts')

    
      <script>
      $(function() {
        $( "#Fecha_Inicial_Reporte_Usuario").datepicker();
        $( "#Fecha_Final_Reporte_Usuario" ).datepicker();
        $( "#Fecha_Inicial_Reporte_Cliente").datepicker();
        $( "#Fecha_Final_Reporte_Cliente").datepicker();
      });
      </script>

<script>
//Script para modificar horario
  $("#btn_Modificar_Horario").click(function(event){
     var Id_Usuario_Modificar = $('#Select_Usuario_Horario').val();

     $.get(Nombre_Dominio+'/Recuperar_Horario',{Id_Usuario:Id_Usuario_Modificar},function(data){

            $.fn.Limpiar_Horario();
            if((data!='')&&(data!=null))
            {
              for(var i=0;i<data.length;i++)
              {
                var Dia = data[i]['DIA'];
                var Hora_Entrada = parseInt(data[i]['HORA_ENTRADA'].substring(0,2));
                $("#"+Hora_Entrada+"-"+Dia).text("Seleccionado");
                $("#"+Hora_Entrada+"-"+Dia).css('backgroundColor', '#1C6292'); 
              }
            }
          });

      $('#Mo_Modificar_Horario').modal({
      show:'true'
      });
  });


$('#Select_Usuario_Horario').on('change', function() {
  
   var Id_Usuario_Modificar = $(this).val();
      $.get(Nombre_Dominio+'/Recuperar_Horario',{Id_Usuario:Id_Usuario_Modificar},function(data){

        $.fn.Limpiar_Horario();
        if((data!='')&&(data!=null))
        {
            for(var i=0;i<data.length;i++)
            {
              var Dia = data[i]['DIA'];
              var Hora_Entrada = parseInt(data[i]['HORA_ENTRADA'].substring(0,2));
              $("#"+Hora_Entrada+"-"+Dia).text("Seleccionado");
              $("#"+Hora_Entrada+"-"+Dia).css('backgroundColor', '#1C6292'); 
            }
        }
      });
})

     
$.fn.Limpiar_Horario = function(){ 
        $("#Tbody_Horario").find("td").each(function() {
            if($(this).text() ==='Seleccionado'){
              $(this).css('backgroundColor', '#A8D5F2'); 
              $(this).text('');
            }
          });
    }


    $(".Hora").click(function(event){

      if($(this).css('backgroundColor').replace(/\s+/g, '') ==='rgb(168,213,242)'){
          $(this).css('backgroundColor', '#1C6292'); 
          $(this).text('Seleccionado');
      }else {
          $(this).css('backgroundColor', '#A8D5F2'); 
          $(this).text('');
      }
    });

  $('#btn_Guardar_Horario').click(function(event){
    var Arreglo_Horarios = [];
    $("#Tbody_Horario").find("td").each(function() {
      if($(this).text() ==='Seleccionado'){
        Arreglo_Horarios.push($(this).attr('id'));
      }
    });

    var Id_Usuario_Modificar = $('#Select_Usuario_Horario').val();

     $.get(Nombre_Dominio+'/Guardar_Horario',{Id_Usuario:Id_Usuario_Modificar,Horarios:Arreglo_Horarios},function(data){
      $("#Estado_Horario").append('<h3 align="center">Horario modificado</h3>');
       $('#Mo_Estado_Horario').modal({
                        show: 'true'
                        });
     });
      

  });
</script>

</body>

</html>
