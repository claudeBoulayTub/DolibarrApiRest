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
        //the two line below are when you want to make a credit note
        //$invoice->setType(2) =>credit Note
        //$invoice->setFkFactureSource(id of the original invoice)
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
//Create a Invoices from Order
        $result=$request->createFromOrder(81); //return a array of the Invoice created
//Get All The Invoices
        $result=$request->getAll(); //send back a array 
//Get a Invoices By ID
        $invoice=Invoice::fromApiResponse($request->getById(6));
        var_dump($invoice);
//Update a Invoices (!!doesn't apply to the lines)
        $invoice->setRef("9722TUB");
        $invoice->setRefClient("9722Fac");
        $result=$request->update($invoice->getId(),$invoice->toArrayFiltered());//send back the Invoice
        var_dump($result);
//ADD a Line
        $line=new Line();
        $line->setLabel("Test create Line");
        $line->setSubprice(20.89);
        $line->setTvaTx(20);
        $line->setPaHt(15);
        $result=$request->addLine($invoice->getId(),$line->toArrayFiltered());//send back the Id of the Line
        var_dump($result);
//Update a Line
        $line=new Line();
        $line->setLabel("Test create Line update");
        $result=$request->updateLine($invoice->getId(),11,$line->toArrayFiltered()); 
//Delete a Line
        $result=$request->deleteLine($invoice->getId(),11); //send back the Invoice complete
//Mark as credit Available
        $result=$request->markAsCreditAvailable($invoice->getId());//send back the Invoice
//Add a payment
        $payments=[
          'datepaye' => '2025-11-07',
          'paymentid' => 6,               // ID of the payment mode (ex: CB, VIREMENT, CHQ…)
          'closepaidinvoices' => 'yes',   // automatic closing the Invoice
          'accountid' => 1,               // ID of the Bank Account Dolibarr
          'comment' => 'Règlement de la facture FA2511-0001', // (optionnel)

        ];
        $result=$request->addPayments($invoice->getId(),$payments);//send back the id of payment
//get PAyments of a Invoices
        $result=$request->getPayments($invoice->getId());//send back a array with array of payment
        $payment=$result[0];
        var_dump($result);
//validate a Invoice
        $result=$request->validateInvoice($invoice->getId());//return a array of Invoice
//Set to Draft
        $result=$request->setToDraft($invoice->getId(),1); //warehouseId is required when stockis activated return a array of Invoice
//set To paid
        $result=$request->setToPaid($invoice->getId()); //2 more argument can be use but they are are optionnel return a array of Invoice
//set to Unpaid
        $result=$request->setToUnpaid($invoice->getId());//return a array of Invoice
//Add a Contact
        $contacts=["fk_socpeople"=>1,"type_contact"=>"BILLING","source"=>"internet"];//all the variable inside this array are required
        $result=$request->addContacts($invoice->getId(),$contacts);
        //OR
        $result=$request->addContactType($invoice->getId(),1,"BILLING");
//Delete Contact
        $result=$request->deleteContactType($invoice->getId(),1,"BILLING");

//GET BY REF EXT
        $result=Invoice::fromApiResponse($request->getPropertiesByRefExt("9722TUB"));

//Get By Ref
         $result=Invoice::fromApiResponse($request->getPropertiesByRef("9722TUB"));
//Delete Invoice
        $result=$request->delete($invoice->getId()); //Once the Invoice got a payment it became not erasable



        
