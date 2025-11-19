<?php
use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Resources\Orders;
use Tubconcept\DolibarrApiClient\Objects\Order;
use Tubconcept\DolibarrApiClient\Objects\Line;

$test=new DolibarrApiClient("http://192.168.1.32:8080/api/index.php/",token:"f12ba33bbdd113cf4e1d5b773779a5b56e716c09");
//set the REssource to use
$order=new Orders($test);
//Création d'une commande
        $object=new Order();
        $object->setSocid(6);
        $object->setRef("9722TUB");
        $object->setOriginType("internet");
        $object->setDate(date("Y-m-d"));
        $object->setModeReglementId(1);
        $object->setCondReglementId(1);
        $object->setStatus("0"); //0:Draft 1:Validate 2:Shipped crash if the line are not void and the status is different from 0 so validate after creating the order
        $line1=new Line();
        $line1->setFkProduct(1);//foreign key of a existing product
        $line1->setSubprice(48.79); //optionnel mais mets le prix à 0 si non envoyée
        $line1->setQty(2);
        $line1->setTvaTx(20);
        
        $line2=new Line();
        //required when no foreign key of existing product
        $line2->setSubprice(38.79);
        $line2->setQty(1);
        $line2->setTvaTx(20);
        $line2->setLabel("Casque EVOLite® ventilé avec porte-badge - blanc");
        //not required but better if there if you want additionnal information to identified product
        $line2->setDesc("Le EVOLite® est un produit révolutionnaire qui permet aux agents de santé et de sécurité d'atteindre de nouveaux niveaux de conformité grâce à son confort inégalé. Il est léger. extrêmement confortable et s'adapte à la plus large gamme de formes et de tailles de tête. Le harnais et la coque sont véritablement intégrés pour offrir les meilleures performances en le gardant fermement ancré sur la tête. même lorsqu'il est complètement inversé. Offre une sécurité et une protection accrues lors de travaux en hauteur. par vent fort ou en cas d'activité intense. comme lors de l'entretien des autoroutes.Pesant moins de 300 g (selon le modèle). l'EVOLite® est le casque de sécurité le plus léger en vente au Royaume-Uni.Un système de harnais à berceau textile à 6 points offre un confort inégalé.Bandeau anti-transpiration en coton avec revêtement PU poreux pour une absorption maximale. PH neutre. testé dermatologiquement.Fentes universelles permettant un ajustement ferme d'une gamme de visières de sécurité et de protège-oreilles Surefit™. Également compatible avec la gamme de produits EVOGuard®.MADE IN EUROPE&nbsp;<br>\n(Pays d'origine: France)");
        $line2->setRef("PX-63079632");
        $line2->setPaHt(21.78); //Cost price of your product when you buy it bbefore selling it
        //set the lines 
        $object->setLines([$line1->toArrayFiltered(),$line2->toArrayFiltered()]);
        //send the request to create the order send back id or error
        $newOrder=$order->create($object->toArray());
        //var_dump the id of you new order
        var_dump($newOrder);
//get ALL ORDERS
        $OrdersCollection=[];
        $responseArray=$order->getAll();
        //if you want to treat with a array of object
        foreach($responseArray as $responseApi){
            $OrdersCollection[]=Order::fromApiResponse($responseApi);
        }
        var_dump( $OrdersCollection);
//get Orders by ID
        $order=new Orders($test);
        $cmd=Order::fromApiResponse($order->getById(81));//You can pass in second parameters at getByID (by default at 0) contact_list 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
        var_dump($cmd);
//get Orders by Ref
        $order=new Orders($test);
        $cmd=Order::fromApiResponse($order->getOrdersByRef("9722TUB"));
        var_dump($cmd);
//getOrders by Ref externe
        $order=new Orders($test);
        $cmd=Order::fromApiResponse($order->getOrdersByRefExt("9722EXT"));
        var_dump($cmd);
//validate Orders (all command created are in the first place in Draft Status) 
        $result=$order->validateOrder($cmd->getId()); //return the Order so if you want to use it place a Order::fromApiResponse() around the request
        $orderValidate=Order::fromApiResponse($result);
//set a Orders to draft
        $result=$order->setToDraft($cmd->getId(),1); //id of warehouse required when stock is actif send back the Order
//Update Orders
        //create a new object with the value you want to change 
        $updataData=new Order();
        $updataData->setDeliveryDate(date("Y-m-d"));
        //then send the request with the id of the Order you want update and ONLY the data not void/null in your new object (use ->toArrayFiltered())
        $result=$order->update($cmd->getId(),$updataData->toArrayFiltered());//THA DOESN'T APPLY ANY CHANGES TO THE LINES this would be the next function
//Update a Line of a Order
        //!!CAREFUL THIS FUNCTION CAN ONLY BE USE IF THE ORDER IS IN DRAFT STATE  OR SHE SEND BACK 0 (fail)!!!!
        $line=Line::fromApiResponse($cmd->getLines()[0]);//you can update only 1 line at a times so choose or make a foreach if you want to apply it to all
        /*you can also get the Lines of a ORDERS with 
            $order->getLinesOfOrder($cmd->getId())
            but if you have the id of order you probably already have a object order with the line
        */
        $line->setRemise(3.88);
        $line->setRemisePercent(10);
        $line->setTvaTx(10);
        //send the request and send you back the Orders or 0 if failed
        $result=$order->updateLineOfOrder($cmd->getId(),$line->getId(),$line->toArrayFiltered());
        var_dump($result);
//ADD a Line of Order
        //!!CAREFUL THIS FUNCTION CAN ONLY BE USE IF THE ORDER IS IN DRAFT STATE  OR SHE SEND a exception
        $line=new Line();
        $line->setFkProduct(1);
        $line->setQty(1);
        $line->setTvaTx(20);

        $result=$order->addLineToOrder($cmd->getId(),$line->toArrayFiltered()); //send back the id of Line
// DELETE a LINE of ORDER
        //!!CAREFUL THIS FUNCTION CAN ONLY BE USE IF THE ORDER IS IN DRAFT STATE  OR SHE SEND a exception
        $result=$order->deleteLineOfOrder($cmd->getId(),21);//send back the order

//Get the contact of a Order
        $contact=$order->getContactsOfOrders($cmd->getId());//the contact can be in the order object if you let contact_list at 0 in the function that get them but not with the getALL
        var_dump($contact);
//ADD a Contact to the Order
        $contact=$order->addContact($cmd->getId(),1,"BILLING"); //You only have 3 type of contact that you can see in the phpDoc of the function
        var_dump($contact);
        /*Return=>
        (array) [1 element]
            success: 
            (array) [2 elements]
                code: (integer) 200 
                message: (string) "Contact linked to the order"
        */
//get The properties (values) of a specific Line

        $line=Line::fromApiResponse($cmd->getLines()[0]);
        //the request send back a line in form of a array can be converted on object with the static method FromApiResponse
        $result=Line::fromApiResponse($order->getPropertiesOfLineOfOrder($cmd->getId(),$line->getId()));
//close a Order
        $result=$order->close($cmd->getId()); //you can configure if you want trigger or not with the value of notrigger=0 or 1 as a second parameters
//reopen a Order
        $result=$order->reopen($cmd->getId()); // send back Null

//set a Orders as Billed
        $result=$order->SetBilled($cmd->getId());// send back the order

//Create Shipments
        $result=$order->createShipmentForOrder($cmd->getId(),1); //send back the id of the shipment
//GET Shipments for a order
        $result=$order->getShipmentsOfOrder($cmd->getId()); //send back shipments

//Create a Orders From Proposals
        $result=$order->createFromProposal(1); //of course the more the proposal is full of data the more the order will have them
        $order=Order::fromApiResponse($result);
//