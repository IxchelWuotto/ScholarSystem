<script type="text/javascript">
$(document).ready(function() {	
	$('#id_salon').blur(function(){
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
		var id_salon = $(this).val();		
		var dataString = 'id_salon='+id_salon;
		$.ajax({
            type: "POST",
            url: "checar_salon_disponible.php",
			      data : dataString,
            success: function(data) {
				$('#Info').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>
<?php include('mysql.php');?>
 <div class="jumbotron">
      <div class="container">
        <h2>Registro de Salones</h2>
        <h5>Por favor, llene los campos siguientes para registrar un salón:</h5>
      </div>
  </div>
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud" >
<input type="hidden" name="operacion" value="3" />
<fieldset>
<legend>Datos Necesarios</legend>
<div id="Info"></div>
<div class="form-group">
    <label for="id_salon">Identificador del salón</label>
    <input type="text" class="form-control" id="id_salon" name="id_salon"
           >
  </div>
  
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"
          >
  </div>
</fieldset>
<input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
</form>
<br />
 <script>

        $('#form1').validate({
            rules: {
				        "id_salon": {
                    required: true,
					           minlength: 9,
                    maxlength: 9
                },
                "nombre": {
                    required: true
                },
                
            },
            messages: {
				        "id_salon" : {
                    required: "<span style='color:red'>Introduce un ID</span>",
                    maxlength: "<span style='color:red'>Tu ID debe ser de 9 digitos.</span>",
                    minlength: "<span style='color:red'>Tu ID debe ser de 9 digitos.</span>"
                },
                "nombre": {
                    required: "<span style='color:red'>Introduce nombre del salon.</span>"
                }
				
            },
  });
</script>