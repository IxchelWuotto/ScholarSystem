<?php
include("/../mysql.php"); //Incluimos los datos de la conexion de base de datos
$menu_sql = mysql_query("SELECT * FROM salon"); //Selecciona los titulos del menu
if ( mysql_num_rows($menu_sql) > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
	while($menu = mysql_fetch_row($menu_sql)) 
    {
        $combobit .=" <option value='".$menu['0']."'>".$menu['1']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hay salones registrados";
}
mysql_free_result($menu_sql); //Aqui tambien liberamos la memoria en la consulta del menu

?>