<?php
include('mysql.php');
if($_REQUEST)
{
	$id_salon	= $_REQUEST['id_salon'];
	$query = "select * from salon where id_salon = '".$id_salon."'";
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