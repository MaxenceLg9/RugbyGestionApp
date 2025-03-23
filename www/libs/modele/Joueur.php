<?php

namespace Joueur {

    require $_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php";
    use GuzzleHttp\Client;
    function getData(string $idJoueur): array {

        $client = new Client([
            'base_uri' => 'http://rugbygestion.api',
            'timeout'  => 2.0,
        ]);

        $response = $client->get('/joueurs.php',[
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