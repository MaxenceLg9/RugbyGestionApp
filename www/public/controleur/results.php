<?php

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Stats.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/MatchDeRugby.php";

use function MatchDeRugby\getMatchWithResultat;
use function Stats\getStatsEquipe;

$stats = getStatsEquipe();
$statsJoueurs = $stats["joueurs"];
$statsMatchs = $stats["matchs"];
$stats["stats"];

$matchs = getMatchWithResultat(20);

$title = "Resultats & Statistiques";
$css = ["style.css","view.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/results.php";

include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";