<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Products
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * Récupérer tous les produits
     * @param array $params filtres optionnels (ex: ['category_id' => 1])
     * @return array
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('products', $params);
    }

    /**
     * Récupérer un produit par ID
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->client->get("products/{$id}");
    }

    /**
     * Créer un nouveau produit
     * @param array $data données du produit selon l’API Dolibarr
     * @return array
     */
    public function create(array $data): array
    {
        return $this->client->post('products', $data);
    }

    /**
     * Mettre à jour un produit existant
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        return $this->client->post("products/{$id}", $data);
    }

    /**
     * Supprimer un produit par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->post("products/{$id}/delete");
    }
}
