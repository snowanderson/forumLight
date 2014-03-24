<?php

include 'functions/wrapper.php';
include 'functions/topicView.php';
include 'functions/topicModel.php';

headerForum("Forum | conversation");

if (!isset($_GET['id_sujet_a_lire'])) {
	echo 'Sujet non défini.';
}
else {
$tab = getConversation();
afficherConversation($tab);
}