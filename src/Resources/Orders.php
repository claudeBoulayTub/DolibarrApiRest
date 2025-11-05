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
     * @return object
     * 
     */
    public function getById(int $id,int $contact_list): array
    {
        return $this->client->get("orders/{$id}&contact_list={$contact_list}");
    }


    /**
     * Crée une nouvelle commande dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `orders` avec les données de la commande.
     * 
     * Exemple de structure minimale requise :
     * [
     *     "socid" => 1, // ID du client
     *     "lines" => [
     *         [
     *             "product_id" => 1,   // ID du produit ou service
     *             "qty"        => 2,   // Quantité commandée
     *             "subprice"   => 100, // Prix unitaire HT (optionnel si le produit a un prix par défaut)
     *             "tva_tx"     => 20,  // TVA applicable (optionnel)
     *             "desc"       => "Produit A", // Description optionnelle
     *             "remise_percent" => 5 // Remise en pourcentage (optionnel)
     *             "fk_unit"   => 1   // Unité de mesure (optionnel)
     *         ]
     *     ],
     *     "ref_client"         => "CMD-1234",   // Référence côté client (optionnel)
     *     "date"               => "YYYY-MM-DD", // Date de la commande (optionnel)
     *     "note_public"        => "Note client", // Note publique (optionnel)
     *     "note_private"       => "Note interne", // Note interne (optionnel)
     *     "cond_reglement_id"  => 1,  // Condition de règlement (optionnel)
     *     "mode_reglement_id"  => 1,  // Mode de paiement (optionnel)
     *     "shipping_method_id" => 2,  // Transporteur / mode de livraison (optionnel)
     *     "fk_project"         => 3,  // ID projet lié à la commande (optionnel)
     *     "fk_user_author"     => 1,  // ID utilisateur créateur (optionnel)
     *     "fk_user_valid"      => 2,  // ID utilisateur validant (optionnel)
     *     "statut"             => 0   // Statut de la commande : 0=brouillon, 1=validée, 2=clôturée (optionnel)
     *     "cond_reglement      =>Nom de la condition de règlement (alternative à cond_reglement_id)
     *     "mode_reglement      =>Nom du mode de règlement (alternative à mode_reglement_id)
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

    // Tu peux ajouter update(), delete() ou fonctions spécifiques à l’API Dolibarr
}
