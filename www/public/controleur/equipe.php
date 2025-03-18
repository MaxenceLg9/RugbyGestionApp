<?php

require '/php/vendor/autoload.php';

use libs\modele\Joueur;

use GuzzleHttp\Client;


require_once "../modele/Session.php";
checkSession();

require "../modele/Joueur.php";

$joueurs = Joueur::findAll();

$title = "Mon équipe";
$css = ["style.css","view.css"];
$page = "../vue/joueurs.php";
include_once $_SERVER["DOCUMENT_ROOT"]."../libs/components/page.php";