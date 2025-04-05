<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Stats.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/MatchDeRugby.php";

use function MatchDeRugby\getMatchWithResultat;
use function Stats\getStatsEquipe;

$stats = getStatsEquipe();
$statsJoueurs = $stats["joueurs"];
$statsMatchs = $stats["matchs"];

$matchs = getMatchWithResultat(20);

$title = "Resultats & Statistiques";
$css = ["voir.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/results.php";

include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";