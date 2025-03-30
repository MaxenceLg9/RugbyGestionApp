<?php

namespace Joueur {

    require $_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php";
    use GuzzleHttp\Client;
    function getJoueur(string $idJoueur): array {

        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/joueurs',[
            'query' => [
                'idJoueur' => $idJoueur,
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        return json_decode($response->getBody(),true)["data"][0];
    }
}