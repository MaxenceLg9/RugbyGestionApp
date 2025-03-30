<?php

namespace Enum {

    require $_SERVER["DOCUMENT_ROOT"]."/../vendor/autoload.php";
    use GuzzleHttp\Client;


    function getPostes():array{

        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/enums.php',[
            'query' => [
                'value' => "postes",
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        return json_decode($response->getBody(),true)["data"];
    }

    function getResultats():array{
        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/enums.php',[
            'query' => [
                'value' => "resultats",
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        return json_decode($response->getBody(),true)["data"];
    }

    function getStatuts():array{
        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/enums.php',[
            'query' => [
                'value' => "statuts",
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        return json_decode($response->getBody(),true)["data"];
    }

    function getLieux():array{
        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
            'verify' => false
        ]);

        $response = $client->get('/enums.php',[
            'query' => [
                'value' => "lieux",
            ],
            'headers' => [
                'Authorization' => $_COOKIE["token"] ?? "",
                'Accept' => 'application/json',
            ]
        ]);
        return json_decode($response->getBody(),true)["data"];
    }

}