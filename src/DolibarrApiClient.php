<?php

namespace Tubconcept\DolibarrApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DolibarrApiClient
{
    private string $baseUri;
    private string $login;
    private string $password;
    private ?string $token = null;
    private Client $client;

    public function __construct(string $baseUri, string $login, string $password)
    {
        $this->baseUri = rtrim($baseUri, '/') . '/';
        $this->login = $login;
        $this->password = $password;
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'timeout' => 10.0
        ]);
    }

    // Login pour obtenir un token
    public function login(): bool
    {
        try {
            $response = $this->client->get('login', [
                'query' => [
                    'login' => $this->login,
                    'password' => $this->password,
                    'reset' => 1
                ]
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            if(isset($data['success']) && isset($data['success']['token'])) {
                $this->token = $data['success']['token'];
                return true;
            }
        } catch (RequestException $e) {
            throw new \Exception("Login failed: " . $e->getMessage());
        }
        return false;
    }

    // GET sur un endpoint
    public function get(string $endpoint, array $params = []): array
    {
        if(!$this->token) {
            throw new \Exception("No token. Call login() first.");
        }

        $params['DOLAPIKEY'] = $this->token;

        $response = $this->client->get($endpoint, [
            'query' => $params
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // POST sur un endpoint
    public function post(string $endpoint, array $data = []): array
    {
        if(!$this->token) {
            throw new \Exception("No token. Call login() first.");
        }

        $response = $this->client->post($endpoint, [
            'query' => ['DOLAPIKEY' => $this->token],
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
