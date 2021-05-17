<?php 
 require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
?>

<div class="jumbotron">
<div class="container">
        <h2>Registro de calificaciones</h2>
       
      </div>
    </div>
<div class="container">
<?php
if (isset($_POST["id_periodo"]))  {
  $id_periodo=$_POST["id_periodo"];
 
  $a_users = $usuarioModel->get_periodo($id_periodo);
   echo  "1.- El periodo seleccionado es ". $a_users['periodo']. " Si desea cambiar de periodo haga click en 'seleccionar otro periodo'" ;

   //aqui ya me traigo los grupos de ese periodo de ese profesor
   $consultar_grupos = $usuarioModel->get_grupos_profesor_por_periodo($_SESSION['cuenta'],$id_periodo);
   

  ?>
<p></p>
<!-- con este form muestro el boton de seleccionar otro periodo, en realidad lo que hace es desaparecer la variable id_periodo y como ya no existe ya no entra de nuevo -->
<form role="form" method="post" id="form1" name="form1" action="index.php?p=registro_cal" >
<input type="hidden" name="id_periodo2" value="" />
<input name="submit" class="btn btn-warning" type="submit" value="Seleccionar otro periodo" id="submit" />
</form>

<p></p>
<form role="form" method="post" id="form1" name="form1" action="index.php?p=res_registro_cal" >
<input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>" />

<fieldset>
<legend>2.- Escoja un grupo</legend>

<div class="form-group">

 <label for="materias">Escoja el grupo para asignar calificación</label><br>
        <select id="id_grupo" name="id_grupo" class="form-control">
        <?php foreach ($consultar_grupos as $row){
          $materia=$usuarioModel->get_materia($row["id_materia"]);  
          
            $combobit .=" <option value='".$materia['id_materia']."'>".$row['nombre_gpo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
      }
      echo $combobit;
     
      ?>
</select>         
</div>
</fieldset>
<?php  if ($combobit==""){?>
    <span style="color:red"><b>No existen registrados grupos para este periodo escolar</b></span><br/>
    <a href='?p=inicio' class='btn btn-success btn-lg active' role='button'>Regresar al menu principal</a>
<?php }else{ ?>      
  <input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
 <?php } ?> 
</form>



<?php
  }
  else{  //si no existe ?>
<form role="form" method="post" id="form1" name="form1" action="index.php?p=registro_cal" >
 
<fieldset>
<legend>1.- Escoja un periodo</legend>

<div class="form-group">

 <label for="id_periodo">Escoja el periodo de los grupos a consultar</label><br>
       <select id="id_periodo" name="id_periodo" class="form-control">
         <?php include('combo_periodo.php'); 
         echo $combobit; ?>
        </select>               
</div>

       </fieldset>


 <input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
</form>
<?php } ?>

<br />
</div>