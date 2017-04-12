
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#rcorners3 {
    border-radius: 25px;
    background-position: left top;
    background-repeat: repeat;
    padding: 20px;
}
</style>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


    <title>Menu de Aplicaciones</title>


</head>
<div class="row col-lg-12 col-md-12 col-sm-12"><h1 align="center">Aplicaciones disponibles</h1>
</div><br>
<body id="page-top" class="index">
    <section>
        <div class="row" style="margin-top:100px;">
                <style>
                    .Menu_Selector {
                        text-align: center;
                        cursor: pointer;
                        background-color: #2E97C9;
                        border-radius: 15px;
                        box-shadow: 0 9px #999;
                        border: solid;
                        border-color: #7EB7C4;
                        }

                        .Menu_Selector:hover {background-color: #277AA0}

                        .Menu_Selector:active {
                        background-color: #277AA0;
                        box-shadow: 0 5px #666; 
                        transform: translateY(4px);
                        }
                        .Menu{
                            display: block;
                            width: 100%;
                            margin-left: 20.7%;
                            margin-right: auto;
                        }
                </style>
                <div class="form-group Menu"  align="center">
                        <a href="/DS_Soporte/public/Observaciones">
                            <div class="col-lg-3 col-md-3 col-sm-3 portfolio-item Menu_Selector" style="border: thin solid lightblue" align="center">
                                <img id="rcorners3" src="img/Desarrollo.jpg" class="img-responsive embossed" align="center" style="max-width:100%;max-height:100%;">
                                <span style="font-size:20px;color:black;" class="caption">Sistema de Observaciones</span>
                            </div>
                        </a>
                        <div class="col-lg-1 col-md-1 col-sm-1 portfolio-item"></div>
                        <a method="GET" href="/DS_Soporte/public/Atenciones">
                            <div class="col-lg-3 col-md-3 col-sm-3 portfolio-item Menu_Selector" style="border: thin solid lightblue" align="center">
                                <img id="rcorners3" src="img/Atenciones.jpg" class="img-responsive embossed" align="center" style="max-width:100%;max-height:100%;">
                                <span style="font-size:20px;color:black;" class="caption">Sistema de Atenciones</span>
                            </div>
                        </a>


                <div>

        </div>
    </section></br></br></br>
    <div class="row" align="center">
             <a method="POST" href={{action('UsuarioController@Cerrar_Sesion')}}><button class="btn btn-danger" style="width:80px">Salir</button></a>
         </div>
</body>
