<?php
//sleep(1);
include('mysql.php');
if($_REQUEST)
{
	$id_profe 	= $_REQUEST['id_profe'];
	$query = "select * from profesor where id_profe = '".$id_profe."'";
	$results = mysql_query( $query) or die('ok');
	
	if(mysql_num_rows(@$results) > 0) // not available
	{
		echo '<div id="Error"><span style="color:red">ID ya existente</span></div>';
	}
	else
	{
		echo '<div id="Success"><span style="color:green">ID Correcto</span></div>';
	}
	
}?>