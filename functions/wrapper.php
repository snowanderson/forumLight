<?php

function headerForum($title) {
	echo'<!DOCTYPE html>
		 <html>
		 <head>
		 	<meta charset="UTF-8">
 		    <title>',$title,'</title>
    		<link rel=stylesheet type="text/css" href="css/style.css">
		 </head>
		 <body>';
}

function footerForum() {
	echo'</body>
		 </html>';
}