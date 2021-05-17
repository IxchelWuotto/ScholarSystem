<?php
require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
 $n_cta=$_SESSION['cuenta'];
 $id_periodo=$_POST['id_periodo'];
$consultar_grupos = $usuarioModel->get_grupos_profesor_por_periodo($_SESSION['cuenta'],$_POST['id_periodo']);
			 ?>
             
       <div class="jumbotron">
      <div class="container">
        <h2>Horario del Profesor</h2>
      </div>
    </div>
    
<div class="container" >  
	  <div class="table-responsive">	
	  <table class="table table-hover">
      <thead>
	  <tr>
	  
	  <th >Id_Materia</th>
	  <th >Grupo</th>
	  <th >Profesor</th>
	  <th >Salón | Día | Horario</th>
	  
	  
	  </tr>
      </thead>
      <tbody>
     <?php foreach ($consultar_grupos as $row): ?>

             <tr>
	 
	  <td><?php echo $row["id_materia"]; ?> </td>
	  <td><?php $materia=$usuarioModel->get_materia($row["id_materia"]);  echo $row['nombre_gpo']; ?> </td>
	   <td><?php $profesor=$usuarioModel->get_profesor($row["id_profesor"]);  echo $profesor['nombre']." ".$profesor['apellido_pat']." ".$profesor['apellido_mat']; ?> </td>
<td>
	   <?php $horario=$usuarioModel->get_horario($row["id_gpo"]); foreach ($horario as $horary): ?>
	   <? echo "["; ?>
	   <?echo $horary['id_salon']; echo " | "; ?> 
	   <?echo $horary["dia"]." ";  echo " | "; ?>
	   <?echo $horary["hra_ini"]." a ". $horary["hra_fin"];  echo " ] <br/>";?>

	   <? endforeach ?>
</td>  
      
	  </tr>
            <?php endforeach ?> 
	 
      </tbody>
	  </table>
	  </div>
	  <center>

<br/>
<br/>
<a href='?p=horario_por_periodo'  ><button type="button" class="btn btn-success">Ver otro periodo</button></a>
  

</center>
      </div>
