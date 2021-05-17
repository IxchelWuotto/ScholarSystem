<?php include('mysql.php');?>
 <div class="jumbotron">
      <div class="container">
        <h2>Registro de Periodos</h2>
        <h5>Por favor, llene los campos siguientes para registrar un periodo:</h5>
      </div>
  </div>
<div class="container">
<form role="form" method="post" id="form1" name="form1" action="index.php?p=crud" >
<input type="hidden" name="operacion" value="5" />
<fieldset>
<legend>Datos Necesarios</legend>
<div id="Info"></div>
<div class="form-group">
    <label for="periodo">Nombre</label>
    <input type="text" class="form-control" id="periodo" name="periodo"
           >
  </div>
</fieldset>
<input name="submit" class="btn btn-primary" type="submit" value="Enviar" id="submit" />
</form>
<br />
 <script>

        $('#form1').validate({
            rules: {
				        "periodo": {
                    required: true,
					           minlength: 5,
                    maxlength: 14
                }
            },
            messages: {
				        "periodo" : {
                    required: "<span style='color:red'>Introduce periodo</span>",
                    maxlength: "<span style='color:red'>Tu ID debe ser menos de 14 digitos.</span>",
                    minlength: "<span style='color:red'>Tu ID debe ser de 5 digitos.</span>"
                }

            },
  });
</script>