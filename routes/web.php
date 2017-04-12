<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/Prueba',['uses'=>'UsuarioController@Prueba']);

Route::group(['middleware'=>'usuario'],function(){

//Rutas de Menu
Route::get('Menu',function(){
	return view('DS_SOPORTE.Menu');
});

////////////////////////Rutas para el sistema DS_Soporte//////////////////////////
//Route::GET('/Atenciones/Ingresar','UsuarioController@index');
Route::resource('/Atenciones','UsuarioController');
//Route::get('/Atenciones','UsuarioController@index');

//Ruta para editar datos de Usuario
Route::post('Usuario/Actualizado',['uses' => 'UsuarioController@Editar_Datos_Usuario']);


  //Rutas de Reportes
  Route::group(['middleware'=>'accesos:0301'],function(){
    Route::GET('/Atenciones/Reportes/Atenciones_Derivadas_Pendientes',['uses' => 'UsuarioController@Reporte_Atenciones_Derivadas_Pendientes']);
  });
  Route::group(['middleware'=>'accesos:0304'],function(){
    Route::POST('/Atenciones/Reportes/Atenciones_Por_Cliente',['uses' => 'UsuarioController@Reporte_Atenciones_Por_Cliente']);
  });
  Route::group(['middleware'=>'accesos:0305'],function(){
    Route::POST('/Atenciones/Reportes/Atenciones_Usuario',['uses' => 'UsuarioController@Reporte_Atenciones_Usuario']);
  });
  Route::group(['middleware'=>'accesos:0501'],function(){
    Route::get('/Atenciones/Reportes/Atenciones_Pendientes_Usuario',['uses' => 'UsuarioController@Reporte_Atenciones_Pendientes_Usuario']);
  //Ruta para obtener Atenciones Pendientes
    Route::get('/Actualizar_Pendientes',['uses'=>'UsuarioController@Actualizar_Atenciones_Pendientes']);
  });

  //Rutas de Reportes Administrador
  Route::group(['middleware'=>'accesos:0302'],function(){
    Route::POST('/Atenciones/Reportes/Atenciones_Por_Usuario',['uses' => 'UsuarioController@Reporte_Atenciones_Por_Usuario']);
  });
  Route::group(['middleware'=>'accesos:0303'],function(){
    Route::GET('/Atenciones/Reportes/Atenciones_Pendientes',['uses' => 'UsuarioController@Reporte_Atenciones_Pendientes_General']);
  });

//Rutas para configuraciones
  Route::group(['middleware'=>'accesos:0101'],function(){
    Route::GET('/Guardar_Nuevo_Usuario',['uses'=>'UsuarioController@Guardar_Nuevo_Usuario']);
  });
  Route::group(['middleware'=>'accesos:0102'],function(){
    Route::GET('/Actualizar_Usuario',['uses'=>'UsuarioController@Actualizar_Usuario']);
  });
  Route::group(['middleware'=>'accesos:0201'],function(){
    Route::GET('/Actualizar_Datos_Usuario',['uses'=>'UsuarioController@Actualizar_Datos_Usuario']);
    Route::POST('/Upload_Imagen_Perfil',['uses'=>'UsuarioController@Upload_Imagen_Perfil']);
  });
  Route::group(['middleware'=>'accesos:0202'],function(){
    Route::GET('/Modificar_Password',['uses'=>'UsuarioController@Modificar_Password']);
  });

  Route::group(['middleware'=>'accesos:0103'],function(){
    //Ruta para guardar horario
    Route::get('/Guardar_Horario','UsuarioController@Guardar_Horario');
  });
    
Route::get('/Recuperar_Horario','UsuarioController@Recuperar_Horario');

//Ruta para Listar perfiles
Route::get('/Listar_Perfiles',['uses'=>'UsuarioController@Listar_Perfiles']);
//Ruta para listar todos los Modulos
Route::get('/Listar_Modulos',['uses'=>'UsuarioController@Listar_Modulos']);
//Ruta para descargar Adjuntos
Route::post('/Descargado',['uses' => 'UsuarioController@Descargar_Adjunto']);

Route::get('Recuperar_Adjuntos',['uses'=>'UsuarioController@Recuperar_Adjuntos']);

Route::group(['middleware'=>'accesos:0104'],function(){
    //Ruta para guardar perfil
    Route::get('/Guardar_Perfil',['uses' => 'UsuarioController@Guardar_Perfil']);
    //Ruta para guardar perfil basico
    Route::get('/Guardar_Perfil_Basico',['uses'=>'UsuarioController@Guardar_Perfil_Basico']);
    //Ruta para eliminar perfil
    Route::get('/Eliminar_Perfil',['uses'=>'UsuarioController@Eliminar_Perfil']);
  });


//Ruta para alistar los usuarios
Route::get('/Listar_Usuarios',['uses'=>'UsuarioController@Listar_Usuarios']);
//Ruta para recuperar tareas
Route::get('/Recuperar_Tareas',['uses'=>'UsuarioController@Recuperar_Tareas']);
//Ruta para recuperar los datos de una target_path
Route::get('/Recuperar_Datos_Tarea',['uses'=>'UsuarioController@Recuperar_Datos_Tarea']);
//Ruta para guardar tarea
Route::get('/Guardar_Asignar_Tarea',['uses'=>'UsuarioController@Guardar_Asignar_Tarea']);
//Ruta para eliminar una Actividad
Route::get('/Eliminar_Actividad',['uses'=>'UsuarioController@Eliminar_Actividad']);
//Ruta para eliminar una actividad_detalle
Route::get('/Eliminar_Actividad_Detalle',['uses'=>'UsuarioController@Eliminar_Actividad_Detalle']);
//Ruta para recuperar clientes
Route::get('/Recuperar_Clientes',['uses'=>'UsuarioController@Listar_Clientes']);
//Ruta para recuperar datos de clientes
Route::get('/Recuperar_Datos_Cliente',['uses' => 'UsuarioController@Recuperar_Datos_Cliente']);
//Ruta para recuperar atenciones de un clientes
Route::get('/Recuperar_Atenciones_Cliente',['uses' => 'UsuarioController@Recuperar_Atenciones_Cliente']);
//Ruta para subir Adjuntos
Route::post('/upload',['uses','UsuarioController@upload']);


   Route::group(['middleware'=>'accesos:0401'],function(){
    //Ruta para concluir atencion
    Route::post('/Concluir_Atencion_Remota',['uses'=>'UsuarioController@Concluir_Atencion_Remota']);
    //Ruta para derivar atencin remota
    Route::post('/Derivar_Atencion_Remota',['uses'=>'UsuarioController@Derivar_Atencion_Remota']);
    //Ruta para continuar atencion remota
    Route::post('/Continuar_Atencion_Remota',['uses'=>'UsuarioController@Continuar_Atencion_Remota']);
  });

  Route::group(['middleware'=>'accesos:0402'],function(){
    //Ruta para concluir atencion presencial
    Route::post('/Concluir_Atencion_Presencial',['uses'=>'UsuarioController@Concluir_Atencion_Presencial']);
    //Ruta para derivar atencin Presencial
    Route::post('/Derivar_Atencion_Presencial',['uses'=>'UsuarioController@Derivar_Atencion_Presencial']);
    //Ruta para continuar atencion Presencial
    Route::post('/Continuar_Atencion_Presencial',['uses'=>'UsuarioController@Continuar_Atencion_Presencial']);
  });


//Ruta para actualizat atenciones pendientes
Route::get('/Actualizar_Pendientes',['uses'=>'UsuarioController@Actualizar_Atenciones_Pendientes']);
//Ruta para recuperar id de usuario
Route::get('/Recuperar_Id_Usuario',['uses'=>'UsuarioController@Recuperar_Id_Usuario']);
//Ruta para recuperar las actividades para Hoy
Route::get('/Nro_Actividades_Pendientes_Hoy',['uses'=>'UsuarioController@Nro_Actividades_Pendientes_Hoy']);



//Rutas para el sistema de Observaciones_Atencion_RemotaRoute::post('Subir_Adjunto',['uses' => 'ObservacionController@upload']);
	Route::resource('/Observaciones','ObservacionController');

	Route::GET('Actualizar_Observaciones_Pendientes',['uses' => 'ObservacionController@Actualizar_Observaciones_Pendientes']);
	Route::GET('Actualizar_Observaciones_Solucionadas',['uses'=>'ObservacionController@Actualizar_Observaciones_Solucionadas']);
	Route::get('Archivar_Observacion',['uses'=>'ObservacionController@Archivar_Observacion']);
	Route::post('/get-image', 'ObservacionController@get_image');
	Route::post('upload',['uses'=>'ObservacionController@upload']);
	Route::get('/Listar_Adjuntos',['uses'=>'ObservacionController@Listar_Adjuntos']);
	Route::post('/Descargar_Adjunto_Observacion',['uses'=>'ObservacionController@Descargar_Adjunto']);
	Route::get('/Actualizar_Observaciones_Enviadas_Pendientes', ['uses'=>'ObservacionController@Actualizar_Observaciones_Enviadas_Pendientes']);

	Route::get('/Crear_Evento',['uses'=>'ObservacionController@Crear_Evento']);
	Route::get('/Recuperar_Eventos_Pendientes',['uses'=>'ObservacionController@Recuperar_Eventos_Pendientes']);
	Route::get('/Recuperar_Eventos',['uses'=>'ObservacionController@Recuperar_Eventos']);

	Route::get('/Recuperar_Notificaciones_Pendientes',['uses'=>'ObservacionController@Recuperar_Notificaciones_Pendientes']);

	Route::get('/Enviar_Notificacion',['uses'=>'ObservacionController@Enviar_Notificacion']);
	Route::get('/Enviar_Notificaciones',['uses'=>'ObservacionController@Enviar_Notificacion']);
	Route::post('/Enviar',['uses'=>'ObservacionController@Enviar']);

	Route::get('/Marcar_Notificacion_Leida',['uses'=>'ObservacionController@Marcar_Notificacion_Leida']);
	//Ruta para recuperar el registro de Observaciones
  	Route::get('/Registro_Observaciones',['uses'=>'ObservacionController@Registro_Observaciones']);





	
});
//Rutas de inicio de sesión
Route::post('/Usuario',['uses'=>'UsuarioController@Iniciar_Sesion']);
Route::get('Cerrar_Sesion',['uses' =>'UsuarioController@Cerrar_Sesion']);
Route::get('InicioSesion',['uses' =>'UsuarioController@out']);


