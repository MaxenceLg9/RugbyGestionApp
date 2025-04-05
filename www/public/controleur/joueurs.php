<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}

$title = "Mon équipe";
$css = ["view.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."/../libs/vue/joueurs.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/../libs/components/page.php";