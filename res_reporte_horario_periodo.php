<?php
require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
 $n_cta=$_SESSION['cuenta'];
 $id_periodo=$_POST['id_periodo'];
 $id_materia=$_POST['id_materia'];
 $id_profesor=$_POST['id_profesor'];
 
$consultar_grupos = $usuarioModel->get_grupos_profesor_por_periodo_por_materia($id_profesor,$id_periodo,$id_materia);
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
	  <th >ID GPO</th>
	  <th >Id_Materia</th>
	  <th >Grupo</th>
	  <th >Profesor</th>
	  <th >Salon | Dia | Horario</th>
	  
	  
	  </tr>
      </thead>
      <tbody>
     <?php foreach ($consultar_grupos as $row): ?>

             <tr>
	  <td><?php echo $row["id_gpo"]; ?> </td>
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
<form role="form" method="post" id="form1" name="form1" action="paginas/res_reporte_horario_admin_pdf.php" target="_blank" >
<input type="hidden" name="n_cta" value="<? echo $n_cta; ?>" >
<input type="hidden" name="id_periodo" value="<? echo $id_periodo; ?>" >
<br/>
<br/>
<a href='?p=reporte_horario_admin'  ><button type="button" class="btn btn-success">Ver otro periodo</button></a>
  <input name="submit" class="btn btn-success" type="submit" value="Generar PDF" id="submit" />
</form>
</center>
      </div>
