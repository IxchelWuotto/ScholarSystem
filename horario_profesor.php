<?php
require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
$consultar_grupos = $usuarioModel->get_grupos_profesor($_SESSION['cuenta']);
			 ?>
             
       <div class="jumbotron">
      <div class="container">
        <h2>Horario de Profesor</h2>
      </div>
    </div>
    
<div class="container" >  
	  <div class="table-responsive">	
	  <table class="table table-hover">
      <thead>
	  <tr>
	  <th >ID</th>
	  <th >Id_Materia</th>
	  <th >Materia</th>
	  <th >Profesor</th>
	  <th >Salon | Dia | Horario</th>
	  
	  
	  </tr>
      </thead>
      <tbody>
     <?php foreach ($consultar_grupos as $row): ?>

             <tr>
	  <td><?php echo $row["id_gpo"]; ?> </td>
	  <td><?php echo $row["id_materia"]; ?> </td>
	  <td><?php $materia=$usuarioModel->get_materia($row["id_materia"]);  echo $materia['nom_mat']; ?> </td>
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
      </div>
    <?
    
	   echo "<center><a href='?p=inicio' class='btn btn-success btn-lg active' role='button'>Regresar a Inicio</a></center>";
	   ?>