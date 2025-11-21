<?php
//this Token and Url are Test Value that has to be replace by your own 

use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Objects\Line;
use Tubconcept\DolibarrApiClient\Objects\SupplierOrder;
use Tubconcept\DolibarrApiClient\Resources\SupplierOrders;

        $test=new DolibarrApiClient("http://192.168.1.32:8080/api/index.php/",token:"f12ba33bbdd113cf4e1d5b773779a5b56e716c09");
        //initiate the Ressource you want to target in this case SupplierOrders
        $request=new SupplierOrders($test); //or use $test->suplier_orders
// Create a Supplier Order
        $supplier_order=new SupplierOrder();
        $supplier_order->setSocId(8); //Id of the supplier company
        $supplier_order->setLinkedObjectsIds(["commande"=>["81"]]); //Link to the Orders if you don't have in stock and must order the product at your supplier for a Client Order
        $supplier_order->setRef("9787P1");
        $supplier_order->setModeReglementId(3);
        $supplier_order->setCondReglementId(3);
        $supplier_order->setRefSupplier("9787P1");
        $line1=new Line();
        $line1->setFkProduct(1);
        $line1->setQty(2);
        $line1->setTvaTx(20);
        $line1->setProductType(0);//required
        $line1->setSubprice(12.28);
        
        $supplier_order->setLines([$line1->toArrayFiltered()]);
        $result=$request->create($supplier_order->toArrayFiltered());//return the Id of the new SupplierOrder
        var_dump($result);

//Get All the SupplierOrder
        $result=$request->getAll();
        $CollectionSupplierOrder=[];
        foreach ($result as $SupplierOrder){
            $CollectionSupplierOrder[]=SupplierOrder::fromApiResponse($SupplierOrder);
        }
        var_dump($CollectionSupplierOrder);
//Get by ID the Supplier Order
        $supplier_order=SupplierOrder::fromApiResponse($request->getById($CollectionSupplierOrder[-1]->getId()));
        var_dump($supplier_order);
//Update The SupplierOrder
        $supplier_order->setRefExt("DEV_67");
        $result=$request->update($supplier_order->getId(),$supplier_order->toArrayFiltered()); //return a array
        var_dump($result);

//Validate Orders
        $result=$request->ValidateOrders($supplier_order->getId(),1); //return a array SupplierOrders
        var_dump($result);
//Approve Order
        //Only work if the Order is in Validate State else send success but stays in draft
        $result=$request->approve($supplier_order->getId(),1);
        var_dump($result);
        /*return
        (array) [1 element]
            success: 
            (array) [2 elements]
            code: (integer) 200 
            message: (string) "Order approved (Ref=PO2511-0002)"
        */
//Add a Contact to Order
        $result=$request->AddContact($supplier_order->getId(),1,"BILLING","external");
        var_dump($result);
//get Contacts of Orders
        $result=$request->getContacts($supplier_order->getId(),"external");//return a list of Contact
        //you can use the object Contact if you wish to manipulate a contact more easily
        var_dump($result);
//SEND the Order to the supplier (consider order submit)
        $result=$request->SendOrderToVendor($supplier_order->getId(),strtotime(date("Y-m-d")),1);
        var_dump($result);

//Receive The Order
        $line=Line::fromApiResponse($supplier_order->getLines()[0]);
        //the Line structure can not be use for this one because of unique variable that have a different name like warehouse in the place of warehouseId
        $line=["id"=>$line->getId(),"fk_product"=>$line->getFkProduct(),"qty"=>$line->getQty(),"warehouse"=>1,"price"=>$line->getMulticurrencyTotalHt(),"notrigger"=>0];
        $result=$request->ReceiveOrders($supplier_order->getId(),"Test Reception",[$line]);
        var_dump($result);
//Delete The Order
        $result=$request->delete($supplier_order->getId());
        var_dump($result);
