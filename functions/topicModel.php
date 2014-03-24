<?php
function getConversation() {
    include'config.php';
    try {
    $connection=new PDO($serveur, $utilisateur, $motDePasse, $option);
    $req = $connection->query('SELECT auteur, message, date_reponse 
                                           FROM forum_reponses 
                                           WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" 
                                           ORDER BY date_reponse ASC;');
    }
    catch(PDOException $e) {
        $msg = 'PDO ERROR at'.$e->getFile().' L.'.$e->getLine().' : '.$e->getMessage();
    }
    $tab = $req->fetchall();
    return $tab;
}
?>