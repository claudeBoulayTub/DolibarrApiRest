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
     * Récupérer tous les tickets
     * @param array $params filtres optionnels (ex: ['socid' => 1, 'status' => 1])
     * @return array
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('tickets', $params);
    }

    /**
     * Récupérer un ticket par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->client->get("tickets/{$id}");
    }

    /**
     * Créer un nouveau ticket
     * @param array $data données du ticket selon l’API Dolibarr
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('tickets', $data);
    }

    /**
     * Mettre à jour un ticket existant
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        return $this->client->post("tickets/{$id}", $data);
    }

    /**
     * Supprimer un ticket par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->post("tickets/{$id}/delete");
    }
}
