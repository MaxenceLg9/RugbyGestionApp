<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}

$title = "Accueil";
$css = ["index.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/index.php";
include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";