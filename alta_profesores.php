 <script type="text/javascript">
$(document).ready(function() {	
	$('#id_profe').blur(function(){
		
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var id_profe = $(this).val();		
		var dataString = 'id_profe='+id_profe;
		
		$.ajax({
            type: "POST",
            url: "checar_profesor_disponible.php",
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
        <h2>Registro de Profesores</h2>
        <h5>Por favor, llene los campos siguientes para registrar un profesor:</h5>
      </div>
    </div>
    
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud" >
<input type="hidden" name="operacion" value="2" />
<fieldset>
<legend>Datos Necesarios</legend>
<div id="Info"></div>
<div class="form-group">
    <label for="id_profe">Nómina</label>
    <input type="text" class="form-control" id="id_profe" name="id_profe"
          >
  </div>
  
<div class="form-group">
                <label for="grado">Grado Academico:</label><br>
                    <select id="grado" name="grado" class="form-control">
                         <option value="Lic.">Licenciado</option>
                        <option value="Ing.">Ingeniero</option>
                        <option value="Mtr.">Maestro</option>
                        <option value="Dr.">Doctor</option>
                        </select>
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
				        "id_profe": {
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
				        "id_profe" : {
                    required: "<span style='color:red'>Introduce un ID</span>",
                    maxlength: "<span style='color:red'>Tu ID debe ser de 9 digitos.</span>",
                    minlength: "<span style='color:red'>Tu ID debe ser de 9 digitos.</span>"
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
                    minlength: "<span style='color:red'>Tu contraseña debe contener al menos 4dígitos.</span>",
                    equalTo : "<span style='color:red'>Tus password no son iguales</span>"
                }
				
            },
  });
</script>
