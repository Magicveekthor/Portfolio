<?php 
//Database connection starts here
$mysqli = new mysqli('localhost','root','','opemzybim_2.0');
	if($mysqli -> connect_error){
		printf ("cannot create database %s\n", $mysqli -> connect_error);
		exit();
	}
//Database connection ends here...
?>