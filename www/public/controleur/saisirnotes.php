<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "../libs/modele/FDM.php";

$css = ["feuille.css"];
$joueurs = FDM\getFDMsPourMatch($_GET["idMatch"])["feuilles"];
$title = "Ajouter des notes";
$page = $_SERVER["DOCUMENT_ROOT"].'../libs/vue/saisirnotes.php';
include_once $_SERVER["DOCUMENT_ROOT"].'../libs/components/page.php';
die();