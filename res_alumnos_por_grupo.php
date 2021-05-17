   <?php  require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
			 ?>
     <div class="jumbotron">
      <div class="container">
        <h2>Mostrar alumnos por grupo</h2>
        <h5>Resultado:</h5>
      </div>
    </div>
    
<div class="container">
 <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
    <tr>
    <th >Matrícula</th>
    <th >Nombre</th>
    <th >Apellido Paterno</th>
    <th >Apellido Materno</th>
    
    </tr>
      </thead>
      <tbody>

<?

$identificador_grupo = $usuarioModel->get_idgpo_por_periodo_y_materia($_POST['id_periodo'],$_POST['id_grupo']); //aqui consigo el ID_GPO 

$alumnos_grupos = $usuarioModel->  get_alumnos_grupos_por_periodo_actualizado($identificador_grupo['id_gpo'],$_POST['id_periodo']);

 foreach ($alumnos_grupos as $row){
  ?><tr>
           <td><?php  echo $row["matricula"];  ?> </td>
  				 <td><?php  echo $row["nombre"];   ?> </td>
           <td><?php  echo $row["ap_paterno"];   ?> </td>
           <td><?php  echo $row["ap_materno"];   ?> </td>
    <tr>
<? }?>
 </tbody>
    </table>
</div>
  <center>

<br/>
<br/>
<a href='?p=alumnos_por_grupo'  ><button type="button" class="btn btn-success">Ver otro periodo</button></a>
  
</center>
</div>