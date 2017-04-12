<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use SoapFault;
use ZipArchive;
use SoapClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use App\Http\Requests;



class ObservacionController extends Controller
{


        public $Servicios_Observacion;
        public $Servicios_Observacion_1;
        public $Servicios_Observacion_2;
        public $Servicios_Observacion_3;
        public $Servicios_Observacion_4;
        public $Servicios_Observacion_5;
        public $Sevicio_Usuarios;
        public $Servicio_Adjunto;
        public $Nombre_Dominio = '';

         public function __construct()
        {
          //Iniciación de los servicios
            $this->Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            
            $this->Servicios_Observacion_1 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_2 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_3 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_4 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_5 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            //Servicios adicionales
            $this->Servicio_Usuarios = new \SoapClient("http://192.168.0.3:8070/Servicios_Usuarios/Servicios_Usuario.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicio_Adjunto = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
        }

        public function index()
        {
          $Servicios_Observacion = $this->Servicios_Observacion;

           $id = \Session::get('Id_Usuario');
          $ArregloDatos = array(
                            $id
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $result = $Servicios_Observacion->Observaciones_Pendientes($Parametros)->Observaciones_PendientesResult;
          $Observaciones_Pendientes = json_decode($result,true);

          //Recuperar observaciones solucionadas
          $result = $Servicios_Observacion->Observaciones_Solucionadas($Parametros)->Observaciones_SolucionadasResult;
          $Observaciones_Solucionadas = json_decode($result,true);

           //Recuperar observaciones enviadas pendientes
          $result = $Servicios_Observacion->Observaciones_Enviadas_Pendientes($Parametros)->Observaciones_Enviadas_PendientesResult;
          $Observaciones_Enviadas_Pendientes = json_decode($result,true);

          //Obtener Lista de usuarios
          $Sevicio_Usuarios = $this->Servicio_Usuarios;

          $result = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
          $Lista_Usuarios = json_decode($result,true);
          $Parametros = array(
                          'InfoUsuario'=>$json
                        );

          //Obtener datos de usuario
          $result = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
          $Datos_Usuario = json_decode($result,true)[0];

            return view('DS_Soporte.Sistema_Observaciones.index',compact(['Observaciones_Pendientes','Observaciones_Enviadas_Pendientes','Observaciones_Solucionadas','Lista_Usuarios','Datos_Usuario']));
        }



        public function create(Request $request)
        {
            return $request['Id_Cliente'];
        }

        public function Enviar(Request $request)
        {

              setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
              date_default_timezone_set("America/Lima");

              if(in_array('Enviar',$_POST))
                {
                  unset($_POST);

                  //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
                  $Servicios_Observacion = $this->Servicios_Observacion;

                  $Id_Observacion = $request->input('Id_Observacion_Atender');
                  $Solucion = $request->input('Solucion_Atender');
                  $Fecha_Solucionado = date("d-m-Y");
                  $ArregloDatos = array(
                                        $Id_Observacion,
                                        $Solucion,
                                        $Fecha_Solucionado
                                        );


                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                    );

                 $Actualizar_Observacion=$Servicios_Observacion->Observaciones_Solucionar($Parametros)->Observaciones_SolucionarResult;

                 return redirect('/Observaciones');
                  $Ruta = '/Observaciones';

                }elseif(in_array('Derivar',$_POST))
                {

                    //Crear la nueva Observación

                    //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

                    $Servicios_Observacion = $this->Servicios_Observacion;

                    $Id_Nueva_Observacion = date("Y-m-d H:i:s");
                    $Id_Usuario_Origen = $request->input('Id_Usuario_Origen_Atender');
                    $Id_Usuario_Destino = $request->input('Id_Usuario_Destino');
                    $Id_Usuario_Derivador = $request->input('Id_Usuario_Atender');
                    $Fecha = date("d-m-Y", strtotime($request->input('Fecha_Atender')));
                    $Fecha_Limite = date("d-m-Y", strtotime($request->input('Fecha_Limite_Atender')));
                    $Problema = $request->input('Problema_Atender');
                    $Proyecto = $request->input('Proyecto_Atender');
                    $Estado = "PENDIENTE";
                    $Solucion_Brindada = $request->input('Solucion_Atender');
                    $Id_Origen = $request->input('Id_Observacion_Atender');
                    $Id_Destino="";
                    $Observaciones = $request->input('Observaciones_Atender');

                    $ArregloDatos = array(
                                  $Id_Nueva_Observacion,
                                  $Id_Usuario_Origen,
                                  $Id_Usuario_Destino,
                                  $Id_Usuario_Derivador,
                                  $Fecha,
                                  $Fecha_Limite,
                                  $Fecha_Limite,
                                  $Problema,
                                  $Proyecto,
                                  $Estado,
                                  $Solucion_Brindada,
                                  $Id_Origen,
                                  $Id_Destino,
                                  ($Observaciones==null)?' ':$Observaciones
                                );

                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                     );

                  $Crear_Observacion = $Servicios_Observacion->Insertar_Observacion($Parametros)->Insertar_ObservacionResult;

                //Actualizar la Observación


                  //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
                    $Servicios_Observacion = $this->Servicios_Observacion;

                    $Id_Observacion = $request->input('Id_Observacion_Atender');
                    $Id_Usuario_Origen = $request->input('Id_Usuario_Origen_Atender');
                    $Id_Usuario_Destino = $request->input('Id_Usuario_Atender');
                    $Id_Usuario_Derivador = $request->input('Id_Usuario_Derivador_Atender');
                    $Fecha = date("d-m-Y", strtotime($request->input('Fecha_Atender')));
                    $Fecha_Limite = date("d-m-Y", strtotime($request->input('Fecha_Limite_Atender')));
                    $Problema = $request->input('Problema_Atender');
                    $Proyecto = $request->input('Proyecto_Atender');
                    $Estado = "DERIVADO";
                    $Solucion_Brindada = $request->input('Solucion_Atender');
                    $Id_Origen = $request->input('Id_Origen_Atender');
                    $Id_Destino= $Id_Nueva_Observacion;
                    $Observaciones = $request->input('Observaciones_Atender');

                    $ArregloDatos = array(
                                  $Id_Observacion,
                                  $Id_Usuario_Origen,
                                  $Id_Usuario_Destino,
                                  $Id_Usuario_Derivador,
                                  $Fecha,
                                  $Fecha_Limite,
                                  date("d-m-Y"),
                                  $Problema,
                                  $Proyecto,
                                  $Estado,
                                  $Solucion_Brindada,
                                  $Id_Origen,
                                  $Id_Destino,
                                  ($Observaciones==null)?' ':$Observaciones
                                );

                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                     );

                  $Actualizar_Observacion = $Servicios_Observacion->Actualizar_Observacion($Parametros)->Actualizar_ObservacionResult;

                  //Copiar todos los adjuntos
                  $ArregloDatos = array(
                                  $Id_Observacion,
                                  $Id_Nueva_Observacion
                                );

                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                     );
                  $Copiar_Adjuntos = $Servicios_Observacion->Copiar_Adjuntos($Parametros)->Copiar_AdjuntosResult;

                  return redirect('/Observaciones');
                  $Ruta = $Nombre_Dominio.'/Observaciones/'.$id;
                  return redirect($Ruta);
                }
        }
        public function update(Request $request)
        {
              setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
              date_default_timezone_set("America/Lima");
              return ('asdasd');
              if(in_array('Enviar',$_POST))
                {
                  unset($_POST);

                  //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
                  $Servicios_Observacion = $this->Servicios_Observacion;

                  $Id_Observacion = $request->input('Id_Observacion_Atender');
                  $Solucion = $request->input('Solucion_Atender');
                  $Fecha_Solucionado = date("d-m-Y");
                  $ArregloDatos = array(
                                        $Id_Observacion,
                                        $Solucion,
                                        $Fecha_Solucionado
                                        );


                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                    );

                 $Actualizar_Observacion=$Servicios_Observacion->Observaciones_Solucionar($Parametros)->Observaciones_SolucionarResult;

                 return redirect('/Observaciones');
                  $Ruta = '/Observaciones';

                }elseif(in_array('Derivar',$_POST))
                {

                    //Crear la nueva Observación

                    //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

                    $Servicios_Observacion = $this->Servicios_Observacion;

                    $Id_Nueva_Observacion = date("Y-m-d H:i:s");
                    $Id_Usuario_Origen = $request->input('Id_Usuario_Origen_Atender');
                    $Id_Usuario_Destino = $request->input('Id_Usuario_Destino');
                    $Id_Usuario_Derivador = $request->input('Id_Usuario_Atender');
                    $Fecha = date("d-m-Y", strtotime($request->input('Fecha_Atender')));
                    $Fecha_Limite = date("d-m-Y", strtotime($request->input('Fecha_Limite_Atender')));
                    $Problema = $request->input('Problema_Atender');
                    $Proyecto = $request->input('Proyecto_Atender');
                    $Estado = "PENDIENTE";
                    $Solucion_Brindada = $request->input('Solucion_Atender');
                    $Id_Origen = $request->input('Id_Observacion_Atender');
                    $Id_Destino="";
                    $Observaciones = $request->input('Observaciones_Atender');

                    $ArregloDatos = array(
                                  $Id_Nueva_Observacion,
                                  $Id_Usuario_Origen,
                                  $Id_Usuario_Destino,
                                  $Id_Usuario_Derivador,
                                  $Fecha,
                                  $Fecha_Limite,
                                  $Fecha_Limite,
                                  $Problema,
                                  $Proyecto,
                                  $Estado,
                                  $Solucion_Brindada,
                                  $Id_Origen,
                                  $Id_Destino,
                                  ($Observaciones==null)?' ':$Observaciones
                                );

                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                     );

                  $Crear_Observacion = $Servicios_Observacion->Insertar_Observacion($Parametros)->Insertar_ObservacionResult;

                //Actualizar la Observación


                  //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
                    $Servicios_Observacion = $this->Servicios_Observacion;

                    $Id_Observacion = $request->input('Id_Observacion_Atender');
                    $Id_Usuario_Origen = $request->input('Id_Usuario_Origen_Atender');
                    $Id_Usuario_Destino = $request->input('Id_Usuario_Atender');
                    $Id_Usuario_Derivador = $request->input('Id_Usuario_Derivador_Atender');
                    $Fecha = date("d-m-Y", strtotime($request->input('Fecha_Atender')));
                    $Fecha_Limite = date("d-m-Y", strtotime($request->input('Fecha_Limite_Atender')));
                    $Problema = $request->input('Problema_Atender');
                    $Proyecto = $request->input('Proyecto_Atender');
                    $Estado = "DERIVADO";
                    $Solucion_Brindada = $request->input('Solucion_Atender');
                    $Id_Origen = $request->input('Id_Origen_Atender');
                    $Id_Destino= $Id_Nueva_Observacion;
                    $Observaciones = $request->input('Observaciones_Atender');

                    $ArregloDatos = array(
                                  $Id_Observacion,
                                  $Id_Usuario_Origen,
                                  $Id_Usuario_Destino,
                                  $Id_Usuario_Derivador,
                                  $Fecha,
                                  $Fecha_Limite,
                                  date("d-m-Y"),
                                  $Problema,
                                  $Proyecto,
                                  $Estado,
                                  $Solucion_Brindada,
                                  $Id_Origen,
                                  $Id_Destino,
                                  ($Observaciones==null)?' ':$Observaciones
                                );

                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                     );

                  $Actualizar_Observacion = $Servicios_Observacion->Actualizar_Observacion($Parametros)->Actualizar_ObservacionResult;

                  //Copiar todos los adjuntos
                  $ArregloDatos = array(
                                  $Id_Observacion,
                                  $Id_Nueva_Observacion
                                );

                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                      'Info_Observacion'=>$json
                                     );
                  $Copiar_Adjuntos = $Servicios_Observacion->Copiar_Adjuntos($Parametros)->Copiar_AdjuntosResult;

                  return redirect('/Observaciones');
                  $Ruta = $Nombre_Dominio.'/Observaciones/'.$id;
                  return redirect($Ruta);
                }
       }

        public function store(Request $request)
        {

            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
            date_default_timezone_set("America/Lima");

            $Id_Observacion = $request->input('Id_Observacion');
            $Id_Usuario_Origen = $request->input('Id_Usuario_Origen');
            $Id_Usuario_Destino = $request->input('Id_Usuario_Destino');
            $Id_Usuario_Derivador = '';
            $Fecha = date("d-m-Y");
            $Fecha_Limite = date("d-m-Y", strtotime($request->input('Fecha_Limite')));
            $Fecha_Solucionado = date("d-m-Y");
            $Problema = $request->input('Problema');
            $Proyecto = $request->input('Proyecto');
            $Estado = "PENDIENTE";
            $Solucion_Brindada = "";
            $Id_Origen = "";
            $Id_Destino="";
            $Observaciones = $request->input('Observaciones');



            if(($Id_Observacion=="")||($Id_Observacion==null))
            {
              $Id_Observacion = date("Y-m-d H:i:s");
            }

            //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",
            //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",
                    //array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

            $Servicios_Observacion = $this->Servicios_Observacion;

             $ArregloDatos = array(
                                  $Id_Observacion,
                                  $Id_Usuario_Origen,
                                  $Id_Usuario_Destino,
                                  $Id_Usuario_Derivador,
                                  $Fecha,
                                  $Fecha_Limite,
                                  $Fecha_Solucionado,
                                  $Problema,
                                  $Proyecto,
                                  $Estado,
                                  $Solucion_Brindada,
                                  $Id_Origen,
                                  $Id_Destino,
                                  ($Observaciones==null)?' ':$Observaciones
                                );
             $json=json_encode($ArregloDatos);
             $Parametros = array(
                                  'Info_Observacion'=>$json
                                );

             $Crear_Observacion=$Servicios_Observacion->Insertar_Observacion($Parametros)->Insertar_ObservacionResult;

             return redirect('/Observaciones');
        }


        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function Atenciones_Pendientes($id)
        {
          return $this->show($id);
        }


        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

         public function show()
      {
          $Servicios_Observacion = $this->Servicios_Observacion;

          $id = \Session::get('Id_Usuario');

          $ArregloDatos = array(
                            $id
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $result = $Servicios_Observacion->Observaciones_Pendientes($Parametros)->Observaciones_PendientesResult;
          $Observaciones_Pendientes = json_decode($result,true);

          //Recuperar observaciones solucionadas
          $result = $Servicios_Observacion->Observaciones_Solucionadas($Parametros)->Observaciones_SolucionadasResult;
          $Observaciones_Solucionadas = json_decode($result,true);

           //Recuperar observaciones enviadas pendientes
          $result = $Servicios_Observacion->Observaciones_Enviadas_Pendientes($Parametros)->Observaciones_Enviadas_PendientesResult;
          $Observaciones_Enviadas_Pendientes = json_decode($result,true);

          //Obtener Lista de usuarios
          $Sevicio_Usuarios = $this->Servicio_Usuarios;

          $result = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
          $Lista_Usuarios = json_decode($result,true);
          $Parametros = array(
                          'InfoUsuario'=>$json
                        );

          //Obtener datos de usuario
          $result = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
          $Datos_Usuario = json_decode($result,true)[0];

            return view('DS_Soporte.Sistema_Observaciones.index',compact(['Observaciones_Pendientes','Observaciones_Enviadas_Pendientes','Observaciones_Solucionadas','Lista_Usuarios','Datos_Usuario']));
      }
        public function upload()
        {

              echo dd(Input::all());

        }

        public function Listar_Adjuntos()
        {

          $Id_Observacion = input::get('Id_Observacion_Auxiliar');

          $Servicio_Adjunto = $this->Servicio_Adjunto;
          $ArregloDatos = array(
                            $Id_Observacion
                        );
          $json=json_encode($ArregloDatos);

          $Parametros = array(
                          'Info_Adjunto'=>$json
                        );

          $result = $Servicio_Adjunto->Registro_Adjunto($Parametros)->Registro_AdjuntoResult;
          $Datos_Adjunto = json_decode($result,true);

          return $Datos_Adjunto;
        }

        public function Descargar_Adjunto(Request $request)
        {
          //$Ubicacion_Archivo = Input::get('URL_ARCHIVO');
          //$Nombre_Archivo = Input::get('NOMBRE_ARCHIVO');
          $Ubicacion_Archivo = $request['URL_ARCHIVO'];
          $Nombre_Archivo = $request['NOMBRE_ARCHIVO'];

          //return $Ubicacion_Archivo;

            $URL_Descarga = "ftp://usuario_ftp:password_ftp@".$Ubicacion_Archivo;

            file_put_contents($Nombre_Archivo, fopen($URL_Descarga, 'r'));

            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($URL_Descarga) . "\"");

            readfile($URL_Descarga); // do the double-download-dance (dirty but worky)

            //
      }


        public function Actualizar_Observaciones_Pendientes()
        {
          $User = Input::get("Usuario");
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion_1;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $Observaciones_Pendientes = $Servicios_Observacion->Observaciones_Pendientes($Parametros)->Observaciones_PendientesResult;
          $resultado = json_decode($Observaciones_Pendientes,true);
          return $resultado;
        }


        public function Actualizar_Observaciones_Enviadas_Pendientes()
        {
          $User = Input::get("Usuario");
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion_2;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $Observaciones_Enviadas_Pendientes = $Servicios_Observacion->Observaciones_Enviadas_Pendientes($Parametros)->Observaciones_Enviadas_PendientesResult;
          $resultado = json_decode($Observaciones_Enviadas_Pendientes,true);
          return $resultado;
        }


        public function Actualizar_Observaciones_Solucionadas()
        {

          $User = Input::get("Usuario");
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion_3;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $Observaciones_Pendientes = $Servicios_Observacion->Observaciones_Solucionadas($Parametros)->Observaciones_SolucionadasResult;
          $resultado = json_decode($Observaciones_Pendientes,true);
          return $resultado;
        }


        public function Archivar_Observacion()
        {
           $Id_Observacion = Input::get("Id_Observacion");

           //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

           $Servicios_Observacion = $this->Servicios_Observacion;

          $ArregloDatos = array(
                            $Id_Observacion
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $Archivar_Observacion = $Servicios_Observacion->Archivar_Observacion($Parametros)->Archivar_ObservacionResult;
          $resultado = json_decode($Archivar_Observacion,true);

           return $resultado;
        }

    public function get_image(Request $request){

              setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
              date_default_timezone_set("America/Lima");

              try
              {


              $Id_Usuario = $request['Id_Usuario'];

              $Id_Observacion = $request['Id_Observacion'];

              $file = $request -> file('fileupload');
              //return $Id_Usuario.$Id_Observacion;
              $var = $file -> getClientOriginalName();

              $extension = $file -> getClientOriginalExtension();

              $ftp_server = "190.117.75.124";

              $ftp_conn = \ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

              $login = ftp_login($ftp_conn, 'usuario_ftp', 'password_ftp');
              ftp_pasv($ftp_conn, true);
              if ((!$ftp_conn) || (!$login)) {
               die("La conexión FTP ha fallado!");
              }


              $Nombre_Carpeta = 'FTPSoporteDS/Adjuntos de Observaciones/'.str_replace(':', '-',$Id_Observacion);

              if(is_dir('ftp://usuario_ftp:password_ftp@190.117.75.124/'.$Nombre_Carpeta)){
              }
              else {

                  ftp_mkdir($ftp_conn, $Nombre_Carpeta);
              }

              $Nombre_Archivo = date("d-m-Y h:i:sa");


              $Nuevo_Nombre_Archivo = str_replace(':', '-', $Nombre_Archivo).'.'.$extension;
              $local_file = $file;
              //$server_file = $dir."/".($file -> getClientOriginalName());
              $server_file = $Nombre_Carpeta."/".$Nuevo_Nombre_Archivo;

              // upload file
              $d = ftp_nb_put($ftp_conn, $server_file, $local_file, FTP_BINARY);


                while ($d == FTP_MOREDATA)
                  {
                  // do whatever you want
                  // continue uploading
                  $d = ftp_nb_continue($ftp_conn);
                  }

                if ($d != FTP_FINISHED)
                  {
                  echo "Error uploading $local_file";
                  exit(1);
                  }

                // close connection
                ftp_close($ftp_conn);


                //$Servicio_Adjunto = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",
                  //array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

                $Servicio_Adjunto = $this->Servicio_Adjunto;

                $ArregloDatos = array(
                                  $Id_Observacion,
                                  $Nuevo_Nombre_Archivo,
                                  '190.117.75.124/'.$server_file,
                                  $extension
                              );
                $json=json_encode($ArregloDatos);

                $Parametros = array(
                                'Info_Adjunto'=>$json
                              );

                $result = $Servicio_Adjunto->Insertar_Adjunto($Parametros)->Insertar_AdjuntoResult;

                $Respuesta = json_decode($result,true);

                  return "Archivo agregado";
                }catch(Exception $e)
                {
                  return "No se pudo subir el archivo";
                }

  }
      public function Recuperar_Notificaciones_Pendientes()
        {

          $User = \Session::get('Id_Usuario');
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion_4;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Notificacion'=>$json
                        );
          $Notificaciones_No_Leidas = $Servicios_Observacion->Listar_Notificaciones_No_Leidas($Parametros)->Listar_Notificaciones_No_LeidasResult;
          $resultado = json_decode($Notificaciones_No_Leidas,true);
          return $resultado;
        }

        public function Marcar_Notificacion_Leida(Request $request)
        {
          $Id_Notificacion = $request['Id_Notificacion'];

          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion;

          $ArregloDatos = array(
                            $Id_Notificacion
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Notificacion'=>$json
                        );
          $Notificaciones_No_Leidas = $Servicios_Observacion->Marcar_Notificacion_Como_Leida($Parametros)->Marcar_Notificacion_Como_LeidaResult;
          $resultado = json_decode($Notificaciones_No_Leidas,true);
          return $resultado;
        }

        public function Crear_Evento(Request $request)
        {


          $Id_Evento = date("d-m-Y h:i:sa");

          $Id_Usuario = Input::get("Id_Usuario");

          $Fecha = explode('/',Input::get('Fecha'));

          $Hora = Input::get('Hora');
          $Minutos = Input::get('Minutos');
          $Fecha_Evento = $Fecha[1].'-'.$Fecha[0].'-'.$Fecha[2].' '.$Hora.':'.$Minutos.':00';


          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion;

          $ArregloDatos = array(
                            $Id_Evento,
                            $Id_Usuario,
                            $Fecha_Evento,
                            Input::get('Titulo_Evento'),
                            Input::get('Descripcion'),
                            Input::get('Informacion_Adicional')
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Evento'=>$json
                        );

          $Respuesta = $Servicios_Observacion->Insertar_Evento($Parametros)->Insertar_EventoResult;

          //Envio de participantes
          $Participantes = implode("-",Input::get('Participantes'));
          $ArregloDatos = array(
                          $Id_Evento,
                          $Participantes
                        );

          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Evento'=>$json
                        );
            $Respuesta = $Servicios_Observacion->Insertar_Evento_Detalle($Parametros)->Insertar_Evento_DetalleResult;


          $resultado = json_decode($Respuesta,true);
          return $resultado;
        }

       public function Recuperar_Eventos_Pendientes()
        {
          $User = Input::get("Usuario");
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion_5;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Evento'=>$json
                        );
          $Eventos_Pendientes = $Servicios_Observacion->Listar_Eventos_Pendientes($Parametros)->Listar_Eventos_PendientesResult;
          $Pendientes = json_decode($Eventos_Pendientes,true);

          $Eventos_Para_Hoy = $Servicios_Observacion->Listar_Eventos_Para_Hoy($Parametros)->Listar_Eventos_Para_HoyResult;
          $Para_Hoy = json_decode($Eventos_Para_Hoy,true);

          return array($Pendientes,$Para_Hoy);
        }

        public function Recuperar_Eventos()
        {
          $User = Input::get("Usuario");
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Evento'=>$json
                        );
          $Eventos = $Servicios_Observacion->Listar_Eventos($Parametros)->Listar_EventosResult;
          $_Eventos = json_decode($Eventos,true);

          return $_Eventos;
        }

        public function Registro_Observaciones()
        {
          
          $User = \Session::get('Id_Usuario');
          //$Servicios_Observacion = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

          $Servicios_Observacion = $this->Servicios_Observacion;

          $ArregloDatos = array(
                            $User
                        );
          $json=json_encode($ArregloDatos);
          $Parametros = array(
                          'Info_Observacion'=>$json
                        );
          $Observaciones = $Servicios_Observacion->Registro_Observaciones($Parametros)->Registro_ObservacionesResult;
          $Observaciones = json_decode($Observaciones,true);

          return $Observaciones;
        }


        public function Enviar_Notificacion()
        {
           $Usuario_Origen = \Session::get('Id_Usuario');
           
           $Usuario_Destino = Input::get('Id_Usuario_Destino');

           
           if(strpos(json_encode($Usuario_Destino),','))
           {
            
              $Usuario_Destino = implode("-",Input::get('Id_Usuario_Destino'));
   
           }else
           {
            $Usuario_Destino = Input::get('Id_Usuario_Destino');
           }

           

           $Mensaje = Input::get("Mensaje");
           $Id_Notificacion = date("d-m-Y h:i:sa");

            //$Servicios_Observacion = new \SoapClient("http://localhost:47514/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

            $Servicios_Observacion = $this->Servicios_Observacion;
            
            $ArregloDatos = array(
                            $Id_Notificacion,
                            $Usuario_Origen,
                            $Usuario_Destino,
                            $Mensaje,
                            0
                        );
          $json=json_encode($ArregloDatos);

          $Parametros = array(
                          'Info_Notificacion'=>$json
                        );

          $Respuesta = $Servicios_Observacion->Insertar_Notificacion($Parametros)->Insertar_NotificacionResult;
          //$_Respuesta = json_decode($Respuesta,true);

          return $Respuesta;
        }


}
