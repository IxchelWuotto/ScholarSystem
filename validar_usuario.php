<?
header("refresh: 5; url = index.php"); 
include("mysql.php"); //Incluimos los datos de la conexion de base de datosZAZ
$Usuario  = $_POST['usuario'];//variable que llega por medio del formulario
$Contraseña  = $_POST['contraseña'];//variable que llega por medio del formulario
$tipo_usuario  = $_POST['tipo_usuario'];//variable que llega por medio del formulario

////Decido en que tabla hacer el query////
if ( (!empty($Usuario))&&(!empty($Contraseña)) ) { //SI matricula y contraseña NO estan vacios
   				
if ($tipo_usuario== "Administrador")
{
	$validacion="SELECT * FROM administrador WHERE (id_admin='$Usuario')";
}
else
{
	if ($tipo_usuario== "Alumno")
	{
		$validacion="SELECT * FROM alumno WHERE (matricula='$Usuario')";
	}
	else
	{
		if ($tipo_usuario== "Profesor")
		{
			$validacion="SELECT * FROM profesor WHERE (id_profe='$Usuario')";
		}
	}
}

   				
				$resultado=mysql_query($validacion); 
				$registro=mysql_fetch_array($resultado);
				
				if (($registro[0] == $Usuario )&&($registro["password"] == $Contraseña)){//COMPROBAMOS QUE IDCLIENTE NO SE NULO Y APARTE QUE COINCIDA CON LA VAR ID CLIENTE				//SE LOGUEA ABRIMOS SESION
					if ($registro["password"]==$Contraseña){echo "SON IGUALES";}
					if ($registro["0"]==$Usuario){echo "SON IGUALESnbla";}
				session_start();
				$_SESSION['cuenta'] =$registro[0];
				$_SESSION['usuario'] =$registro["nombre"];
				$_SESSION['Tipo_Usuario'] =$tipo_usuario;

				?>
				<script type="text/javascript">
				top.location.href = "index.php";
				</script>
                <?
				}else{ //SI NO ENTONCES NO EXISTE O ALGUN DATO ESTA MAL
				echo"<script>alert('La contrase\u00f1a del usuario no es correcta.'); window.location.href=\"index.php\"</script>"; 
				}
}else{
	echo 'Los dos campos estan vacios';
	  }
//Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
//mysql_free_result($resultado);
?>