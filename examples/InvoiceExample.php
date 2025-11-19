<?php
//Example List of the usage of the Ressource's function Invoice

use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Objects\Invoice;
use Tubconcept\DolibarrApiClient\Objects\Line;
use Tubconcept\DolibarrApiClient\Resources\Invoices;

//this Token and Url are Test Value that has to be replace by your own 
$test=new DolibarrApiClient("http://192.168.1.32:8080/api/index.php/",token:"f12ba33bbdd113cf4e1d5b773779a5b56e716c09");
//initiate the Ressource you want to target in this case Invoices
$request=new Invoices($test);

//Create a Invoice
        $invoice=new Invoice();
        $invoice->setModeReglementId(6);
        $invoice->setCondReglementId(6);
        $invoice->setSocid(6);
        $invoice->setWarehouseId(1);
        $invoice->setRefClient("9722TUB");
        $line=new Line();
        $line->setCommandeId(81);// id Order
        $line->setOriginLineId(19);//Origin line of the Order 
        $line->setOriginId(81);//origin Order
        $line->setOriginType("commande");//type Order
        $line->setFkProduct(1);//id of the product that is save
        $line->setFkCommande(81);// id Order
        $line->setSubprice(48.79);
        $line->setRemisePercent(10); //percentage of reduction
        $line->setTvaTx(20);
        $line->setQty(2);
        
        $line2=new Line();
        $line2->setCommandeId(81);
        $line2->setOriginLineId(20); //Origin line of the Order 
        $line2->setOriginId(81); //origin Order
        $line2->setOriginType("commande"); //type Order
        $line2->setFkCommande(81); // id Order
        $line2->setSubprice(38.79);
        $line2->setLabel("Casque EVOLite® ventilé avec porte-badge - blanc"); //Label when the product is not save in database
        $line2->setTvaTx(20);
        $line2->setQty(1);
        $invoice->setLines([$line->toArrayFiltered(),$line2->toArrayFiltered()]);
       
        $result=$request->create($invoice->toArrayFiltered()); // send back the Id of the Invoices
        var_dump($result);

//Get All The Invoices
        $result=$request->getAll(); //send back a array 
//Get a Invoices By ID
        $invoice=Invoice::fromApiResponse($request->getById(6));
        var_dump($invoice);
//
