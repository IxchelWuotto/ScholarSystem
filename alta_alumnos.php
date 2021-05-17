 <script type="text/javascript">
$(document).ready(function() {	
	$('#matricula').blur(function(){
		
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var matricula = $(this).val();		
		var dataString = 'matricula='+matricula;
		
		$.ajax({
            type: "POST",
            url: "checar_alumno_disponible.php",
            asinc: true,
            //data:{ username : $(this).val()},
			data : dataString,
            success: function(data) {
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    
</script>
<?php include('mysql.php');?>
 <div class="jumbotron">
      <div class="container">
        <h2>Registro de Alumnos</h2>
        <h5>Por favor, llene los campos siguientes para registrar a un alumno:</h5>
      </div>
    </div>
    
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud" >
<input type="hidden" name="operacion" value="6" />
<fieldset>
<legend>Datos Necesarios</legend>
<div id="Info"></div>
<div class="form-group">
    <label for="matricula">Número de cuenta</label>
    <input type="text" class="form-control" id="matricula" name="matricula"
          >
  </div>
  

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"
           >
  </div>
  <div class="form-group">
    <label for="apellido_pat">Apellido Paterno</label>
    <input type="text" class="form-control" id="apellido_pat" name="apellido_pat"
          >
  </div>
   <div class="form-group">
    <label for="apellido_matt">Apellido Materno</label>
    <input type="text" class="form-control" id="apellido_mat" name="apellido_mat"
           >
  </div>
  
  
  <div class="form-group">
    <label for="contraseña">Introduzca Contraseña</label>
    <input type="password" class="form-control" id="contraseña" name="contraseña"
           >
  </div>
  
   <div class="form-group">
    <label for="ccontraseña">Confirme Contraseña</label>
    <input type="password" class="form-control" id="ccontraseña" name="ccontraseña"
           >
  </div>
  </fieldset>

       <input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
    
  
</form>
<br />
 <script>

        $('#form1').validate({
            rules: {
				        "matricula": {
                    required: true,
					           minlength: 9,
                    maxlength: 9
                },
                "nombre": {
                    required: true
                },
                "apellido_mat": {
                    required: true
                },
                "apellido_pat": {
                    required: true
                },
                
			         	"contraseña": {
                    required: true,
                    minlength: 4,
                    maxlength: 10
                },
                "ccontraseña" : {
                      required: true,
                    minlength: 4,
                    maxlength: 10,
                    equalTo : "#contraseña"
                }
            },
            messages: {
				        "matricula" : {
                    required: "<span style='color:red'>Introduce un numero de cuenta</span>",
                    maxlength: "<span style='color:red'>Tu numero de cuenta debe ser de 7 digitos.</span>",
                    minlength: "<span style='color:red'>Tu numero de cuenta debe ser de 7 digitos.</span>"
                },
                "nombre": {
                    required: "<span style='color:red'>Introduce tu nombre.</span>"
                },
                "apellido_mat": {
                    required: "<span style='color:red'>Apellido materno obligatorio.</span>"
                },
                "apellido_pat": {
                    required: "<span style='color:red'>Apellido paterno obligatorio.</span>"
                },
                
				        "contraseña": {
                    required: "<span style='color:red'>Introduce tu contraseña</span>",
                    maxlength: "<span style='color:red'>Tu contraseña debe contener menos de 10 dígitos.</span>",
                    minlength: "<span style='color:red'>Tu contraseña debe contener al menos 4 dígitos.</span>"
                },
                "ccontraseña" : {
                    required: "<span style='color:red'>Introduce tu contraseña",
                    maxlength: "<span style='color:red'>Tu contraseña debe contener menos de 10 dígitos.</span>",
                    minlength: "<span style='color:red'>Tu contraseña debe contener al menos 4 dígitos.</span>",
                    equalTo : "<span style='color:red'>Tus password no son iguales</span>"
                }
				
            },
  });
</script>
