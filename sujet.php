<?php

include 'functions/wrapper.php';
include 'functions/subjectView.php';
include 'functions/subjectModel.php';

headerForum("Forum | subjects");
$sujets = getSujets();
showSujets($sujets);
footerForum();