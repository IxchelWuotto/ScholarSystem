<?php
require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
$consultar_grupos = $usuarioModel->get_grupos($_POST['id_periodo']);
			 ?>
             
       <div class="jumbotron">
      <div class="container">
        <h2>Inscribir a Grupos</h2>
      </div>
    </div>
    
<div class="container" >  
	  <div class="table-responsive">	
	  <table class="table table-hover">
      <thead>
	  <tr>
	  <th >ID</th>
	  <th >Id_Materia</th>
	  <th >Grupo</th>
	  <th >Profesor</th>
	  <th >Salón | Día | Horario</th>
	  <th >Inscribir</th>
	  
	  </tr>
      </thead>
      <tbody>
     <?php foreach ($consultar_grupos as $row): ?>

             <tr>
	  <td><?php echo $row["id_gpo"]; ?> </td>
	  <td><?php echo $row["id_materia"]; ?> </td>
	  <td><?php echo  $row['nombre_gpo']; ?> </td>
	   <td><?php $profesor=$usuarioModel->get_profesor($row["id_profesor"]);  
	   echo $profesor['nombre']." ".$profesor['apellido_pat']." ".$profesor['apellido_mat']; ?> </td>
<td>
	   <?php $horario=$usuarioModel->get_horario($row["id_gpo"]); foreach ($horario as $horary): ?>
	   <? echo "["; ?>
	   <?echo $horary['id_salon']; echo " | "; ?> 
	   <?echo $horary["dia"]." ";  echo " | "; ?>
	   <?echo $horary["hra_ini"]." a ". $horary["hra_fin"];  echo " ] <br/>";?>

	   <? endforeach ?>
</td>  
        <td>
	 <?php 
    echo '<a href=" index.php?p=crud&operacion=7&id_gpo='.$row["id_gpo"].'"  >';
	echo 'Inscribir a Materia';
	echo '</a>';
	  ?>
	  </td>
	  </tr>
            <?php endforeach ?> 
	 
      </tbody>
	  </table>
	  </div>
      </div>
    <?
     echo "<br/><p><b><strong><center>PARA INSCRIBIR A MATERIA SOLO DE EN INSCRIBIR MATERIA</center></strong></b></p>";
	   echo "<center><a href='?p=inicio' class='btn btn-success btn-lg active' role='button'>Regresar a Inicio</a></center>";
	   ?>