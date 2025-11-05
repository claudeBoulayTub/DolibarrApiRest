<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Status
{
    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }
     /**
     * Récupérer le Status de Dolibarr
     * @return object
     * @example Response
     * {
     *  "success": {
     *      "code": 200,
     *       "dolibarr_version": "22.0.2",
     *      "access_locked": "0"
     *  }
     * }
     * Response code: 200
     */
    public function get(): array
    {
        return $this->client->get('status');
    }
}
