<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Tickets
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

   /**
     * Récupère la liste des tickets Dolibarr via l’API REST.
     *
     * Cette méthode appelle l’endpoint `/tickets` pour obtenir la liste des tickets (incidents, demandes, bugs, etc.)
     * selon différents filtres (tiers, pagination, tri, etc.).
     *
     * Exemple d’utilisation :
     * ```php
     * $tickets = $dolibarr->tickets()->getAll([
     *     'socid' => 1,                // Filtrer par ID du tiers (facultatif)
     *     'sortfield' => 't.rowid',    // Champ de tri
     *     'sortorder' => 'DESC',       // Sens du tri (ASC ou DESC)
     *     'limit' => 50,               // Limite du nombre de résultats
     *     'page' => 0,                 // Numéro de page
     *     'sqlfilters' => "(t.status:=:2)", // Filtre SQL avancé (facultatif)
     *     'properties' => '',          // Restreindre les champs retournés (facultatif)
     *     'pagination_data' => false   // Inclure ou non les données de pagination
     * ]);
     * ```
     *
     * @param array $params Tableau de paramètres de requête acceptés par l’API Dolibarr :
     * 
     *                    - **socid** *(int, optionnel)* : Filtrer la liste par l’ID du tiers (client/fournisseur).  
     *                    - **sortfield** *(string, optionnel)* : Champ utilisé pour trier les résultats (ex : `t.rowid`).  
     *                    - **sortorder** *(string, optionnel)* : Ordre du tri (`ASC` ou `DESC`).  
     *                    - **limit** *(int, optionnel)* : Nombre maximum de résultats à renvoyer (par défaut : 100).  
     *                    - **page** *(int, optionnel)* : Numéro de page pour la pagination (commence à 0).  
     *                    - **sqlfilters** *(string, optionnel)* : Critères supplémentaires pour filtrer les résultats.  
     *                      Exemple : `"(t.ref:like:'TS-%') and (t.fk_statut:=:2)"`.  
     *                    - **properties** *(string, optionnel)* : Liste de propriétés spécifiques à renvoyer (séparées par virgules).  
     *                    - **pagination_data** *(bool, optionnel)* : Si `true`, inclut les informations de pagination dans la réponse.
     *
     * @return array Retourne un tableau d’objets représentant les tickets Dolibarr, chacun contenant par exemple :
     * 
     * ```json
     * [
     *   {
     *     "id": "1",
     *     "ref": "TS2511-0001",
     *     "status": "2",
     *     "subject": "Bug dev",
     *     "message": "Petit bug Api cotés tickets a implémenter sous peu merci !",
     *     "fk_soc": "1",
     *     "socid": "1",
     *     "fk_user_assign": "1",
     *     "fk_user_assign_string": "SuperAdmin",
     *     "type_code": "ISSUE",
     *     "category_code": "OTHER",
     *     "severity_code": "LOW",
     *     "type_label": "Issue or bug",
     *     "category_label": "Other",
     *     "severity_label": "Low",
     *     "date_creation": 1762500257,
     *     "date_modification": 1762500257,
     *     "progress": "0",
     *     "resolution": null
     *   }
     * ]
     * ```
     *
     * @throws \Exception Si la requête échoue ou que l’authentification est invalide.
     */
    public function getAll(array $params = []): array|int|string
    {
        return $this->client->get('tickets', $params);
    }

    /**
     * Récupérer un ticket par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array|int|string
    {
        return $this->client->get("tickets/{$id}");
    }

    /**
     * Crée un nouveau ticket Dolibarr via l’API REST.
     *
     * Cette méthode permet d’ajouter un ticket (demande, incident, bug, etc.) dans le module Helpdesk de Dolibarr.
     * Les champs principaux incluent le client concerné, le sujet, le message, le type, la catégorie et la sévérité.
     *
     * Exemple d’utilisation :
     * ```php
     * $ticket = $dolibarr->tickets()->create([
     *     'fk_soc' => 1,                      // ID du tiers (client)
     *     'subject' => 'Bug dev',             // Sujet du ticket
     *     'message' => 'Petit bug API côté tickets à corriger.',
     *     'type_code' => 'ISSUE',             // Type (ex: ISSUE, REQUEST, QUESTION)
     *     'category_code' => 'OTHER',         // Catégorie (ex: OTHER, FEATURE, INCIDENT)
     *     'severity_code' => 'LOW',           // Sévérité (LOW, MEDIUM, HIGH)
     *     'fk_user_assign' => 1,              // Utilisateur assigné
     *     'progress' => 0,                    // Progression (en %)
     *     'private' => 0,                     // Ticket public ou privé
     * ]);
     * ```
     *
     * @param array $data Tableau associatif représentant les champs du ticket à créer :
     *
     *                    - **fk_soc** *(int, requis)* : ID du tiers/client associé au ticket.  
     *                    - **subject** *(string, requis)* : Sujet du ticket (titre court).  
     *                    - **message** *(string, requis)* : Message descriptif ou contenu du ticket.  
     *                    - **type_code** *(string, optionnel)* : Code du type de ticket (`ISSUE`, `REQUEST`, `QUESTION` …).  
     *                    - **category_code** *(string, optionnel)* : Catégorie (`OTHER`, `FEATURE`, etc.).  
     *                    - **severity_code** *(string, optionnel)* : Niveau de sévérité (`LOW`, `MEDIUM`, `HIGH`).  
     *                    - **fk_user_assign** *(int, optionnel)* : ID de l’utilisateur assigné au ticket.  
     *                    - **progress** *(int, optionnel)* : Progression du ticket en pourcentage (0 à 100).  
     *                    - **private** *(bool, optionnel)* : Définir si le ticket est privé (`1`) ou public (`0`).  
     *                    - **resolution** *(string, optionnel)* : Commentaire de résolution du ticket.  
     *                    - **origin_email** *(string, optionnel)* : Email d’origine du ticket (si créé par mail).  
     *                    - **track_id** *(string, optionnel)* : Identifiant unique de suivi (généré automatiquement si absent).  
     *                    - **note_private** *(string, optionnel)* : Note interne visible uniquement par les utilisateurs.  
     *                    - **note_public** *(string, optionnel)* : Note publique visible par le client.  
     *
     * @return int Retourne l'identifiant unique (ID) du ticket créé, par exemple : `1`.
     *
     *
     * @throws \Exception Si la création du ticket échoue ou si les données sont invalides.
     */
    public function create(array $data): array|int|string
    {
        return $this->client->post('tickets', $data);
    }

   /**
     * Met à jour un ticket existant dans Dolibarr via l’API REST.
     *
     * Cette méthode permet de modifier les informations d’un ticket existant, comme son sujet, son message,
     * son statut, la progression, l’utilisateur assigné, ou encore la sévérité.
     *
     * Exemple d’utilisation :
     * ```php
     * $updatedTicket = $dolibarr->tickets()->update(1, [
     *     'subject' => 'Correction du bug API',
     *     'message' => 'Le bug a été corrigé et testé avec succès.',
     *     'progress' => 100,
     *     'fk_user_assign' => 2,
     *     'status' => 3, // Fermé / Résolu
     *     'resolution' => 'Bug corrigé dans la version 2.1',
     * ]);
     * ```
     *
     * @param int   $id   Identifiant unique du ticket à mettre à jour.
     * @param array $data Tableau associatif contenant les champs à modifier :
     *
     *                    - **subject** *(string, optionnel)* : Sujet du ticket.  
     *                    - **message** *(string, optionnel)* : Message ou contenu mis à jour.  
     *                    - **status** *(int|string, optionnel)* : Statut du ticket (`0`: brouillon, `1`: ouvert, `2`: en cours, `3`: fermé).  
     *                    - **progress** *(int, optionnel)* : Progression du ticket en pourcentage (0–100).  
     *                    - **fk_user_assign** *(int, optionnel)* : ID de l’utilisateur assigné.  
     *                    - **severity_code** *(string, optionnel)* : Niveau de sévérité (`LOW`, `MEDIUM`, `HIGH`).  
     *                    - **type_code** *(string, optionnel)* : Type du ticket (`ISSUE`, `REQUEST`, `QUESTION`, etc.).  
     *                    - **category_code** *(string, optionnel)* : Catégorie (`OTHER`, `FEATURE`, etc.).  
     *                    - **resolution** *(string, optionnel)* : Description de la résolution apportée.  
     *                    - **private** *(bool, optionnel)* : Définir si le ticket est privé (`1`) ou public (`0`).  
     *                    - **note_private** *(string, optionnel)* : Note interne visible uniquement par les utilisateurs.  
     *                    - **note_public** *(string, optionnel)* : Note publique visible par le client.  
     *                    - **fk_project** *(int, optionnel)* : Lier le ticket à un projet.  
     *                    - **fk_contract** *(int, optionnel)* : Lier le ticket à un contrat.  
     *
     * @return array Retourne le ticket mis à jour, par exemple :
     *
     * ```json
     * {
     *   "id": "1",
     *   "ref": "TS2511-0001",
     *   "subject": "Correction du bug API",
     *   "message": "Le bug a été corrigé et testé avec succès.",
     *   "status": "3",
     *   "progress": "100",
     *   "fk_user_assign": "2",
     *   "fk_user_assign_string": "Dev API",
     *   "severity_code": "LOW",
     *   "type_code": "ISSUE",
     *   "category_code": "OTHER",
     *   "resolution": "Bug corrigé dans la version 2.1",
     *   "date_modification": 1762510000
     * }
     * ```
     *
     * @throws \Exception Si la mise à jour du ticket échoue ou si l’identifiant est invalide.
     */
    public function update(int $id, array $data): array|int|string
    {
        return $this->client->post("tickets/{$id}", $data);
    }

    /**
     * Supprimer un ticket par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array|int|string
    {
        return $this->client->post("tickets/{$id}/delete");
    }

    /**
     * Ajouter un nouveau message à un ticket existant
     * @param int $id
     * @param array $data
     * @return array
     */
    public function addNewMessage(int $id, array $data): array|int|string
    {
        return $this->client->post("tickets/{$id}/messages", $data);
    }

    /**
     * Récupérer un ticket par sa référence
     * @param string $ref
     * @return array
     */
    public function getFromRef(string $ref): array|int|string
    {
        return $this->client->get("tickets/ref/{$ref}");
    }

    /**
     * Récupérer un ticket par son identifiant de suivi (track_id)
     * @param string $trackId
     * @return array
     */
    public function getFromTrackId(string $trackId): array|int|string
    {
        return $this->client->get("tickets/track_id/{$trackId}");
    }
}
