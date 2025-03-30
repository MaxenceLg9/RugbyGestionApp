<?php

namespace MatchDeRugby {

    require $_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php";
    use GuzzleHttp\Client;

    function getMatch(string $idMatch): array {

        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/matchs',[
            'query' => [
                'idMatch' => $idMatch,
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        return json_decode($response->getBody(),true)["data"][0];
    }
}