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
     * Récupérer tous les contacts
     * @param array $params filtres optionnels (ex: ['socid' => 1])
     * @return array
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('contacts', $params);
    }

    /**
     * Récupérer un contact par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->client->get("contacts/{$id}");
    }

    /**
     * Créer un nouveau contact
     * @param array $data données du contact selon l’API Dolibarr
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('contacts', $data);
    }

    /**
     * Mettre à jour un contact existant
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        return $this->client->post("contacts/{$id}", $data);
    }

    /**
     * Supprimer un contact par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->post("contacts/{$id}/delete");
    }
}
