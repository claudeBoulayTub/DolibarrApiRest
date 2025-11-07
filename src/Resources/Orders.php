<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Orders
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * Récupérer tous les commandes
     * @param array $params filtres optionnels
     * Param valid: sortfield:string, sortorder:ASC|DESC, limit:int, page:int, thirdparty_ids:int, sqlfilters:string,
     *      properties:string,pagination_data:boolean(obtention de pagination en réponse),loadLinkedobjects:int
     * @return array
     * @example getAll(['sortfield' => 'date', 'sortorder' => 'DESC', 'limit' => 10,pagination_data' => true])
     * {
     *   "data": [],
     *   "pagination": {
     *       "total": 0,
     *       "page": 0,
     *       "page_count": 0,
     *       "limit": 100
     *   }
     * }
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('orders', $params);
    }
    /**
     * Récupérer une commande par ID
     * @param int $id
     * @param contact_list bool (optionnel) Charger la liste des contacts liés à la commande
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return object
     * 
     */
    public function getById(int $id,int $contact_list=0): array
    {
        return $this->client->get("orders/{$id}&contact_list={$contact_list}");
    }


    /**
     * Crée une nouvelle commande dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `orders` avec les données de la commande.
     * 
     * Exemple de structure minimale requise :
    *[
    *     "socid"              => 1,            // ID du client (obligatoire)
    *     "ref_client"         => "CMD-1234",   // Référence côté client (optionnel)
    *     "date"               => "YYYY-MM-DD", // Date de la commande (optionnel)
    *     "note_public"        => "Note client", // Note publique (optionnel)
    *     "note_private"       => "Note interne", // Note privée (optionnel)
    *     "cond_reglement_id"  => 1,             // ID condition de règlement (optionnel)
    *     "mode_reglement_id"  => 1,             // ID mode de règlement (optionnel)
    *     "shipping_method_id" => 2,             // ID transporteur / mode de livraison (optionnel)
    *     "fk_project"         => 3,             // ID projet lié à la commande (optionnel)
    *     "fk_user_author"     => 1,             // ID utilisateur créateur (optionnel)
    *     "fk_user_valid"      => 2,             // ID utilisateur validant (optionnel)
    *     "statut"             => 0,             // Statut de la commande : 0=brouillon, 1=validée, 2=clôturée (optionnel)
    *     "lines"              => [              // Tableau de lignes de commande (obligatoire)
    *         [
    *             "fk_product"       => 1,      // ID produit ou service (optionnel si subprice fourni)
    *             "qty"              => 2,      // Quantité (obligatoire)
    *             "subprice"         => 100,    // Prix unitaire HT (optionnel si produit a prix par défaut)
    *             "tva_tx"           => 20,     // TVA applicable (optionnel)
    *             "desc"             => "Produit A", // Description (optionnel)
    *             "remise_percent"   => 5,      // Remise en % (optionnel)
    *             "fk_unit"          => 1       // Unité de mesure (optionnel)
    *         ]
    *     ],
    *     // Champs supplémentaires possibles selon Dolibarr :
    *     "fk_incoterms"        => 0,
    *     "multicurrency_code"  => "EUR",
    *     "multicurrency_tx"    => "1.00000000",
    *     "multicurrency_total_ht" => "500.00000000",
    *     "multicurrency_total_tva" => "100.00000000",
    *     "multicurrency_total_ttc" => "600.00000000",
    *     "lines" => [
    *         [
    *             "multicurrency_total_ht" => "500.00000000",
    *             "multicurrency_total_tva" => "100.00000000",
    *             "multicurrency_total_ttc" => "600.00000000",
    *             "total_ht" => "500.00000000",
    *             "total_tva" => "100.00000000",
    *             "total_ttc" => "600.00000000",
    *             "desc" => "bidon de 20 L",
    *             "description" => "bidon de 20 L",
    *             "qty" => "1",
    *             "subprice" => "500.00000000",
    *             "tva_tx" => "20.0000",
    *             "multicurrency_subprice" => "500.00000000",
    *             "price" => "500",
    *             "pa_ht" => "100.00000000",
    *             "marge_tx" => 400,
    *             "marque_tx" => 80,
    *             "product_type" => "0",
    *             "rowid" => "1",
    *             "fk_commande" => "1",
    *             "rang" => "1"
    *         ]
    *     ]
    * ]
    *
    * @param array $data Tableau associatif représentant la commande à créer.
    *                    Doit contenir au minimum :
    *                      - socid (int) : ID du client
    *                      - lines (array) : tableau de lignes de commande
    *
    * @return array Retourne la réponse de l'API Dolibarr décodée en tableau associatif.
    *               En cas d'erreur, Dolibarr renvoie une structure contenant :
    *               - code : code HTTP de l'erreur
    *               - message : description de l'erreur
    *
    * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
    */
    public function create(array $data): array
    {
        return $this->client->post('orders', $data);
    }

   /**
     * Met à jour une commande existante dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête PUT sur l'endpoint `orders/{id}` avec les données de la commande.
     *
     * Exemple de structure possible pour la mise à jour :
     * [
     *     "id"                => 1,             // ID de la commande à modifier (obligatoire)
     *     "ref_client"        => "CMD-5678",    // Nouvelle référence client (optionnel)
     *     "note_public"       => "Nouvelle note publique", // Note publique (optionnel)
     *     "note_private"      => "Note interne mise à jour", // Note interne (optionnel)
     *     "cond_reglement_id" => 2,             // Nouvelle condition de règlement (optionnel)
     *     "mode_reglement_id" => 3,             // Nouveau mode de paiement (optionnel)
     *     "shipping_method_id"=> 2,             // Nouveau mode de livraison (optionnel)
     *     "statut"            => 1,             // Statut de la commande (0=brouillon, 1=validée, 2=clôturée)
     *     "total_ht"          => "550.00000000", // Total HT mis à jour (optionnel)
     *     "total_tva"         => "110.00000000", // Total TVA mis à jour (optionnel)
     *     "total_ttc"         => "660.00000000", // Total TTC mis à jour (optionnel)
     *     "lines"             => [               // Tableau de lignes à mettre à jour ou remplacer
     *         [
     *             "id"               => 1,        // ID de la ligne existante (obligatoire pour modification)
     *             "desc"             => "bidon de 20 L - version mise à jour",
     *             "qty"              => 2,
     *             "subprice"         => "550.00000000",
     *             "tva_tx"           => "20.0000",
     *             "remise_percent"   => 0,
     *             "pa_ht"            => "100.00000000",
     *             "marge_tx"         => 450,
     *             "marque_tx"        => 81,
     *             "total_ht"         => "550.00000000",
     *             "total_tva"        => "110.00000000",
     *             "total_ttc"        => "660.00000000",
     *             "product_type"     => "0",
     *             "fk_product"       => null,
     *             "rang"             => "1"
     *         ]
     *     ]
     * ]
     *
     * ⚙️ Notes :
     * - Tous les champs sont optionnels sauf `id`.
     * - Si le champ `lines` est fourni, il remplace les lignes existantes de la commande.
     * - Pour modifier seulement une ligne, utilisez `lines[id]` avec son identifiant.
     * - Vous pouvez aussi mettre à jour uniquement certains champs sans affecter les lignes.
     *
     * @param int   $id   ID de la commande à mettre à jour.
     * @param array $data Tableau associatif représentant les champs à modifier.
     *                    Doit contenir au moins le champ "id" ou être passé en paramètre séparé.
     *
     * @return array Retourne la réponse de l'API Dolibarr décodée en tableau associatif.
     *               En cas d'erreur, Dolibarr renvoie une structure contenant :
     *               - code : code HTTP de l'erreur
     *               - message : description de l'erreur
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
    */
    public function update(int $id, array $data): array
    {
        return $this->client->post("orders/{$id}", $data);
    }

    /**
     * Supprimer une commande par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->delete("orders/{$id}");
    }

    /**
     * Clôturer une commande par ID
     * @param int $id
     * @param bool $disableTriggers Désactive les déclencheurs si vrai
     * @return array
     */
    public function close(int $id,bool $disableTriggers=false): array
    {
        $body = $disableTriggers ? ['notrigger' => 1] : [];
        return $this->client->post("orders/{$id}/close", $body);
    }
    /**
     * Dessocier un contact d'une commande par ID
     * @param int $id
     * @param int $id_contact
     * @param string $type CUSTOMER, SHIPPING, BILLING
     * @return array
     */
    public function deleteContact(int $id,int $id_contact,string $type): array
    {
        if(!in_array($type, ['CUSTOMER','SHIPPING','BILLING'])) {
            throw new \InvalidArgumentException("Type must be 'CUSTOMER', 'SHIPPING' or 'BILLING'");
        }
        return $this->client->post("orders/{$id}/contact/{$id_contact}/{$type}");
    }

    /**
     * Associer un contact à une commande par ID
     * @param int $id
     * @param int $id_contact
     * @param string $type CUSTOMER, SHIPPING, BILLING
     * @return array
     */
    public function addContact(int $id,int $id_contact,string $type): array
    {
        if(!in_array($type, ['CUSTOMER','SHIPPING','BILLING'])) {
            throw new \InvalidArgumentException("Type must be 'CUSTOMER', 'SHIPPING' or 'BILLING'");
        }
        return $this->client->post("orders/{$id}/contact/{$id_contact}/{$type}/add");
    }
    
    /**
     * Récupérer les contacts associés à une commande par ID
     * @param int $id
     * @return array
     */
    public function getContactsOfOrders(int $id): array
    {
        return $this->client->get("orders/{$id}/contacts");
    }

    /**
     * Récupérer les lignes d'une commande par ID
     * @param int $id
     * @return array
     */
    public function getLinesOfOrder(int $id): array
    {
        return $this->client->get("orders/{$id}/lines");
    }

    /**
     * Ajouter une ligne à une commande par ID
     * @param int $id
     * @param array $data
     * @return array
     */
    public function addLineToOrder(int $id, array $data): array
    {
        return $this->client->post("orders/{$id}/lines", $data);
    }

    /**
     * Mettre à jour une ligne d'une commande par ID
     * @param int $id
     * @param int $lineid
     * @param array $data
     * @return array
     */
    public function updateLineOfOrder(int $id, int $lineid, array $data): array
    {
        return $this->client->put("orders/{$id}/lines/{$lineid}", $data);
    }

    /**
     * Supprimer une ligne d'une commande par ID
     * @param int $id
     * @param int $lineid
     * @return array
     */
    public function deleteLineOfOrder(int $id, int $lineid): array
    {
        return $this->client->delete("orders/{$id}/lines/{$lineid}/delete");
    }
    /**
     * Récupérer les propriétés d'une ligne d'une commande par ID
     * @param int $id
     * @param int $lineid
     * @return array
     */
    public function getPropertiesOfLineOfOrder(int $id, int $lineid): array
    {
        return $this->client->get("orders/{$id}/lines/{$lineid}");
    }

    /**
     * Rouvrir une commande par ID
     * @param int $id
     * @return array
     */
    public function reopen(int $id): array
    {
        return $this->client->post("orders/{$id}/reopen");
    }

    /**
     * Marquer une commande comme facturée par ID
     * @param int $id
     * @return array
     */
    public function SetBilled(int $id): array
    {
        return $this->client->post("orders/{$id}/setinvoiced");
    }

    /**
     * Remettre une commande à l'état brouillon par ID
     * @param int $id
     * @param int|null $idwarehouse
     * Warehouse ID to use for stock change (Used only if option STOCK_CALCULATE_ON_VALIDATE_ORDER is on)
     * @return array
     */
    public function setToDraft(int $id,int|null $idwarehouse=null): array
    {
        if($idwarehouse!==null) {
            return $this->client->post("orders/{$id}/settodraft", ['idwarehouse' => $idwarehouse]);
        }else{
            return $this->client->post("orders/{$id}/settodraft");
        } 
    }
    /**
     * Récupérer les expéditions/livraisons associées à une commande par ID
     * @param int $id
     * @return array
     */
    public function getShipmentsOfOrder(int $id): array
    {
        return $this->client->get("orders/{$id}/shipments");
    }

    /**
     * Créer une expédition/livraison pour une commande par ID
     * @param int $id
     * @param int $idwarehouse
     * @return array
     */
    public function createShipmentForOrder(int $id, int $idwarehouse): array
    {
        return $this->client->post("orders/{$id}/shipments/{$idwarehouse}");
    }

    /**
     * Valider une commande par ID
     * @param int $id
     * @param int|null $idwarehouse
     * Warehouse ID to use for stock change (Used only if option STOCK_CALCULATE_ON_VALIDATE_ORDER is on)
     * @param int|null $notrigger
     * Disable triggers if set to 1
     * @return array
     */
    public function validateOrder(int $id,int|null $idwarehouse=null,int|null $notrigger=null): array
    {
        $body=[];
        if($idwarehouse!=null){
            $body['idwarehouse']=$idwarehouse;
        }
        if($notrigger!=null){
            $body['notrigger']=$notrigger;
        }
        return $this->client->post("orders/{$id}/validate");
    }

    /**
     * Créer une commande à partir d'une proposition par ID
     * @param int $id_proposal
     * @return array
     */
    public function createFromProposal(int $id_proposal): array
    {
        return $this->client->post("orders/createfromproposal/{$id_proposal}");
    }

    /**
     * Récupérer une commande par référence externe
     * @param string $ref_ext
     * @param int $contact_list (optionnel) Charger la liste des contacts liés à la commande
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return array
     * 
     */
    public function getOrdersByRefExt(string $ref_ext,int $contact_list=0): array
    {
        return $this->client->get("orders/ref/{$ref_ext}&contact_list={$contact_list}");
    }

    /**
     * Récupérer une commande par référence interne
     * @param string $ref
     * @param int $contact_list (optionnel) Charger la liste des contacts liés à la commande
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return array
     * 
     */
    public function getOrdersByRef(string $ref,int $contact_list=0): array
    {
        return $this->client->get("orders/ref/{$ref}&contact_list={$contact_list}");
    }




}
