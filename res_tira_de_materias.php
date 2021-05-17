<?php
require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
 $n_cta=$_SESSION['cuenta'];
 $id_periodo=$_POST['id_periodo'];
 $tira_de_materias = $usuarioModel->get_tira_de_materias($n_cta,$id_periodo);
//$consultar_grupos = $usuarioModel->get_grupos_profesor_por_periodo($_SESSION['cuenta'],$_POST['id_periodo']);
			 ?>
             
       <div class="jumbotron">
      <div class="container">
        <h2>Materias inscritas</h2>
      </div>
    </div>
    
<div class="container" >  
	  <div class="table-responsive">	
	  <table class="table table-hover">
      <thead>
	  <tr>
	  <th >Periodo</th>
	  <th >Materia</th>

	  
	  
	  </tr>
      </thead>
      <tbody>
     <?php foreach ( $tira_de_materias as $row): ?>

       <tr>
           
	  <td><?php echo $row["periodo"]; ?> </td>
	  <td><?php echo $row["nombre_gpo"]; ?> </td>
	  
      
	  </tr>
            <?php endforeach ?> 
	 
      </tbody>
	  </table>
	  </div>
	  <center>

<br/>
<br/>
<a href='?p=tira_de_materias'  ><button type="button" class="btn btn-success">Ver otro periodo</button></a>
  
</center>
      </div>
