<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Invoices
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

   /**
     * Récupère toutes les factures depuis Dolibarr via l'API REST avec options de filtrage et pagination.
     *
     * Cette fonction envoie une requête GET sur l'endpoint `invoices`.
     *
     * Paramètres GET possibles (tous optionnels) :
     * 
     * @param string   $sortfield             Champ utilisé pour le tri (ex: 't.rowid').
     * @param string   $sortorder             Ordre de tri : 'ASC' ou 'DESC'.
     * @param int      $limit                 Nombre maximum de résultats à retourner (default 100).
     * @param int      $page                  Numéro de page (pour pagination, commence à 0).
     * @param string   $thirdparty_ids        IDs des tiers (clients) pour filtrer, exemple : '1' ou '1,2,3'.
     * @param string   $status                Filtre sur le statut de la facture : 'draft' | 'unpaid' | 'paid' | 'cancelled'.
     * @param string   $sqlfilters            Critères SQL supplémentaires pour filtrer les réponses. Syntaxe exemple : "(t.ref:like:'SO-%') and (t.date_creation:>2025-01-01)".
     * @param string   $properties            Liste de propriétés à retourner (comma-separated). Ignorée si vide.
     * @param bool     $pagination_data       Si true, la réponse inclura les informations de pagination. Default false.
     * @param bool     $loadlinkedobjects     Charger également les objets liés.
     *
     * @param array $params Tableau associatif optionnel contenant l'un ou plusieurs des paramètres ci-dessus.
     *
     * Exemple de réponse (un élément du tableau) :
     * [
     *   "id" => "1",
     *   "ref" => "FA2511-0001",
     *   "socid" => "1",
     *   "ref_customer" => "49465",
     *   "status" => "1",
     *   "total_ht" => "500.00000000",
     *   "total_tva" => "100.00000000",
     *   "total_ttc" => "600.00000000",
     *   "date_creation" => 1762441831,
     *   "date_validation" => 1762387200,
     *   "user_creation_id" => "1",
     *   "user_validation_id" => "1",
     *   "lines" => [
     *       [
     *           "id" => "1",
     *           "qty" => "1",
     *           "subprice" => "500.00000000",
     *           "desc" => "bidon de 20 L",
     *           "multicurrency_total_ht" => "500.00000000",
     *           "multicurrency_total_ttc" => "600.00000000"
     *       ]
     *   ],
     *   "online_payment_url" => "http://192.168.1.32:8080/public/payment/newpayment.php?source=invoice&ref=FA2511-0001"
     * ]
     *
     * @return array Retourne un tableau d'invoices (factures), chaque élément étant un tableau associatif représentant une facture et ses lignes.
     *
     * @throws \Exception Si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('invoices', $params);
    }

    /**
     * Récupérer une facture par ID
     * @param int $id
     * @param contact_list bool (optionnel) Charger la liste des contacts liés à la facture
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return array
     */
    public function getById(int $id, int $contact_list=0): array
    {
        return $this->client->get("invoices/{$id}", ['contact_list' => $contact_list]);
    }

   /**
     * Crée une nouvelle facture dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `invoices` avec les données de la facture.
     *
     * Exemple de structure de `$data` (les champs obligatoires et optionnels) :
     *
     * [
     *   "socid" => "1",                  // ID du tiers (client)
     *   "ref_client" => "49465",         // Référence client
     *   "origin_type" => "commande",     // Type d'origine (commande, projet…)
     *   "origin_id" => 1,                // ID de l'origine
     *   "date" => 1762387200,            // Date de création (timestamp UNIX)
     *   "date_lim_reglement" => 1762473600, // Date limite de paiement
     *   "mode_reglement_id" => "6",      // ID du mode de règlement
     *   "cond_reglement_id" => "1",      // ID de la condition de règlement
     *   "status" => "1",                 // Statut de la facture : draft, unpaid, paid, cancelled
     *   "lines" => [                     // Lignes de facture
     *       [
     *           "fk_product" => null,        // ID du produit (optionnel)
     *           "desc" => "bidon de 20 L",   // Description du produit ou service
     *           "qty" => "1",                // Quantité
     *           "subprice" => "500.00000000",// Prix unitaire HT
     *           "tva_tx" => "20.0000",       // TVA applicable
     *           "remise_percent" => "0"      // Remise (optionnel)
     *       ]
     *   ],
     *   "note_public" => null,             // Note visible par le client (optionnel)
     *   "note_private" => null,            // Note interne (optionnel)
     *   "fk_project" => null,              // ID projet (optionnel)
     *   "multicurrency_code" => "EUR",     // Devise (optionnel)
     *   "tracking_number" => null,         // Numéro de suivi (optionnel)
     *   "tracking_url" => null             // URL de suivi (optionnel)
     * ]
     *
     * @param array $data Tableau associatif représentant la facture à créer.
     *                    Clés importantes :
     *                      - socid (int) : ID du client
     *                      - ref_client (string) : référence du client
     *                      - origin_type (string) : type de l'origine (commande, projet…)
     *                      - origin_id (int) : ID de l'origine
     *                      - date (int) : timestamp UNIX de la date de création
     *                      - date_lim_reglement (int) : timestamp UNIX de la date limite de paiement
     *                      - mode_reglement_id (string) : ID du mode de règlement
     *                      - cond_reglement_id (string) : ID de la condition de règlement
     *                      - status (string) : statut de la facture
     *                      - lines (array) : tableau des lignes de facture
     *                      - note_public (string|null) : note publique
     *                      - note_private (string|null) : note interne
     *                      - fk_project (int|null) : ID du projet lié
     *                      - multicurrency_code (string|null) : code de la devise
     *
     * @return int Retourne l'identifiant unique (ID) de la nouvelle facture créée.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function create(array $data):int
    {
        return $this->client->post('invoices', $data);
    }

    /**
     * Met à jour une facture existante dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `invoices/{id}` avec les champs à mettre à jour.
     * Seuls les champs présents dans le tableau `$data` seront modifiés.
     *
     * Exemple de structure de `$data` (champs modifiables) :
     *
     * [
     *   "socid" => "1",                  // ID du client
     *   "ref_client" => "49465",         // Référence client
     *   "origin_type" => "commande",     // Type de l'origine (commande, projet…)
     *   "origin_id" => 1,                // ID de l'origine
     *   "date" => 1762387200,            // Date de création (timestamp UNIX)
     *   "date_lim_reglement" => 1762473600, // Date limite de paiement
     *   "mode_reglement_id" => "6",      // ID du mode de règlement
     *   "cond_reglement_id" => "1",      // ID de la condition de règlement
     *   "status" => "1",                 // Statut : draft, unpaid, paid, cancelled
     *   "lines" => [                     // Lignes de facture à modifier
     *       [
     *           "fk_product" => null,        // ID du produit (optionnel)
     *           "desc" => "bidon de 20 L",   // Description
     *           "qty" => "2",                // Quantité
     *           "subprice" => "600.00000000",// Prix unitaire HT
     *           "tva_tx" => "20.0000",       // TVA applicable
     *           "remise_percent" => "0"      // Remise (optionnel)
     *       ]
     *   ],
     *   "note_public" => null,             // Note publique (optionnel)
     *   "note_private" => null,            // Note interne (optionnel)
     *   "fk_project" => null,              // ID projet (optionnel)
     *   "multicurrency_code" => "EUR",     // Devise (optionnel)
     *   "tracking_number" => null,         // Numéro de suivi (optionnel)
     *   "tracking_url" => null             // URL de suivi (optionnel)
     * ]
     *
     * @param int   $id   ID de la facture à mettre à jour.
     * @param array $data Tableau associatif contenant les champs à modifier.
     *                    Clés principales (liste non exhaustive) :
     *                      - socid (int) : ID du client
     *                      - ref_client (string) : référence du client
     *                      - origin_type (string) : type de l'origine
     *                      - origin_id (int) : ID de l'origine
     *                      - date (int) : timestamp UNIX de la date de création
     *                      - date_lim_reglement (int) : timestamp UNIX de la date limite
     *                      - mode_reglement_id (string) : ID du mode de règlement
     *                      - cond_reglement_id (string) : ID de la condition de règlement
     *                      - status (string) : statut de la facture
     *                      - lines (array) : lignes à modifier
     *                      - note_public (string|null) : note publique
     *                      - note_private (string|null) : note interne
     *                      - fk_project (int|null) : ID du projet lié
     *                      - multicurrency_code (string|null) : code de la devise
     *
     * @return array Retourne la réponse de l'API Dolibarr décodée en tableau associatif,
     *               contenant la facture mise à jour avec toutes ses lignes et informations associées.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function update(int $id, array $data): array
    {
        return $this->client->put("invoices/{$id}", $data);
    }

    /**
     * Supprimer une facture par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array|int|string
    {
        return $this->client->delete("invoices/{$id}");
    }

    /**
     * Supprimer un type de contact lié à une facture par ID de la facture et ID du contact
     * @param int $id ID de la facture
     * @param int $contactId ID du contact à supprimer
     * @param string $type Type de contact à supprimer (ex: 'BILLING', 'SHIPPING','CUSTOMER' etc.)
     * @return array
     */
    public function deleteContactType(int $id, int $contactId,string $type): array|int|string
    {
        return $this->client->delete("invoices/{$id}/contact/{$contactId}/{$type}");
    }

    /**
     * Ajouter un type de contact lié à une facture par ID de la facture et ID du contact
     * @param int $id ID de la facture
     * @param int $contactId ID du contact à ajouter
     * @param string $type Type de contact à ajouter (ex: 'BILLING', 'SHIPPING','CUSTOMER' etc.)
     * @return array
     */
    public function addContactType(int $id, int $contactId,string $type): array|int|string
    {
        return $this->client->post("invoices/{$id}/contact/{$contactId}/{$type}");
    }

    /**
     * Ajouter des contacts liés à une facture par ID de la facture
     * @param int $id ID de la facture
     * @param array $data Tableau associatif contenant les contacts à ajouter
     *                    Exemple :
     *                          ["fk_socpeople" => 1, "type_contact " => "BILLING","source"=>"internet","notrigger"=>"0"]
     *                       OR ["fk_socpeople" => 1, "type_contact " => "SHIPPING","source"=>"internet","notrigger"=>"0"]
     * @return array
     */
    public function addContacts(int $id, array $data): array|int|string
    {
        return $this->client->post("invoices/{$id}/contacts", $data);
    }

    /**
     * Récupérer le détail des remises appliquées à une facture par ID
     * @param int $id
     * @return array
     */
    public function getDiscount(int $id): array|int|string
    {
        return $this->client->get("invoices/{$id}/discount");
    }

    /**
     * Récupérer les lignes d'une facture par ID
     * @param int $id
     * @return array
     */
    public function getLines(int $id): array|int|string
    {
        return $this->client->get("invoices/{$id}/lines");
    }

    /**
     * Ajouter une ligne à une facture par ID
     * @param int $id
     * @param array $data Tableau associatif représentant la ligne à ajouter
     *                    Exemple :
     *                    [
     *                      "fk_product" => null,
     *                      "desc" => "bidon de 20 L",
     *                      "qty" => "1",
     *                      "subprice" => "500.00000000",
     *                      "tva_tx" => "20.0000",
     *                      "remise_percent" => "0"
     *                    ]
     * @return array
     */
    public function addLine(int $id, array $data):int
    {
        return $this->client->post("invoices/{$id}/lines", $data);
    }

    /**
     * Supprimer une ligne d'une facture par ID de la facture et ID de la ligne
     * @param int $id
     * @param int $lineId
     * @return array
     */
    public function deleteLine(int $id, int $lineId): array
    {
        return $this->client->delete("invoices/{$id}/lines/{$lineId}");
    }

    /**
     * Mettre à jour une ligne d'une facture par ID de la facture et ID de la ligne
     * @param int $id
     * @param int $lineId
     * @param array $data Tableau associatif représentant la ligne à mettre à jour
     *                    Exemple :
     *                    [
     *                      "desc" => "bidon de 20 L modifié",
     *                      "qty" => "2",
     *                      "subprice" => "600.00000000",
     *                      "tva_tx" => "20.0000",
     *                      "remise_percent" => "0"
     *                    ]
     * @return array
     */
    public function updateLine(int $id, int $lineId, array $data): array
    {
        return $this->client->put("invoices/{$id}/lines/{$lineId}", $data);
    }

    /**
     * Marquer une facture comme ayant un crédit disponible par ID
     * @param int $id
     * @return array
     */
    public function markAsCreditAvailable(int $id): array
    {
        return $this->client->post("invoices/{$id}/markAsCreditAvailable");
    }

    /**
     * Récupérer les paiements associés à une facture par ID
     * @param int $id
     * @return array
     */
    public function getPayments(int $id): array
    {
        return $this->client->get("invoices/{$id}/payments");
    }

   /**
     * Ajoute un paiement à une facture existante dans Dolibarr via l'API REST.
     *
     * Cette méthode appelle l'endpoint `/invoices/{id}/payments` et enregistre un paiement
     * pour une facture donnée. Le montant utilisé est automatiquement calculé comme le reste à payer.
     *
     * Exemple d'utilisation :
     * ```php
     * $dolibarr->invoices()->addPayments(1, [
     *     'datepaye' => '2025-11-07',
     *     'paymentid' => 4,               // ID du mode de paiement (ex: CB, VIREMENT, CHQ…)
     *     'closepaidinvoices' => 'yes',   // Clôturer automatiquement si tout est payé
     *     'accountid' => 1,               // ID du compte bancaire Dolibarr
     *     'num_payment' => 'PAY-2025-001',// (optionnel) Numéro du paiement
     *     'comment' => 'Règlement de la facture FA2511-0001', // (optionnel)
     *     'chqemetteur' => 'Jean Dupont', // (obligatoire si paymentcode = CHQ)
     *     'chqbank' => 'Banque Populaire' // (optionnel)
     * ]);
     * ```
     *
     * @param int   $id    ID de la facture à laquelle le paiement doit être ajouté.
     * @param array $data  Tableau associatif contenant les informations du paiement :
     *                    - **datepaye** *(string, requis)* : Date du paiement au format `YYYY-MM-DD`.
     *                    - **paymentid** *(int, requis)* : ID du mode de paiement (correspond à `llx_c_paiement`).
     *                    - **closepaidinvoices** *(string, requis)* : Clôture la facture si totalement payée (`yes`|`no`).
     *                    - **accountid** *(int, requis)* : ID du compte bancaire Dolibarr où enregistrer le paiement.
     *                    - **num_payment** *(string, optionnel)* : Numéro ou référence du paiement.
     *                    - **comment** *(string, optionnel)* : Note ou commentaire interne associé au paiement.
     *                    - **chqemetteur** *(string, optionnel)* : Nom de l’émetteur du chèque (requis si mode = CHQ).
     *                    - **chqbank** *(string, optionnel)* : Nom de la banque émettrice (optionnel).
     *
     * @return int Retourne l’ID du paiement créé (type `int64` selon l’API Dolibarr).
     *
     * @throws \Exception Si le token Dolibarr est manquant ou si la requête échoue.
     */
    public function addPayments(int $id, array $data): int
    {
        $response = $this->client->post("invoices/{$id}/payments", $data);
        return (int) $response;
    }

    /**
     * Remet une facture à l'état brouillon par ID
     * @param int $id
     * @return array
     */
    public function setToDraft(int $id,?int $idWarehouse=null): array
    {
        $body=[];
        if($idWarehouse!=null){
            $body["idwarehouse"]=$idWarehouse;
        }
        return $this->client->post("invoices/{$id}/settodraft",$body);
    }

    /**
     * Marque une facture comme payée par ID
     * @param int $id OrderId
     * @param string|null $close_code Code de clôture (optionnel) Code filled if we classify to 'Paid completely' when payment is not complete (for escompte for example) ,
     * @param string|null $close_note Note de clôture (optionnel) Comment defined if we classify to 'Paid' when payment is not complete (for escompte for example)
     * @return array
     */
    public function setToPaid(int $id,string|null $close_code=null,string|null $close_note=null): array|int|string
    {
        $body=[];
        if($close_code)$body['close_code']=$close_code;
        if($close_note)$body['close_note']=$close_note;
        return $this->client->post("invoices/{$id}/settopaid",$body);
    }
    /**
     * Marque une facture comme impayée par ID
     * @param int $id OrderId
     * @return array
     */
    public function setToUnpaid(int $id): array
    {
        return $this->client->post("invoices/{$id}/settounpaid");
    }

    /**
     * Appliquer une note de crédit à une facture par ID de la facture et ID de la note de crédit
     * @param int $id ID de la facture
     * @param int $discountId ID de la note de crédit à appliquer
     * @return array
     */
    public function AddCreditNoteWithDiscount(int $id, int $discountId): array|int|string
    {
        return $this->client->post("invoices/{$id}/usecreditnote/{$discountId}");
    }

    /**
     * Appliquer une remise existante à une facture par ID de la facture et ID de la remise
     * @param int $id ID de la facture
     * @param int $discountId ID de la remise à appliquer
     * @return array
     */
    public function addDiscountLineUsingExistingDiscount(int $id, int $discountId): array|int|string
    {
        return $this->client->post("invoices/{$id}/usediscount/{$discountId}");
    }

    /**
     * Valider une facture par ID
     * @param int $id
     * @return array
     */
    public function validateInvoice(int $id): array|int|string
    {
        return $this->client->post("invoices/{$id}/validate");
    }

    /**
     * Créer une facture à partir d'un contrat par ID de contrat
     * @param int $contractId
     * @return int Retourne l'ID de la facture créée
     */
    public function createFromContract(int $contractId): array|int
    {
        return $this->client->post("invoices/createfromcontract/{$contractId}");
    }

    /**
     * Créer une facture à partir d'une commande par ID de commande
     * @param int $orderId
     * @return int Retourne l'ID de la facture créée
     */    public function createFromOrder(int $orderId): array|int
    {
        return $this->client->post("invoices/createfromorder/{$orderId}");
    }

    /**
     * Met à jour le numéro de paiement d'une facture par ID
     * @param int $id ID de la facture
     * @param string $num_payment Nouveau numéro de paiement
     * @return array
     */
    public function updatePayment(int $id, string $num_payment): array|int|string
    {
        return $this->client->put("invoices/{$id}/payments", ['num_payment' => $num_payment]);
    }

    /**
     * Ajoute un paiement distribué sur une ou plusieurs factures dans Dolibarr via l'API REST.
     *
     * Cette méthode appelle l'endpoint `/invoices/paymentsdistributed` pour enregistrer un paiement global
     * réparti sur plusieurs factures (par exemple, un virement couvrant plusieurs factures ouvertes).
     *
     * Exemple d'utilisation :
     * ```php
     * $dolibarr->invoices()->addPaymentsDistributed([
     *     'arrayofamounts' => [
     *         '1' => '400.00',  // ID de la facture => montant payé
     *         '2' => '200.00'
     *     ],
     *     'datepaye' => '2025-11-07',   // Date du paiement (format YYYY-MM-DD)
     *     'paymentid' => 4,             // ID du mode de paiement (ex: CB, VIREMENT, CHQ…)
     *     'closepaidinvoices' => 'yes', // Clôturer automatiquement les factures payées
     *     'accountid' => 1,             // ID du compte bancaire Dolibarr
     *     'num_payment' => 'PAY-2025-002', // (optionnel) Numéro de paiement interne
     *     'comment' => 'Paiement groupé des factures clients Novembre', // (optionnel)
     *     'chqemetteur' => 'Société Tubconcept', // (requis si paymentcode = CHQ)
     *     'chqbank' => 'Banque Populaire',       // (optionnel)
     *     'ref_ext' => 'EXT-456789',             // (optionnel) Référence externe du paiement
     *     'accepthigherpayment' => false         // (optionnel) Autoriser les paiements supérieurs au dû
     * ]);
     * ```
     *
     * @param array $data Tableau associatif conforme au modèle `invoicesAddPaymentDistributedModel` :
     * 
     *                    - **arrayofamounts** *(array[string], requis)* : Tableau associatif des montants à répartir  
     *                      Format : `['<invoice_id>' => '<amount>', ...]`.
     *                    - **datepaye** *(string, requis)* : Date du paiement au format `YYYY-MM-DD`.
     *                    - **paymentid** *(int, requis)* : ID du mode de paiement (voir table `llx_c_paiement`).
     *                    - **closepaidinvoices** *(string, requis)* : Indique si les factures payées doivent être clôturées (`yes`|`no`).
     *                    - **accountid** *(int, requis)* : ID du compte bancaire Dolibarr utilisé.
     *                    - **num_payment** *(string, optionnel)* : Numéro interne ou référence du paiement.
     *                    - **comment** *(string, optionnel)* : Note interne ou commentaire lié au paiement.
     *                    - **chqemetteur** *(string, optionnel)* : Nom de l’émetteur du chèque (requis si mode = CHQ).
     *                    - **chqbank** *(string, optionnel)* : Nom de la banque émettrice (optionnel).
     *                    - **ref_ext** *(string, optionnel)* : Référence externe (provenant d’un système tiers).
     *                    - **accepthigherpayment** *(bool, optionnel)* : Si `true`, accepte les paiements supérieurs au reste à payer.
     *
     * @return array Retourne la réponse Dolibarr en cas de succès (souvent un tableau contenant l’ID du paiement
     *               ou des informations sur les factures impactées).
     *
     * @throws \Exception Si le token Dolibarr est manquant ou si la requête échoue.
     */
    public function addPaymentsDistributed( array $data): array|int|string
    {
        $response = $this->client->post("invoices/paymentsdistributed", $data);
        return $response;
    }

    /**
     * Récupérer les propriétés d'une facture par référence externe
     * @param string $ref_ext Référence externe de la facture
     * @param contact_list bool (optionnel) Charger la liste des contacts liés à la facture
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return array
     */
    public function getPropertiesByRefExt(string $ref_ext,int|null $contact_list=null): array|int|string
    {
        $body=[];
        if($contact_list!=null)$body['contact_list']=$contact_list;
        return $this->client->get("invoices/ref_ext/{$ref_ext}", $body);
    }

    /**
     * Récupérer les propriétés d'une facture par référence
     * @param string $ref Référence de la facture
     * @param contact_list bool (optionnel) Charger la liste des contacts liés à la facture
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return array
     */
    public function getPropertiesByRef(string $ref,int|null $contact_list=null): array|int|string
    {
        $body=[];
        if($contact_list!=null)$body['contact_list']=$contact_list;
        return $this->client->get("invoices/ref/{$ref}", $body);
    }

    /**
     * Récupérer les propriétés d'un modèle de facture par ID
     * @param int $id ID du modèle de facture
     * @param contact_list bool (optionnel) Charger la liste des contacts liés à la facture
     * 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return array
     */
    public function getPropertiesOfTemplate(int $id,int|null $contact_list=null): array|int|string
    {
        $body=[];
        if($contact_list!=null)$body['contact_list']=$contact_list;
        return $this->client->get("invoices/template/{$id}", $body);
    }
}
