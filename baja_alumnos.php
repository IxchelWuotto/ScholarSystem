<div class="jumbotron">
      <div class="container">
        <h2>Baja de Alumnos</h2>
        <h5>Por favor, llene los siguientes campos necesarios para dar de baja al alumno:</h5>
      </div>
    </div>
    
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud&operacion=2" >
<div class="form-group">
    <label for="no_cuenta">Numero de Cuenta</label>
    <input type="text" class="form-control" id="no_cuenta" name="no_cuenta"
           placeholder="Introduce tu no_cuenta">
  </div>

   <input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
  
</form>
<br />
 <script>

        $('#form1').validate({
            rules: {
				 "no_cuenta": {
                    required: true,
					minlength: 7,
                    maxlength: 7
                }
                
            },
            messages: {
				 "no_cuenta" : {
                    required: "<span style='color:red'>Introduce tu Numero de cuenta</span>",
                    maxlength: "<span style='color:red'>Tu numero de cuenta debe ser de 7 digitos.</span>",
                    minlength: "<span style='color:red'>Tu numero de cuenta debe ser de 7 digitos.</span>"
                }
            },
  });
</script>
