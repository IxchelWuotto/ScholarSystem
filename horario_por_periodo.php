<?php 
 require_once "usuariosModelo.php";
 $usuarioModel = new usuariosModelo();
?>

<div class="jumbotron">
<div class="container">
        <h2>Horario escolar</h2>
        <h5>Por favor, seleccione el periodo del cual quiere ver su horario escolar.</h5>
      </div>
    </div>
<div class="container">

<p></p>

<p></p>
<form role="form" method="post" id="form1" name="form1" action="index.php?p=res_horario_por_periodo" >

 
<fieldset>
<legend>1.- Escoja un periodo</legend>

<div class="form-group">

 <label for="id_periodo">Escoja el periodo del horario escolar a consultar</label><br>
       <select id="id_periodo" name="id_periodo" class="form-control">
         <?php include('combo_periodo.php'); 
         echo $combobit; ?>
        </select>               
</div>

       </fieldset>


 <input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
</form>


<br />
</div>