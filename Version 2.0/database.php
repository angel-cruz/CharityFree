<?php
//Create connection credentials

$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = 'root';
//default password is root

//Create mysql object
$mysqli = new mysqli( $db_host, $db_user, $db_pass, $db_name);

//Error Handler
if($mysqli->connect_error){
	printf("connect failed: %s/n", $mysqli->connect_error);
}
?>