<?php
require __DIR__ . '/../vendor/autoload.php';

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

// Utiliser token permanent
$client = new DolibarrApiClient('http://192.168.1.32:8080/api/index.php', null, null, 'TON_TOKEN_PERMANENT');

// Ou utiliser login/password pour token temporaire
// $client = new DolibarrApiClient('http://192.168.1.32:8080/api/index.php', 'tubconcept', 'MotDePasseAPI');

$client->login();

// Exemple GET : récupérer les tiers
$tiers = $client->get('thirdparties');
print_r($tiers);

// Exemple POST : créer un tiers
/*
$newTiers = [
    "name" => "TestCompany",
    "email" => "test@company.com"
];
$response = $client->post('thirdparties', $newTiers);
print_r($response);
*/

