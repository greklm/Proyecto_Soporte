<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use SoapFault;
use SoapClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use App\Http\Requests;

class UsuarioController extends Controller
{

  public $Servicios_Atencion;
  public $Servicios_Observacion_1;
  public $Servicios_Observacion_2;
  public $Servicios_Observacion_3;
  public $Servicios_Observacion_4;
  public $Servicios_Observacion_5;
  public $Sevicio_Usuarios;
  public $Servicio_Usuarios_2;
  public $Servicio_Adjuntos;
  public $Servicio_Clientes;
  public $Ruta_Servicios = "http://192.168.0.3:8070/Servicios_Atenciones/Servicios_Atencion.svc?wsdl";

  public function __construct()
        {

          //Servicios locales
            //Iniciación de los servicios

/*
            date_default_timezone_set('America/Lima');

            $this->Servicios_Atencion = new \SoapClient("http://localhost:51885/Servicios_Atencion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_1 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_2 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_3 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_4 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_5 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            //Servicios adicionales

            $this->Servicio_Usuarios = new \SoapClient("http://localhost:51885/Servicios_Usuarios.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicio_Adjuntos = new \SoapClient("http://localhost:51885/Servicios_Adjunto.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicio_Clientes = new \SoapClient("http://localhost:51885/Servicios_Cliente.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
        
        */
          //Servicios del servidor
            //Iniciación de los servicios
            $this->Servicios_Atencion = new \SoapClient("http://192.168.0.3:8070/Servicios_Atenciones/Servicios_Atencion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_1 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_2 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_3 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_4 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicios_Observacion_5 = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            //Servicios adicionales
            $this->Servicio_Usuarios = new \SoapClient("http://192.168.0.3:8070/Servicios_Usuarios/Servicios_Usuario.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
             $this->Servicio_Usuarios_2 = new \SoapClient("http://192.168.0.3:8070/Servicios_Usuarios/Servicios_Usuario.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicio_Adjuntos = new \SoapClient("http://192.168.0.3:8070/Servicios_Adjuntos/Servicios_Adjunto.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $this->Servicio_Clientes = new \SoapClient("http://192.168.0.3:8070/Servicios_Clientes/Servicios_Cliente.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

        
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Servicios_Atencion = $this->Servicios_Atencion;

        $id = \Session::get('Id_Usuario');
        $ArregloDatos = array(
                          $id
                      );
        $json=json_encode($ArregloDatos);
        $Parametros = array(
                        'Info_Atencion'=>$json
                      );
        $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
        $Atenciones_Pendientes = json_decode($result,true);


        $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
        $Lista_Productos = json_decode($Lista_Prod,true);

        $Sevicio_Usuarios = $this->Servicio_Usuarios;

        $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
        $Lista_Usuarios = json_decode($result2,true);
        $Parametros = array(
                        'InfoUsuario'=>$json
                      );
        $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
        $resultado3 = json_decode($result3,true);
        $Datos_Usuario = $resultado3[0];

        $Accesos = $Sevicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
        $Accesos = json_decode($Accesos,true);

        $Arreglo_Modulos =  array();
        foreach ($Accesos as $Acceso) {
            array_push($Arreglo_Modulos,$Acceso['COD_MODULO']);
        }

        $Actividades = $Sevicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
        $Actividades_Hoy = json_decode($Actividades,true);

        return view('DS_SOPORTE.Sistema_Soporte.Principal',compact(['Atenciones_Pendientes','Lista_Usuarios','Datos_Usuario','Lista_Productos','Arreglo_Modulos','Actividades_Hoy']));
    }

    public function out()
    {
       if(\Session::get('Area')=='PRODUCCION')
       {
         return Redirect('/Menu');
       }
       else
       {
           \Auth::logout();

          \Session::regenerate();
         return view('/InicioSesion');
       }

    }

    public function Cerrar_Sesion()
    {
        \Auth::logout();

        \Session::flush();
        return redirect('/InicioSesion');
    }

    public function Derivar_Atencion_Remota(Request $request)
    {
      $Servicios_Atencion = $this->Servicios_Atencion;

      $Id_Usuario = \Session::get('Id_Usuario');

      $HoraInicio = $request['Fecha_Atencion_Remota'].' '.$request['Hora_Inicio_Atencion_Remota'].':'.$request['Minutos_Inicio_Atencion_Remota'].':00';
      //$HoraFin = $request['Fecha_Atencion_Remota'].' '.$request['Hora_Fin_Atencion_Remota'].':'.$request['Minutos_Fin_Atencion_Remota'].':00';

      $HoraFin = $request['Fecha_Atencion_Remota'].' '.$request['Hora_Fin_Atencion_Remota'].':'.$request['Minutos_Fin_Atencion_Remota'].':00';
      $Id_Destino =  $request['Id_Cliente_Atencion_Remota'].'-'.date('Y-m-d H:i:s');

      $Datos_Atencion_Actual = array(
                        $request['Id_Atencion_Remota'],
                        $request['Id_Cliente_Atencion_Remota'],
                        $request['Fecha_Atencion_Remota'],
                        $HoraInicio,
                        $HoraFin,
                        $request['Modalidad_Atencion_Remota'],
                        $request['Problema_Atencion_Remota'],
                        $request['Producto_Atencion_Remota'],
                        $request['Team_Viewer_ID_Atencion_Remota'],
                        $request['Team_Viewer_Password_Atencion_Remota'],
                        ($request['Solucion_Atencion_Remota']==null)?" ":$request['Solucion_Atencion_Remota'],
                        $Id_Usuario,
                        'DERIVADO',
                        $Id_Destino,
                        ($request['Id_Origen_Atencion_Remota']==null)?" ":$request['Id_Origen_Atencion_Remota'],
                        ($request['Observaciones_Atencion_Remota']==null)?" ":$request['Observaciones_Atencion_Remota'],
                        ($request['Persona_Contacto_Atencion_Remota']==null)?" ":$request['Persona_Contacto_Atencion_Remota'],
                        ($request['Cargo_Persona_Contacto_Atencion_Remota']==null)?" ":$request['Cargo_Persona_Contacto_Atencion_Remota'],
                        ($request['Telefono_Contacto_Atencion_Remota']==null)?" ":$request['Telefono_Contacto_Atencion_Remota']
        );

        $Datos_Atencion_Derivada = array(
                        $Id_Destino,
                        $request['Id_Cliente_Atencion_Remota'],
                        $request['Fecha_Atencion_Remota'],
                        $request['Fecha_Atencion_Remota'],
                        $request['Fecha_Atencion_Remota'],
                        $request['Modalidad_Atencion_Remota'],
                        $request['Problema_Atencion_Remota'],
                        $request['Producto_Atencion_Remota'],
                        $request['Team_Viewer_ID_Atencion_Remota'],
                        $request['Team_Viewer_Password_Atencion_Remota'],
                        ($request['Solucion_Atencion_Remota']==null)?" ":$request['Solucion_Atencion_Remota'],
                        $request['Id_Derivar_Atencion_Remota'],
                        'PENDIENTE',
                        'NULL',
                        $request['Id_Atencion_Remota'],
                        ($request['Observaciones_Atencion_Remota']==null)?" ":$request['Observaciones_Atencion_Remota'],
                        ($request['Persona_Contacto_Atencion_Remota']==null)?" ":$request['Persona_Contacto_Atencion_Remota'],
                        ($request['Cargo_Persona_Contacto_Atencion_Remota']==null)?" ":$request['Cargo_Persona_Contacto_Atencion_Remota'],
                        ($request['Telefono_Contacto_Atencion_Remota']==null)?" ":$request['Telefono_Contacto_Atencion_Remota']
                      );

                      //Construir los datos a enviar al servicio
                      $json = json_encode($Datos_Atencion_Actual);
                      $Parametros_Atencion_Actual = array(
                                      'Info_Atencion'=>$json
                                    );
                      //Construir los datos a derivar
                      $json2 = json_encode($Datos_Atencion_Derivada);
                      $Parametros_Atencion_Derivada = array(
                                      'Info_Atencion'=>$json2
                                    );

                      $Respuesta1 = $Servicios_Atencion->Actualizar_Atencion_Team_Viewer($Parametros_Atencion_Actual)->Actualizar_Atencion_Team_ViewerResult;
                      $Respuesta2 = $Servicios_Atencion->Insertar_Atencion_Team_Viewer($Parametros_Atencion_Derivada)->Insertar_Atencion_Team_ViewerResult;

/*
                      do {
                              $Respuesta1 = $Servicios_Atencion->Actualizar_Atencion_Team_Viewer($Parametros_Atencion_Actual)->Actualizar_Atencion_Team_ViewerResult;
                         } while ($Respuesta1 != "Actualizado exitosamente");

                      do {
                              $Respuesta2 = $Servicios_Atencion->Insertar_Atencion_Team_Viewer($Parametros_Atencion_Derivada)->Insertar_Atencion_Team_ViewerResult;
                         } while ($Respuesta2 != "Grabado exitosamente");
*/

                $Ruta = '/Atenciones/'.$request['Id_Usuario'];

                return redirect($Ruta);
    }

    public function Continuar_Atencion_Remota(Request $request)
    {
      unset($_POST);
      $request['Id_Derivar_Atencion_Remota'] = \Session::get('Id_Usuario');
      return $this->Derivar_Atencion_Remota($request);
    }

    public function Concluir_Atencion_Remota(Request $request)
    {

      $Servicios_Atencion = $this->Servicios_Atencion;

      $Id_Usuario = \Session::get('Id_Usuario');
      $HoraInicio = $request['Fecha_Atencion_Remota'].' '.$request['Hora_Inicio_Atencion_Remota'].':'.$request['Minutos_Inicio_Atencion_Remota'].':00';

      var_dump($request['Fecha_Atencion_Remota']);
      $HoraFin = $request['Fecha_Atencion_Remota'].' '.$request['Hora_Fin_Atencion_Remota'].':'.$request['Minutos_Fin_Atencion_Remota'].':00';
      //$HoraFin = $request['Fecha'].' '.$request['Hora_Fin'].':'.$request['Minutos_Fin'].':00';
$ArregloDatos = array(
                      $request['Id_Atencion_Remota'],
                      $request['Id_Cliente_Atencion_Remota'],
                      $request['Fecha_Atencion_Remota'],
                      $HoraInicio,
                      $HoraFin,
                      $request['Modalidad_Atencion_Remota'],
                      $request['Problema_Atencion_Remota'],
                      $request['Producto_Atencion_Remota'],
                      $request['Team_Viewer_ID_Atencion_Remota'],
                      $request['Team_Viewer_Password_Atencion_Remota'],
                      $request['Solucion_Atencion_Remota'],
                      $Id_Usuario,
                      'CONCLUIDO',
                      'NULL',
                      ($request['Id_Origen_Atencion_Remota']==null)?" ":$request['Id_Origen_Atencion_Remota'],
                      ($request['Observaciones_Atencion_Remota']==null)?" ":$request['Observaciones_Atencion_Remota'],
                      ($request['Persona_Contacto_Atencion_Remota']==null)?" ":$request['Persona_Contacto_Atencion_Remota'],
                      ($request['Cargo_Persona_Contacto_Atencion_Remota']==null)?" ":$request['Cargo_Persona_Contacto_Atencion_Remota'],
                      ($request['Telefono_Contacto_Atencion_Remota']==null)?" ":$request['Telefono_Contacto_Atencion_Remota']
                    );

                    $json=json_encode($ArregloDatos);
                    $Parametros = array(
                                    'Info_Atencion'=>$json
                                  );

          if($request['Estado_Atencion_Remota']==''){
                  $ready = $Servicios_Atencion->Insertar_Atencion_Team_Viewer($Parametros)->Insertar_Atencion_Team_ViewerResult;        
            }
          else {
                  $ready = $Servicios_Atencion->Actualizar_Atencion_Team_Viewer($Parametros)->Actualizar_Atencion_Team_ViewerResult;
            }

/*
          if($request['Estado_Atencion_Remota']==''){

              do {
                  $ready = $Servicios_Atencion->Insertar_Atencion_Team_Viewer($Parametros)->Insertar_Atencion_Team_ViewerResult;
               } while ($ready != "Grabado exitosamente");              
            }
          else {
               do {
                  $ready = $Servicios_Atencion->Actualizar_Atencion_Team_Viewer($Parametros)->Actualizar_Atencion_Team_ViewerResult;
               } while ($ready != "Actualizado exitosamente");
            }
*/
            //var_dump($ready);
            $Ruta = '/Atenciones/'.$request['Id_Usuario'];

            return redirect($Ruta);
    }

    public function Concluir_Atencion_Presencial(request $request)
    {
        $Servicios_Atencion = $this->Servicios_Atencion;

         $Id_Usuario = \Session::get('Id_Usuario');
         $HoraInicio = $request['Fecha_Atencion_Presencial'].' '.$request['Hora_Inicio_Atencion_Presencial'].':'.$request['Minutos_Inicio_Atencion_Presencial'].':00';

         var_dump($request['Fecha_Atencion_Presencial']);
         $HoraFin = $request['Fecha_Atencion_Presencial'].' '.$request['Hora_Fin_Atencion_Presencial'].':'.$request['Minutos_Fin_Atencion_Presencial'].':00';
         //$HoraFin = $request['Fecha'].' '.$request['Hora_Fin'].':'.$request['Minutos_Fin'].':00';
         $ArregloDatos = array(
                         $request['Id_Atencion_Presencial'],
                         $request['Id_Cliente_Atencion_Presencial'],
                         $request['Fecha_Atencion_Presencial'],
                         $HoraInicio,
                         $HoraFin,
                         $request['Modalidad_Atencion_Presencial'],
                         $request['Problema_Atencion_Presencial'],
                         $request['Producto_Atencion_Presencial'],
                         $request['Solucion_Atencion_Presencial'],
                         $Id_Usuario,
                         'CONCLUIDO',
                         'NULL',
                         ($request['Id_Origen_Atencion_Presencial'])==null?" ":$request['Id_Origen_Atencion_Presencial'],
                         ($request['Observaciones_Atencion_Presencial']==null)?" ":$request['Observaciones_Atencion_Presencial'],
                         ($request['Persona_Contacto_Atencion_Presencial']==null)?" ":$request['Persona_Contacto_Atencion_Presencial'],
                         ($request['Cargo_Persona_Contacto_Atencion_Presencial']==null)?" ":$request['Cargo_Persona_Contacto_Atencion_Presencial'],
                         ($request['Telefono_Contacto_Atencion_Presencial']==null)?" ":$request['Telefono_Contacto_Atencion_Presencial'],
                         ($request['Lugar_Atencion_Presencial']==null)?" ":$request['Lugar_Atencion_Presencial'],
                       );

                       $json=json_encode($ArregloDatos);
                       $Parametros = array(
                                       'Info_Atencion'=>$json
                                     );


             if($request['Estado_Atencion_Presencial']==''){

                    $ready = $Servicios_Atencion->Insertar_Atencion_Presencial($Parametros)->Insertar_Atencion_PresencialResult;
               }
             else {
                
                     $ready = $Servicios_Atencion->Actualizar_Atencion_Presencial($Parametros)->Actualizar_Atencion_PresencialResult;
               }

/*
             if($request['Estado_Atencion_Presencial']==''){

                 do {
                           $ready = $Servicios_Atencion->Insertar_Atencion_Presencial($Parametros)->Insertar_Atencion_PresencialResult;
                    } while ($ready != "Grabado exitosamente");
               }
             else {
                do {
                     $ready = $Servicios_Atencion->Actualizar_Atencion_Presencial($Parametros)->Actualizar_Atencion_PresencialResult;
                   } while ($ready != "Actualizado exitosamente");
                 //$ready = $Servicios_Atencion->Insertar_Atencion_Team_Viewer($Parametros)->Insertar_Atencion_Team_ViewerResult;
               }
*/

               //var_dump($ready);
               $Ruta = '/Atenciones/'.$request['Id_Usuario'];

               return redirect($Ruta);
    }

    public function Continuar_Atencion_Presencial(Request $request)
    {
      unset($_POST);
      $request['Id_Derivar_Atencion_Presencial'] = \Session::get('Id_Usuario');
      return $this->Derivar_Atencion_Presencial($request);
    }

    public function Derivar_Atencion_Presencial(Request $request)
    {
      $Servicios_Atencion = $this->Servicios_Atencion;

      $Id_Usuario = \Session::get('Id_Usuario');

      $HoraInicio = $request['Fecha_Atencion_Presencial'].' '.$request['Hora_Inicio_Atencion_Presencial'].':'.$request['Minutos_Inicio_Atencion_Presencial'].':00';
      //$HoraFin = $request['Fecha_Atencion_Presencial'].' '.$request['Hora_Fin_Atencion_Presencial'].':'.$request['Minutos_Fin_Atencion_Presencial'].':00';

      $HoraFin = $request['Fecha_Atencion_Presencial'].' '.$request['Hora_Fin_Atencion_Presencial'].':'.$request['Minutos_Fin_Atencion_Presencial'].':00';
      $Id_Destino =  $request['Id_Cliente_Atencion_Presencial'].'-'.date('d-m-Y H:i:s');

      $Datos_Atencion_Actual = array(
                      $request['Id_Atencion_Presencial'],
                      $request['Id_Cliente_Atencion_Presencial'],
                      $request['Fecha_Atencion_Presencial'],
                      $HoraInicio,
                      $HoraFin,
                      $request['Modalidad_Atencion_Presencial'],
                      $request['Problema_Atencion_Presencial'],
                      $request['Producto_Atencion_Presencial'],
                      ($request['Solucion_Atencion_Presencial'])==null?" ":$request['Solucion_Atencion_Presencial'],
                      $Id_Usuario,
                      'DERIVADO',
                      $Id_Destino,
                      ($request['Id_Origen_Atencion_Presencial'])==null?" ":$request['Id_Origen_Atencion_Presencial'],
                      ($request['Observaciones_Atencion_Presencial']==null)?" ":$request['Observaciones_Atencion_Presencial'],
                      ($request['Persona_Contacto_Atencion_Presencial']==null)?" ":$request['Persona_Contacto_Atencion_Presencial'],
                      ($request['Cargo_Persona_Contacto_Atencion_Presencial']==null)?" ":$request['Cargo_Persona_Contacto_Atencion_Presencial'],
                      ($request['Telefono_Contacto_Atencion_Presencial']==null)?" ":$request['Telefono_Contacto_Atencion_Presencial'],
                      ($request['Lugar_Atencion_Presencial']==null)?" ":$request['Lugar_Atencion_Presencial'],
      );

      $Datos_Atencion_Derivada = array(
                      $Id_Destino,
                      $request['Id_Cliente_Atencion_Presencial'],
                      $request['Fecha_Atencion_Presencial'],
                      $request['Fecha_Atencion_Presencial'],
                      $request['Fecha_Atencion_Presencial'],
                      $request['Modalidad_Atencion_Presencial'],
                      $request['Problema_Atencion_Presencial'],
                      $request['Producto_Atencion_Presencial'],
                      ($request['Solucion_Atencion_Presencial'])==null?" ":$request['Solucion_Atencion_Presencial'],
                      $request['Id_Derivar_Atencion_Presencial'],
                      'PENDIENTE',
                      'NULL',
                      $request['Id_Atencion_Presencial'],
                      ($request['Observaciones_Atencion_Presencial']==null)?" ":$request['Observaciones_Atencion_Presencial'],
                      ($request['Persona_Contacto_Atencion_Presencial']==null)?" ":$request['Persona_Contacto_Atencion_Presencial'],
                      ($request['Cargo_Persona_Contacto_Atencion_Presencial']==null)?" ":$request['Cargo_Persona_Contacto_Atencion_Presencial'],
                      ($request['Telefono_Contacto_Atencion_Presencial']==null)?" ":$request['Telefono_Contacto_Atencion_Presencial'],
                      ($request['Lugar_Atencion_Presencial']==null)?" ":$request['Lugar_Atencion_Presencial'],
                    );

                      //Construir los datos a enviar al servicio
                      $json = json_encode($Datos_Atencion_Actual);
                      $Parametros_Atencion_Actual = array(
                                      'Info_Atencion'=>$json
                                    );
                      //Construir los datos a derivar
                      $json2 = json_encode($Datos_Atencion_Derivada);
                      $Parametros_Atencion_Derivada = array(
                                      'Info_Atencion'=>$json2
                                    );


                          $Respuesta1 = $Servicios_Atencion->Actualizar_Atencion_Presencial($Parametros_Atencion_Actual)->Actualizar_Atencion_PresencialResult;
                          $Respuesta2 = $Servicios_Atencion->Insertar_Atencion_Presencial($Parametros_Atencion_Derivada)->Insertar_Atencion_PresencialResult;
                   

/*

                   do {
                          $Respuesta1 = $Servicios_Atencion->Actualizar_Atencion_Presencial($Parametros_Atencion_Actual)->Actualizar_Atencion_PresencialResult;
                      } while ($Respuesta1 != "Actualizado exitosamente");
                 
                   do {
                          $Respuesta2 = $Servicios_Atencion->Insertar_Atencion_Presencial($Parametros_Atencion_Derivada)->Insertar_Atencion_PresencialResult;
                      } while ($Respuesta2 != "Grabado exitosamente");

*/
                $Ruta = '/Atenciones/'.$request['Id_Usuario'];

                return redirect($Ruta);
    }

    public function Iniciar_Sesion(Request $request)
    {
       $ini = ini_set("soap.wsdl_cache_enabled","0");
          try {

              $Servicio_Usuarios = $this->Servicio_Usuarios;

              $ArregloDatos = array(
                              $request['usuario'],
                              $request['password']
                            );
              $json=json_encode($ArregloDatos);
              $Parametros = array(
                              'InfoUsuario'=>$json
                            );

              $Respuesta = $Servicio_Usuarios->Confirmar_Acceso($Parametros)->Confirmar_AccesoResult;

              $json2 = json_decode($Respuesta, true);

              $ArregloDatos = array(
                              $request['usuario']
                            );
              $json=json_encode($ArregloDatos);
              $Parametros = array(
                              'InfoUsuario'=>$json
                            );
              $Registro_Usuario = $Servicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;

              $Datos_Usuario = json_decode($Registro_Usuario, true)[0];
              //$json2 = unserialize(base64_decode($ready));

              //return dd($Registro_Usuario);

              $Usuario = $request['usuario'];
              $Tipo_Usuario = $json2[2];

              if($json2[0]=='true')
              {
                  $ArregloDatos = array(
                                $request['usuario']
                              );
                $json = json_encode($ArregloDatos, true);

                $Parametros = array(
                                'InfoUsuario'=>$json
                              );

                $Accesos = $Servicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
                $Accesos = json_decode($Accesos,true);


                \Session::put('Id_Usuario', $Datos_Usuario['ID_USUARIO']);
                \Session::put('Tipo_Usuario',$Datos_Usuario['TIPO_USUARIO']);
                \Session::put('Area',$Datos_Usuario['AREA']);
                \Session::put('Accesos',$Accesos);



                if($json2[2]=='USUARIO')
                  {
                     if($Datos_Usuario['AREA']=="PRODUCCION")
                      {
                        return redirect('/Menu');
                      }
                      else
                      {
                        return redirect('/Atenciones');
                      }
                  }
                  elseif($json2[2]=='ADMINISTRADOR')
                  {
                    return redirect('/Menu_Administrador');
                  }
              }
              else {
                \Session::flash('flash_message', $json2[1]);
                return view('InicioSesion');
                //return response()->view('InicioSesion', $data)->header('Content-Type', $type);
                //return view('InicioSesion', array('mensaje'=>$json2[0]));
              }

          } catch (Exception $e) {
              trigger_error($e->getMessage(), E_USER_WARNING);
          }
    }

    public function show()
    {
      $Servicios_Atencion = $this->Servicios_Atencion;

      $id = \Session::get('Id_Usuario');

      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $resultado = json_decode($result,true);

      $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
      $Lista_Productos = json_decode($Lista_Prod,true);


      $Sevicio_Usuarios = $this->Servicio_Usuarios;


      $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
      $resultado2 = json_decode($result2,true);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );
      $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
      $resultado3 = json_decode($result3,true);

      $Datos_Usuario = $resultado3[0];

      return view('DS_SOPORTE.Sistema_Soporte.Principal',compact(['resultado','resultado2','Datos_Usuario','Lista_Productos']));
    }

    public function Recuperar_Adjuntos(Request $request)
    {
      $Servicio_Adjunto = $this->Servicio_Adjuntos;
      $ArregloDatos = array(
                      Input::get('Id_Atencion')
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


      $Url = $request['Url_Archivo'];
      $Nombre_Archivo = $request['Nombre_Archivo'];
        //return $Nombre_Archivo;
        $URL_Descarga = "ftp://usuario_ftp:password_ftp@".$Url;
        file_put_contents($Nombre_Archivo, fopen($URL_Descarga, 'r'));

        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($URL_Descarga) . "\"");
        readfile($URL_Descarga); // do the double-download-dance (dirty but worky)

        //
    }

    public function Reporte_Atenciones_Derivadas_Pendientes()
    {
      //Codigo para obtener los datos generales
      $Servicios_Atencion = $this->Servicios_Atencion;

      $id = \Session::get('Id_Usuario');
      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $Atenciones_Pendientes = json_decode($result,true);


      $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
      $Lista_Productos = json_decode($Lista_Prod,true);

      $Sevicio_Usuarios = $this->Servicio_Usuarios;

      $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
      $Lista_Usuarios = json_decode($result2,true);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );
      $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
      $resultado3 = json_decode($result3,true);
      $Datos_Usuario = $resultado3[0];

      $Accesos = $Sevicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
      $Accesos = json_decode($Accesos,true);

      $Arreglo_Modulos =  array();

      foreach ($Accesos as $Acceso) {
          array_push($Arreglo_Modulos,$Acceso['COD_MODULO']);
      }

      $Actividades = $Sevicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
      $Actividades_Hoy = json_decode($Actividades,true);


      //Metodo para obetener los datos del reporte
      $Servicios_Atencion = $this->Servicios_Atencion;
      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);

      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Derivadas_Pendientes($Parametros)->Atenciones_Derivadas_PendientesResult;

      $Datos_Reporte = json_decode($result,true);

      $id = \Session::get('Id_Usuario');
      //return view('Reportes.Atenciones_Derivadas_Pendientes',compact(['resultado','resultado2','Datos_Usuario','Datos_Reporte','Lista_Productos']));

      return view('DS_SOPORTE.Sistema_Soporte.Reportes.Atenciones_Derivadas_Pendientes',compact(['Atenciones_Pendientes','Lista_Usuarios','Datos_Usuario','Datos_Reporte','Lista_Productos','Arreglo_Modulos','Actividades_Hoy']));
    }

    public function Reporte_Atenciones_Por_Cliente(Request $request)
    {
      //Codigo para obtener los datos generales
      $Servicios_Atencion = $this->Servicios_Atencion;

      $id = \Session::get('Id_Usuario');
      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $Atenciones_Pendientes = json_decode($result,true);


      $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
      $Lista_Productos = json_decode($Lista_Prod,true);

      $Sevicio_Usuarios = $this->Servicio_Usuarios;

      $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
      $Lista_Usuarios = json_decode($result2,true);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );
      $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
      $resultado3 = json_decode($result3,true);
      $Datos_Usuario = $resultado3[0];

      $Accesos = $Sevicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
      $Accesos = json_decode($Accesos,true);

      $Arreglo_Modulos =  array();

      foreach ($Accesos as $Acceso) {
          array_push($Arreglo_Modulos,$Acceso['COD_MODULO']);
      }

      $Actividades = $Sevicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
        $Actividades_Hoy = json_decode($Actividades,true);

      //Servicio que obtiene la información del reporte
      $Servicios_Atencion = $this->Servicios_Atencion;

      $Fecha_Inicial = $request['Fecha_Inicial_Buscar_Cliente'];
      $Fecha_Final = $request['Fecha_Final_Buscar_Cliente'];

      if(($Fecha_Inicial==null)||($Fecha_Final==null))
      {
        $ArregloDatos = array(
                      $request['Id_Cliente_Reporte_Buscar']
                      );
        $json=json_encode($ArregloDatos);

        $Parametros = array(
                        'Info_Atencion'=>$json
                      );
        $result = $Servicios_Atencion->Listar_Atenciones_Por_Cliente($Parametros)->Listar_Atenciones_Por_ClienteResult;
      }
      else {
        $ArregloDatos = array(
                      $request['Id_Cliente_Reporte_Buscar'],
                      $Fecha_Inicial,
                      $Fecha_Final
                      );
        $json=json_encode($ArregloDatos);

        $Parametros = array(
                        'Info_Atencion'=>$json
                      );
        $result = $Servicios_Atencion->Listar_Atenciones_Por_Cliente_Por_Intervalo_Fechas($Parametros)->Listar_Atenciones_Por_Cliente_Por_Intervalo_FechasResult;
      }


      $Datos_Reporte = json_decode($result,true);


      return view('DS_SOPORTE.Sistema_Soporte.Reportes.Atenciones_Por_Cliente',compact(['Atenciones_Pendientes','Lista_Usuarios','Datos_Usuario','Datos_Reporte','Lista_Productos','Arreglo_Modulos','Actividades_Hoy']));
    }

    public function Recuperar_Atenciones_Cliente()
    {
      $Servicios_Atencion = $this->Servicios_Atencion;
      $Id_Cliente = Input::get('Id_Cliente');
      $ArregloDatos = array(
                    $Id_Cliente
                    );
      $json=json_encode($ArregloDatos);

      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Listar_Atenciones_Por_Cliente($Parametros)->Listar_Atenciones_Por_ClienteResult;
      $Respuesta = json_decode($result,true);
      return $Respuesta;
    }

    public function Reporte_Atenciones_Usuario(Request $request)
    {
      //Codigo para obtener los datos generales
      $Servicios_Atencion = $this->Servicios_Atencion;

      $id = \Session::get('Id_Usuario');
      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $Atenciones_Pendientes = json_decode($result,true);


      $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
      $Lista_Productos = json_decode($Lista_Prod,true);

      $Sevicio_Usuarios = $this->Servicio_Usuarios;

      $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
      $Lista_Usuarios = json_decode($result2,true);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );
      $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
      $resultado3 = json_decode($result3,true);
      $Datos_Usuario = $resultado3[0];

      $Accesos = $Sevicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
      $Accesos = json_decode($Accesos,true);

      $Arreglo_Modulos =  array();

      foreach ($Accesos as $Acceso) {
          array_push($Arreglo_Modulos,$Acceso['COD_MODULO']);
      }

      $Actividades = $Sevicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
        $Actividades_Hoy = json_decode($Actividades,true);

      //Servicio que obtiene la información del reporte
      $Servicios_Atencion = $this->Servicios_Atencion;

      $Fecha_Inicial = $request['Fecha_Inicial'];
      $Fecha_Final = $request['Fecha_Final'];

      if(($Fecha_Inicial==null)||($Fecha_Final==null))
      {
        $ArregloDatos = array(
                          $id
                      );
        $json=json_encode($ArregloDatos);

        $Parametros = array(
                        'Info_Atencion'=>$json
                      );
        $result = $Servicios_Atencion->Listar_Atenciones_Por_Usuario($Parametros)->Listar_Atenciones_Por_UsuarioResult;

      }else {
        $ArregloDatos = array(
                          $id,
                          $request['Fecha_Inicial'],
                          $request['Fecha_Final']
                      );
        $json=json_encode($ArregloDatos);

        $Parametros = array(
                        'Info_Atencion'=>$json
                      );
        $result = $Servicios_Atencion->Listar_Atenciones_Por_Usuario_Por_Intervalo_Fechas($Parametros)->Listar_Atenciones_Por_Usuario_Por_Intervalo_FechasResult;
      }



      $Datos_Reporte = json_decode($result,true);

      return view('DS_SOPORTE.Sistema_Soporte.Reportes.Atenciones_Por_Usuario',compact(['Atenciones_Pendientes','Lista_Usuarios','Datos_Usuario','Datos_Reporte','Lista_Productos','Arreglo_Modulos','Actividades_Hoy']));

    }

    public function Reporte_Atenciones_Por_Usuario(Request $request)
    {
      //Codigo para obtener los datos generales
      $Servicios_Atencion = $this->Servicios_Atencion;

      $id = \Session::get('Id_Usuario');
      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $Atenciones_Pendientes = json_decode($result,true);


      $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
      $Lista_Productos = json_decode($Lista_Prod,true);

      $Sevicio_Usuarios = $this->Servicio_Usuarios;

      $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
      $Lista_Usuarios = json_decode($result2,true);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );
      $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
      $resultado3 = json_decode($result3,true);
      $Datos_Usuario = $resultado3[0];


      $Accesos = $Sevicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
      $Accesos = json_decode($Accesos,true);

      $Arreglo_Modulos =  array();

      foreach ($Accesos as $Acceso) {
          array_push($Arreglo_Modulos,$Acceso['COD_MODULO']);
      }

      $Actividades = $Sevicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
        $Actividades_Hoy = json_decode($Actividades,true);

      $Fecha_Inicial = $request['Fecha_Inicial_Reporte_Usuario'];
      $Fecha_Final = $request['Fecha_Final_Reporte_Usuario'];

      if(($Fecha_Inicial==null)||($Fecha_Final==null))
      {
        $Servicios_Atencion = $this->Servicios_Atencion;
        $ArregloDatos = array(
                        $request['Id_Usuario_Reporte']
                    );
        $json=json_encode($ArregloDatos);
        $Parametros = array(
                      'Info_Atencion'=>$json
                    );
        $result = $Servicios_Atencion->Listar_Atenciones_Por_Usuario($Parametros)->Listar_Atenciones_Por_UsuarioResult;
        $Datos_Reporte = json_decode($result,true);
      }
      else {
        $Servicios_Atencion = $this->Servicios_Atencion;
        $ArregloDatos = array(
                        $request['Id_Usuario_Reporte'],
                        $request['Fecha_Inicial_Reporte_Usuario'],
                        $request['Fecha_Final_Reporte_Usuario']
                    );
        $json=json_encode($ArregloDatos);
        $Parametros = array(
                      'Info_Atencion'=>$json
                    );
        $result = $Servicios_Atencion->Listar_Atenciones_Por_Usuario_Por_Intervalo_Fechas($Parametros)->Listar_Atenciones_Por_Usuario_Por_Intervalo_FechasResult;
        $Datos_Reporte = json_decode($result,true);
      }

      $Id_Usuario_Reporte = $request['Id_Usuario_Reporte'];

      return view('DS_SOPORTE.Sistema_Soporte.Reportes_Admin.Reporte_Registro_Atenciones_Usuario',compact(['Atenciones_Pendientes','Lista_Usuarios','Datos_Usuario','Datos_Reporte','Lista_Productos','Arreglo_Modulos','Actividades_Hoy','Id_Usuario_Reporte']));
    }

    public function Reporte_Atenciones_Pendientes_General(Request $request)
    {

      //Codigo para obtener los datos generales
      $Servicios_Atencion = $this->Servicios_Atencion;

      $id = \Session::get('Id_Usuario');
      $ArregloDatos = array(
                        $id
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $Atenciones_Pendientes = json_decode($result,true);


      $Lista_Prod = $Servicios_Atencion->Listar_Articulos_Almacen()->Listar_Articulos_AlmacenResult;
      $Lista_Productos = json_decode($Lista_Prod,true);

      $Sevicio_Usuarios = $this->Servicio_Usuarios;

      $result2 = $Sevicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;
      $Lista_Usuarios = json_decode($result2,true);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );
      $result3 = $Sevicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
      $resultado3 = json_decode($result3,true);
      $Datos_Usuario = $resultado3[0];

      $Accesos = $Sevicio_Usuarios->Recuperar_Accesos($Parametros)->Recuperar_AccesosResult;
      $Accesos = json_decode($Accesos,true);

      $Arreglo_Modulos =  array();

      foreach ($Accesos as $Acceso) {
          array_push($Arreglo_Modulos,$Acceso['COD_MODULO']);
      }

      $Actividades = $Sevicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
        $Actividades_Hoy = json_decode($Actividades,true);

      $Servicios_Atencion = $this->Servicios_Atencion;

      $result = $Servicios_Atencion->Registro_Atenciones_Pendientes()->Registro_Atenciones_PendientesResult;
      $Datos_Reporte = json_decode($result,true);

      return view('DS_SOPORTE.Sistema_Soporte.Reportes_Admin.Reporte_Registro_Atenciones_Pendientes',compact(['Atenciones_Pendientes','Lista_Usuarios','Datos_Usuario','Datos_Reporte','Lista_Productos','Arreglo_Modulos','Actividades_Hoy']));
    }

    public function Recargar_Pagina(request $request)
    {
      return $this->show($request['Id_Usuario_Auxiliar'],'','');
    }

    public function Recuperar_Datos_Cliente()
    {
      $ruc = Input::get("Ruc");

      $Servicio_Clientes = $this->Servicio_Clientes;

      $ArregloDatos = array(
                        $ruc
                    );

      $json=json_encode($ArregloDatos);

      $Parametros = array(
                      'InfoCliente'=>$json
                    );

      $result = $Servicio_Clientes->Historial_Cliente($Parametros)->Historial_ClienteResult;

      $Datos_Cliente = json_decode($result,true);

      return $Datos_Cliente;
    }

    public function Listar_Clientes()
    {
      //$Servicio_Cliente = new \SoapClient("http://192.168.0.3:8070/Servicios_Clientes/Servicios_Cliente.svc?wsdl",
      $Servicio_Clientes = $this->Servicio_Clientes;
      $result = $Servicio_Clientes->Listar_Clientes()->Listar_ClientesResult;

      $Datos_Cliente = json_decode($result,true);

      return $Datos_Cliente;
    }

    public function Actualizar_Atenciones_Pendientes()
    {
      $User = \Session::get('Id_Usuario');

      $Servicios_Atencion = $this->Servicios_Atencion;

      $ArregloDatos = array(
                        $User
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'Info_Atencion'=>$json
                    );
      $result = $Servicios_Atencion->Atenciones_Pendientes($Parametros)->Atenciones_PendientesResult;
      $resultado = json_decode($result,true);

      return $resultado;
    }

    public function Sistema_Atenciones()
    {
      $id = \Session::get('Id_Usuario');
      $Servicio_Usuarios = $this->Servicio_Usuarios;

                  $ArregloDatos = array(
                                  $id
                                );
                  $json=json_encode($ArregloDatos);
                  $Parametros = array(
                                  'InfoUsuario'=>$json
                                );

                  $ready = $Servicio_Usuarios->Registro_Usuario($Parametros)->Registro_UsuarioResult;
                  //$json2 = unserialize(base64_decode($ready));
                  $Datos_Usuario = json_decode($ready, true);

                  $Tipo_Usuario = $Datos_Usuario[0]['TIPO_USUARIO'];


      if($Tipo_Usuario=='USUARIO')
      {
        return $this->show('','');
      }
      elseif($Tipo_Usuario=='ADMINISTRADOR')
      {

        return redirect()->action('AdminController@out', ['Id' => $id]);
        //return \App::call('Http\Controllers\AdminController@Show');
      }
    }

    public function Guardar_Nuevo_Usuario(Request $request)
    {
      $Servicio_Usuarios = $this->Servicio_Usuarios;

      $Id_Usuario = Input::get('Id_Usuario_Crear');
      $Password = Input::get('Password_Crear');
      $Nombres = Input::get('Nombres_Crear');
      $Apellidos = Input::get('Apellidos_Crear');
      $Telefono = Input::get('Telefono_Crear');
      $Email = Input::get('Email_Crear');
      $Tipo_Usuario = Input::get('Tipo_Usuario_Crear');
      $Area = Input::get('Area_Crear');
      $Estado = Input::get('Estado_Crear');
      $Perfil = Input::get('Perfil_Crear');

      $ArregloDatos = array(
                      $Id_Usuario,
                      $Password,
                      $Nombres,
                      $Apellidos,
                      $Telefono,
                      $Email,
                      $Tipo_Usuario,
                      $Area,
                      $Estado,
                      $Perfil
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );

      $Respuesta = $Servicio_Usuarios->Insertar_Usuario($Parametros)->Insertar_UsuarioResult;

      return $Respuesta;
      $Respuesta = json_decode($Respuesta, true);

    }

    public function Actualizar_Usuario()
    {
      
      $Servicio_Usuarios = $this->Servicio_Usuarios;

      $Id_Usuario = Input::get('Id_Usuario_Modificar_Auxiliar');
      $Password = Input::get('Password_Modificar');
      $Nombres = Input::get('Nombres_Modificar');
      $Apellidos = Input::get('Apellidos_Modificar');
      $Telefono = Input::get('Telefono_Modificar');
      $Email = Input::get('Email_Modificar');
      $Tipo_Usuario = Input::get('Tipo_Usuario_Modificar');
      $Area = Input::get('Area_Modificar');
      $Estado = Input::get('Estado_Modificar');
      $Perfil = Input::get('Perfil_Modificar');

      $ArregloDatos = array(
                      $Id_Usuario,
                      $Password,
                      $Nombres,
                      $Apellidos,
                      $Telefono,
                      $Email,
                      $Tipo_Usuario,
                      $Area,
                      $Estado,
                      $Perfil
                    );

      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );

      $Respuesta = $Servicio_Usuarios->Actualizar_Usuario($Parametros)->Actualizar_UsuarioResult;

      return $Respuesta;
      $Respuesta = json_decode($ready, true);

    }
    public function Actualizar_Datos_Usuario()
    {
      $Servicio_Usuarios = $this->Servicio_Usuarios;

      $id = $id = \Session::get('Id_Usuario');
      $Nombres = Input::get('Usuario_Nombres');
      $Apellidos = Input::get('Usuario_Apellidos');
      $Telefono = Input::get('Usuario_Telefono');
      $Email = Input::get('Usuario_Email');

      $ArregloDatos = array(
                      $id,
                      $Nombres,
                      $Apellidos,
                      $Telefono,
                      $Email
                    );

      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );

      $ready = $Servicio_Usuarios->Actualizar_Usuario_Datos_Personales($Parametros)->Actualizar_Usuario_Datos_PersonalesResult;
      $Respuesta = json_decode($ready, true);
      return 'Actualizado correctamente';
    }

    public function Modificar_Password()
    {
      $Servicio_Usuarios = $this->Servicio_Usuarios;

      $id = $id = \Session::get('Id_Usuario');


      $Password_1 = Input::get('Password_1');
      $Password_2 = Input::get('Password_2');
      if($Password_1 == $Password_2)
      {
        $ArregloDatos = array(
                        $id,
                        $Password_1
                      );

        $json=json_encode($ArregloDatos);
        $Parametros = array(
                        'InfoUsuario'=>$json
                      );

        $ready = $Servicio_Usuarios->Modificar_Password($Parametros)->Modificar_PasswordResult;
        $Respuesta = json_decode($ready, true);

        return 'Password Modificado';
      }else {
        return "Passwords distintos";
      }
    }

    public function Guardar_Horario()
  {
      $Servicio_Usuarios = $this->Servicio_Usuarios;

      //$Servicio_Usuarios = new \SoapClient("http://localhost:51885/Servicios_Usuarios.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

      $Id_Usuario = Input::get("Id_Usuario");
      $Horarios = Input::get("Horarios");

      $Datos = "";
      for($i=0;$i<sizeof($Horarios);$i++)
      {
        $Datos = $Datos.$Horarios[$i]."|";
      }
      $Datos = substr($Datos, 0, -1);

      $ArregloDatos = array(
                      $Id_Usuario,
                      $Datos
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );

      $Respuesta = $Servicio_Usuarios->Actualizar_Horario($Parametros)->Actualizar_HorarioResult;
  }

  public function Recuperar_Horario()
  {
      $Servicio_Usuarios = $this->Servicio_Usuarios;

      //$Servicio_Usuarios = new \SoapClient("http://localhost:51885/Servicios_Usuarios.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

      $Id_Usuario = Input::get("Id_Usuario");

      $ArregloDatos = array(
                      $Id_Usuario
                    );
      $json=json_encode($ArregloDatos);
      $Parametros = array(
                      'InfoUsuario'=>$json
                    );

      $Respuesta = $Servicio_Usuarios->Recuperar_Horarios($Parametros)->Recuperar_HorariosResult;
      $Respuesta = json_decode($Respuesta,true);
      return $Respuesta;
  }
  public function Listar_Perfiles()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Respuesta = $Servicio_Usuarios->Listar_Perfiles()->Listar_PerfilesResult;
    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta;
  }
  public function Listar_Modulos()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;

    $Respuesta = $Servicio_Usuarios->Listar_Modulos()->Listar_ModulosResult;
    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta;
  }
  public function Guardar_Perfil()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;

    $Modulos = Input::get("Modulos");
    $Perfil =  Input::get("Perfil");
    $Datos = "";
    for($i=0;$i<sizeof($Modulos);$i++)
    {
      $Datos = $Datos.$Modulos[$i]."|";

    }

    $Datos = substr($Datos, 0, -1);

    $ArregloDatos = array(
                    $Perfil,
                    $Datos
                  );
    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );

    $Respuesta = $Servicio_Usuarios->Guardar_Perfil($Parametros)->Guardar_PerfilResult;
    return $Respuesta;
    $Respuesta = json_decode($Respuesta,true);

  }

  public function Guardar_Perfil_Basico()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Perfil =  Input::get("Perfil");
    $ArregloDatos = array(
                    $Perfil
                  );
    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $Respuesta = $Servicio_Usuarios->Guardar_Perfil_Basico($Parametros)->Guardar_Perfil_BasicoResult;
    return $Respuesta;
    $Respuesta = json_decode($Respuesta,true);
  }
  public function Eliminar_Perfil()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Perfil =  Input::get("Perfil");
    $ArregloDatos = array(
                    $Perfil
                  );
    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $Respuesta = $Servicio_Usuarios->Eliminar_Perfil($Parametros)->Eliminar_PerfilResult;
    return $Respuesta;
    $Respuesta = json_decode($Respuesta,true);
  }

  public function Listar_Usuarios()
  {

    $Servicio_Usuarios = $this->Servicio_Usuarios;

    $Usuarios = $Servicio_Usuarios->Listar_Usuarios()->Listar_UsuariosResult;

    $Usuarios = json_decode($Usuarios,true);

    return $Usuarios;
  }

  public function Recuperar_Tareas()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Id_Usuario =  Input::get("Id_Usuario");
    $Fecha_Inicial =  Input::get("Fecha_Inicial");
    $Fecha_Final =  Input::get("Fecha_Final");

    $ArregloDatos = array(
                    $Id_Usuario,
                    $Fecha_Inicial,
                    $Fecha_Final
                  );

    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $Respuesta = $Servicio_Usuarios->Recuperar_Tareas($Parametros)->Recuperar_TareasResult;

    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta;
  }

  public function Recuperar_Datos_Tarea()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Id_Actividad =  Input::get("Id_Actividad");
    $Id_Actividad_Detalle =  Input::get("Id_Actividad_Detalle");
    $ArregloDatos = array(
                    $Id_Actividad,
                    $Id_Actividad_Detalle
                  );

    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $Respuesta = $Servicio_Usuarios->Recuperar_Datos_Tarea($Parametros)->Recuperar_Datos_TareaResult;

    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta[0];
  }

  public function Guardar_Asignar_Tarea()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Id_Actividad = date("d-m-Y h:i:s");
    $Id_Usuario =  Input::get("Id_Usuario");
    $Id_Usuario_Origen = \Session::get('Id_Usuario');
    $Descripcion =  Input::get("Descripcion");
    $Horarios_Seleccionados =  Input::get("Horarios_Seleccionados");
    $Nro_Semanas = Input::get("Nro_Semanas");
    $Datos="";
    for($i=0;$i<sizeof($Horarios_Seleccionados);$i++)
    {
      $Datos = $Datos.$Horarios_Seleccionados[$i]."|";
    }
    $Datos = substr($Datos, 0, -1);



    $ArregloDatos = array(
                    $Id_Actividad,
                    $Id_Usuario,
                    $Datos,
                    $Descripcion,
                    $Id_Usuario_Origen,
                    $Nro_Semanas
                  );

    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $Respuesta = $Servicio_Usuarios->Guardar_Nueva_Tarea($Parametros)->Guardar_Nueva_TareaResult;

    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta;
  }
  public function Eliminar_Actividad()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Id_Actividad =  Input::get("Id_Actividad");

    $ArregloDatos = array(
                    $Id_Actividad,
                  );

    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $Respuesta = $Servicio_Usuarios->Eliminar_Actividad($Parametros)->Eliminar_ActividadResult;

    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta[0];
  }

  public function Eliminar_Actividad_Detalle()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios;
    $Id_Actividad =  Input::get("Id_Actividad");
    $Id_Actividad_Detalle =  Input::get("Id_Actividad_Detalle");
    $ArregloDatos = array(
                    $Id_Actividad,
                    $Id_Actividad_Detalle
                  );

    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );

    $Respuesta = $Servicio_Usuarios->Eliminar_Actividad_Detalle($Parametros)->Eliminar_Actividad_DetalleResult;

    $Respuesta = json_decode($Respuesta,true);
    return $Respuesta[0];
  }

  public function Recuperar_Id_Usuario()
  {
      return \Session::get('Id_Usuario');
  }

  public function Nro_Actividades_Pendientes_Hoy()
  {
    $Servicio_Usuarios = $this->Servicio_Usuarios_2;
    $id = \Session::get('Id_Usuario');

    $ArregloDatos = array(
                      $id
                  );
    $json=json_encode($ArregloDatos);
    $Parametros = array(
                    'InfoUsuario'=>$json
                  );
    $result = $Servicio_Usuarios->Recuperar_Actividades_Para_Hoy($Parametros)->Recuperar_Actividades_Para_HoyResult;
    $Registro_Actividades = json_decode($result,true);
    return $Registro_Actividades;
  }

  public function Upload_Imagen_Perfil()
   {
     $path = "uploads/";

     $img = $_FILES['photoimg']['tmp_name'];
     $dst = $path . $_FILES['photoimg']['name'];
     $id = \Session::get('Id_Usuario');

     $ext = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);

     if (($img_info = getimagesize($img)) === FALSE)
       die("Image not found or not an image");

     $width = $img_info[0];
     $height = $img_info[1];

     switch ($img_info[2]) {
       case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
       case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
       case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
       default : die("Unknown filetype");
     }

     $tmp = imagecreatetruecolor($width, $height);
     imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
     imagejpeg($tmp, str_replace($_FILES['photoimg']['name'],$id,$dst).".jpg");
     return redirect('/Atenciones');
   }
   
   public function Prueba()
   {
      $Sistema = Input::get('Sistema');
      $Modalidad = Input::get('Modalidad');
      $Hora_Inicio = Input::get('Hora_Inicio');
      $Hora_Fin = Input::get('Hora_Fin');
      $Fecha = Input::get('Fecha');
      $Persona_Contacto = Input::get('Persona_Contacto');
      $Cargo=Input::get('Cargo');
      $Telefono= input::get('Cargo');
      $Problema_Real= input::get('Problema_Real');
      $Observaciones= input::get('Observaciones');
      $Solucion= input::get('Solucion');
      $Lugar_Soporte= input::get('Lugar_Soporte');
      $Direccion= json_encode(input::get('Direccion'));
      $Email= input::get('Email');
      $Razon_Social= input::get('Razon_Social');
      $Direccion_Fiscal= input::get('Direccion_Fiscal');
      $Id_Usuario = $id = \Session::get('Id_Usuario');


      return view('DS_SOPORTE.Sistema_Soporte.Sub_Modulos.Formulario_Atencion_Presencial_PDF',compact(['Id_Usuario','Sistema','Modalidad','Hora_Inicio','Hora_Fin','Fecha','Persona_Contacto','Cargo','Telefono','Problema_Real','Observaciones','Solucion','Lugar_Soporte','Direccion','Email','Razon_Social','Direccion_Fiscal']));
   }

}
