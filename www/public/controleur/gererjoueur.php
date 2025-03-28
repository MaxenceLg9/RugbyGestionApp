<?php

//apiVerifyToken

$type = $_POST["type"] ?? $_GET["type"] ?? null;

if (!in_array($type, ["ajout", "suppression", "modification", "vue"])) {
    header("Location: /equipe.php");
    die("Type de requête non défini.");
}


$idJoueur = $_POST["idJoueur"] ?? $_GET["idJoueur"] ?? null;
if (!is_numeric($idJoueur)) {
    header("Location: /equipe.php");
    die("ID joueur invalide.");
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $css = ["gerer.css"];
    if ($type === "ajout") {
        $title = "Ajouter un joueur";
        $page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/nouveaujoueur.php";
        include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";
    } elseif ($type === "modification") {
        $title = "Modifier un joueur";
        $page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/modifierjoueur.php";
        include_once$_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";
    }elseif ($type == "vue"){
        require_once$_SERVER["DOCUMENT_ROOT"]."../libs/modele/JouerUnMatch.php";
        $title = "Consulter un joueur";
        $page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/vuejoueur.php";
        include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";
    }
}