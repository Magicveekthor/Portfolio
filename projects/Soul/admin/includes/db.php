<?php 
//Database connection starts here
$mysqli = new mysqli('localhost','root','','soul');
	if($mysqli -> connect_error){
		printf ("cannot create database %s\n", $mysqli -> connect_error);
		exit();
	}
//Database connection ends here...
?>