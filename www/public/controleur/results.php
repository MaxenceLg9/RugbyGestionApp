<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";

use function Token\apiReloadToken;
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}
apiReloadToken();

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Stats.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/MatchDeRugby.php";

use function MatchDeRugby\getMatchByType;
use function Stats\getStatsEquipe;

$stats = getStatsEquipe();
$statsIndiv = $stats["joueurs"];
$statsMatchs = $stats["matchs"];
$statsJoueurs = $stats["stats"];

$matchsResultats = getMatchByType(20)["resultats"];

$title = "Resultats & Statistiques";
$css = ["voir.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/results.php";

include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";