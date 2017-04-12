
<!DOCTYPE html>
<html>
<head>
<title>Inicio de Sesión</title>

<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Theme CSS -->
<link href="css/freelancer.min.css" rel="stylesheet">

<link href="css/freelancer.min.css" rel="stylesheet">

<style>
.alert-success{
  background-color: #DC5B5B;
  text-align: center;
  color: white;
}
#main {
align-content: center;
width:390px;
margin:50px auto;
font-family:raleway
}
span {
color:red
}
h2 {
background-color:#34A492;
text-align:center;
font-size: 20px;
border-radius:10px 10px 0 0;
margin:-10px -40px;
padding:15px
}
h1 {

text-shadow: 2px 2px 8px white;
color: #006395;
text-align:center;
margin:-20px -150px;
padding:10px;
font-size: 45px

}
hr {
border:0;
border-bottom:1px solid #ccc;
margin:10px -40px;
margin-bottom:30px
}

#login {
background-color: #15737A;
width:320px;
float:left;
border-radius:10px;
font-family:raleway;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px;
margin-left: 13%;
}
input[type=text],input[type=password] {
width:99.5%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:raleway;
}
input[type=submit] {
width:100%;
background-color:#04ABB0;
color:#fff;
border:3px solid #E6F0EE;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}

.has-float-label {
  display: block;
  position: relative;
}
.has-float-label label, .has-float-label > span {
  position: absolute;
  cursor: text;
  font-size: 130%;
  color: #ffffff;
  opacity: 1;
  -webkit-transition: all .2s;
          transition: all .2s;
  top: -1.2em;
  left: center;
  text-align: center;
  z-index: 3;
  line-height: 1;
  margin-left: auto;
  margin-right: auto;
}
.has-float-label label::after, .has-float-label > span::after {
  display: block;
  position: absolute;
  background: white;
  height: 1px;
  top: 50%;
  left: -.0em;
  right: -.0em;
  z-index: -1;
}
.has-float-label .form-control::-webkit-input-placeholder {
  opacity: 1;
  -webkit-transition: all .2s;
          transition: all .2s;
}
.has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {

}
.has-float-label .form-control:placeholder-shown:not(:focus) + * {
  font-size: 0%;
  opacity: .0;
  top: .3em;
}

.input-group .has-float-label {
  display: table-cell;
}
.input-group .has-float-label .form-control {
  border-radius: 0.25rem;
}
.input-group .has-float-label:not(:last-child), .input-group .has-float-label:not(:last-child) .form-control {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  border-right: 0;
}
.input-group .has-float-label:not(:first-child), .input-group .has-float-label:not(:first-child) .form-control {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}


</style>
</head>
<body background="img/bi_wallpaper.jpg">
  <div id="main">
      <h1>DATA SERVICE ATENCIONES</h1>
        <div id="login">
          <h2>Iniciar Sesión<br></h2>

          <Form method = "POST" action = {{action('UsuarioController@Iniciar_Sesion')}}></br></br>
            {!!csrf_field()!!}
            <div class="has-float-label form-group" >

              <input class="form-control" type="text" placeholder="Ingrese nombre de Usuario" id="usuario" name="usuario" required>
              <label for="usuario">Usuario</label>

            </div><br>
            <div class="has-float-label form-group">

                <input class="form-control" type="password" placeholder="Ingrese Password" id="password" name="password" required>
                <label for="password">Password</label>
            </div><br>
              {{Form::submit('Ingresar',['class'=>'btn btn-primary'])}}
          </Form>
          @if(Session::has('flash_message'))
            <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
          @endif
        </div>
      </div>
</body>
</html>
