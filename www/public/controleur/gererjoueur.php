<?php

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Joueur.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/FDM.php";

use function Joueur\getJoueur, FDM\getFDMPourJoueur;

$type = $_POST["type"] ?? $_GET["type"] ?? null;

if (!in_array($type, ["ajout", "suppression", "modification", "vue"])) {
    header("Location: /joueurs.php");
    die("Type de requête non défini.");
}


$idJoueur = $_GET["idJoueur"] ?? null;
if (!is_numeric($idJoueur)) {
    header("Location: /joueurs.php");
    die("ID joueur invalide.");
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $css = ["gerer.css"];
    if ($type === "ajout") {
        $title = "Ajouter un joueur";
        $page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/nouveaujoueur.php";
        include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";
    } else {
        $joueur = (getJoueur($idJoueur));
        if ($type === "modification") {
            $title = "Modifier un joueur";
            $page = $_SERVER["DOCUMENT_ROOT"] . "../libs/vue/modifierjoueur.php";
            $joueur["dateNaissance"] = date("Y-m-d", strtotime($joueur["dateNaissance"]));
            include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/page.php";
        } else if ($type == "vue"){
            $css = ["voir.css"];
            $stats['totalMatches'] = 5;
            $stats['matchesWon']= 0;
            $stats["winPercentage"] = 0;
            $stats['avgNote'] = 0;
            $matchs = getFDMPourJoueur($idJoueur);
            $title = "Consulter un joueur";
            $page = $_SERVER["DOCUMENT_ROOT"] . "../libs/vue/vuejoueur.php";
            include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/page.php";
        }
    }
}