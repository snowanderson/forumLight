<?php

function getSujets() {

	include'config.php';
	try {
    $connection=new PDO($serveur, $utilisateur, $motDePasse, $option);
    $req = $connection->query('SELECT id, auteur, titre, date_derniere_reponse 
    						   FROM forum_sujets 
    						   ORDER BY date_derniere_reponse 
    						   DESC;');
	}
	catch(PDOException $e) {
		$msg = 'PDO ERROR at'.$e->getFile().' L.'.$e->getLine().' : '.$e->getMessage();
	}
    $tab = $req->fetchall();
    return $tab;
}