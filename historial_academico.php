   <?php  
require_once "usuariosModelo.php";
$usuarioModel = new usuariosModelo();
$n_cta=$_SESSION['cuenta'];
$reporte_kardex = $usuarioModel->get_reporte_kardex($_SESSION['cuenta']);
$nombre_alumno = $usuarioModel->get_alumno($_SESSION['cuenta']);
			 ?>
     <div class="jumbotron">
      <div class="container">
        <h2> Historial Académico</h2>
        <h5>Alumno:  <?php echo $nombre_alumno['nombre']." ".$nombre_alumno['ap_paterno']." ".$nombre_alumno['ap_materno']; ?></h5>
        <h5>Matrícula:  <?php echo $_SESSION['cuenta']; ?></h5>
      </div>
    </div>
    
<div class="container">
 <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
    <tr>
    <th >Periodo</th>
    <th >Materia</th>
    <th >Calificación</th>
 	
    </tr>
      </thead>
      <tbody>

<?php foreach ($reporte_kardex as $row){ ?>

  <tr>
           
           <td><?php  echo $row["periodo"];  ?> </td>
  				 <td><?php  echo $row["nom_mat"];   ?> </td>
           <td><?php  echo $row["calificacion"];   ?> </td>
          
    <tr>
<?php }?>

 </tbody>
    </table>
</div>

</div>
