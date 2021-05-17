<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema de Administración Escolar</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	    <meta charset="utf-8" />  <!-- Bootstrap Core CSS -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<script src="jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script><!-- jQuery -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"
    type="text/javascript"></script>-->
    <script src="jquery.validate.min.js"
    type="text/javascript"></script> <!--<script src="jquery-1.12.1.js" type="text/javascript"></script>-->
   
  
	</head>
    <body>
         <nav class="navbar navbar-inverse"> 
      <div class="container"><!-- El logotipo y el icono que despliega el men? se agrupan para mostrarlos mejor en los dispositivos m?viles -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><small>Sistema de Administración Escolar</small></a>
  </div><!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
                      <li class="<?php echo $pagina == 'inicio' ? 'active' : ''; ?>"><a href="?p=inicio">Inicio</a></li>
                    <!--<li class="<?php echo $pagina == 'alta_alumnos' ? 'active' : ''; ?>"><a href="?p=alta_alumnos">Registrarse</a></li>-->
                      </ul>             
 <?php
if(!isset($_SESSION['usuario'])) 
{
  include("login_general.php"); //Incluimos los datos de la conexion de base de datos
}else{
?>
<div class="navbar-form navbar-right">
  <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
     <?php echo"<strong>Bienvenido: </strong>".$_SESSION['usuario']; ?>
 </button>
 <!--esto muestra ell nombre una vez que se logueo-->
 <ul class="dropdown-menu" role="menu">
 <li><?
  if ($_SESSION['Tipo_Usuario']=="Alumno"){ $NumoId=" Matrícula: ";} else{  $NumoId=" Nómina: "; }

 echo"<strong>$NumoId</strong>".$_SESSION['cuenta']."   "; 

 ?></li>
 <li class="divider"></li>
 <!-- opcion ver perfil para todas los tipos de usuario-->
 <!--<li><a href="?p=ver_perfil">Ver su Perfil</a></li>  -->

 <!-- si el tipo de usuario es alumno-->
<?php if ($_SESSION['Tipo_Usuario']=="Alumno"){?>
<li class="divider">Inscripcion</li>
<li><a href="?p=inscribir_alumno_grupos">Inscribirse a grupos</a></li>
<li><a href="?p=tira_de_materias">Mostrar materias inscritas</a></li>
<li class="divider">Reportes</li>
<li><a href="?p=historial_academico">Historial académico</a></li><!--<li class="divider">Registros</li><li><a href="?p=alta_espacios">Registro Espacios</a></li>-->

<? }
else{
// si es administrador ->
 if ($_SESSION['Tipo_Usuario']=="Administrador"){?>
  <li class="divider">Altas</li>
  <li><a href="?p=alta_profesores">Alta de Profesores</a></li>
  <li><a href="?p=alta_salones">Alta de Salones</a></li>
  <li><a href="?p=alta_materias">Alta de Materias</a></li>
  <li><a href="?p=alta_periodos">Alta de Periodos</a></li>
  <li><a href="?p=alta_alumnos">Alta de Alumnos</a></li>
<li><a href="?p=crear_grupos">Crear grupos</a></li>


<? } else{ 
 if ($_SESSION['Tipo_Usuario']=="Profesor"){?>
  <li class="divider">Altas</li>
  <li><a href="?p=horario_por_periodo">Mostrar horario</a></li>
  <li><a href="?p=alumnos_por_grupo">Mostrar alumnos por grupo</a></li>
  <li><a href="?p=asistencia_por_grupo">Registro de asistencia</a></li>
  <li><a href="?p=registro_cal">Registro de calificaciones</a></li>
 
  <li><a href="?p=reporte_calificaciones">Reporte de calificaciones</a></li>
    
<?} } 
}
 ?>
    <li class="divider"></li>
    <li><a href="logout.php">Cerrar Sesión</a></li>
</ul> 
</div>
</div>
<? } ?>
<?php if ($_SESSION['Tipo_Usuario']==1){?>
<div class="navbar-form navbar-right"><!---PRIMER BOTON-->
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
     <strong>Reportes PDF </strong>
 </button>
 <ul class="dropdown-menu" role="menu">
 <li><a href="paginas/Causales1.php" target="_blank">Causales1</a></li>
 <li><a href="paginas/Causales3.php" target="_blank">Causales3</a></li>
 <li><a href="paginas/Causales7.php" target="_blank">Causales7</a></li>
 <li><a href="paginas/Causales8.php" target="_blank">Causales8</a></li>
 <li><a href="paginas/Causales11.php" target="_blank">Causales11</a></li>
 <li><a href="paginas/Causales17.php" target="_blank">Causales17</a></li>
 </ul> 
</div>
  <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
     <strong>Reportes Totales PDF </strong>
 </button>
 <ul class="dropdown-menu" role="menu">
 <li><a href="paginas/TotalesPregunta1Opcion1.php" target="_blank">Totales Pregunta1 Opcion1</a></li>
<li class="divider"></li>
 <li><a href="paginas/TotalesPregunta2Opcion1.php" target="_blank">Totales Pregunta2 Opcion1</a></li>
 <li><a href="paginas/TotalesPregunta2Opcion2.php" target="_blank">Totales Pregunta2O pcion2</a></li>
 </ul> 
</div>
</div>
<? } ?>
	 </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav> 