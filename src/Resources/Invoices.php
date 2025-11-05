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
     * Récupérer toutes les factures
     * @param array $params filtres optionnels (ex: ['socid' => 1])
     * @return array
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('invoices', $params);
    }

    /**
     * Récupérer une facture par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->client->get("invoices/{$id}");
    }

    /**
     * Créer une nouvelle facture
     * @param array $data données de la facture selon l’API Dolibarr
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('invoices', $data);
    }

    /**
     * Mettre à jour une facture existante
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        return $this->client->post("invoices/{$id}", $data);
    }

    /**
     * Supprimer une facture par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->post("invoices/{$id}/delete");
    }
}
