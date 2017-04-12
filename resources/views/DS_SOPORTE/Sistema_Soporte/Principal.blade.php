<!DOCTYPE html>
<html lang="en">
<?php $Nombre_Dominio="/DS_Soporte/public"?>
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
    <link rel="stylesheet" href="{{asset('//code.jquery.com/ui/1.11.2/themes/redmond/jquery-ui.css')}}">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:400,700')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700')}}" rel='stylesheet' />

<!-- The main CSS file -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />


    <!-- Estilos para combobox -->
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/prism.css')}}">


    <!-- jQuery -->

    <script src={{ asset('jquery/jquery.min.js') }}></script>

    <!-- Plugin JavaScript -->

    <script src={{ asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}></script>
    <!-- Contact Form JavaScript -->

    <script src={{ asset('js/jqBootstrapValidation.js') }}></script>

    <!-- Theme JavaScript -->

    <script src={{ asset('js/freelancer.min.js') }}></script>
    <!-- Calendar JavaScript -->

    <script src={{ asset('js/Agenda/zabuto_calendar.js')}}></script>

            <!-- Bootstrap Core JavaScript -->

    <script src={{ asset('js/bootstrap.min.js') }}></script>

    <script src={{ asset('//code.jquery.com/ui/1.11.2/jquery-ui.js')}} type="text/javascript"></script>




    <!-- Table pluggins -->
    <script src={{ asset('js/jquery.dataTables.min.js')}}></script>
    <script src={{ asset('js/dataTables.bootstrap.min.js')}}></script>

    <!-- Combo box dinámico-->

    <script src={{ asset('js/chosen.jquery.min.js')}}></script>
    <!--<script ssrc={{ asset('js/prism.js')}} type="text/javascript" charset="utf-8"></script>-->

    <!--Exportar tablas a excel-->
    <script src={{ asset('js/jquery.table2excel.js')}}></script>
    <!--Libreria de moment-->
    <script src={{ asset('js/moment.js')}}></script>

    <!--<script src={{ asset('jquery/jquery-ui.js') }}></script>-->
    <!--<script src={{ asset('jquery/jquery-1.10.2.js') }} ></script>-->
    <!-- jquery libreria -->
    <!--<script src={{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js')}}></script>-->


  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
    .btn_Menu {
      text-align: left;
      text-transform: none;
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
    var Direccion_Oficina = 'Jr. Cuba I-12A Marcavalle';
    var Nombre_Dominio = '/DS_Soporte/public';
</script>
<body id="Inicio" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                    <a method="GET" href="/DS_Soporte/public/Atenciones" class="btn btn-primary btn-lg" type="submit">DATA SERVICE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#Inicio"></a>
                    </li>

                    <li class="page-scroll">
                      @if(in_array("01", $Arreglo_Modulos))
                      <a href="" class="dropdown-toggle" data-toggle="dropdown">Administración<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        @if(in_array("0101", $Arreglo_Modulos))
                        <li align="center">
                          <a href="#" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Mostrar_Agregar_Usuario">Crear Nuevo Usuario</a>
                        </li>
                        @endif
                        @if(in_array("0102", $Arreglo_Modulos))
                        <li align="center">
                          <a href="#" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Mostrar_Modificar_Usuario">Modificar Usuario</a>
                        </li>
                        @if(in_array("0103", $Arreglo_Modulos))
                        <li align="center" class="page-scroll">
                          @endif
                          <a href="#" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Modificar_Horario">Modificar Horario</a>
                        </li>
                        @endif
                        @if(in_array("0104", $Arreglo_Modulos))
                        <li align="center" class="page-scroll">
                          <a href="#Seccion_Perfiles" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Modificar_Perfiles">Modificar Perfiles</a>
                        </li>
                        @endif
                        @if(in_array("0105", $Arreglo_Modulos))
                        <li align="center" class="page-scroll">
                          <a href="#" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Asignar_Tareas">Asignar Tareas</a>
                        </li>
                        @endif
                      </ul>
                      @endif
                    </li>

                    <li class="page-scroll">
                      @if(in_array("04", $Arreglo_Modulos))
                      <a href="" class="dropdown-toggle" data-toggle="dropdown">Registrar Atención<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        @if(in_array("0401", $Arreglo_Modulos))
                        <li align="center">
                          <a href="#" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="Registrar_Atencion_Remota">Registrar Atención Remota</a>
                        </li>
                        @endif
                        @if(in_array("0402", $Arreglo_Modulos))
                        <li align="center">
                          <a href="#" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="Registrar_Atencion_Presencial">Registrar Atención Presencial</a>
                        </li>
                        @endif
                      </ul>
                      @endif
                    </li>

                    <li class="page-scroll">
                      @if(in_array("05", $Arreglo_Modulos))
                      <a href="" class="dropdown-toggle" data-toggle="dropdown">Pendientes<b class="caret"></b></a>
                      <ul class="dropdown-menu" style="min-width:215px">
                        @if(in_array("0501", $Arreglo_Modulos))
                        <li align="center">
                          <a href="#Pendientes" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu"><span id="Nro_Atenciones_Pendientes" class="badge pull-right"> {!!count($Atenciones_Pendientes)!!}</span>Atenciones Pendientes</a>
                        </li>
                        @endif
                        @if(in_array("0502", $Arreglo_Modulos))
                        <li align="center">
                          <a href="#Pendientes" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu"><span id="Nro_Atenciones_Pendientes" class="badge pull-right"> {!!count($Atenciones_Pendientes)!!}</span>Eventos Pendientes</a>
                        </li>
                        @endif
                        @if(in_array("0504", $Arreglo_Modulos))
                        <li align="center">
                        <a href="#Pendientes" id="btn_Actividades_Pendientes" data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu"><span id="Nro_Actividades_Pendientes" class="badge pull-right">{!!count($Actividades_Hoy)!!}</span>Actividades Pendientes</a>
                        </li>
                        @endif
                      </ul>
                      @endif
                    </li>

                    <li class="page-scroll">
                        @if(in_array("03", $Arreglo_Modulos))
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              {!!csrf_field()!!}
                              @if(in_array("0301", $Arreglo_Modulos))
                              <li align="left">
                                  <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" method="GET" href="/DS_Soporte/public/Atenciones/Reportes/Atenciones_Derivadas_Pendientes" onclick="Ocultar_Buscar_Cliente()">Atenciones derivadas pendientes</a>
                              </li>
                              @endif
                              @if(in_array("0302", $Arreglo_Modulos))
                              <li align="left">
                                  <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" onclick="Mostrar_Buscar_Usuario()">Registro de atenciones por Usuario</a>
                              </li>
                              @endif
                              @if(in_array("0303", $Arreglo_Modulos))
                              <li align="left">
                                  <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" method="GET" href="/DS_Soporte/public/Atenciones/Reportes/Atenciones_Pendientes" onclick="Ocultar_Buscar_Cliente()">Atenciones Pendientes</a>
                              </li>
                              @endif
                              @if(in_array("0304", $Arreglo_Modulos))
                              <li>
                                <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" onclick="Mostrar_Buscar_Cliente()">Registro de atenciones por Cliente</a>
                              </li>
                              @endif
                              @if(in_array("0305", $Arreglo_Modulos))
                              <li align="left" data-toggle="collapse" data-target=".nav-collapse.in">
                                <a type="button" data-toggle="collapse" data-target=".nav-collapse.in" class="btn btn-primary btn_Menu" onclick="Mostrar_Registro_Atenciones()">Registro de atenciones</a>
                              </li>
                              @endif
                          </ul>
                        @endif
                    </li>

                    <!--Menú de configuraciones-->
                    <li class="page-scroll">
                    @if(in_array("02", $Arreglo_Modulos))
                      <a href="~/" class="dropdown-toggle" data-toggle="dropdown">{{Session::get('Id_Usuario')}}<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        @if(in_array("0201", $Arreglo_Modulos))
                        <li align="center" class="page-scroll">
                          <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Mostrar_Modificar_Datos_Personales" href="#Configuracion">Editar datos personales</a>
                        </li>
                        <li align="center" class="page-scroll">
                          <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" href="#" id="btn_Mostrar_Modificar_Imagen_Perfil">Cambiar imagen de perfil</a>
                        </li>
                        @endif
                        @if(in_array("0202", $Arreglo_Modulos))
                        <li align="center" class="page-scroll">
                          <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" id="btn_Modificar_Password">Cambiar Password</a>
                        </li>
                        @endif
                        <li align="center">
                        <a data-toggle="collapse" data-target=".nav-collapse.in" type="button" class="btn btn-primary btn_Menu" method="GET" href = {{action('UsuarioController@out')}}>Salir</a>
                        </li>
                      </ul>
                    @endif
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
                      @if(file_exists ("uploads/".\Session::get('Id_Usuario').".jpg"))
                    <?php echo('<img style="width:200px;height:200px" src="'.$Nombre_Dominio.'/uploads/'.\Session::get("Id_Usuario").'.jpg" alt="">')?>
                  @else
                    <img class="img-responsive" src="{{asset('img/profile.png')}}" alt="">
                  @endif
                    <div class="intro-text">
                        <span class="name">Data Service Servicios de Atención</span>
                        <hr class="star-light">
                        <span class="skills">BIENVENIDO {!!$Datos_Usuario['ID_USUARIO']!!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- Regioón de inclusion de submodulos de administracion-->
@if(in_array("0101", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Agregar_Usuarios')
    <script src={{ asset('js/js_Aplicacion/Agregar_Usuarios.js') }}></script>
@endif
@if(in_array("0102", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Modificar_Usuarios')
    <script src={{ asset('js/js_Aplicacion/Modificar_Usuarios.js') }}></script>
@endif
@if(in_array("0103", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Modificar_Horario')
    <script src={{ asset('js/js_Aplicacion/Modificar_Horario.js') }}></script>
@endif

<!--Submodulo para agregar perfiles se encuentra mas abajo-->

@if(in_array("0105", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Asignar_Tareas')
    <script src={{ asset('js/js_Aplicacion/Asignar_Tareas.js') }}></script>
@endif

<!-- Regioón de inclusion de submodulos de registro de atenciones-->
@if(in_array("0401", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Registro_Atencion_Remota')
    <script src={{ asset('js/js_Aplicacion/Registro_Atencion_Remota.js') }}></script>
@endif

@if(in_array("0402", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Registro_Atencion_Presencial')
    <script src={{ asset('js/js_Aplicacion/Registro_Atencion_Presencial.js') }}></script>
@endif

@include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Subir_Adjuntos')

    <!-- Submodulo de actividades pendientes -->
@if(in_array("0504", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Actividades_Pendientes')
    <script src={{ asset('js/js_Aplicacion/Actividades_Pendientes.js') }}></script>
@endif


    <!-- Portfolio Grid Section -->

    <!-- About Section -->
    <section class="success" id="Pendientes">

        <div class="container">
          @yield('Pendientes')
          <h1>Atenciones Remotas Pendientes</h1><br>
          <div class="table-responsive">
            <table id="racetimes" >
              <thead>
                <tr id="firstrow"><th>Id Cliente</th><th>Denominación</th><th>Modalidad</th><th>Fecha</th><th>Tipo</th><th>Total días pendiente</th><th>Derivado por:</th></tr>
              </thead>
                <tbody id="tbody_Atenciones_Pendientes">

                @for($i=0;$i<count($Atenciones_Pendientes);$i++)
                  <tr href="#Reg_Atencion">
                  <td>{!!Form::label('hola',$Atenciones_Pendientes[$i]["ID_CLIENTE"])!!}</td>
                  <td>{!!$Atenciones_Pendientes[$i]["DENOMINACION"]!!}</td>
                  <td>{!!$Atenciones_Pendientes[$i]["MODALIDAD"]!!}</td>
                  <td>{!!date("d-m-Y",strtotime($Atenciones_Pendientes[$i]["FECHA"]))!!}</td>
                  <td>{!!$Atenciones_Pendientes[$i]["TIPO"]!!}</td>
                  <td>{!!$Atenciones_Pendientes[$i]["DIAS_PENDIENTE"]!!}</td>
                  <?php if($Atenciones_Pendientes[$i]["ID_USUARIO_ORIGEN"]=='NULL')
                  {
                  ?>
                  <td></td>
                  <?php }
                  else{
                    ?>
                    <td>{!!$Atenciones_Pendientes[$i]["ID_USUARIO_ORIGEN"]!!}</td>
                  <?php } ?>
                  @if($Atenciones_Pendientes[$i]["TIPO"]=='REMOTA')
                  <td onclick='Cargar_Datos_Atencion_Remota(<?php echo json_encode($Atenciones_Pendientes[$i])?>)'>{!!Form::submit('Atender',['class'=>'btn btn-primary'])!!}</td>
                  @else
                  <td onclick='Cargar_Datos_Atencion_Presencial(<?php echo json_encode($Atenciones_Pendientes[$i])?>)'>{!!Form::submit('Atender',['class'=>'btn btn-primary'])!!}</td>
                  @endif
                  </tr>
                @ENDFOR

                </tbody>

            </table>
          </div>
        </div>
    </section>


        <script>

          function Registrar_Atencion_Remota()
          {
            location.href = "#Reg_Atencion"
            document.getElementById("Seccion_Tabla_Cliente").style="display:visible"
          }

          function Mostrar_Registro_Atenciones()
          {
            Ocultar_Buscar_Cliente();
            Ocultar_Buscar_Usuario();
            document.getElementById("Form_Registro_Atenciones").style="display:initial"
          }

          function Mostrar_Buscar_Cliente()
          {
            location.href = "#Reportes";
            Ocultar_Buscar_Usuario();
            document.getElementById("Form_Registro_Atenciones").style="display:none"
            document.getElementById("Form_Buscar_Cliente").style="display:initial"
          }

          function Mostrar_Buscar_Usuario()
          {
            Ocultar_Buscar_Cliente();
            document.getElementById("Form_Registro_Atenciones").style="display:none"
            document.getElementById("Form_Registro_Atenciones_Por_Usuario").style="display:initial";

          }
          function Ocultar_Buscar_Cliente()
          {
            location.href = "#Reportes";
            document.getElementById("Form_Buscar_Cliente").style="display:none";
          }

          function Ocultar_Buscar_Usuario()
          {
            location.href = "#Reportes";
            document.getElementById("Form_Registro_Atenciones_Por_Usuario").style="display:none";
          }
//Función que remplazara a editar Campo
         function Cargar_Datos_Atencion_Remota(Informacion)
          {
              $('#Reg_Atencion_Remota').show();
              location.href = "#Reg_Atencion_Remota";

              document.getElementById('Id_Atencion_Remota').value = Informacion['ID_ATENCION'];
              document.getElementById('Id_Cliente_Atencion_Remota').value = Informacion['ID_CLIENTE'];
              document.getElementById("Modalidad_Atencion_Remota").value = Informacion['MODALIDAD'];
              document.getElementById("Producto_Atencion_Remota").value = Informacion['PRODUCTO_SISTEMA'];
              document.getElementById("Problema_Atencion_Remota").value = Informacion['PROBLEMA_REPORTADO'];
              document.getElementById("Solucion_Atencion_Remota").value = Informacion['SOLUCION_BRINDADA'];
              document.getElementById("Team_Viewer_ID_Atencion_Remota").value = Informacion['TEAM_VIEWER_ID'];
              document.getElementById("Team_Viewer_Password_Atencion_Remota").value = Informacion['TEAM_VIEWER_PASSWORD'];
              document.getElementById("Observaciones_Atencion_Remota").value = Informacion['OBSERVACIONES'];
              document.getElementById("Estado_Atencion_Remota").value = Informacion['ESTADO'];
              document.getElementById("Persona_Contacto_Atencion_Remota").value = Informacion['PERSONA_CONTACTO'];
              document.getElementById("Cargo_Persona_Contacto_Atencion_Remota").value = Informacion['CARGO_PERSONA_CONTACTO'];
              document.getElementById("Telefono_Contacto_Atencion_Remota").value = Informacion['TELEFONO_CONTACTO'];

              if(Informacion['ID_ORIGEN']!=null)
              {
                document.getElementById("Id_Origen_Atencion_Remota").value = Informacion['ID_ORIGEN'];
              }

              //document.getElementById("Fecha_Atencion_Remota").value = Informacion['FECHA'];
              document.getElementById("Fecha_Atencion_Remota").value = Informacion['FECHA'].substring(8,10) + "/"+ Informacion['FECHA'].substring(5,7)+"/"+Informacion['FECHA'].substring(0,4);

              //Asignar Hora iniciop y fin
              $('#Hora_Inicio_Atencion_Remota').val(moment().format('HH'));
              $('#Minutos_Inicio_Atencion_Remota').val(moment().format('mm'));
              $('#Hora_Fin_Atencion_Remota').val(moment().format('HH'));
              $('#Minutos_Fin_Atencion_Remota').val(moment().format('mm'));
          }

          function Cargar_Datos_Atencion_Presencial(Informacion)
          {
              $('#Reg_Atencion_Presencial').show();
              location.href = "#Reg_Atencion_Presencial";
              
              document.getElementById('Id_Atencion_Presencial').value = Informacion['ID_ATENCION'];
              document.getElementById('Id_Cliente_Atencion_Presencial').value = Informacion['ID_CLIENTE'];
              document.getElementById("Modalidad_Atencion_Presencial").value = Informacion['MODALIDAD'];
              document.getElementById("Producto_Atencion_Presencial").value = Informacion['PRODUCTO_SISTEMA'];
              document.getElementById("Problema_Atencion_Presencial").value = Informacion['PROBLEMA_REPORTADO'];
              document.getElementById("Solucion_Atencion_Presencial").value = Informacion['SOLUCION_BRINDADA'];
              document.getElementById("Observaciones_Atencion_Presencial").value = Informacion['OBSERVACIONES'];
              document.getElementById("Estado_Atencion_Presencial").value = Informacion['ESTADO'];
              document.getElementById("Persona_Contacto_Atencion_Presencial").value = Informacion['PERSONA_CONTACTO'];
              document.getElementById("Cargo_Persona_Contacto_Atencion_Presencial").value = Informacion['CARGO_PERSONA_CONTACTO'];
              document.getElementById("Telefono_Contacto_Atencion_Presencial").value = Informacion['TELEFONO_CONTACTO'];
              document.getElementById("Lugar_Atencion_Presencial").value = Informacion['LUGAR_ATENCION'];
              
              if(Informacion['ID_ORIGEN']!=null)
              {
                document.getElementById("Id_Origen_Atencion_Presencial").value = Informacion['ID_ORIGEN'];
              }

              //document.getElementById("Fecha_Atencion_Presencial").value = Informacion['FECHA'];

              document.getElementById("Fecha_Atencion_Presencial").value = Informacion['FECHA'].substring(8,10) + "/"+ Informacion['FECHA'].substring(5,7)+"/"+Informacion['FECHA'].substring(0,4);

              //Asignar Hora iniciop y fin
              $('#Hora_Inicio_Atencion_Presencial').val(moment().format('HH'));
              $('#Minutos_Inicio_Atencion_Presencial').val(moment().format('mm'));
              $('#Hora_Fin_Atencion_Presencial').val(moment().format('HH'));
              $('#Minutos_Fin_Atencion_Presencial').val(moment().format('mm'));
          }

        function Comprobar_Contraseña()
        {
          if(document.getElementById('password2').value!=document.getElementById('password1').value)
          {
            document.getElementById('password2').value="";
          }
        }

        function Seleccionar_Cliente(Id_Cliente)
        {
          var aux = Id_Cliente.toString();
          if(aux.length==7){
            document.getElementById('Id_Cliente_Reporte_Buscar').value = '0'+Id_Cliente.toString();
          }
          else{
            document.getElementById('Id_Cliente_Reporte_Buscar').value = Id_Cliente.toString();
          }
          $("#Mo_Lista_Clientes").modal("hide");
        }
        </script>


    <section id="Reportes" class="Reportes">
      <div class="container">
        <div class="row" >
          <div class="col-md-12" >
              <div class="well well-sm" id="Reportes-contenedor">
                <div class="container">
                <Form style="display:none" id="Form_Buscar_Cliente" method = "POST" action = {{action('UsuarioController@Reporte_Atenciones_Por_Cliente')}}>

                    {{ csrf_field()}}

                  <legend class="text-center header">Reporte de Atenciones por Cliente</legend>

                      <div class="form-group col-md-6 col-md-offset-3">
                          <div class="form-inline" align="center">
                            <div class="form-group">
                              <input class="form-control" id="Id_Cliente_Reporte_Buscar" name="Id_Cliente_Reporte_Buscar" placeholder="Id de Cliente" required />
                            </div>
                            <div class="form-group">
                            <button class="btn btn-success" type="button" id="btn_Recuperar_Cod_Cliente" name="btn_Recuperar_Cod_Cliente"><i class="fa fa-search"></i></button>
                              </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" value="Consultar" name="Consultar_Atenciones_Cliente">
                            </div>
                      </div>
                  </div>
                  <div class="form-group col-md-6 col-md-offset-3">
                      <div class="form-inline" align="center">
                        <div class="form-group">
                          <label>Desde:</label>
                          <input class="form-control" style="width:110px" placeholder="Fecha Inicial" id="Fecha_Inicial_Buscar_Cliente" name="Fecha_Inicial_Buscar_Cliente">
                        </div>
                        <div class="form-group">
                          <label style="width:70px; text-align:right;" >hasta:</label>
                          <input class="form-control" style="width:110px" placeholder="Fecha Final" id="Fecha_Final_Buscar_Cliente" name="Fecha_Final_Buscar_Cliente">
                        </div>
                  </div>
              </div>
                </Form>

                <Form style="display:none" id="Form_Registro_Atenciones" method = "POST" action = {{action('UsuarioController@Reporte_Atenciones_Usuario')}}>
                    {{ csrf_field()}}
                  <legend class="text-center header">Reporte de Registro de Atenciones</legend>
                  <div class="form-group">
                    <div class="col-md-9" align="center">
                      <div class="col-md-3" align="center"></div>
                      <div class="col-md-1" align="center">
                        <label>Desde:</label>
                      </div>
                      <div class="col-md-3" align="center">
                        <input class="form-control" id="Fecha_Inicial" name="Fecha_Inicial">
                      </div>
                      <div class="col-md-1" align="center">
                        <label>Hasta:</label>
                      </div>

                      <div class="col-md-3" align="center">
                        <input class="form-control" id="Fecha_Final" name="Fecha_Final">
                      </div>

                        <div class="col-md-1" align="right">
                          <input class="btn btn-primary" type="submit" value="Recuperar" name="Consultar_Registro_Atenciones">
                        </div>
                      </div>
                  </div>
                </Form>
                <!--Formulario `para reporte de registro de atenciones por usuario`-->
                <Form id="Form_Registro_Atenciones_Por_Usuario" style="display:none" method = "POST" action = {{action('UsuarioController@Reporte_Atenciones_Por_Usuario')}}>
                    {{ csrf_field()}}
                  <legend class="text-center header">Registro de Atenciones por Usuario</legend>
                    <div class="form-group">
                      <div class="col-md-12" align="center">
                        <select class="form-control" id="Id_Usuario_Reporte" name="Id_Usuario_Reporte" style="width: 150px !important; min-width: 150px; max-width: 150px;">
                          @for($i=0;$i<count($Lista_Usuarios);$i++)
                          {
                            <?php If($Lista_Usuarios[$i]["ID_USUARIO"] != $Datos_Usuario["ID_USUARIO"])
                              {?>
                                <option value ="{{$Lista_Usuarios[$i]["ID_USUARIO"]}}" >{{$Lista_Usuarios[$i]["ID_USUARIO"]}}</option>
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
                        <input class="form-control" id="Fecha_Inicial_Reporte_Usuario" name="Fecha_Inicial_Reporte_Usuario">
                      </div>
                      <div class="col-md-1" align="center">
                        <label>Hasta:</label>
                      </div>
                      <div class="col-md-3" align="center">
                        <input class="form-control" id="Fecha_Final_Reporte_Usuario" name="Fecha_Final_Reporte_Usuario">
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

.dropdown {
    width: 200px;
    border: 1px solid silver;
    cursor: pointer; /* use correct mouse pointer when hovering over the dropdown */
    padding: 10px;
    position: relative;
    margin: 0 auto;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}.dropdown:after {
    content:'';
    height: 0;
    position: absolute;
    width: 0;
    border: 6px solid transparent;
    border-top-color: #000;
    top: 50%;
    right: 10px;
    margin-top: -3px;
}
.dropdown.is-active:after {
    border-bottom-color: #000;
    border-top-color: #fff;
    margin-top: -9px;
}
.dropdown-list {
    list-style: none;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 100%; /* align the dropdown right below the dropdown text */
    border: inherit;
    border-top: none;
    left: -1px; /* align the dropdown to the left */
    right: -1px; /* align the dropdown to the right */
    opacity: 0; /* hide the dropdown */
    -webkit-transition: opacity 0.4s ease-in-out;
    -moz-transition: opacity 0.4s ease-in-out;
    -o-transition: opacity 0.4s ease-in-out;
    -ms-transition: opacity 0.4s ease-in-out;
    transition: opacity 0.4s ease-in-out;
    pointer-events: none; /* avoid mouse click events inside the dropdown */
}.is-active .dropdown-list {
    opacity: 1; /* display the dropdown */
    pointer-events: auto; /* make sure that the user still can select checkboxes */
}
.dropdown-list li label {
    display: block;
    border-bottom: 1px solid silver;
    padding: 10px;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -ms-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}

.dropdown-list li label:hover {
    background-color: #c41230;
    color: white;
}
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  padding: 10px;
}

/* Might want to wrap a span around your checkbox text */
.checkboxtext
{
  /* Checkbox text */
  font-size: 110%;
  display: inline;
}

.arrow_left:hover{
  border-color: #1685B5;
}
.arrow_left:after:hover{
  border-color: #1685B5;
}
.arrow_left {
  display: inline-block;
  width: 2em;
  height: 2em;
  border: 0.3em solid #333;
  border-radius: 50%;
  margin-right: 1.5em;
}

.arrow_left:after {
  content: '';
	display: inline-block;
  margin-top: 0em;
  margin-left: 0em;
  width: 0.8em;
  height: 0.8em;
  border-top: 0.3em solid #333;
  border-right: 0.3em solid #333;
  -moz-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.arrow_right:hover{
  border-color: #1685B5;
}
.arrow_right {
  display: inline-block;
  width: 2em;
  height: 2em;
  border: 0.3em solid #333;
  border-radius: 50%;
  margin-left: 1.5em;
}

.arrow_right:after {
  content: '';
	display: inline-block;
  margin-top: 0em;
  margin-left: -0.25em;
  width: 0.8em;
  height: 0.8em;
  border-top: 0.3em solid #333;
  border-right: 0.3em solid #333;
  -moz-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.ui-widget-content{
  color:white;
}
.ui-dialog {
	overflow: hidden;
	position: absolute;
	top: 0;
	left: 0;
	padding: .2em;
	outline: 0;
  z-index: 50000 !important ;
}
</style>

@if(in_array("0104", $Arreglo_Modulos))
    @include('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Modificar_Perfiles')
    <script src={{ asset('js/js_Aplicacion/Modificar_Perfiles.js') }}></script>
@endif

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
<!--Seccion de modales-->


<!-- Modal para modificar datos personales-->
<div class="modal fade" id="Mo_Modificar_Datos_Personales" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content" align="center">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h1 class="modal-title" align="center">{!!$Datos_Usuario['ID_USUARIO']!!}</h1>
    </div>
        <div class="modal-body">
          <div class="row form-horizontal" align="center">
              <form  method = "POST" id="Form_Editar_Datos_Usuario" action = {{action('UsuarioController@Editar_Datos_Usuario')}}>
                  {!!csrf_field()!!}
                   <div class="row control-group">
                      <div class="form-group col-xs-8 has-float-label col-centered" style="text-align:center;">
                          <input class="form-control" placeholder="Nombres" id="Usuario_Nombres" name="Usuario_Nombres" value="{!!$Datos_Usuario['NOMBRES']!!}" required data-validation-required-message="Ingrese su Nombre.">
                         <label for="Usuario_Nombres">Nombres</label>
                          <p class="help-block text-danger"></p></br>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-8 has-float-label col-centered" style="text-align:center;">
                          <input class="form-control" placeholder="Apellidos" id="Usuario_Apellidos" name="Usuario_Apellidos" value="{!!$Datos_Usuario['APELLIDOS']!!}" required data-validation-required-message="Ingrese sus Apellidos.">
                         <label for="Usuario_Apellidos">Apellidos</label>
                          <p class="help-block text-danger"></p></br>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-8 has-float-label col-centered" style="text-align:center;">
                          <input class="form-control" placeholder="Teléfono" id="Usuario_Telefono" name="Usuario_Telefono" value="{!!$Datos_Usuario['TELEFONO']!!}" required data-validation-required-message="Ingrese su Teléfono.">
                         <label for="Usuario_Telefono">Teléfono</label>
                          <p class="help-block text-danger"></p></br>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-8 has-float-label col-centered" style="text-align:center;">
                          <input class="form-control" placeholder="E-Mail" id="Usuario_Email" name="Usuario_Email" value="{!!$Datos_Usuario['EMAIL']!!}" required data-validation-required-message="Ingrese su E-MAIL.">
                         <label for="Usuario_Email">E-MAIL</label>
                          <p class="help-block text-danger"></p></br>
                      </div>
                  </div>
                  <div class="row control-group">
                      <div class="form-group col-xs-8 col-centered" style="text-align:center;">
                          <input id="btn_Guardar_Editar_Datos_Usuario" type="button" class="btn btn-success" value="Guardar">
                          <input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancelar">
                      </div>
                  </div></br>
              </form>
          </div>
        </div>

   </div>
</div>
</div>

<div class="modal fade" id="Mo_Modificar_Imagen_Perfil" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" align="center">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">Imagen de Perfil</h4>
          </div>
            <form role="form" method="post" action={{action('UsuarioController@Upload_Imagen_Perfil')}} autocomplete="off" files="true" enctype="multipart/form-data">
              <div class="modal-body">
                <img id="Nueva_Imagen_Perfil" style="width:100px;height:100px;">
              </div>
              <input type="file" class="btn btn-primary" id="photoimg" name="photoimg" onchange = "document.getElementById('Nueva_Imagen_Perfil').src = window.URL.createObjectURL(this.files[0])">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div align="center" class="modal-footer">
                  <input type="submit" class="btn btn-success" id="btn_Guardar_Imagen_Perfil" value="Aceptar">
                  <input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancelar">
              </div>
            </form>
        </div>
      </div>
    </div>

<!-- Modal para cambiar contraseña-->

<div class="modal fade" id="Mo_Modificar_Password" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content" align="center">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" align="center">Modificar Password</h4>
    </div>
      <form id="Form_Modificar_Password" role="form" method="post" action="/Modificar_Password" autocomplete="off">
        <div class="modal-body">
          <div class="row form-horizontal" align="center">
              <div class="form-group">
                    <label align="right" for="Password_Crear" class="col-sm-4 control-label">Nuevo Password:</label>
                    <div class="col-sm-6">
                      <input id="Password_1" name="Password_1" class="form-control" type="password" placeholder="Ingrese nuevo Password" />
                    </div>
              </div>

              <div class="form-group">
                    <label align="right" for="Password_Crear" class="col-sm-4 control-label">Nuevo Password:</label>
                    <div class="col-sm-6">
                      <input id="Password_2" name="Password_2" class="form-control" type="password" placeholder="Ingrese nuevo Password" />
                    </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <div align="center" class="form-group">
            <input id="btn_Guardar_Modificar_Password" type="button" class="btn btn-success" value="Aceptar">
            <input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancelar">
        </div>
        </div>
      </form>
   </div>
</div>
</div>


<!-- Seccion para modificar y agregar usuarios-->

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

    <!-- Modal para mensaje-->
  <div class="modal fade" id="Mo_Mensaje" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content" align="center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Mensaje</h4>
        </div>
          <form role="form" method="post" action="/reservas" autocomplete="off">
            <div class="modal-body">
              <div id="Datos_Mostrar">
              </div>
            </div>
            <div align="center" class="modal-footer">
              <input type="button" class="btn btn-primary" data-dismiss="modal" value="Aceptar">
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Modal para mostrar lista de clientes-->
<div class="modal fade" id="Mo_Lista_Clientes" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" align="center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Lista de Clientes</h4>
      </div>
      <div class="modal-body">
        <table id="Table_Clientes_Buscar" border="1px" class="table table-bordered">
          <thead>
            <tr valign="middle" style="vertical-align:middle;" id="firstrow_reporte"><th valign="middle">Id Cliente</th><th>Denominación</th><th>Persona de Contacto</th><th>Teléfono</th><th>Observaciones</th><th></th></tr>
          </thead>
          <tbody id='Tbody_Table_Clientes_Buscar'>
          </tbody>
        </table>
      </div>
      <div align="center" class="modal-footer">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Mo_Registro_Comprobantes_Cliente" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" align="center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Lista de Clientes</h4>
      </div>
      <div class="modal-body">
        <table id="Table_Relacion_Clientes" border="1px" class="table table-bordered">
          <thead>
            <tr valign="middle" style="vertical-align:middle;" id="firstrow_reporte"><th valign="middle">Id Cliente</th><th>Denominación</th><th>Persona de Contacto</th><th>Teléfono</th><th>Observaciones</th><th></th></tr>
          </thead>
          <tbody id='Tbody_Relacion_Clientes'>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


  <!--dialog del informacion de actividad-->

    <!-- jQuery -->
    @yield('Scripts')

<script>
  //Script con datos generales

   $.datepicker.regional['es'] = {
   closeText: 'Cerrar',
   prevText: '< Ant',
   nextText: 'Sig >',
   currentText: 'Hoy',
   monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
   monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
   dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
   dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
   dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
   weekHeader: 'Sm',
   dateFormat: 'dd/mm/yy',
   firstDay: 1,
   isRTL: false,
   showMonthAfterYear: false,
   yearSuffix: ''
   };
   $.datepicker.setDefaults($.datepicker.regional['es']);
  $(function () {
  $( "#Fecha_Atencion_Remota" ).datepicker();
  $( "#Fecha_Atencion_Presencial" ).datepicker();
  });
</script>

<script>
$('#btn_Recuperar_Cod_Cliente').click(function(event){
  $('#Tbody_Table_Clientes_Buscar').empty();
  $.get(Nombre_Dominio+"/Recuperar_Clientes",{},function(data){

    for(var i=0;i<data.length;i++)
    {
      var row = $("<tr><td bgcolor='white'>"+data[i]['ID_CLIENTE']+"</td><td bgcolor='white'>"+data[i]['DENOMINACION']+"</td><td bgcolor='white'>"+data[i]['PERSONA_CONTACTO']+"</td><td bgcolor='white'>"+data[i]['TELEFONO_CONTACTO']+"</td><td bgcolor='white'>"+data[i]['OBSERVACIONES']+"</td><td bgcolor='white'><button onclick='Seleccionar_Cliente("+data[i]['ID_CLIENTE'].toString()+")' type='button' class='btn btn-info'>Seleccionar</button></td></tr>");
      $('#Tbody_Table_Clientes_Buscar').append(row);
    }

    $('#Table_Clientes_Buscar').DataTable({
        bDestroy: true,
        responsive: true
      });
      $('#Mo_Lista_Clientes').modal({
      show:'true'
      });
  });
});
</script>
      <!--Script para los combobox-->
      <script>
        $(document).ready(function(){
            $(".chosen-select").chosen();
        });
      </script>

      <script>
      $(document).ready(function(){
      $(function() {
        $( "#Fecha_Final" ).datepicker();
        $( "#Fecha_Inicial" ).datepicker();
        $( "#Fecha_Inicial_Buscar_Cliente" ).datepicker();
        $( "#Fecha_Final_Buscar_Cliente" ).datepicker();
        $( "#Fecha_Inicial_Reporte_Usuario" ).datepicker();
        $( "#Fecha_Final_Reporte_Usuario" ).datepicker();
        });
      });
      </script>
          <script>
          //Script para exportar tabla a excel
          $("#btn_Exportar").click(function(event){
                      $("#Table_Atenciones_Usuario").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Registro_Atenciones",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                      });
                    });

          </script>
          <script>
            setInterval(function(){

              $.get(Nombre_Dominio+"/Actualizar_Pendientes",{},function(data){

                if(data!='')
                {
                  $("#Nro_Atenciones_Pendientes").val(data.length);

                     var table = $('#tbody_Atenciones_Pendientes');
                      table.empty();

                       for(i=0; i<data.length; i++){
                            if(data[i]['TIPO']=="REMOTA")
                            {
                              var row = $("<tr href='#Reg_Atencion'><td>"+data[i]['ID_CLIENTE']+"</td><td>"+data[i]['DENOMINACION']+"</td><td>"+data[i]['MODALIDAD']+"</td><td>"+moment(data[i]['FECHA']).format('DD-MM-YYYY')+"</td><td>"+data[i]['TIPO']+"</td><td>"+data[i]['DIAS_PENDIENTE']+"</td><td>"+data[i]['ID_USUARIO_ORIGEN']+"</td><td><button class='btn btn-primary btn_Aceptar' onclick='Cargar_Datos_Atencion_Remota("+JSON.stringify(data[i])+")'>Atender</button></td>");
                              table.append(row);
                            }else {
                              var row = $("<tr href='#Reg_Atencion'><td>"+data[i]['ID_CLIENTE']+"</td><td>"+data[i]['DENOMINACION']+"</td><td>"+data[i]['MODALIDAD']+"</td><td>"+moment(data[i]['FECHA']).format('DD-MM-YYYY')+"</td><td>"+data[i]['TIPO']+"</td><td>"+data[i]['DIAS_PENDIENTE']+"</td><td>"+data[i]['ID_USUARIO_ORIGEN']+"</td><td><button class='btn btn-primary btn_Aceptar' onclick='Cargar_Datos_Atencion_Presencial("+JSON.stringify(data[i])+")'>Atender</button></td>");
                              table.append(row);
                            }

                          }
                }
              });

              }, 10000);

          </script>

<script>
$('#btn_Mostrar_Modificar_Datos_Personales').click(function(event){
    $('#Mo_Modificar_Datos_Personales').modal({
       show:'true'
    });
});

$('#btn_Mostrar_Modificar_Imagen_Perfil').click(function(event){
  $('#Mo_Modificar_Imagen_Perfil').modal({
     show:'true'
  });
});


$('#btn_Guardar_Editar_Datos_Usuario').click(function(event){
  $.ajax({
   type: "GET",
   url: Nombre_Dominio+"/Actualizar_Datos_Usuario",
   data: $("#Form_Editar_Datos_Usuario").serialize(),
   success: function(msg) {

     $('#Datos_Mostrar').empty();
    var info = $('#Datos_Mostrar');
    info.append('<h4 align="center">'+msg+'</h4>');
     $('#Mo_Mensaje').modal({
        show: 'true'
        });
        $("#Mo_Modificar_Datos_Personales").modal("hide");
   }
  });
});
</script>
<script>
$('#btn_Modificar_Password').click(function(event){
    $('#Mo_Modificar_Password').modal({
       show:'true'
    });
});
$('#btn_Guardar_Modificar_Password').click(function(event){
  $.ajax({
   type: "GET",
   url: Nombre_Dominio+"/Modificar_Password",
   data: $("#Form_Modificar_Password").serialize(),
   success: function(msg) {

     $('#Datos_Mostrar').empty();
    var info = $('#Datos_Mostrar');
    info.append('<h4 align="center">'+msg+'</h4>');

     $('#Mo_Mensaje').modal({
        show: 'true'
        });
        if(msg=="Password Modificado")
        {
            $("#Mo_Modificar_Password").modal("hide");
        }
   }
  });
});
</script>

</body>

</html>
