<?php

use libs\modele\MatchDeRugby;
//
//require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Session.php";
//checkSession();
//
//
//$post['nom'] = $_SESSION['nom'];
//
//require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/MatchDeRugby.php";
//$matches = MatchDeRugby::getMatchDeRugbyWithResultat();



$title = "Accueil";
$css = ["style.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/index.php";
include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";