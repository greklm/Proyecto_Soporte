<?php

date_default_timezone_set('America/Lima');
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip','pdf','docx');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	  $ftp_server = "190.117.75.124";

      $ftp_conn = \ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

      $login = ftp_login($ftp_conn, 'usuario_ftp', 'password_ftp');
      ftp_pasv($ftp_conn, true);
      if ((!$ftp_conn) || (!$login)) {
       die("La conexión FTP ha fallado!");
      }

      $Id_Observacion = $_POST['Id_Observacion_Auxiliar'];

      $Nombre_Carpeta = 'FTPSoporteDS/Adjuntos de Observaciones/'.str_replace(':', '-',$Id_Observacion);


      if(is_dir('ftp://usuario_ftp:password_ftp@190.117.75.124/'.$Nombre_Carpeta)){
              }
              else {

                  ftp_mkdir($ftp_conn, $Nombre_Carpeta);
              }

			$Nombre_Archivo = date("d-m-Y h:i:sa");
	    $Nuevo_Nombre_Archivo = str_replace(':', '-', $Nombre_Archivo).'.'.$extension;

      $server_file = $Nombre_Carpeta."/".$Nuevo_Nombre_Archivo;
      //$Servicio_Adjunto = $this->Servicio_Adjuntos;
      $Servicio_Adjunto = new \SoapClient("http://192.168.0.3:8070/Servicios_Observaciones/Servicios_Observacion.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

      	var_dump($_FILES);

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

      $d = ftp_nb_put($ftp_conn, $Nombre_Carpeta."/".$Nuevo_Nombre_Archivo, $_FILES['upl']['tmp_name'], FTP_BINARY);
      

        while ($d == FTP_MOREDATA)
          {
          // do whatever you want
          // continue uploading
          $d = ftp_nb_continue($ftp_conn);
          }

        if ($d != FTP_FINISHED)
          {
	         echo '{"status":"success"}';
			exit;
          }

                /*
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
	*/
}

echo '{"status":"error"}';
exit;
