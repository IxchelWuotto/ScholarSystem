   <?php  
$id_periodo=$_POST['id_periodo'];
  require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();

$nombre_alumno = $usuarioModel->get_alumno($_SESSION['cuenta']);
if ($id_periodo!=0){//quiere reporte de un periodo en especifico
  $promedio_alumno= $usuarioModel->get_promedio_calificaciones_por_alumno_y_periodo($_SESSION['cuenta'],$id_periodo);
$nombre_periodo = $usuarioModel->get_periodo($id_periodo);

}else{//quiere reporte de todos los semestres
$promedio_alumno= $usuarioModel->get_promedio_calificacion_por_alumno($_SESSION['cuenta']);
}
			 ?>
     <div class="jumbotron">
      <div class="container">
        <h2> Reporte de promedio de calificaciones  </h2>
        <h5>Alumno:  <?php echo $nombre_alumno['nombre']." ".$nombre_alumno['ap_paterno']." ".$nombre_alumno['ap_materno']; ?></h5>
        <h5>No. Cuenta:  <?php echo $_SESSION['cuenta']; ?></h5>
        <h5> Periodo:  <?php if ($id_periodo!=0){echo $nombre_periodo['periodo'];} else{echo "Todos los periodos";} ?></h5>
      </div>
    </div>
    
<div class="container">
 <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
    <tr>
    <th >Periodo</th>
    <th >Promedio calificacion</th>
    </tr>
      </thead>
      <tbody>

<?php foreach ($promedio_alumno as $row){ ?>

  <tr>
           
           <td><?php  echo $row["periodo"];  ?> </td>
           <td><?php  echo $row["promedio"]; ?> </td>
           
    <tr>
<?php }?>
 </tbody>
    </table>
</div>
<center>
<a href='?p=reporte_promedio_calificacion_alumno'  ><button type="button" class="btn btn-success">Ver otro periodo</button></a>
</center>
</div>
