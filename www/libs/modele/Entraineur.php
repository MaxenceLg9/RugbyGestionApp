<?php

namespace Entraineur {

    require '/php/vendor/autoload.php';
    use GuzzleHttp\Client;
    function getData(string $idEntraineur): array {

        $client = new Client([
            'base_uri' => 'http://rugbygestion.api',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/joueurs.php');
        return json_decode($response->getBody(),true);
    }
}