   <?php  
$id_materia=$_POST['id_grupo']; //es la materia id _materia, solo que me equivoque y pues ya lo deje asi
$id_periodo=$_POST['id_periodo'];

   require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();

$nombre_materia  = $usuarioModel-> get_materia($id_materia);
$identificador_grupo = $usuarioModel->get_idgpo_por_periodo_y_materia($id_periodo,$id_materia); //aqui consigo el ID_GPO 
			 ?>
     <div class="jumbotron">
      <div class="container">
        <h2>Reporte de calificaciones del grupo: <?php echo $identificador_grupo['nombre_gpo']; ?>  </h2>
        <h5>Materia:  <?php echo $nombre_materia['nom_mat']; ?></h5>
      </div>
    </div>
    
<div class="container">
N/P = NO PRESENTO <br/>
N/A = NO ASIGNADA<br/><br/>
 <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
    <tr>
    <th >Matrícula</th>
    <th >Nombre</th>
    <th >Apellido Paterno</th>
    <th >Apellido Materno</th>
    <th >Calificación</th>
  
    </tr>
      </thead>
      <tbody>

<?

//HAY UN BUEN DE VARIABLES SIN USAR, SI TIENES TIEMPO LIMPIALO, SI NO, NO AFECTA A FUNCIONALIDAD
 $total_asistencia_grupo = $usuarioModel->get_total_asistencias_de_un_grupo($identificador_grupo['id_gpo']); //aqui consigo el total de asistencias de ese grupo
 
  
$alumnos_grupos = $usuarioModel-> get_alumnos_grupos_por_periodo($id_materia,$id_periodo);

 foreach ($alumnos_grupos as $row){
//DEBO DECIDIR SI IMPRIMIR ALUMNO O NO
$total_asistencia_alumno = $usuarioModel->get_total_asistencias_de_un_alumno_en_un_grupo($identificador_grupo['id_gpo'],$row["matricula"]); //aqui consigo el total asis de un alumno
$total_porcentaje_asistencia = $usuarioModel->get_porcentaje_de_asistencia_alumno($total_asistencia_alumno['total_asistencia_alumno'],$total_asistencia_grupo['total_asistencia_grupo']);


$calificacion_registrada_ordi= $usuarioModel->get_calificacion($row["matricula"],$identificador_grupo['id_gpo']);




  
  //if ($calificacion_registrada_extra['calificacion']==NULL){break;}
  ?>

  <tr>
           
           <td><?php  echo $row["matricula"];  ?> </td>
  				 <td><?php  echo $row["nombre"];   ?> </td>
           <td><?php  echo $row["ap_paterno"];   ?> </td>
           <td><?php  echo $row["ap_materno"];   ?> </td>
           <?php //if ($calificacion_registrada['calificacion'] == NULL ){ ?>
            <?php if ($calificacion_registrada_ordi['calificacion']== NULL){ ?> <td>N/A</td> <?php }else{ ?><td><?php echo $calificacion_registrada_ordi['calificacion']; }?> </td>
           
         
        

          
           
    <tr>
<? 

}?>
 </tbody>
    </table>
</div>
  <center>

<br/>
<br/>
<a href='?p=reporte_calificaciones'  ><button type="button" class="btn btn-success">Ver otro periodo</button></a>
  
</center>
</div>
