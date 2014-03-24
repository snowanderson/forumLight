<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel=stylesheet type="text/css" href="style.css">

</head>
<body>

<?php



$base = mysql_connect ('localhost', 'root', 'root');
mysql_select_db ('forum', $base);
$sql = 'SELECT id, auteur, titre, date_derniere_reponse FROM forum_sujets ORDER BY date_derniere_reponse DESC';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$nb_sujets = mysql_num_rows ($req);
if ($nb_sujets == 0) {
    echo 'Aucun sujet';
}

else {

?>

    <table id="categorie">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
    while ($data = mysql_fetch_array($req)) {
            sscanf($data['date_derniere_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
            echo'
            <tr class="topic">
                <td class="pictureRead">

                </td>
                <td class="title">
                    <a href="#">
                        <div class="textTitle">'.htmlentities(trim($data['titre'])).'</div>
                    </a>
                </td>
                <td class="infos">
                    <div id="views">XX</div>
                    <div id="latestPost"><div>'.htmlentities(trim($data['auteur'])).'</div><div id="date">'.$jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute
.'</div></div>
                </td>
            </tr>';
}
            ?>
        </tbody>
    </table>

    <?php 
}

mysql_free_result($req);
mysql_close();
?>
</body>
</html>