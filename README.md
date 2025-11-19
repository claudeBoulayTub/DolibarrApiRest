# Dolibarr API Client (SDK)

Client PHP léger pour communiquer avec l'API REST de Dolibarr.

**Repository**: `tubconcept/dolibarr-api-client`

**Description**: Ce package fournit un client simple pour appeler les endpoints REST de Dolibarr (tiers, factures, commandes, produits, expéditions, tickets, etc.). Il utilise `Guzzle` pour les requêtes HTTP et gère l'authentification via token permanent ou login/mot de passe (token temporaire).

**Prérequis**
- **PHP**: `>=7.4`
- **Composer** pour l'installation

**Installation**

Installez le package via Composer :

```
composer require tubconcept/dolibarr-api-client
```

**Utilisation rapide**

Exemples d'utilisation basiques.

Note importante : les ressources (tiers, factures, commandes, etc.) doivent être initialisées avec l'objet `DolibarrApiClient` afin qu'elles puissent réutiliser la même configuration et le token d'authentification. Deux approches sont possibles :

- Instancier explicitement la ressource en lui passant l'objet client (expliqué ci-dessous).
- Utiliser la propriété publique déjà initialisée sur l'objet client (ex : `$api->thirdparties`) — mais l'initialisation explicite est claire et réutilisable.

- Authentification par login/mot de passe (génère un token temporaire) :

```php
use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Resources\ThirdParties;

$api = new DolibarrApiClient(
    'https://dolibarr.example.com/api/index.php/',
    'votre_login',
    'votre_mot_de_passe'
);

// Initialisation explicite de la ressource ThirdParties avec l'objet client
$thirdParties = new ThirdParties($api);

$tiers = $thirdParties->getAll(['limit' => 10]);
print_r($tiers);
```

- Authentification par token permanent (recommandé pour scripts/serveurs) :

```php
use Tubconcept\DolibarrApiClient\DolibarrApiClient;
use Tubconcept\DolibarrApiClient\Resources\Invoices;

$api = new DolibarrApiClient(
    'https://dolibarr.example.com/api/index.php/',
    null,
    null,
    'VOTRE_DOLAPIKEY_PERMANENT'
);

// Init explicite de la ressource Invoices
$invoices = new Invoices($api);

$invoice = $invoices->getById(123);
print_r($invoice);
```

**Quelques exemples de ressources et méthodes**

- Tiers (ThirdParties)
  - `getAll(array $params)` : récupérer la liste des tiers
  - `getById(int $id)` : récupérer un tiers par ID
  - `create(array $data)` : créer un tiers
  - `update(int $id, array $data)` : mettre à jour un tiers
  - `delete(int $id)` : supprimer un tiers

- Factures (Invoices)
  - `getById(int $id)` — obtenir une facture
  - `getAll(array $params)` — lister les factures
  - `create(array $data)` — créer une facture

(Les classes de ressources se trouvent dans `src/Resources/` et exposent des méthodes listées dans les docblocks.)

**Exemple : créer un tiers**

```php
$data = [
    'name' => 'Ma Société',
    'client' => '1',
    'address' => '9 rue Exemple',
    'zip' => '75000',
    'town' => 'Paris',
    'email' => 'contact@exemple.com',
    'statut' => '1'
];
$thirdparties=new Thirdparties($api)
$response = $thirdparties->create($data);
print_r($response);
```

**Gestion des erreurs**
- Les méthodes du client utilisent Guzzle et peuvent lancer des exceptions en cas d'erreurs réseau ou HTTP. En cas de problème d'authentification, une exception sera levée depuis `login()`.
- Il est recommandé d'encapsuler les appels dans des blocs `try/catch` pour gérer proprement les erreurs.

```php
try {
    $tiers = $thirdparties->getAll(['limit' => 10]);
} catch (\Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
```

**Exemples fournis**
- Le répertoire `examples/` contient des scripts d'exemples : `createClient.php`, `InvoiceExample.php`, `OrderExample.php`, `ShipmentExample.php`, `ThirdpartiesExample.php`.

**Contribuer**
- Ouvrir une issue pour discuter des changements ou signaler un bug.
- Faire des Pull Requests avec des descriptions claires et des tests si possible.

**Licence**
- Ce projet est sous licence `MIT` (voir le fichier `LICENSE`).

**Remarques & conseils**
- Préférez un `DOLAPIKEY` permanent pour les environnements automatisés.
- Respectez les limites et paramètres de pagination de l'API Dolibarr (utilisez `limit` et `page`).
- Consultez la documentation Dolibarr côté serveur pour connaître les champs attendus sur les endpoints (versions Dolibarr et endpoints peuvent varier).

Si vous souhaitez, je peux :
- Ajouter des extraits d'exemples détaillés pour chaque ressource (`Invoices`, `Orders`, `Products`).
- Ajouter une section de tests/unitaires ou config CI (GitHub Actions).
