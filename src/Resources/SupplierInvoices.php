<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class SupplierInvoices{

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
     * @param string|null $status
     * @param string|null $sqlfilters
     * @param string|null $properties
     * @param bool|null $pagination_data
     * 
     * @return array
     * 
     */
    public function getAll(string $sortfield="t.rowid",string $sortorder="ASC",int $limit=100,?int $page=null,
    ?string $thirdparty_ids=null,?string $status=null,?string $sqlfilters=null,
    ?string $properties=null,?bool $pagination_data=null):array{
        $body=[];
        $body["sortfield"]=$sortfield;
        $body["sortorder"]=$sortorder;
        $body["limit"]=$limit;
        if($page!=null){$body["page"]=$page;}
        if($thirdparty_ids!=null){$body["thirdparty_ids"]=$thirdparty_ids;}
        if($status!=null){$body["status"]=$status;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        if($properties!=null){$body["properties"]=$properties;}
        if($pagination_data!=null){$body["pagination_data"]=$pagination_data;}

        return $this->client->get("supplierinvoices",$body);
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
        return $this->client->get("supplierinvoices/{$id}");
    }

    /**
     * [Description for getLinesOfInvoice]
     *
     * @param int $id
     * 
     * @return array
     * 
     */
    public function getLinesOfInvoice(int $id):array{
        return $this->client->get("supplierinvoices/{$id}/lines");
    }

    /**
     * [Description for create]
     *
     * @param array $request_data
     * 
     * @return array
     * 
     */
    public function create(array $request_data):int{
        return $this->client->post("supplierinvoices",$request_data);
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
        return $this->client->put("supplierinvoices/{$id}",$request_data);
    }

    
    /**
     * [Description for delete]
     *
     * @param int $id
     * 
     * @return array|int|string
     * 
     */
    public function delete(int $id):array|int|string{
        return $this->client->delete("supplierinvoices/{$id}");
    }

    /**
     * [Description for addLines]
     *
     * @param int $id
     * @param array $request_data object Lines turn to array with ToArrayFiltered()
     * 
     * @return array
     * 
     */
    public function addLine(int $id,array $request_data):array|int{
        return $this->client->post("supplierinvoices/{$id}/lines",$request_data);
    }

    /**
     * [Description for deleteLine]
     *
     * @param int $id
     * @param int $lineid
     * 
     * @return array
     * 
     */
    public function deleteLine(int $id,int $lineid):array{
        return $this->client->delete("supplierinvoices/{$id}/lines/{$lineid}");
    }

    /**
     * [Description for updateLine]
     *
     * @param int $id
     * @param int $lineid
     * @param array $request_data
     * 
     * @return array
     * 
     */
    public function updateLine(int $id,int $lineid,array $request_data):array{
        return $this->client->put("supplierinvoices/{$id}/lines/{$lineid}",$request_data);
    }

    /**
     * [Description for getPayments]
     *
     * @param int $id
     * 
     * @return array|int
     * 
     */
    public function getPayments(int $id):array|int{
        return $this->client->get("supplierinvoices/{$id}/payments");
    }

    /**
     * [Description for addPayment]
     *
     * @param int $id
     * @param string $datepaye
     * @param int $payment_mode_id payment mode ID (look it up via REST GET to /setup/dictionary/payment_types) 
     * @param string $closepaidinvoices "yes" or "no"
     * @param int $accountid  REST GET to /bankaccounts
     * @param string|null $num_payment
     * @param string|null $comment
     * @param string|null $chqemetteur Payment issuer (mandatory if payment_mode_id corresponds to 'CHQ'-payment type)
     * @param string|null $chqbank
     * @param int|null $amount Amount of payment if we don't want to use the remain to pay
     * 
     * @return array|int
     * 
     */
    public function addPayment(int $id ,string $datepaye,int $payment_mode_id,string $closepaidinvoices,int $accountid,
    ?string $num_payment,?string $comment,?string $chqemetteur,?string $chqbank,?int $amount):array|int{
        $body=["datepaye"=>$datepaye,"payment_mode_id"=>$payment_mode_id,"closepaidinvoices"=>$closepaidinvoices,
        "accountid"=>$accountid];
        if($num_payment!=null){$body["num_payment"]=$num_payment;}
        if($comment!=null){$body["comment"]=$comment;}
        if($chqemetteur!=null){$body["chqemetteur"]=$chqemetteur;}
        if($chqbank!=null){$body["chqbank"]=$chqbank;}
        if($amount!=null){$body["amount"]=$amount;}
        return $this->client->post("supplierinvoices/{$id}/payments",$body);

    }

    /**
     * [Description for setToDraft]
     *
     * @param int $id
     * @param int $idwarehouse optionnal if no stock management
     * @param int $notrigger=0 1=Does not execute triggers, 0= execute triggers 
     * 
     * @return array|int
     * 
     */
    public function setToDraft(int $id,?int $idwarehouse=null,int $notrigger=0):array|int{
        $body=[];
        $body=[$notrigger];
        if($idwarehouse!=null){$body["idwarehouse"]=$idwarehouse;}
        return $this->client->post("supplierinvoices/{$id}/settodraft",$body);
    }

     /**
     * [Description for validate]
     *
     * @param int $id
     * @param int $idwarehouse optionnal if no stock management
     * @param int $notrigger=0 1=Does not execute triggers, 0= execute triggers 
     * 
     * @return array|int
     * 
     */
    public function validate(int $id,?int $idwarehouse=null,int $notrigger=0):array|int{
        $body=[];
        $body=[$notrigger];
        if($idwarehouse!=null){$body["idwarehouse"]=$idwarehouse;}
        return $this->client->post("supplierinvoices/{$id}/validate",$body);
    }
    

}