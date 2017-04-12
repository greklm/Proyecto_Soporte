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

      $Id_Atencion = $_POST['Id_Atencion_Auxiliar'];

      $Nombre_Carpeta = substr($Id_Atencion,0,strlen($Id_Atencion)-9);
      $dir = "FTPSoporteDS/".$Nombre_Carpeta;

      if(is_dir($dir)){
      }
      else {
        ftp_mkdir($ftp_conn, $dir);
      }
      //Nombrar el archivo
      $Nombre_Archivo_Servidor = date('d-m-Y H-i-s').' '.$_FILES['upl']['name'];

  //Agregar informacion del adjunto a la base de datos

      //$Servicio_Adjunto = $this->Servicio_Adjuntos;
      $Servicio_Adjunto = new \SoapClient("http://192.168.0.3:8070/Servicios_Adjuntos/Servicios_Adjunto.svc?wsdl",array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));

        var_dump($_FILES);

      $ArregloDatos = array(
                      $Id_Atencion,
                      $Nombre_Archivo_Servidor,
                      '190.117.75.124/'.$dir.'/'.$Nombre_Archivo_Servidor,
                      $extension
                  );
      $json=json_encode($ArregloDatos);

      $Parametros = array(
                      'Info_Adjunto'=>$json
                    );

      $result = $Servicio_Adjunto->Insertar_Adjunto($Parametros)->Insertar_AdjuntoResult;

      $d = ftp_nb_put($ftp_conn, $dir."/".$Nombre_Archivo_Servidor, $_FILES['upl']['tmp_name'], FTP_BINARY);


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
