<?php 
if (isset($_POST["fecha"])) {
  $fecha_asistencia=$_POST["fecha"];
   $id_grupo=$_POST['id_grupo'];
   $id_periodo=$_POST['id_periodo'];
  }
  else{
  $fecha_asistencia=  (date("Y"). "-" .date("m"). "-" .date("d")); 
  $id_grupo=$_POST['id_grupo']; //es la materia
  $id_periodo=$_POST['id_periodo']; //porque la materia puede ser igual, pero lo diferencia el periodo
  }
 require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
 //saco el nombre del periodo
 $a_users = $usuarioModel->get_periodo($id_periodo);
 //ese nombre se lo asigno a una variable
 $nombre_periodo= $a_users['periodo'];
 //lo separo para limitar la fecha de mi formulario
$anio= $nombre_periodo[0].$nombre_periodo[1].$nombre_periodo[2].$nombre_periodo[3];
$letra_periodo =$nombre_periodo[4]; //A, B o J
if ($letra_periodo=='A'){
  $min_mes="01";
  $max_mes="06";
}else{
    if ($letra_periodo=='B'){
        $min_mes="08";
        $max_mes="12";
    }else{
      if ($letra_periodo=='J'){
        $min_mes="06";
        $max_mes="07";
      }
    }
}
//para determinar el ultimo dia del mes, el maximo solo puede ser el mes 07,07 y 12
    switch($max_mes) { 
        case 06:  $diames=30; break; 
        case 07:  $diames=31; break;  
        case 12:  $diames=31; break; 
    } 

//esto me dice hasta donde mostrar en el calendario
$fechaminima= ($anio."-".$min_mes."-01");
$fechamaxima= ($anio."-".$max_mes."-".$diames);
			 ?>
<!--ya empieza toda la vista    -->  
     <div class="jumbotron">
      <div class="container">
        <h2>Registro de asistencia de alumnos, fecha: <?php echo  $fecha_asistencia; ?> </h2>
        <h5>Resultado:</h5>
      </div>
    </div>
    
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=res_asistencia_por_grupo" >
<input type="hidden" name="id_grupo" value="<?php echo $id_grupo; ?>" />
<input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>" />
 <label style="color:red">La fecha actual de asistencia es la del día de hoy: <?php echo  date("d") . "/" . date("m") . "/" . date("Y");?> , pero usted puede elegir otra fecha, si desea escoger otra fecha, a continuación escoja la nueva fecha y de click en "Ir a fecha" , de lo contrario omita este mensaje.</label><br>
 <input type="date" name="fecha" id="fecha" step="1" min="<?php echo  $fechaminima; ?>" max="<?php echo  $fechamaxima; ?>" value="<?php echo  $fecha_asistencia; ?>">
 <button type="submit" class="btn btn-warning">Ir a fecha</button>
</form>
<p></p>
<?php $identificador_grupo = $usuarioModel->get_idgpo_por_periodo_y_materia($id_periodo,$id_grupo);?>
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud&operacion=8" >
<input type="hidden" name="id_grupo" value="<?php echo $identificador_grupo['id_gpo']; ?>" />
<input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>" />
<!--<input type="hidden" name="id_materia" value="<?php //echo $id_grupo; ?>" />-->
<input type="hidden" name="fecha_de_asistencia" value="<?php echo $fecha_asistencia; ?>" />
 <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
    <tr>
    <th >Matrícula</th>
    <th >Nombre</th>
    <th >Apellido Paterno</th>
    <th >Apellido Materno</th>
    <th >¿Asistió?</th>
    
    </tr>
      </thead>
      <tbody>

<?



$alumnos_grupos = $usuarioModel->  get_alumnos_grupos_por_periodo_actualizado($identificador_grupo['id_gpo'],$id_periodo);


//$alumnos_grupos = $usuarioModel-> get_alumnos_grupos_por_periodo($id_grupo,$id_periodo); este ya no sirve, fue actualizado porque este detectaba por materia, no por grupo
 foreach ($alumnos_grupos as $row){
  ?><tr>
           <td><?php  echo $row["matricula"];  ?> </td>
  				 <td><?php  echo $row["nombre"];   ?> </td>
           <td><?php  echo $row["ap_paterno"];   ?> </td>
           <td><?php  echo $row["ap_materno"];   ?> </td>
           <td align="center">
                              <div class="checkbox">
                                 <label>
                                   <input type="checkbox" name="<?php echo $row["matricula"]; ?>" id="<?php echo $row["matricula"]; ?>" value="1">
                                 </label>
                              </div>
           </td>
    <tr>
<? }?>

          
 </tbody>
    </table>
</div>
 <center><button type="submit" class="btn btn-success">Registrar lista de asistencia</button></center>
  </form>
</div>