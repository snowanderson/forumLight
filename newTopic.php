<?php
// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste la déclaration de nos variables
	if (!isset($_POST['auteur']) || !isset($_POST['titre']) || !isset($_POST['message'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	// on teste si les variables ne sont pas vides
	if (empty($_POST['auteur']) || empty($_POST['titre']) || empty($_POST['message'])) {
		$erreur = 'Au moins un des champs est vide.';
	}

	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// on se connecte à notre base
		$base = mysql_connect ('localhost', 'root', 'root');
		mysql_select_db ('forum', $base);

		// on calcule la date actuelle
		$date = date("Y-m-d H:i:s");

		// préparation de la requête d'insertion (pour la table forum_sujets)
		$sql = 'INSERT INTO forum_sujets VALUES("", "'.mysql_escape_string($_POST['auteur']).'", "'.mysql_escape_string($_POST['titre']).'", "'.$date.'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
		
		// on recupère l'id qui vient de s'insérer dans la table forum_sujets
		$id_sujet = mysql_insert_id();

		// lancement de la requête d'insertion (pour la table forum_reponses
		$sql = 'INSERT INTO forum_reponses VALUES("", "'.mysql_escape_string($_POST['auteur']).'", "'.mysql_escape_string($_POST['message']).'", "'.$date.'", "'.$id_sujet.'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base de données
		mysql_close();

		// on redirige vers la page d'accueil
		header('Location: index.php');

		// on termine le script courant
		exit;
	}
	}
}
?>


<?php

function insererSujet() {
	include'config.php';
	$date = date("Y-m-d H:i:s");
	$auteur = $_POST['auteur'];
	$titre =  $_POST['titre'];
	try {
   	 $connection=new PDO($serveur, $utilisateur, $motDePasse, $option);
   	 $req = $connection->prepare('INSERT INTO forum_sujets 
    		                        VALUES("", :auteur, :titre, :date;');
   	 $req->bindParam(':auteur',$auteur);
	 $req->bindParam(':titre',$titre);
   	 $req->bindParam(':date',$date);
   	 $req->execute();

	}
	catch(PDOException $e) {
		$msg = 'PDO ERROR at'.$e->getFile().' L.'.$e->getLine().' : '.$e->getMessage();
	}
}

function tableauInsertionSujet() {
	$auteur = "";
	$titre = "";
	$message = "";
	if (isset($_POST['auteur'])) $auteur = htmlentities(trim($_POST['auteur']));
	if (isset($_POST['titre'])) $titre = htmlentities(trim($_POST['titre']));
	if (isset($_POST['message'])) $message = htmlentities(trim($_POST['message']));

	echo '<form action="newTopic.php" method="post">
	<table>
	<tr>
		<td>Auteur : </td>
		<td><input type="text">',$auteur,'</td>
	</tr>
	<tr>
		<td>Titre :</td>
		<td><input type="text">',$titre,'</td>
	</tr>
	<tr>
		<td>Message : </td>
		<td><textarea cols="50" rows="10">',$message,'</textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="submit" name="go"></td>
	</tr>
	</table>
	</form>';
	if (isset($erreur)) echo '<br /><br />',$erreur;
}

tableauInsertionSujet();
?>