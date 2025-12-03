<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Contacts
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * Récupère la liste de tous les contacts dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête GET sur l'endpoint `contacts` avec des filtres optionnels.
     * 
     * Exemple d'appel :
     * ```php
     * $contacts = $api->contacts->getAll([
     *     'sortfield'      => 't.rowid',           // Tri par ID
     *     'sortorder'      => 'ASC',               // Ordre croissant
     *     'limit'          => 100,                 // Nombre maximum de résultats
     *     'page'           => 0,                   // Numéro de page (commence à 0)
     *     'thirdparty_ids' => '1,2,3',             // Filtrer par tiers (clients/fournisseurs)
     *     'category'       => 'CUSTOMER',          // Filtrer par catégorie (optionnel)
     *     'sqlfilters'     => "(t.ref:like:'SO-%') and (t.date_creation:>:'2024-01-01')",
     *     'includecount'   => 1,                   // Inclure le nombre d'éléments liés
     *     'includeroles'   => 1,                   // Inclure les rôles du contact
     *     'properties'     => 'id,lastname,email', // Restreindre les champs retournés
     *     'pagination_data'=> true                 // Inclure les métadonnées de pagination
     * ]);
     * ```
     *
     * 🔹 **Paramètres possibles ($params)** :
     * - **sortfield** (`string`) : Champ utilisé pour trier les résultats. Exemple : `"t.rowid"`.
     * - **sortorder** (`string`) : Ordre de tri (`ASC` ou `DESC`).
     * - **limit** (`int`) : Limite du nombre de résultats retournés (par défaut 100).
     * - **page** (`int`) : Numéro de page à récupérer (commence à 0).
     * - **thirdparty_ids** (`string`) : IDs des tiers dont on veut les contacts (`'1'` ou `'1,2,3'`).
     * - **category** (`string`) : Catégorie de contact pour filtrer la liste.
     * - **sqlfilters** (`string`) : Filtres SQL additionnels.
     *   - Exemple : `"(t.ref:like:'SO-%') and (t.date_creation:>:'2024-01-01')"`
     * - **includecount** (`bool|int`) : Inclure le nombre d’éléments liés (`1` = oui, `0` = non).
     * - **includeroles** (`bool|int`) : Inclure les rôles associés au contact.
     * - **properties** (`string`) : Liste des propriétés à retourner (ex : `"id,lastname,email"`).
     * - **pagination_data** (`bool`) : Si `true`, inclut les données de pagination dans la réponse.
     *
     * @param array $params Tableau associatif des filtres optionnels pour la requête.
     * 
     * @return array Retourne la liste des contacts sous forme de tableau associatif.
     *               Si `pagination_data` est activé, le tableau contient aussi :
     *               - `data` : tableau des contacts
     *               - `pagination` : métadonnées de pagination (`page`, `limit`, `total`, etc.)
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function getAll(array $params = []): array|int|string
    {
        return $this->client->get('contacts', $params);
    }

    /**
     * Récupérer un contact par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array|int|string
    {
        return $this->client->get("contacts/{$id}");
    }

    /**
     * Crée un nouveau contact dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `contacts` avec les données du contact.
     * 
     * Exemple de structure attendue :
     * [
     *     "lastname"        => "test",                      // Nom du contact (obligatoire)
     *     "firstname"       => "developpement",             // Prénom du contact (optionnel)
     *     "civility_code"   => "MR",                        // Civilité (optionnel, ex: MR, MRS)
     *     "address"         => "9 LOTISSEMENT PLEIN SOLEIL, LUYNES", // Adresse postale (optionnel)
     *     "zip"             => "13080",                     // Code postal (optionnel)
     *     "town"            => "Aix en provence",           // Ville (optionnel)
     *     "country_id"      => "1",                         // ID du pays (optionnel)
     *     "country_code"    => "FR",                        // Code ISO du pays (optionnel)
     *     "state_id"        => "304",                       // ID de l’état ou région (optionnel)
     *     "socid"           => "1",                         // ID du tiers (société liée)
     *     "email"           => "test@test.fr",              // Adresse e-mail principale
     *     "phone_pro"       => "0651401715",                // Téléphone professionnel
     *     "phone_perso"     => "",                          // Téléphone personnel (optionnel)
     *     "phone_mobile"    => "",                          // Téléphone mobile (optionnel)
     *     "fax"             => "",                          // Fax (optionnel)
     *     "poste"           => "",                          // Poste ou fonction (optionnel)
     *     "priv"            => "0",                         // 0=contact public, 1=contact privé
     *     "note_public"     => "",                          // Note publique (optionnel)
     *     "note_private"    => "",                          // Note privée (optionnel)
     *     "birthday"        => "",                          // Date d’anniversaire (optionnel, format YYYY-MM-DD)
     *     "default_lang"    => null,                        // Langue par défaut (optionnel)
     *     "name_alias"      => "",                          // Alias ou autre nom (optionnel)
     *     "socialnetworks"  => [],                          // Liens vers les réseaux sociaux (optionnel)
     *     "statut"          => "1",                         // Statut du contact (1 = actif, 0 = inactif)
     *     "user_creation_id"=> "1",                         // ID de l’utilisateur créateur (optionnel)
     *     "user_modification_id" => "1",                    // ID de l’utilisateur modificateur (optionnel)
     *     "stcomm_id"       => "0",                         // Statut commercial (optionnel)
     *     "statut_commercial" => "Jamais contacté",         // État commercial (optionnel)
     *     "roles"           => [],                          // Rôles associés (optionnel)
     *     "entity"          => "1"                          // ID de l'entité Dolibarr (multi-entreprise)
     * ]
     *
     * 🔹 **Champs obligatoires minimaux :**
     * - `lastname` : nom du contact
     * - `socid` : identifiant du tiers auquel le contact est rattaché
     *
     * 🔹 **Champs facultatifs fréquemment utilisés :**
     * - `firstname`, `email`, `phone_pro`, `address`, `town`, `zip`, `country_code`
     * - `note_public`, `note_private`, `civility_code`, `poste`, `priv`
     *
     * 🔹 **Remarques :**
     * - Les champs de type `id` ou `fk_...` correspondent à des relations internes Dolibarr (ex: `socid`, `fk_user_creat`).
     * - Les valeurs non spécifiées peuvent être omises ou définies à `null`.
     * - Si `statut` = 1, le contact sera actif dès sa création.
     *
     * @param array $data Tableau associatif représentant les données du contact à créer.
     *                    Doit contenir au minimum :
     *                      - lastname (string) : nom du contact
     *                      - socid (int) : ID du tiers lié
     *
     * @return int Retourne l'identifiant unique (ID) du nouveau contact créé.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function create(array $data): int
    {
        return $this->client->post('contacts', $data);
    }

    /**
     * Met à jour un contact existant dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `contacts/{id}` 
     * avec les nouvelles données du contact à modifier.
     * 
     * Exemple de structure de mise à jour :
     * [
     *     "lastname"        => "Durand",                   // Nouveau nom du contact (optionnel)
     *     "firstname"       => "Paul",                     // Prénom du contact (optionnel)
     *     "civility_code"   => "MR",                       // Civilité (optionnel, ex: MR, MRS)
     *     "address"         => "12 rue des Fleurs",        // Nouvelle adresse postale (optionnel)
     *     "zip"             => "75001",                    // Code postal (optionnel)
     *     "town"            => "Paris",                    // Ville (optionnel)
     *     "country_code"    => "FR",                       // Code pays ISO (optionnel)
     *     "email"           => "paul.durand@example.com",  // Adresse e-mail (optionnel)
     *     "phone_pro"       => "0145678910",               // Téléphone professionnel (optionnel)
     *     "poste"           => "Responsable achats",       // Poste ou fonction (optionnel)
     *     "note_public"     => "Client fidèle",            // Note publique (optionnel)
     *     "note_private"    => "Appeler avant toute commande", // Note interne (optionnel)
     *     "statut"          => "1",                        // Statut du contact (1 = actif, 0 = inactif)
     *     "user_modification_id" => "2",                   // ID de l'utilisateur ayant fait la modification
     *     "socid"           => "1",                        // ID du tiers lié (si changement de société)
     *     "roles"           => [],                         // Rôles associés (optionnel)
     *     "default_lang"    => "fr_FR"                     // Langue par défaut (optionnel)
     * ]
     *
     * 🔹 **Champs modifiables courants :**
     * - `lastname`, `firstname`, `email`, `phone_pro`, `town`, `address`, `zip`
     * - `poste`, `note_public`, `note_private`, `civility_code`, `socid`
     * - `statut` (0 = inactif, 1 = actif)
     *
     * 🔹 **Bonnes pratiques :**
     * - Seuls les champs fournis dans `$data` seront modifiés.
     * - Les champs absents ne seront pas écrasés côté Dolibarr.
     * - Toujours vérifier l’existence du contact avant la mise à jour pour éviter une erreur 404.
     *
     * Exemple d’appel :
     * ```php
     * $contactId = 5;
     * $data = [
     *     "email" => "nouvel.email@example.com",
     *     "phone_pro" => "0123456789"
     * ];
     * $response = $api->contacts()->update($contactId, $data);
     * ```
     *
     * @param int   $id   Identifiant unique du contact à mettre à jour.
     * @param array $data Tableau associatif contenant les champs à modifier selon l’API Dolibarr.
     *                    Seuls les champs présents dans le tableau seront mis à jour.
     *
     * @return array Retourne la réponse de l’API Dolibarr décodée en tableau associatif.
     *               En cas de succès, contient généralement :
     *               - `success` : booléen indiquant la réussite
     *               - `id` : identifiant du contact modifié
     *               - `message` : message de confirmation
     *               - et/ou les nouvelles valeurs du contact
     *
     * @throws \Exception si le token Dolibarr est manquant, si l’ID n’existe pas ou si la requête HTTP échoue.
     */
    public function update(int $id, array $data): array|int|string
    {
        return $this->client->put("contacts/{$id}", $data);
    }

    /**
     * Supprimer un contact par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array|int|string
    {
        return $this->client->delete("contacts/{$id}/delete");
    }

    /**
     * Récupérer les catégories associées à un contact par ID
     * @param int $id
     * @return array
     */
    public function getCategoriesOfContact(int $id): array|int|string
    {
        return $this->client->get("contacts/{$id}/categories");
    }

    /**
     * Assigner une catégorie à un contact par ID
     * @param int $id
     * @param int $categoryId
     * @return array
     */
    public function assignCategoryToContact(int $id, int $categoryId): array|int|string
    {
        return $this->client->put("contacts/{$id}/categories/{$categoryId}");
    }
    /**
     * Retirer une catégorie d'un contact par ID
     * @param int $id
     * @param int $categoryId
     * @return array
     */
    public function removeCategoryFromContact(int $id, int $categoryId): array|int|string
    {
        return $this->client->delete("contacts/{$id}/categories/{$categoryId}");
    }
    /**
     * Créer un utilisateur à partir d'un contact existant
     * @param int $id
     * @param array $data données de l'utilisateur selon l’API Dolibarr
     * @return int Retourne l'identifiant unique (ID) de l'utilisateur nouvellement créé.
     */
    public function createUserFromContact(int $id, array $data): array|int|string
    {
        return $this->client->post("contacts/{$id}/createuser", $data);
    }

    /**
     * Récupérer un contact par email
     * @param string $email
     * @param int $includecount optionnel
     * @param int $includeRoles optionnel
     * @return array
     */
    public function getContactByEmail(string $email, int $includecount=0,int $includeRoles=0): array|int|string
    {
        
        return $this->client->get("contacts/email/{$email}&includecount={$includecount}&includeroles={$includeRoles}");
    }
}
