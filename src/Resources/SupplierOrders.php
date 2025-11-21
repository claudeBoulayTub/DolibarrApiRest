<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class SupplierOrders{

    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * [Description for getAll]
     *
     * @param string $sortfield="t.rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page
     * @param string|null $thirdparty_ids
     * @param string|null $product_ids
     * @param string|null $status
     * @param string|null $sqlfilters
     * @param string|null $sqlfilterlines
     * @param string|null $properties
     * @param bool|null $pagination_data
     * 
     * @return array
     * 
     */
    public function getAll(string $sortfield="t.rowid",string $sortorder="ASC",int $limit=100,?int $page=null,
    ?string $thirdparty_ids=null,?string $product_ids=null,?string $status=null,?string $sqlfilters=null,
    ?string $sqlfilterlines=null,?string $properties=null,?bool $pagination_data=null):array{
        $body=[];
        $body["sortfield"]=$sortfield;
        $body["sortorder"]=$sortorder;
        $body["limit"]=$limit;
        $page!=null?$body["page"]=$page:"";
        $thirdparty_ids!=null?$body["thirdparty_ids"]=$thirdparty_ids:"";
        $product_ids!=null?$body["product_ids"]=$product_ids:"";
        $status!=null?$body["status"]=$status:"";
        $sqlfilters!=null?$body["sqlfilters"]=$sqlfilters:"";
        $sqlfilterlines!=null?$body["sqlfilterlines"]=$sqlfilterlines:"";
        $properties?$body["properties"]=$properties:"";
        $pagination_data?$body["pagination_data"]=$pagination_data:"";
        return  $this->client->get("supplierorders",$body);
        
    }

    /**
     * [Description for getById]
     *
     * @param int $id
     * 
     * @return array
     * 
     */
    public function getById(int $id):array{
        return $this->client->get("supplierorders/{$id}");
    }

    /**
     * [Description for create]
     *
     * @param array $request_data
     * 
     * @return array
     * @example: {"ref": "auto", "ref_supplier": "1234", "socid": "1", "multicurrency_code": "SEK", "multicurrency_tx": 1, "tva_tx": 25, "note": "Imported via the REST API"}
     */
    public function create(array $request_data):array{
        return $this->client->post("supplierorders",$request_data);
    }

    /**
     * [Description for delete]
     *
     * @param int $id
     * 
     * @return array|string
     * 
     */
    public function delete(int $id):array|string{
        return $this->client->delete("supplierorders/{$id}");
    }

    /**
     * [Description for update]
     *
     * @param int $id
     * @param array $request_data
     * 
     * @return array
     * 
     */
    public function update(int $id,array $request_data):array{
        return $this->client->put("supplierorders/{$id}",$request_data);
    }

    /**
     * [Description for approve]
     *
     * @param int $id
     * @param int|null $idwarehouse=null
     * @param int|null $secondlevel=null
     * 
     * @return array|int|string
     * 
     */
    public function approve(int $id,?int $idwarehouse=null, ?int $secondlevel=null):array|int|string{
        $body=[];
        if($idwarehouse!=null){
            $body["idwarehouse"]=$idwarehouse;
        }
        if($secondlevel=null){
            $body["secondlevel"]=$secondlevel;
        }
        return $this->client->post("supplierorders/{$id}/approve",$body);

    }


    /**
     * [Description for addContact]
     *
     * @param int $id
     * @param int $contactId
     * @param string $type can be (BILLING, SHIPPING, CUSTOMER, SALESREPFOLL, ...)
     * @param string $source (external or internal)
     * 
     * @return int|array
     * 
     */
    public function addContact(int $id,int $contactId,string $type,string $source):int|array{
        return $this->client->post("supplierorders/{$id}/contact/{$contactId}/{$type}/{$source}");
    }

    /**
     * [Description for getContacts]
     *
     * @param int $id
     * @param string $source="all" can be external|internal|all
     * @param string|null $type=null can be BILLING, SHIPPING, CUSTOMER, SALESREPFOLL, ...
     * 
     * @return array
     * 
     */
    public function getContacts(int $id,string $source="all",?string $type=null):array{
        $body=[];
        $body[]=$source;
        if($type!=null){
            $body["type"]=$type;
        }
        return $this->client->get("supplierorders/{$id}/contacts",$body);
    }

    /**
     * [Description for SendOrderToVendor]
     *
     * @param int $id
     * @param int $date as a unix timestamp in sec
     * @param int $method
     * @param string|null $comment=null
     * 
     * @return array
     * 
     */
    public function SendOrderToVendor(int $id,int $date,int $method,?string $comment=null):array{
        $body=[];
        $body["date"]=$date;
        $body["method"]=$method;
        if($comment!=null){
            $body["comment"]=$comment;
        }
        return $this->client->post("supplierorders/{$id}/makeorder",$body);
    }

    /**
     * [Description for ReceiveOrders]
     *
     * @param int $id
     * @param int $closeopenorder=0 Close Order if everything is reeived
     * @param string $comment
     * @param array $lines Array of product as strings
     * 
     * @return array|int
     * @example: { "closeopenorder": 1, "comment": "", "lines": [{ "id": 14, "fk_product": 112, "qty": 18, "warehouse": 1, "price": 114, "comment": "", "eatby": 0, "sellby": 0, "batch": 0, "notrigger": 0 }] }
     * 
     */
    public function ReceiveOrders(int $id,string $comment,array $lines,int $closeopenorder=0):array|int{
        $body=[];
        $body["closeopenorder"]=$closeopenorder;
        $body["comment"]=$comment;
        $body["lines"]=$lines;
        return $this->client->post("supplierorders/{$id}/receive",$body);
    }

    /**
     * [Description for ValidateOrders]
     *
     * @param int $id
     * @param int $idwarehouse
     * @param int $notrigger=0
     * 
     * @return array
     * 
     */
    public function ValidateOrders(int $id,?int $idwarehouse=null,int $notrigger=0):array{
        $body=[$notrigger];
        if($idwarehouse!=null){$body["idwarehouse"]=$idwarehouse;}
        return $this->client->post("supplierorders/{$id}/validate",$body);
    }
}