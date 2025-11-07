<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Shipments
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

   /**
     * Récupère toutes les expéditions/livraisons depuis Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête GET sur l'endpoint `shipments`.
     * Elle renvoie un tableau d'objets représentant les expéditions, chaque objet
     * contenant des informations sur la commande, les lignes, le suivi, les dimensions,
     * les montants, le client, et d'autres métadonnées.
     *
     * Exemple de structure d'un élément renvoyé (simplifiée) :
     *
     * [
     *   "id" => "1",
     *   "socid" => "1",                  // ID du client
     *   "ref_customer" => "49465",       // Référence client
     *   "origin_type" => "commande",     // Type d'origine
     *   "origin_id" => "1",              // ID de la commande liée
     *   "statut" => "0",                 // Statut de l'expédition
     *   "shipping_method_id" => "2",     // ID du mode de livraison
     *   "shipping_method" => "Generic transport service",
     *   "total_ht" => 500,
     *   "total_tva" => 100,
     *   "total_ttc" => 600,
     *   "lines" => [                      // Lignes de l'expédition
     *       [
     *           "id" => "1",
     *           "qty" => "1",
     *           "subprice" => "500.00000000",
     *           "desc" => "bidon de 20 L",
     *           "fk_expedition" => "1",
     *           "qty_shipped" => "1",
     *           "details_entrepot" => [
     *               ["entrepot_id" => null, "qty_shipped" => "1", "line_id" => "1"]
     *           ]
     *       ]
     *   ],
     *   "tracking_number" => "JVGTS0032730162045660",
     *   "tracking_url" => "JVGTS0032730162045660",
     *   "date_delivery" => 1762419600,
     *   "date_expedition" => 1762214400,
     *   "date_shipping" => 1762214400,
     *   "user_author_id" => "1"
     * ]
     *
     * @param array $params Tableau associatif de paramètres GET optionnels pour filtrer les expéditions.
     *                      Exemples :
     *                        - 'sortfield' => t.rowid       // trier par id
     *                        - 'sortorder' => ASC    // trier par ordre croissant
     *                        - 'limit' => '100' // nbr limite de lignes retournées
     *                       - 'page' => '0'    // numéro de page pour la pagination
     *                       - 'thirdparty_ids' => '1,2,3'   // filtrer par ID de ThirdParty
     *                      - 'sqlfilters' => 't.ref:like:'SO-%'  // filtrer where ref like 'SO-%'
     *                       - 'properties' => '' // Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     *                       - 'pagination_data' => true // Include pagination data in the response
     *
     * @return array Retourne un tableau d'expéditions, chaque élément étant un tableau associatif
     *               correspondant à la structure JSON détaillée ci-dessus.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function getAll(array $params = []): array|int|string
    {
        return $this->client->get('shipments', $params);
    }

    /**
     * Récupérer une expédition par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array|int|string
    {
        return $this->client->get("shipments/{$id}");
    }

   /**
     * Crée une nouvelle expédition/livraison dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `shipments` avec les données de l'expédition.
     *
     * Exemple de structure minimale requise pour `$data` :
     *
     * [
     *   "origin_type" => "commande",   // Type de l'origine (ex: "commande")
     *   "origin_id" => 1,              // ID de la commande liée
     *   "shipping_method_id" => 2,     // ID du mode de livraison
     *   "lines" => [                   // Lignes de l'expédition
     *       [
     *           "fk_expedition" => 1,
     *           "fk_product" => 123,       // ID du produit à expédier
     *           "qty" => 1,                // Quantité expédiée
     *           "desc" => "bidon de 20 L", // Description de la ligne
     *           "subprice" => 500.00       // Prix unitaire HT
     *       ]
     *   ],
     *   "tracking_number" => "JVGTS0032730162045660", // Numéro de suivi (optionnel)
     *   "tracking_url" => "https://..."               // URL de suivi (optionnel)
     * ]
     *
     * @param array $data Tableau associatif représentant l'expédition à créer.
     *                    Clés importantes :
     *                      - origin_type (string) : type d'origine (commande, facture…)
     *                      - origin_id (int) : ID de l'origine
     *                      - shipping_method_id (int) : mode de livraison
     *                      - lines (array) : tableau des lignes d'expédition
     *                      - tracking_number (string, optionnel) : numéro de suivi
     *                      - tracking_url (string, optionnel) : URL du suivi
     *
     * @return int Retourne l'identifiant unique (ID) de la nouvelle expédition créée.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function create(array $data): array|int|string
    {
        return $this->client->post('shipments', $data);
    }

   /**
     * Met à jour une expédition/livraison existante dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `shipments/{id}` avec les données à mettre à jour.
     *
     * Exemple de structure de `$data` (peut contenir uniquement les champs à modifier) :
     *
     * [
     *   "shipping_method_id" => 3,       // Changer le mode de livraison
     *   "tracking_number" => "NEWTRACK123456", // Nouveau numéro de suivi
     *   "tracking_url" => "https://...",       // Nouvelle URL de suivi
     *   "lines" => [                       // Mettre à jour les lignes de l'expédition
     *       [
     *           "fk_expedition" => 1,
     *           "fk_product" => 123,
     *           "qty" => 2,               // Nouvelle quantité
     *           "desc" => "bidon 30 L",  // Nouvelle description
     *           "subprice" => 600.00
     *       ]
     *   ]
     * ]
     *
     * @param int   $id   ID de l'expédition à mettre à jour.
     * @param array $data Tableau associatif contenant les champs à mettre à jour.
     *                    Clés possibles (liste non exhaustive) :
     *                      - shipping_method_id (int) : nouveau mode de livraison
     *                      - tracking_number (string) : nouveau numéro de suivi
     *                      - tracking_url (string) : nouvelle URL de suivi
     *                      - lines (array) : tableau des lignes à modifier
     *
     * @return array Retourne la réponse de l'API Dolibarr décodée en tableau associatif,
     *               contenant l'expédition mise à jour avec toutes ses lignes et informations associées.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function update(int $id, array $data): array|int|string
    {
        return $this->client->post("shipments/{$id}", $data);
    }

    /**
     * Supprimer une expédition par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array|int|string
    {
        return $this->client->post("shipments/{$id}/delete");
    }

    /**
     * Clôturer une expédition par ID
     * @param int $id
     * @return array
     */
    public function closeShipment(int $id): array|int|string
    {
        return $this->client->post("shipments/{$id}/close");
    }

    /**
     * Supprimer une ligne d'expédition par ID d'expédition et ID de ligne
     * @param int $id ID de l'expédition
     * @param int $lineId ID de la ligne à supprimer
     * @return array
     */
    public function deleteLine(int $id, int $lineId): array|int|string
    {
        return $this->client->delete("shipments/{$id}/lines/{$lineId}/delete");
    }

    /**
     * Valider une expédition par ID
     * @param int $id
     * @return array
     */
    public function validateShipment(int $id): array|int|string
    {
        return $this->client->post("shipments/{$id}/validate");
    }
}
