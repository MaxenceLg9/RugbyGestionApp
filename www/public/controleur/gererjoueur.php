<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Joueur.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/FDM.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Stats.php";

use function Joueur\getJoueur, FDM\getFDMPourJoueur;
use function Stats\getStatsJoueurs;

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
        if ($type === "modification") {
            $joueur = (getJoueur($idJoueur));
            $title = "Modifier un joueur";
            $page = $_SERVER["DOCUMENT_ROOT"] . "../libs/vue/modifierjoueur.php";
            $joueur["dateNaissance"] = date("Y-m-d", strtotime($joueur["dateNaissance"]));
            include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/page.php";
        } else if ($type == "vue"){
            $joueur = (getStatsJoueurs($idJoueur));
            $css = ["voir.css"];
            $matchs = getFDMPourJoueur($idJoueur);
            $title = "Consulter un joueur";
            $page = $_SERVER["DOCUMENT_ROOT"] . "../libs/vue/vuejoueur.php";
            include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/page.php";
        }
    }
}