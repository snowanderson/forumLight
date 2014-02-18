<?php

include 'functions/wrapper.php';
include 'functions/subjectView.php';
include 'functions/subjectModel.php';

headerForum();
$sujets = getSujets();
showSujets($sujets);
footerForum();