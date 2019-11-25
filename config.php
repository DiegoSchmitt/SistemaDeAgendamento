<?php
$dsn = "mysql:dbname=barbearia;host=localhost";
$dbuser ="root";
$dbpass =""; 

try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
}catch(PDOException $e) {
	echo "falhou a conexão";
}
?>