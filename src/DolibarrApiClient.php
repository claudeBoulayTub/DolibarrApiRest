<?php
namespace Tubconcept\DolibarrApiClient;

use GuzzleHttp\Client;
use Tubconcept\DolibarrApiClient\Resources\{
    Orders, Invoices, Products, Shipments, Status, ThirdParties, Tickets, Contacts
};

class DolibarrApiClient
{
    public Client $client;
    public ?string $token = null;
    private bool $usePermanentToken = false;

    // Instances des ressources
    public Orders $orders;
    public Invoices $invoices;
    public Products $products;
    public Shipments $shipments;
    public Status $status;
    public ThirdParties $thirdparties;
    public Tickets $tickets;
    public Contacts $contacts;

    public function __construct(string $baseUri, ?string $login = null, ?string $password = null, ?string $token = null)
    {
        $this->client = new Client(['base_uri' => rtrim($baseUri, '/') . '/', 'timeout' => 10]);
        if ($token) {
            $this->token = $token;
            $this->usePermanentToken = true;
        } else {
            $this->login($login, $password);
        }

        // Initialisation des ressources
        $this->orders = new Orders($this);
        $this->invoices = new Invoices($this);
        $this->products = new Products($this);
        $this->shipments = new Shipments($this);
        $this->status = new Status($this);
        $this->thirdparties = new ThirdParties($this);
        $this->tickets = new Tickets($this);
        $this->contacts = new Contacts($this);
    }

    public function login(?string $login = null, ?string $password = null): bool
    {
        if ($this->usePermanentToken) return true;

        if (!$login || !$password) throw new \Exception("Login/password required for temporary token");

        $response = $this->client->get('login', [
            'query' => [
                'login' => $login,
                'password' => rawurlencode($password),
                'reset' => 1
            ]
        ]);
        $data = json_decode($response->getBody()->getContents(), true);

        if (isset($data['success']['token'])) {
            $this->token = $data['success']['token'];
            return true;
        }

        return false;
    }

    // GET générique
    public function get(string $endpoint, array $params = []): array
    {
        if (!$this->token) $this->login();
        $params['DOLAPIKEY'] = $this->token;

        $response = $this->client->get($endpoint, ['query' => $params]);
        return json_decode($response->getBody()->getContents(), true);
    }

    // POST générique
    public function post(string $endpoint, array $data = []): array
    {
        if (!$this->token) $this->login();
        $response = $this->client->post($endpoint, [
            'query' => ['DOLAPIKEY' => $this->token],
            'json' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
