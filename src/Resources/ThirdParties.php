<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class ThirdParties
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * Récupère la liste des tiers (clients, prospects, fournisseurs) depuis Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête GET sur l'endpoint `thirdparties` et retourne les sociétés, clients,
     * fournisseurs ou prospects selon les filtres transmis dans `$params`.
     *
     * Exemple d’appel :
     * ```php
     * // Récupérer les 50 premiers clients triés par nom
     * $params = [
     *     'sortfield' => 't.rowid',
     *     'sortorder' => 'ASC',
     *     'limit'     => 50,
     *     'page'      => 0,
     *     'category'  => 'Client',
     *     'sqlfilters'=> "(t.client:=:1)" // 1 = client
     * ];
     * $thirdparties = $api->thirdparties()->getAll($params);
     * ```
     *
     * 🔹 **Paramètres disponibles (`$params`) :**
     * - `sortfield` *(string)* : champ de tri (ex: `t.rowid`, `t.name`)
     * - `sortorder` *(string)* : ordre de tri (`ASC` ou `DESC`)
     * - `limit` *(int)* : nombre maximum de résultats à retourner (par défaut 100)
     * - `page` *(int)* : numéro de la page à récupérer (commence à 0)
     * - `thirdparty_ids` *(string)* : IDs de tiers à filtrer (ex: `'1,2,3'`)
     * - `category` *(string)* : filtrer par catégorie (ex: `Client`, `Supplier`)
     * - `sqlfilters` *(string)* : filtres SQL additionnels (ex: `"(t.name:like:'TEST%') and (t.client:=:1)"`)
     * - `includecount` *(int)* : inclure le nombre d’éléments liés (0 ou 1)
     * - `includeroles` *(int)* : inclure les rôles liés au tiers
     * - `properties` *(string)* : liste des propriétés à retourner (séparées par des virgules)
     * - `pagination_data` *(bool)* : si `true`, ajoute les données de pagination à la réponse
     *
     * 🔹 **Exemple de réponse :**
     * ```json
     * [
     *   {
     *     "id": "1",
     *     "ref": "test",
     *     "name": "test",
     *     "entity": "1",
     *     "country_code": "FR",
     *     "country_id": "1",
     *     "address": "9 LOTISSEMENT PLEIN SOLEIL, LUYNES",
     *     "zip": "13080",
     *     "town": "Aix en provence",
     *     "phone": "0651401715",
     *     "email": null,
     *     "client": "1",                  // 1 = client, 2 = prospect, 3 = les deux
     *     "fournisseur": "0",             // 1 = fournisseur
     *     "status": "1",                  // 1 = actif, 0 = inactif
     *     "code_client": "CU2511-00001",  // Code client interne
     *     "mode_reglement_id": "6",       // Mode de règlement
     *     "typent_id": "0",               // Type d’entreprise
     *     "capital": "0.00000000",
     *     "tva_assuj": "1",               // 1 = assujetti à la TVA
     *     "tva_intra": "",                // Numéro de TVA intracommunautaire
     *     "user_creation_id": "1",        // Créé par l’utilisateur ID 1
     *     "user_modification_id": "1",
     *     "date_creation": 1762355641,
     *     "date_modification": 1762355641
     *   }
     * ]
     * ```
     *
     * 🔹 **Champs principaux retournés :**
     * - `id` : identifiant unique du tiers
     * - `ref` : référence du tiers
     * - `name` : nom de la société
     * - `address`, `zip`, `town`, `country_code`
     * - `email`, `phone`, `fax`, `url`
     * - `client`, `prospect`, `fournisseur`
     * - `code_client`, `code_fournisseur`
     * - `status` : statut actif/inactif
     * - `date_creation`, `date_modification`
     * - `mode_reglement_id`, `cond_reglement_id`
     * - `note_public`, `note_private`
     * - `user_creation_id`, `user_modification_id`
     *
     * 🔹 **Remarques :**
     * - La réponse peut contenir des clients, fournisseurs ou prospects selon les filtres.
     * - L’API renvoie un tableau de tiers. Pour un seul tiers, utiliser `getById($id)`.
     * - Les valeurs temporelles sont exprimées en timestamps UNIX.
     *
     * @param array $params Tableau associatif de filtres optionnels pour affiner la recherche.
     *                      Exemple : ['limit' => 100, 'sortorder' => 'ASC', 'category' => 'Client']
     *
     * @return array Retourne la liste des tiers correspondant aux filtres fournis, 
     *               chaque entrée étant un tableau associatif contenant les informations du tiers.
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('thirdparties', $params);
    }

    /**
     * Récupérer un tiers par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->client->get("thirdparties/{$id}");
    }

    /**
     * Crée un nouveau tiers (client, fournisseur ou prospect) dans Dolibarr via l'API REST.
     *
     * Cette fonction envoie une requête POST sur l'endpoint `thirdparties` avec les données du tiers.
     * 
     * Exemple de structure attendue pour créer un tiers :
     * [
     *     "name"                => "test",                      // Nom de la société (obligatoire pour une société)
     *     "lastname"            => "Durand",                    // Nom du contact principal (optionnel)
     *     "firstname"           => "Paul",                       // Prénom du contact (optionnel)
     *     "civility_code"       => "MR",                        // Civilité (optionnel, ex: MR, MRS)
     *     "address"             => "9 LOTISSEMENT PLEIN SOLEIL, LUYNES", // Adresse postale
     *     "zip"                 => "13080",                     // Code postal
     *     "town"                => "Aix en provence",           // Ville
     *     "country_id"          => "1",                         // ID du pays (optionnel)
     *     "country_code"        => "FR",                        // Code ISO du pays
     *     "phone"               => "0651401715",                // Téléphone professionnel
     *     "phone_mobile"        => "0612345678",                // Mobile (optionnel)
     *     "fax"                 => "",                           // Fax (optionnel)
     *     "email"               => "contact@exemple.fr",        // Email (optionnel)
     *     "url"                 => "https://exemple.fr",        // URL (optionnel)
     *     "client"              => "1",                         // 1 = client, 0 = non
     *     "prospect"            => "0",                         // 1 = prospect
     *     "fournisseur"         => "0",                         // 1 = fournisseur
     *     "code_client"          => "CU2511-00001",             // Code client interne (optionnel)
     *     "mode_reglement_id"    => "6",                        // Mode de règlement par défaut
     *     "statut"              => "1",                         // Statut actif/inactif (1 = actif)
     *     "user_creation_id"     => "1",                        // ID utilisateur créateur (optionnel)
     *     "user_modification_id" => "1",                        // ID utilisateur modificateur (optionnel)
     *     "typent_id"           => "0",                         // Type d’entreprise (optionnel)
     *     "capital"             => "0.00000000",               // Capital (optionnel)
     *     "tva_assuj"           => "1",                         // Assujetti TVA (1 = oui, 0 = non)
     *     "tva_intra"           => "",                          // Numéro TVA intracommunautaire (optionnel)
     *     "note_public"         => "Note publique",             // Note publique (optionnel)
     *     "note_private"        => "Note interne",              // Note privée (optionnel)
     *     "socialnetworks"      => [],                           // Liens réseaux sociaux (optionnel)
     *     "extraparams"         => [],                           // Champs extra Dolibarr (optionnel)
     *     "entity"              => "1"                          // Entité Dolibarr (multi-société)
     * ]
     *
     * 🔹 **Champs obligatoires minimaux :**
     * - `name` : nom du tiers
     * - `client`, `prospect` ou `fournisseur` : au moins un type doit être défini
     *
     * 🔹 **Champs facultatifs courants :**
     * - `address`, `zip`, `town`, `country_code`, `phone`, `phone_mobile`, `fax`, `email`, `url`
     * - `mode_reglement_id`, `code_client`, `capital`, `typent_id`, `tva_assuj`, `tva_intra`
     * - `note_public`, `note_private`, `socialnetworks`, `extraparams`
     *
     * 🔹 **Remarques :**
     * - Les valeurs non fournies seront définies par défaut ou null côté Dolibarr.
     * - Le champ `entity` est nécessaire si vous utilisez Dolibarr multi-société.
     * - `statut = 1` rend le tiers actif dès sa création.
     *
     * Exemple d’appel :
     * ```php
     * $data = [
     *     "name" => "Test SARL",
     *     "client" => "1",
     *     "address" => "9 LOTISSEMENT PLEIN SOLEIL, LUYNES",
     *     "zip" => "13080",
     *     "town" => "Aix en provence",
     *     "phone" => "0651401715",
     *     "email" => "contact@exemple.fr",
     *     "statut" => "1",
     *     "user_creation_id" => "1"
     * ];
     * $response = $api->thirdparties()->create($data);
     * ```
     *
     * @param array $data Tableau associatif représentant les informations du tiers à créer.
     *
     * @return array Retourne la réponse de l'API Dolibarr décodée en tableau associatif.
     *               En cas de succès, contient généralement :
     *               - `id` : identifiant du tiers créé
     *               - `ref` : référence interne Dolibarr
     *               - `name` : nom du tiers
     *               - `client`, `prospect`, `fournisseur`
     *
     * @throws \Exception si le token Dolibarr est manquant ou si la requête HTTP échoue.
     */
    public function create(array $data): array
    {
        return $this->client->post('thirdparties', $data);
    }


   /**
    * Met à jour un tiers existant (client, fournisseur ou prospect) dans Dolibarr via l'API REST.
    *
    * Cette fonction envoie une requête POST sur l'endpoint `thirdparties/{id}` 
    * avec les données à modifier pour le tiers identifié par `$id`.
    * 
    * Exemple de structure pour la mise à jour :
    * [
    *     "name"                => "Test SARL Modifié",       // Nouveau nom de la société (optionnel)
    *     "lastname"            => "Durand",                 // Nom du contact principal (optionnel)
    *     "firstname"           => "Paul",                   // Prénom du contact (optionnel)
    *     "civility_code"       => "MR",                     // Civilité (optionnel)
    *     "address"             => "12 rue des Fleurs",      // Nouvelle adresse postale (optionnel)
    *     "zip"                 => "75001",                  // Code postal (optionnel)
    *     "town"                => "Paris",                  // Ville (optionnel)
    *     "country_code"        => "FR",                     // Code pays ISO (optionnel)
    *     "phone"               => "0145678910",             // Téléphone (optionnel)
    *     "phone_mobile"        => "0612345678",             // Mobile (optionnel)
    *     "fax"                 => "",                        // Fax (optionnel)
    *     "email"               => "nouveau.email@exemple.fr", // Email (optionnel)
    *     "client"              => "1",                       // Type client (optionnel)
    *     "prospect"            => "0",                       // Type prospect (optionnel)
    *     "fournisseur"         => "0",                       // Type fournisseur (optionnel)
    *     "code_client"          => "CU2511-00001",           // Code client interne (optionnel)
    *     "mode_reglement_id"    => "6",                       // Mode de règlement (optionnel)
    *     "statut"              => "1",                       // Statut actif/inactif (optionnel)
    *     "note_public"         => "Note publique mise à jour", // Note publique (optionnel)
    *     "note_private"        => "Note interne mise à jour",  // Note privée (optionnel)
    *     "user_modification_id" => "2",                       // ID utilisateur ayant modifié
    *     "socialnetworks"      => [],                          // Liens réseaux sociaux (optionnel)
    *     "extraparams"         => [],                          // Champs extra Dolibarr (optionnel)
    *     "entity"              => "1"                          // Entité Dolibarr (multi-société)
    * ]
    *
    * 🔹 **Champs modifiables courants :**
    * - `name`, `lastname`, `firstname`, `civility_code`
    * - `address`, `zip`, `town`, `country_code`
    * - `phone`, `phone_mobile`, `fax`, `email`, `url`
    * - `client`, `prospect`, `fournisseur`
    * - `code_client`, `mode_reglement_id`, `statut`
    * - `note_public`, `note_private`
    *
    * 🔹 **Bonnes pratiques :**
    * - Seuls les champs fournis dans `$data` seront modifiés.
    * - Les champs absents ne seront pas écrasés côté Dolibarr.
    * - Vérifier que le tiers existe avant la mise à jour pour éviter une erreur 404.
    *
    * Exemple d’appel :
    * ```php
    * $tierId = 5;
    * $data = [
    *     "email" => "nouveau.email@exemple.fr",
    *     "phone" => "0145678910",
    *     "town"  => "Paris"
    * ];
    * $response = $api->thirdparties()->update($tierId, $data);
    * ```
    *
    * @param int   $id   Identifiant unique du tiers à mettre à jour.
    * @param array $data Tableau associatif des champs à modifier selon l’API Dolibarr.
    *                    Seuls les champs fournis seront modifiés.
    *
    * @return array Retourne la réponse de l'API Dolibarr décodée en tableau associatif.
    *               En cas de succès, contient généralement :
    *               - `id` : identifiant du tiers modifié
    *               - `name` : nom du tiers
    *               - `client`, `prospect`, `fournisseur`
    *               - `message` : message de confirmation
    *
    * @throws \Exception si le token Dolibarr est manquant, si l’ID n’existe pas ou si la requête HTTP échoue.
    */
    public function update(int $id, array $data): array
    {
        return $this->client->post("thirdparties/{$id}", $data);
    }

    /**
     * Supprimer un tiers par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->post("thirdparties/{$id}/delete");
    }

    /**
     * Supprimer les comptes liés à un tiers par ID
     * @param int $id
     * @return array
     */
    public function deleteAccounts(int $id): array
    {
        return $this->client->delete("thirdparties/{$id}/accounts");
    }

    /**
     * Récupérer les comptes liés à un tiers par ID
     * @param int $id
     * @param string|null $site Filtrer par site spécifique (optionnel)
     * @return array
     */
    public function getAccounts(int $id,string|null $site=null): array
    {
        if ($site !== null) {
            return $this->client->get("thirdparties/{$id}/accounts", ['site' => $site]);
        }else{
          return $this->client->get("thirdparties/{$id}/accounts");  
        }
        
    }
    /**
     * Créer un compte lié à un tiers par ID
     * @param int $id
     * @param array $data
     * Example body payload : {"key_account": "cus_DAVkLSs1LYyYI", "site": "stripe"}
     * @return array
     */
    public function createAccount(int $id, array $data): array
    {
        return $this->client->post("thirdparties/{$id}/accounts", $data);
    }

    /**
     * Supprimer un compte lié à un tiers par ID et site
     * @param int $id
     * @param string $site
     * @return array
     */
    public function deleteSiteByAccount(int $id, string $site): array
    {
        return $this->client->delete("thirdparties/{$id}/accounts/{$site}");
    }
    /**
     * Attacher un compte lié à un tiers par ID et site
     * @param int $id
     * @param string $site
     * @param array $data
     * Example body payload : {"key_account": "cus_DAVkLSs1LYyYI"}
     * @return array
     */
    public function attachSiteByAccount(int $id, string $site, array $data): array
    {
        return $this->client->post("thirdparties/{$id}/accounts/{$site}", $data);
    }
    /**
     * Mettre à jour un compte lié à un tiers par ID et site
     * @param int $id
     * @param string $site
     * @param array $data
     * Example body payload : {"key_account": "cus_DAVkLSs1LYyYI"}
     * @return array
     */
    public function updateSiteByAccount(int $id, string $site, array $data): array
    {
        return $this->client->put("thirdparties/{$id}/accounts/{$site}", $data);
    }

    /**
     * Récupérer les comptes bancaires liés à un tiers par ID
     * @param int $id
     * @return array
     */
    public function getBankAccounts(int $id): array
    {
        return $this->client->get("thirdparties/{$id}/bankaccounts");
    }
    /**
     * Créer un compte bancaire lié à un tiers par ID
     * @param int $id
     * @param array $data
     * Example body payload : {"bank_name": "Bank of Test", "iban": "FR7612345678901234567890123", "bic": "TESTFRPP"}
     * @return array
     */
    public function createBankAccount(int $id, array $data): array
    {
        return $this->client->post("thirdparties/{$id}/bankaccounts", $data);
    }
    /**
     * Supprimer un compte bancaire lié à un tiers par ID et compte bancaire ID
     * @param int $id
     * @param int $bankAccountId
     * @return array
     */    public function deleteBankAccount(int $id, int $bankAccountId): array
    {
        return $this->client->delete("thirdparties/{$id}/bankaccounts/{$bankAccountId}");
    }

    /**
     * Mettre à jour un compte bancaire lié à un tiers par ID et compte bancaire ID
     * @param int $id
     * @param int $bankAccountId
     * @param array $data
     * Example body payload : {"bank_name": "Bank of Test Updated", "iban": "FR7612345678901234567890123", "bic": "TESTFRPP"}
     * @return array
     */
    public function updateBankAccount(int $id, int $bankAccountId, array $data): array
    {
        return $this->client->put("thirdparties/{$id}/bankaccounts/{$bankAccountId}", $data);
    }

    /**
     * Récupérer les catégories clients liées à un tiers par ID
     * @param int $id
     * @return array
     */
    public function getCustomerCategories(int $id): array
    {
        return $this->client->get("thirdparties/{$id}/categories");
    }

    public function removeCustomerCategory(int $id, int $categoryId): array
    {
        return $this->client->delete("thirdparties/{$id}/categories/{$categoryId}");
    }

    public function addCustomerCategory(int $id, int $categoryId): array
    {
        return $this->client->put("thirdparties/{$id}/categories/{$categoryId}");
    }

    /**
     * Appliquer des remises en montant fixe à un tiers par ID
     * @param int $id
     * @param array $data
     * Example body payload : {"filter": none, "sortfield": "type", "sortorder": "ASC"}
     * Filter exceptional discount. "none" will return every discount, "available" returns unapplied discounts, "used" returns applied discounts
     * @return array
     */
    public function fixedAmountsDiscounts(int $id, array $data): array
    {
        return $this->client->post("thirdparties/{$id}/fixedamountsdiscounts", $data);
    }
    /**
     * Générer un document pour un compte bancaire lié à un tiers par ID
     * @param int $id
     * @param int $companybankid
     * @param string $model ex:sepamandate model de document à générer
     * @return array
     */
    public function generateBankAccountDocument(int $id, int $companybankid,string $model): array
    {
        return $this->client->post("/thirdparties/{$id}/generateBankAccountDocument/{$companybankid}/{$model}");
    }

    /**
     * Récupérer les factures éligibles aux avoirs pour un tiers par ID
     * @param int $id
     * @return array
     */
    public function getInvoicesQualifiedForCreditNotes(int $id): array
    {
        return $this->client->get("thirdparties/{$id}/invoicesqualifiedforcreditnotes");
    }

    /**
     * Récupérer les factures éligibles aux remplacements pour un tiers par ID
     * @param int $id
     * @return array
     */
    public function getInvoicesQualifiedForReplacement(int $id): array
    {
        return $this->client->get("thirdparties/{$id}/invoicesqualifiedforreplacement");
    }
    /**
     * Fusionner un tiers avec un autre tiers par ID
     * @param int $id
     * @param int $targetId supprimer le tiers $targetId et fusionner dans le tiers $id
     * @return array
     */
    public function Merge(int $id, int $targetId): array
    {
        return $this->client->put("thirdparties/{$id}/merge/{$targetId}");
    }
    /**
     * Récupérer les notifications liées à un tiers par ID
     * @param int $id
     * @return array
     */
    public function getNotifications(int $id): array
    {
        return $this->client->get("thirdparties/{$id}/notifications");
    }

    /**
     * Supprimer une notification liée à un tiers par ID et notification ID
     * @param int $id
     * @param int $notificationId
     * @return array
     */
    public function deleteNotification(int $id, int $notificationId): array
    {
        return $this->client->delete("thirdparties/{$id}/notifications/{$notificationId}");
    }

    /**
     * Créer une notification liée à un tiers par ID
     * @param int $id
     * @param array $data
     * Example body payload : {"type": "email", "message": "Votre message ici", "date_notification": 1762355641}
     * @return array
     */
    public function createNotification(int $id, array $data): array
    {
        return $this->client->post("thirdparties/{$id}/notifications", $data);
    }
    /**
     * Mettre à jour une notification liée à un tiers par ID et notification ID
     * @param int $id
     * @param int $notificationId
     * @param array $data
     * Example body payload : {"type": "email", "message": "Votre message mis à jour", "date_notification": 1762355641}
     * @return array
     */
    public function updateNotification(int $id, int $notificationId, array $data): array
    {
        return $this->client->put("thirdparties/{$id}/notifications/{$notificationId}", $data);
    }
    /**
     * Créer une notification par code liée à un tiers par ID
     * @param int $id
     * @param string $code
     * @param array $data
     * Example body payload : {"date_notification": 1762355641}
     * @return array
     */
    public function createNotificationsByCode(int $id, string $code,array $data): array
    {
        return $this->client->post("thirdparties/{$id}/notifications/code/{$code}",$data);
    }
    /**
     * Récupérer les factures impayées pour un tiers par ID
     * @param int $id
     * @param string $mode "customer" ou "supplier"
     * @return array
     */
    public function outstandingInvoices(int $id,string $mode="customer"): array
    {
        return $this->client->get("thirdparties/{$id}/outstandinginvoices", ['mode' => $mode]);
    }

    /**
     * Récupérer les commandes impayées pour un tiers par ID
     * @param int $id
     * @param string $mode "customer" ou "supplier"
     * @return array
     */
    public function outstandingOrders(int $id,string $mode="customer"): array
    {
        return $this->client->get("thirdparties/{$id}/outstandingorders", ['mode' => $mode]);
    }

    /**
     * Récupérer les propositions commerciales impayées pour un tiers par ID
     * @param int $id
     * @param string $mode "customer" ou "supplier"
     * @return array
     */
    public function outstandingProposals(int $id,string $mode="customer"): array
    {
        return $this->client->get("thirdparties/{$id}/outstandingproposals", ['mode' => $mode]);
    }

    /**
     * Supprimer un représentant lié à un tiers par ID et représentant ID
     * @param int $id
     * @param int $representativeId
     * @return array
     */
    public function deleteRepresentative(int $id, int $representativeId): array
    {
        return $this->client->delete("thirdparties/{$id}/representatives/{$representativeId}");
    }

    /**
     * Ajouter un représentant lié à un tiers par ID et représentant ID
     * @param int $id
     * @param int $representativeId
     * @return array
     * @method Post
     */
    public function addRepresentative(int $id, int $representativeId): array
    {
        return $this->client->post("thirdparties/{$id}/representatives/{$representativeId}");
    }

    /**
     * Récupérer les représentants liés à un tiers par ID
     * @param int $id
     * @return array
     */
    public function getRepresentatives(int $id): array
    {
        return $this->client->get("thirdparties/{$id}/representatives");
    }

    /**
     * Définir le niveau de prix pour un tiers par ID
     * @param int $id
     * @param int $priceLevelId
     * @return array
     */
    public function setPriceLevel(int $id, int $priceLevelId): array
    {
        return $this->client->put("thirdparties/{$id}/pricelevel/{$priceLevelId}");
    }

    /**
     * Récupérer les catégories fournisseurs liées à un tiers par ID
     * @param int $id
     * @param array $data [sortfield=>'s.rowid', sortorder=>'ASC',limit=>'', page=>'']
     * @return array
     */
    public function getSupplierCategories(int $id,array $data=['sortfield'=>'s.rowid', 'sortorder'=>'ASC','limit'=>'', 'page'=>'']): array
    {
        return $this->client->get("thirdparties/{$id}/supplier_categories",$data);
    }

    /**
     * Supprimer une catégorie fournisseur liée à un tiers par ID et catégorie ID
     * @param int $id
     * @param int $categoryId
     * @return array
     */
    public function removeSupplierCategory(int $id, int $categoryId): array
    {
        return $this->client->delete("thirdparties/{$id}/supplier_categories/{$categoryId}");
    }
    /**
     * Ajouter une catégorie fournisseur liée à un tiers par ID et catégorie ID
     * @param int $id
     * @param int $categoryId
     * @return array
     */
    public function addSupplierCategory(int $id, int $categoryId): array
    {
        return $this->client->put("thirdparties/{$id}/supplier_categories/{$categoryId}");
    }

    /**
     * Récupérer un compte lié à un tiers par site et key_account
     * @param string $site
     * @param string $key_account
     * @return array
     */
    public function getByAccount(string $site, string $key_account): array
    {
        return $this->client->get("thirdparties/accounts/{$site}/{$key_account}");
    }

    /**
     * Récupérer un tiers par code-barres
     * @param string $barcode
     * @return array
     */
    public function getByBarcode(string $barcode): array
    {
        return $this->client->get("thirdparties/barcode/{$barcode}");
    }

    /**
     * Récupérer un tiers par email
     * @param string $email
     * @return array
     */
    public function getByEmail(string $email): array
    {
        return $this->client->get("thirdparties/email/{$email}");
    }
}
