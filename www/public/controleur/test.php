<?php

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Joueur.php";

use function Joueur\getData;


$joueur = (getData(2));

//header("Content-Type: application/json");
//echo json_encode($joueur);
//die();

$stats['totalMatches'] = 0;
$stats['matchesWon'] = 0;
$winPercentage = 0;
$stats['avgNote'] = 0;


$title = "Joueur";
$css = ["style.css","gerer.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/vuejoueur.php";
include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";