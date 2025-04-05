<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";
use function Token\apiVerifyToken;
if(apiVerifyToken()){
    header("Location: /index.php");
    die();
}

$title = "Login";
$css = ["auth.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/auth.php";
include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";