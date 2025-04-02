<?php

namespace FDM {

    require $_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php";
    use GuzzleHttp\Client;

    function getFDMPourJoueur(string $idJoueur): array {

        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/fdm',[
            'query' => [
                'idJoueur' => $idJoueur,
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        $feuilles = json_decode($response->getBody(),true)["data"];
        return empty($feuilles) ? [] :$feuilles["matchs"];
    }

    function getFDMsPourMatch(string $idMatch) : array {
        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/fdm',[
            'query' => [
                'idMatch' => $idMatch,
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        $feuilles = json_decode($response->getBody(),true)["data"];
        return empty($feuilles["matchs"]) ? array("feuilles" => []) : $feuilles["matchs"][$idMatch];
    }
}