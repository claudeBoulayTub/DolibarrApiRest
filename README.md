# Dolibarr API Client (SDK)

Lightweight PHP client to interact with Dolibarr's REST API.

Repository: `tubconcept/dolibarr-api-client`

Description: This package provides a simple client to call Dolibarr REST endpoints (third parties, invoices, orders, products, shipments, tickets, etc.). It uses `Guzzle` for HTTP requests and supports authentication with either a permanent API key (DOLAPIKEY) or login/password (temporary token).

Prerequisites
- PHP: `>=7.4`
- Composer to install dependencies

Installation

Install the package via Composer:

```bash
composer require tubconcept/dolibarr-api-client
```

Quick start

Basic usage examples.

Important note: Resource classes (third parties, invoices, orders, etc.) must be initialized with the same `DolibarrApiClient` instance so they share configuration and the authentication token. Two ways to use resources:

- Instantiate a resource explicitly by passing the client (recommended for clarity).
- Use the public properties already initialized on the client object (for convenience), e.g. `$api->thirdparties`.

- Authenticate with login/password (generate a temporary token):

```php
use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Resources\ThirdParties;

$api = new DolibarrApiClient(
    'https://dolibarr.example.com/api/index.php/',
    'your_login',
    'your_password'
);

// Explicitly initialize the ThirdParties resource with the client
$thirdParties = new ThirdParties($api);

$list = $thirdParties->getAll(['limit' => 10]);
print_r($list);
```

- Authenticate with a permanent token (recommended for automation):

```php
use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Resources\Invoices;

$api = new DolibarrApiClient(
    'https://dolibarr.example.com/api/index.php/',
    null,
    null,
    'YOUR_PERMANENT_DOLAPIKEY'
);

// Explicitly initialize the Invoices resource
$invoices = new Invoices($api);

$invoice = $invoices->getById(123);
print_r($invoice);
```

Resource examples and methods

- Third Parties (`ThirdParties`)
  - `getAll(array $params)` : retrieve a list of third parties
  - `getById(int $id)` : retrieve a single third party by ID
  - `create(array $data)` : create a third party
  - `update(int $id, array $data)` : update a third party
  - `delete(int $id)` : delete a third party

- Invoices (`Invoices`)
  - `getById(int $id)` — get an invoice
  - `getAll(array $params)` — list invoices
  - `create(array $data)` — create an invoice

(Resource classes are located in `src/Resources/` and methods are documented in the class docblocks.)

Example: create a third party

```php
$data = [
    'name' => 'My Company',
    'client' => '1',
    'address' => '9 Example Street',
    'zip' => '75000',
    'town' => 'Paris',
    'email' => 'contact@example.com',
    'statut' => '1'
];

$thirdParties = new \Tubconcept\DolibarrApiClient\Resources\ThirdParties($api);
$response = $thirdParties->create($data);
print_r($response);
```

Error handling

- Methods use Guzzle and may throw exceptions for network or HTTP errors. Authentication issues will raise exceptions from `login()`.
- Wrap API calls in `try/catch` blocks to handle errors gracefully.

```php
try {
    $list = $thirdParties->getAll(['limit' => 10]);
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

Provided examples

- The `examples/` folder contains example scripts: `createClient.php`, `InvoiceExample.php`, `OrderExample.php`, `ShipmentExample.php`, `ThirdpartiesExample.php`.

Contributing

- Open an issue to discuss changes or report bugs.
- Send pull requests with clear descriptions and tests when possible.

License

- This project is licensed under the MIT License (see the `LICENSE` file).

Notes & recommendations

- Prefer a permanent `DOLAPIKEY` for automated environments.
- Respect Dolibarr API pagination and limits (use `limit` and `page`).
- Check the Dolibarr server documentation for expected fields on endpoints (Dolibarr versions and endpoints can vary).

If you want, I can:
- Add detailed examples for each resource (`Invoices`, `Orders`, `Products`).
- Add a tests / CI section (GitHub Actions).
