<?php

function afficherConversation($tab) {
	echo '<table id="categorie">
           <thead>
             <tr>
                <th>Author</th>
                <th>Message</th>
             </tr>
           </thead>
           <tbody>';
           	foreach ($tab as $conv) {
           	sscanf($conv['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
	$auteur = htmlentities(trim($conv['auteur']));
	$message = nl2br(htmlentities(trim($conv['message'])));

            echo'<tr class="topic">
                    <td>',$auteur,'
                    </td>
                    <td>',$message,'
                    </td>
                 </tr>';
	}
	echo '</tbody>
    </table>
 	<a href="./insert_reponse.php?numero_du_sujet=<?php echo $_GET["id_sujet_a_lire"]; ?>Answer</a>
 	<a href="./sujet.php">Back to subjects</a>';
}