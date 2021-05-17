<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Seguimiento de Egresados BETA</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	    <meta charset="utf-8" />
        <!-- Bootstrap Core CSS -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
                <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"
    type="text/javascript"></script>
    <!-- jQuery Validation -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"
    type="text/javascript"></script> 
	</head>
    <body>
 
<nav class="navbar navbar-inverse " role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Logotipo</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
 <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
  <!--<div class="collapse navbar-collapse navbar-ex1-collapse">-->
    <ul class="nav navbar-nav">
      <li class="<?php echo $pagina == 'inicio' ? 'active' : ''; ?>"><a href="?p=inicio">Inicio</a></li>
      
    </ul>
 
     <form class="navbar-form navbar-right" method="post" action="validar_usuario.php">
            <div class="form-group">
              <input type="text"  name="usuario" placeholder="Usuario" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="contraseña" placeholder="Contraseña" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
 
    
  </div>
</nav>
<div class="container" > hola </div>
</body>
</html>
