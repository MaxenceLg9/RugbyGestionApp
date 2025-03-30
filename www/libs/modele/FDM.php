<?php

namespace FDM {

    require $_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php";
    use GuzzleHttp\Client;

    function getFDMPourJoueur(string $idJoueur): array {

        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
        ]);

        $response = $client->get('/fdm.php',[
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
}