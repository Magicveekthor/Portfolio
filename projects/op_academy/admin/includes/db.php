<?php 
//Database connection starts here
$db_name = 'mysql:host=localhost;dbname=opemzy_course';
$db_user_name = 'root';
$db_user_pass = '';

$conn = new PDO($db_name, $db_user_name, $db_user_pass);

function create_unique_id() {
	$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$rand = array();
	$length = strlen($str) - 1;

	for($i = 0; $i < 20; $i++) {
		$n = mt_rand(0, $length);
		$rand[] = $str[$n];
	}

	return implode($rand);
}
//Database connection ends here...