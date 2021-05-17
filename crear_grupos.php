 <script src="http://ajax.goEogleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAdd').click(function() {
                var num     = $('.clonedInput').length;
                var newNum  = new Number(num + 1);
 
                var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
                
                newElem.children(':first').attr('id', 'dia' + newNum).attr('name', 'dia' + newNum);
               newElem.children(':eq(1)').attr('id', 'horainicio' + newNum).attr('name', 'horainicio' + newNum);
               
                newElem.children(':last').attr('id', 'horafin' + newNum).attr('name', 'horafin' + newNum);
                $('#input' + num).after(newElem);
                $('#btnDel').attr('disabled','');
 
                if (newNum == 3)
                    $('#btnAdd').attr('disabled','disabled');
               $('#btnDel').attr('disabled',false);

            });
 
            $('#btnDel').click(function() {
                var num = $('.clonedInput').length;
 
                $('#input' + num).remove();
                $('#btnAdd').attr('disabled',false);
 
                if (num-1 == 1)
                    $('#btnDel').attr('disabled','disabled');
            });
 
            $('#btnDel').attr('disabled','disabled');
        });
    </script>
<?php include('mysql.php');?>

 <div class="jumbotron">
      <div class="container">
        <h2>Creación de grupos</h2>
        <h5>Por favor, llene los campos siguientes para crear un grupo escolar:</h5>
      </div>
    </div>
    
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud" >
<input type="hidden" name="operacion" value="1" />
<fieldset>
<legend>Datos necesarios</legend>

<div class="form-group">
    <label for="materias">Escoja materia del grupo</label><br>
        <select id="id_materia" name="id_materia" class="form-control">
         <?php include('combo_materias.php'); 
         echo $combobit; ?>  
        </select>                    
</div>

<div class="form-group">
    <label for="profesor">Escoja el profesor encargado del grupo</label><br>
        <select id="id_profesor" name="id_profesor" class="form-control">
         <?php include('combo_profesor.php'); 
         echo $combobit; ?>
        </select>                    
</div>

<div class="form-group">
    <label for="periodo">Escoja el periodo escolar del grupo</label><br>
        <select id="id_periodo" name="id_periodo" class="form-control">
         <?php include('combo_periodo.php'); 
         echo $combobit; ?>
        </select>                    
</div>

<div class="form-group">
    <label for="salon">Escoja el salón donde se impartirá el grupo</label><br>
        <select id="id_salon" name="id_salon" class="form-control">
         <?php include('combo_salon.php'); 
         echo $combobit; ?>
        </select>                    
</div>

<div class="form-group">
    <label for="nombre_gpo">Escoja el nombre del grupo</label><br>
        <input type="varchar" class="form-control" id="nombre_gpo" name="nombre_gpo" >                 
</div>

<div class="form-group">
<label for="horario1">Escoja el: DIA DE LA SEMANA, HORA DE INICIO y HORA DE FIN en formato-  hora:minutos:segundos</label><br>
<p><span><small>*Si es necesario a&ntilde;ada más campos para crear horario de más días.</small><span></p>

 

<div id="input1" style="margin-bottom:4px;" class="clonedInput" class="form-group" class="form-control">
                    <select name="dia1" id="dia1" >
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sábado</option>
                    </select>   
    <input type="time" id="horainicio1" name="horainicio1" value="00:00:00" max="19:00:00" min="07:00:00" step="1">
    <input type="time" id="horafin1" name="horafin1" value="00:00:00" max="21:00:00" min="08:00:00" step="1">
</div>
 
    <div>
        <input type="button" class="btn btn-success" id="btnAdd" value="Agregar nuevo horario" />
        <input type="button" class="btn btn-success" id="btnDel" value="Remover ultimo horario" />
    </div>
</div>

  </fieldset>
  <input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
</form>
<br />
<script>//NO SE PUEDE VALIDAR, ESTO ESTA BIEN PERO NO SE PUEDE PORQUE LAS LIBRERIAS JQUERY NO SON CAMPATIBLES, AL INICIO LLAMO A OTRA PARA APARECER Y DESAPARECER BOTONES
        $('#form1').validate({
            rules: { 
                "nombre_gpo": {
                    required: true
                }
            },
            messages: {
                "nombre_gpo": {
                    required: "<span style='color:red'>Introduce el nombre del grupo.</span>"
                }	
            },
  });
</script>
 