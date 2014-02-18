<?php

function showSujets($tab) {
	echo '<table id="categorie">
           <thead>
             <tr>
                <th><button>New Topic</button</th>
                <th>Topic</th>
                <th>Latest post</th>
             </tr>
           </thead>
           <tbody>';
	foreach ($tab as $topic) {
		sscanf($topic['date_derniere_reponse'], 
			    "%4s-%2s-%2s %2s:%2s:%2s", 
			     $annee, $mois, $jour, $heure, $minute, $seconde);

		$titre = htmlentities(trim($topic['titre']));
		$auteur = htmlentities(trim($topic['auteur']));
		$date = $jour.'-'.$mois.'-'.$annee.' '. $heure .':'. $minute;

            echo'<tr class="topic">
                    <td class="pictureRead">
                    </td>
                    <td class="title">
                       <a href="#">
                         <div class="textTitle">'.$titre.'</div>
                       </a>
                    </td>
                    <td class="infos">
                      <div id="views">XX
                      </div>
                      <div id="latestPost">
                        <div>'.$auteur.'
                        </div>
                        <div id="date">'.$date.'
                        </div>
                      </div>
                    </td>
                 </tr>';
	}
	echo '</tbody>
    </table>';
}