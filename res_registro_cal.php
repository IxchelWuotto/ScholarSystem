  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
   <?php  
$id_materia=$_POST['id_grupo']; //es la materia id _materia, solo que me equivoque y pues ya lo deje asi
$id_periodo=$_POST['id_periodo'];

   require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
			 ?>
     <div class="jumbotron">
      <div class="container">
        <h2>Calificaciones:</h2>
      </div>
    </div>
    
<div class="container">
N/P = NO PRESENTO <br/>
N/A = NO ASIGNADA <br/><br/>
 <div class="table-responsive"> 
    <table class="table table-hover">
      <thead>
    <tr>
    <th >Matrícula</th>
    <th >Nombre</th>
    <th >Apellido Paterno</th>
    <th >Apellido Materno</th>
    <th >Calificación actual</th>
    <th >Asignar calificación</th>
    
   
    </tr>
      </thead>
      <tbody>

<?
$identificador_grupo = $usuarioModel->get_idgpo_por_periodo_y_materia($id_periodo,$id_materia); //aqui consigo el ID_GPO 
 $total_asistencia_grupo = $usuarioModel->get_total_asistencias_de_un_grupo($identificador_grupo['id_gpo']); //aqui consigo el total de asistencias de ese grupo
 
  
$alumnos_grupos = $usuarioModel-> get_alumnos_grupos_por_periodo_actualizado($identificador_grupo['id_gpo'],$id_periodo);

 foreach ($alumnos_grupos as $row){
//DEBO DECIDIR SI IMPRIMIR ALUMNO O NO
$total_asistencia_alumno = $usuarioModel->get_total_asistencias_de_un_alumno_en_un_grupo($identificador_grupo['id_gpo'],$row["matricula"]); //aqui consigo el total asis de un alumno
$total_porcentaje_asistencia = $usuarioModel->get_porcentaje_de_asistencia_alumno($total_asistencia_alumno['total_asistencia_alumno'],$total_asistencia_grupo['total_asistencia_grupo']);

$calificacion_registrada= $usuarioModel->get_calificacion($row["matricula"],$identificador_grupo['id_gpo']);


  ?>
     <script>

        $('#form1').validate({
            rules: {
                
                "calificacion": {
                    required: true
                }
            },
            messages: {
                
                "calificacion": {
                    required: "<span style='color:red'>Introduce tu nombre.</span>"
                }
        
            },
  });
</script>
  <tr>

  <form role="form" method="post" id="form1" name="form1" action="index.php?p=crud" novalidate="novalidate" >
            <input type="hidden" name="operacion" value="9" >
            <input type="hidden" name="id_materia" value="<?php echo $id_materia; ?>" >
            <input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>" >
            <input type="hidden" name="matricula" value="<?php echo $row["matricula"]; ?>" >
            <input type="hidden" name="id_gpo" value="<?php echo $identificador_grupo["id_gpo"]; ?>" >
            <input type="hidden" name="calificacion_registrada" value="<?php echo $calificacion_registrada['calificacion']; ?>" >
    
           <td><?php  echo $row["matricula"];  ?> </td>
  				 <td><?php  echo $row["nombre"];   ?> </td>
           <td><?php  echo $row["ap_paterno"];   ?> </td>
           <td><?php  echo $row["ap_materno"];   ?> </td>
           <?php if ($calificacion_registrada['calificacion'] == NULL ){ ?>
            <td>N/A</td>
           <td><input type="varchar" class="form-control" id="calificacion" name="calificacion" ></td>
           
            <td><center><input name="submit" class="btn btn-primary" type="submit" value="Asignar calificación" id="submit" /></center></td>
           <?php } else{ ?>
           <td><?php echo $calificacion_registrada['calificacion']; ?> </td>
           <td><input type="varchar" class="form-control" id="calificacion" name="calificacion" ></td>
           
           <td><center><input name="submit" class="btn btn-primary" type="submit" value="Actualizar calificación" id="submit" /></center></td>
            <?php } ?>

          
          
 
 </form>
        <tr>   
<? 

}?>
 </tbody>
    </table>
</div>
</div>

 