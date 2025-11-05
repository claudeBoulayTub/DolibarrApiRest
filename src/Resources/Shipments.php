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
     * Récupérer tous les expéditions/livraisons
     * @param array $params filtres optionnels (ex: ['socid' => 1])
     * @return array
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('shipments', $params);
    }

    /**
     * Récupérer une expédition par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->client->get("shipments/{$id}");
    }

    /**
     * Créer une nouvelle expédition/livraison
     * @param array $data données selon l’API Dolibarr
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('shipments', $data);
    }

    /**
     * Mettre à jour une expédition existante
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        return $this->client->post("shipments/{$id}", $data);
    }

    /**
     * Supprimer une expédition par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->post("shipments/{$id}/delete");
    }
}
