<?php
//Example List of the usage of the Ressource's function Shipment

use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Objects\Line;
use Tubconcept\DolibarrApiClient\Objects\Shipment;
use Tubconcept\DolibarrApiClient\Resources\Shipments;

//this Token and Url are Test Value that has to be replace by your own 
$test=new DolibarrApiClient("http://192.168.1.32:8080/api/index.php/",token:"f12ba33bbdd113cf4e1d5b773779a5b56e716c09");
$ship=new Shipments($test);
//Create a Shipment (for information a more easy function is present in Order for that)
        
        $shipment=new Shipment();
        $shipment->setCommandeId(81);// id of the order
        $shipment->setEntrepotId(1);//id of wareHouse
        $shipment->setOriginId(81); // id of the order if you want to link the shipments to it
        $shipment->setOriginType("commande"); // type of the origin
        $shipment->setSocid(6);//id of the thirdparty that will receives it
        $shipment->setTrackingNumber("XHOJLKMPKL");
        $shipment->setWeight(5.5);
        $line=new Line();
        $line->setFkCommande(81);// id de la commande 
        $line->setQty(1);
        //obligatoire
        $line->setOriginLineId(19);//required id of the line to took from for the shipment
        $line->getQtyShipped(1);
        $line->setWeight(5.5);
        $line->setPaHt(12.28); //Cost price not necessary
        $shipment->setLines([$line->toArrayFiltered()]); //you can add as many line you want in the array 

        $result=$ship->create($shipment->toArrayFiltered());//send back the id of the shipment use ArrayFiltered and not just ToArray here
//getALL SHipment
        //if you want to precise more specific parameter by default only sorOrder et limit are send with the same values as here
        $params=["sortOrder"=>"ASC","limit"=>100,"pagination_data"=>true,"page"=>0];
        //the request send a array avec a array data containing the shipments et a array pagination if you don't activate pagination_data
        //you will only get 1 array with all  the shipments 
        $result=$ship->getAll($params);
        var_dump($result);
//get by Id a shipment
        $shipment=Shipment::fromApiResponse($ship->getById(15));
        var_dump($shipment);//return shipment as a Object (This value his use back in all the next example to not have to rewrite it each time)
//Update Shipment
        //Can not modify the Lines and no function exist for that for now
        $shipment->setWeight(2.72);
        $shipment->setWeightUnits(0);
        $result=$ship->update($shipment->getId(),$shipment->toArrayFiltered());
//Validate Shipment
        $result=$ship->validateShipment($shipment->getId()); //return the shipment
        var_dump($result);
//Close Shipment
        $result=$ship->closeShipment($shipment->getId()); //return the shipment
//delete a Line of the Shipment
        //only if shipment in draft not validate
        $line=Line::fromApiResponse($shipment->getLines()[0]);//transform the first line in object
        $result=$ship->deleteLine($shipment->getId(),$line->getId());//send the id of shipment and line to delete her
        //send back a array with Success if the opération was a success if not a error
//delete a Shipments
        $result=$ship->delete($shipment->getId());
