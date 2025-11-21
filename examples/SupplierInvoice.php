<?php
//this Token and Url are Test Value that has to be replace by your own 

use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Objects\Line;
use Tubconcept\DolibarrApiClient\Objects\SupplierInvoice;
use Tubconcept\DolibarrApiClient\Resources\SupplierInvoices;

        $test=new DolibarrApiClient("http://192.168.1.32:8080/api/index.php/",token:"f12ba33bbdd113cf4e1d5b773779a5b56e716c09");
//initiate the Ressource you want to target in this case SupplierInvoices
        $request=new SupplierInvoices($test);
        //or
        $request=$test->supplier_invoices;
//Create a Supplier Invoices
        $supplier_invoice=new SupplierInvoice();
        $supplier_invoice->setSocId(8);//company Id of the supplier
        $supplier_invoice->setLinkedObjectsIds(["order_supplier"=>["1"]]); // link to the supplier Order with a id of 1 here
        $supplier_invoice->setRef("6975P1FAC"); // ne fonctionne pas lors de la création mais bien à l'update
        $supplier_invoice->setModeReglementId(6);
        $supplier_invoice->setCondReglementId(6);
        $line1=new Line();
        $line1->setFkProduct(1);
        $line1->setQty(1);
        $line1->setSubprice(12.78);
        $line1->setTvaTx(20);
        $supplier_invoice->setLines([$line1->toArrayFiltered()]);
        $result=$request->create($supplier_invoice->toArrayFiltered());
        var_dump($result);
//getAll Supplier Invoices
        $result=$request->getAll();
        $CollectionSupplierInvoice=[];
        foreach ($result as $SupplierInvoice){
            $CollectionSupplierInvoice[]=SupplierInvoice::fromApiResponse($SupplierInvoice);
        }
        var_dump($CollectionSupplierInvoice);
//get By Id a Supplier invoice
        $supplier_invoice=SupplierInvoice::fromApiResponse($request->getById($CollectionSupplierInvoice[-1]->getId()));
        //this variable is gonna be re-use to avoid calling each time to get a object of $supplier_invoice existing
        var_dump($supplier_invoice);
//get Lines of A supplier Invoices by the Id of the invoice
        $result=$request->getLinesOfInvoice($supplier_invoice->getId());
        var_dump($result);
//Update a Supplier Invoices (NOT THE LINES INSIDE IT)
        $supplier_invoice->setRef("6975P1FAC");
        $result=$request->update($supplier_invoice->getId(),$supplier_invoice->toArrayFiltered());
//Validate the Invoice
        $result=$request->validate($supplier_invoice->getId(),1);
        var_dump($result);
//Set back to draft the Invoice
        $result=$request->setToDraft($supplier_invoice->getId(),1);
        var_dump($result);
//Add a line
        $newline=new Line();
        $newline->setLibelle("P1-679773 The world best virus");
        $newline->setDesc("This is a dev test");
        $newline->setSubprice(45.90);
        $newline->setTvaTx(20);
        $newline->setRef("P1-679773");
        $newline->setQty(1);

        $idLine=$request->addLine($supplier_invoice->getId(),$newline->toArrayFiltered());
        $newline->setId($idLine);
        var_dump($idLine); //return a id

//update a Line
        $newline->setLibelle("P1-679773 The world best Updated");
        $newline->setDesc("This is a dev test for update");
        $newline->setQty(5);
        $result=Line::fromApiResponse($request->updateLine($supplier_invoice->getId(),$newline->getId(),$newline->toArrayFiltered()));
        var_dump($result);
//delete a Line
        $result=$request->deleteLine($supplier_invoice->getId(),$newline->getId());
        var_dump($result);
        /*(array) [1 element]
            success: 
            (array) [2 elements]
                code: (integer) 200 
                message: (string) "line 5 deleted"
        */
//Get the Payments
        $result=$request->getPayments($supplier_invoice->getId());
        var_dump($result);
//Add a Payments
        $result=$request->addPayment($supplier_invoice->getId(),strtotime(date("Y-m-d")),6,"yes",1,"Pay89037-023837");
        var_dump($result);
//delete a supplier Invoices
        $result=$request->delete($supplier_invoice->getId());
        var_dump($result);/*(array) [1 element]
                success: 
                (array) [2 elements]
                    code: (integer) 200 
                    message: (string) "Supplier invoice deleted"
        */