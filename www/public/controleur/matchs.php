<?php

require $_SERVER["DOCUMENT_ROOT"]."/../libs/modele/Token.php";

use function Token\apiReloadToken;
use function Token\apiVerifyToken;
if(!apiVerifyToken()){
    header("Location: /auth.php");
    die();
}
apiReloadToken();

$title = "Tous les matchs";
$css = ["view.css"];
$page = $_SERVER["DOCUMENT_ROOT"]."../libs/vue/matchs.php";
include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";
