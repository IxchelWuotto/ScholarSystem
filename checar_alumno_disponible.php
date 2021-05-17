<?php
//sleep(1);
include('mysql.php');
if($_REQUEST)
{
	$n_cta	= $_REQUEST['n_cta'];
	$query = "select * from alumno where n_cta = '".$n_cta."'";
	$results = mysql_query( $query) or die('ok');
	
	if(mysql_num_rows(@$results) > 0) // not available
	{
		echo '<div id="Error"><span style="color:red">Numero de cuenta ya existente</span></div>';
	}
	else
	{
		echo '<div id="Success"><span style="color:green">Numero de cuenta Correcto</span></div>';
	}
	
}?>