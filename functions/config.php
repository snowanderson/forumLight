<?php
$serveur='mysql:host=localhost;dbname=forum';
$utilisateur='root';
$motDePasse='root';
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
?>