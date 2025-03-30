<?php

namespace Entraineur {

    require '/php/vendor/autoload.php';
    use GuzzleHttp\Client;
    function getEntraineur(string $idEntraineur): array {

        $client = new Client([
            'base_uri' => 'https://rugbygestionapi.alwaysdata.net/',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/joueurs.php');
        return json_decode($response->getBody(),true);
    }
}