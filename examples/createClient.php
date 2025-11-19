<?php
require __DIR__ . '/../vendor/autoload.php';

use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Resources\Status;

// Utiliser token permanent
$client = new DolibarrApiClient('http://192.168.1.32:8080/api/index.php', null, null, 'TON_TOKEN_PERMANENT');

// Ou utiliser login/password pour token temporaire
// $client = new DolibarrApiClient('http://192.168.1.32:8080/api/index.php', 'tubconcept', 'MotDePasseAPI');

    $request=new Status($client);

// Exemple GET : récupérer le Statuts
$status = $request->get();
print_r($tiers);




