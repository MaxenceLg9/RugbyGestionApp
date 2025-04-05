<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/MatchDeRugby.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/FDM.php";
require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Joueur.php";

use function MatchDeRugby\getMatch,Joueur\getJoueursOnMatch;



$type = $_POST["type"] ?? $_GET["type"] ?? null;

if (!in_array($type, ["ajout", "suppression", "modification","vue"])) {
    die("Type de requête non défini.");
}


$idMatch = $_POST["idMatch"] ?? $_GET["idMatch"] ?? null;
if (!is_numeric($idMatch)) {
    die("ID joueur invalide.");
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    $css = ["gerer.css"];
    if($type == "ajout") {
        $title = "Ajouter un match";
        $page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/nouveaumatch.php";
        include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";
    }
    else {
        $match = getMatch($idMatch);
        $joueurs = getJoueursOnMatch($idMatch);
        $joueursNP = $joueurs["disponibles"];
        $jouerLeMatch = $joueurs["feuille"];
        if ($type == "modification") {
            $title = "Modifier un match";
            $page = $_SERVER["DOCUMENT_ROOT"] . "../libs/vue/modifiermatch.php";
            include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/page.php";
        } elseif ($type == "vue") {
            $css = ["feuille.css"];
            $title = "Consulter un match";
            $page = $_SERVER["DOCUMENT_ROOT"] . "../libs/vue/vuematch.php";
            include_once $_SERVER["DOCUMENT_ROOT"] . "../libs/components/page.php";
        }
    }
}