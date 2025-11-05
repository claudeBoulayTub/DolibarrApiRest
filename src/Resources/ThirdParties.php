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
     * Récupérer tous les tiers (clients, fournisseurs, prospects)
     * @param array $params filtres optionnels (ex: ['client' => 1, 'supplier' => 0])
     * @return array
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
     * Créer un nouveau tiers
     * @param array $data données du tiers selon l’API Dolibarr
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('thirdparties', $data);
    }

    /**
     * Mettre à jour un tiers existant
     * @param int $id
     * @param array $data
     * @return array
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
}
