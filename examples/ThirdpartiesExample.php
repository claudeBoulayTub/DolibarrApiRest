<?php
use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Objects\ThirdParty;
use Tubconcept\DolibarrApiClient\Resources\ThirdParties;
//créer un client test via l'api dolibarr
$test=new DolibarrApiClient("http://192.168.1.32:8080/api/index.php/",token:"f12ba33bbdd113cf4e1d5b773779a5b56e716c09");
//instanciation de la ressource tiers ThirdParties
$ThirdParties=new ThirdParties($test);
//création d'une ressource tiers
    //création d'un nouvel objet tiers
    $client=new ThirdParty();
    $client->setAddress("2 rue des lilas");
    $client->setZip("59000");
    $client->setTown("Lille");
    $client->setCountryCode("FR");
    $client->setName("Client Test API");
    $client->setPhone("0320456789");
    $client->setEmail("test@api.fr");
    $client->setClient(1);
    $client->setStatus("1");//permet d'avoir le client Ouvert
    $newclientID=$ThirdParties->create($client->toArray());
    var_dump($newclientID);//retournera l'id de la ressource crée

//récupération de tous les tiers
    $tiers=$ThirdParties->getAll(); //récupère tous les tiers dans un array sous forme d'array associatif
    $tiersCollection=[]; //initialisation d'un tableau pour stocker les objets tiers
    foreach($tiers as $tier){
        $tierObject=ThirdParty::fromApiResponse($tier); //création d'un objet ThirdParty à partir des données récupérées
        $tiersCollection[]=$tierObject; //ajout de l'objet au tableau de collection
    }
    var_dump($tiersCollection); //affichage de la collection d'objets tiers

//récupération d'un tiers par son ID

    $newclient=$ThirdParties->getById($newclientID); //récupère le tiers via son ID
    $clientObjet=ThirdParty::fromApiResponse($newclient); //création d'un objet ThirdParty à partir des données récupérées
    var_dump($clientObjet); //affiche l'objet tiers récupéré

//mise à jour d'un tiers
    $clientObjet->setAddress("10 rue des roses"); //modification de l'adresse
    $updateclient=$ThirdParties->update($newclientID,$clientObjet->toArray()); //mise à jour du tiers via l'API
    var_dump($updateclient); //affichage de la réponse de la mise à jour

//suppression d'un tiers
    $deleteResponse=$ThirdParties->delete($newclientID); //suppression du tiers via l'API
    var_dump($deleteResponse); //affichage de la réponse de la suppression :array(1) { ["success"]=> array(2) { ["code"]=> int(200) ["message"]=> string(14) "Object deleted" } }


