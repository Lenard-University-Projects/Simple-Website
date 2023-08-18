<?php
	$host = "localhost";
	$username = "deniszpo_boowman";
	$password = "lasvegas1";
	$database = "deniszpo_work";
	
	$link = mysqli_connect($host,$username,$password,$database);
	$database = mysqli_select_db($link,$database);
	
	if(!$link)
	{
		echo "There was a problem connecting to the database.<br/>";
	}
	if(!$database)
	{
		echo "Database ".$database." doesn't exist.<br/>";
	}
?>