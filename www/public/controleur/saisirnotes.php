<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";

use function Token\apiReloadToken;
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}
apiReloadToken();

require_once $_SERVER["DOCUMENT_ROOT"] . "../libs/modele/FDM.php";

$css = ["notes.css"];
$joueurs = FDM\getFDMsPourMatch($_GET["idMatch"])["feuilles"];
$title = "Ajouter des notes";
$page = $_SERVER["DOCUMENT_ROOT"].'../libs/vue/saisirnotes.php';
include_once $_SERVER["DOCUMENT_ROOT"].'../libs/components/page.php';
die();