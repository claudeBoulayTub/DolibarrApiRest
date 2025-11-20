<?php
namespace Tubconcept\DolibarrApiClient\Resources;

use Tubconcept\DolibarrApiClient\DolibarrApiClient;

class Setups{

    private DolibarrApiClient $client;

    public function __construct(DolibarrApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * Récupère la liste des "action triggers" configurés dans Dolibarr.
     *
     * @param string $sortfield="t.rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page
     * @param string|null $elementtype ('adherent', 'commande', 'thirdparty', 'facture', 'propal', 'product', ...)
     * @param string|null $lang Code of the language the label of the type must be translated to
     * @param string|null $sqlfilters
     * 
     * @return array
     * 
     */
    public function getActionTriggers(string $sortfield="t.rowid",string $sortorder="ASC",int $limit=100,?int $page=null,
    ?string $elementtype=null,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($elementtype!=null){$body["elementtype"]=$elementtype;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/actiontriggers",$body);
    }

    /**
     * Vérifie l'intégrité des fichiers/modules selon une cible de signatures.
     *
     * @param string $target Can be 'local' or 'default' or Url of the signatures file to use for the test. Must be reachable by the tested Dolibarr.
     * 
     * @return array
     * 
     */
    public function checkIntegrety(string $target):array{
        return $this->client->get("setup/checkintegrity",["target"=>$target]);
    }

    /**
     * Récupère les propriétés et informations de la société configurée dans Dolibarr.
     *
     * @return array|int|string
     * 
     */
    public function getCompanyProps():array|int|string{
        return $this->client->get("setup/company");
    }

    /**
     * Récupère la configuration globale (toutes les variables de configuration).
     *
     * @return array|int|string
     * 
     */
    public function getConf():array|int|string{
        return $this->client->get("setup/conf");
    }

    /**
     * Récupère la valeur d'une variable de configuration identifiée par son nom.
     *
     * @param string $variableName
     * 
     * @return array|int|string
     * 
     */
    public function getValueConf(string $variableName):array|int|string{
        return $this->client->get("setup/conf/{$variableName}");
    }

    /**
     * Récupère la liste des disponibilités (availability) du dictionnaire de configuration.
     *
     * @param string $sortfield="t.rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getAvailabilities(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/availability",$body);

    }

    /**
     * Récupère la liste des civilités (M., Mme, etc.) utilisées dans Dolibarr.
     *
     * @param string $sortfield="t.rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getCivilities(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/civilities",$body);

    }

    /**
     * Récupère les types de contact disponibles (facturation, livraison, etc.).
     *
     * @param string $sortfield="t.rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param string|null $type=null
     * @param string|null $module=null
     * @param int $active=1
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getContactTypes(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?string $type=null,?string $module=null,int $active=1,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($type!=null){$body["type"]=$type;}
        if($module!=null){$body["module"]=$module;}
        if($active!=null){$body["active"]=$active;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/contact_types",$body);
    }

    /**
     * Récupère la liste des pays depuis le dictionnaire de Dolibarr.
     *
     * @param string $sortfield="t.rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getCountries(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/countries",$body);
    }

    /**
     * Récupère les informations d'un pays par son identifiant.
     *
     * @param int $id
     * @param string|null $lang
     * 
     * @return array
     * 
     */
    public function getCountryById(int $id,?string $lang=null):array{
        return $this->client->get("setup/dictionary/countries/{$id}",["lang"=>$lang]);       
    }

    /**
     * Récupère un pays à partir de son code interne (code de pays Dolibarr).
     *
     * @param string $code
     * @param string|null $lang=null
     * 
     * @return array
     * 
     */
    public function getCountryByCode(string $code,?string $lang=null):array{
        return $this->client->get("setup/dictionary/countries/byCode/{$code}",["lang"=>$lang]);
    }

    /**
     * Récupère un pays à partir de son code ISO (ISO alpha-2 ou alpha-3 selon Dolibarr).
     *
     * @param string $iso
     * @param string|null $lang=null
     * 
     * @return array
     * 
     */
    public function getCountryByISO(string $iso,?string $lang=null):array{
        return $this->client->get("setup/dictionary/countries/byISO/{$iso}",["lang"=>$lang]);
    }


    /**
     * Récupère la liste des devises et, si demandé, les taux de change (multi-currency).
     *
     * @param int|null $multicurrency=null Multicurrency rates (0: no multicurrency, 1: last rate, 2: all rates)
     * @param string $sortfield="code_iso"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getCurrencies(?int $multicurrency=null,string $sortfield="code_iso",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($multicurrency!=null){$body["multicurrency"]=$multicurrency;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/currencies",$body);
    }

    /**
     * Récupère les types d'événements (event types) disponibles dans le système.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getEventTypes(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/event_types",$body);
    }

    /**
     * Récupère les types de notes de frais (expense report types) configurés.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getExpenseReportTypes(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/expensereport_types",$body);
    }

    public function getIncoterms(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/incoterms",$body);
    }

    /**
     * Récupère la liste des formes juridiques (legal forms), optionnellement filtrées par pays.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param int|null $countryId=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getLegalForm(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?int $countryId=null,?string $sqlfilters=null):array{
         $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($countryId!=null){$body["lang"]=$countryId;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/legal_form",$body);
    }

    /**
     * Récupère les méthodes de commande (modes d'approvisionnement / ordering methods).
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getOrderingMethods(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/legal_form",$body);
    }

    /**
     * Récupère les origines possibles d'une commande (ordering origins).
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getOrderingOrigins(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/ordering_origins",$body);
    }

    /**
     * Récupère les conditions de paiement (payment terms) disponibles.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getPaymentTerms(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/payment_terms",$body);
    }

    /**
     * Récupère les types de paiement disponibles dans Dolibarr.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getPaymentTypes(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/payment_terms",$body);
    }

    /**
     * Récupère la liste des régions (regions) depuis le dictionnaire.
     *
     * @param string $sortfield="code_region"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getRegions(string $sortfield="code_region",string $sortorder="ASC",int $limit=100,
    ?int $page=null,int $active=1,?string $sqlfilters=null):array{
          $body=[$sortfield,$sortorder,$limit];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/regions",$body);
    }

    /**
     * Récupère les informations d'une région par son identifiant.
     *
     * @param int $id
     * 
     * @return array
     * 
     */
    public function getRegionsId(int $id):array{
        return $this->client->get("setup/dictionary/regions/{$id}");
    }

    /**
     * Récupère une région à partir de son code.
     *
     * @param string $code
     * 
     * @return array
     * 
     */
    public function getRegionByCode(string $code):array{
        return $this->client->get("setup/dictionary/regions/byCode/{$code}");
    }

    /**
     * Récupère les méthodes d'expédition (shipping methods) configurées.
     *
     * @param int $limit=100
     * @param int|null $page=null
     * @param int $active=1
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return [type]
     * 
     */
    public function getShippingMethods(int $limit=100,?int $page=null,int $active=1,
    ?string $lang=null,?string $sqlfilters=null){
        $body=[$limit,$active];
        if($page!=null){$body["page"]=$page;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/shipping_methods",$body);
    }

    /**
     * Récupère la liste des réseaux sociaux référencés (pour contacts/prospects).
     *
     * @param string $sortfield="rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getSocialNetworks(string $sortfield="rowid",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/socialnetworks",$body);
    }

    /**
     * Récupère la liste du personnel (staff) ou des utilisateurs selon les filtres.
     *
     * @param string $sortfield="id"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int|null $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getStaff(string $sortfield="id",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?int $active=1,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
         return $this->client->get("setup/dictionary/staff",$body);
    }

    /**
     * Récupère la liste des départements / états pour un pays donné.
     *
     * @param string $sortfield="code_departement"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int|null $countryId
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getStates(string $sortfield="code_departement",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?int $countryId,?string $sqlfilters=null):array{
         $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($countryId!=null){$body["countryId"]=$countryId;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/states",$body);
    }

    /**
     * Récupère les informations d'un état/département par son identifiant.
     *
     * @param int $id
     * 
     * @return array
     * 
     */
    public function getStateById(int $id):array{
        return $this->client->get("setup/dictionary/states/{$id}");
    }

    /**
     * Récupère un état/département à partir de son code.
     *
     * @param string $code
     * 
     * @return array
     * 
     */
    public function getStateByCode(string $code):array{
         return $this->client->get("setup/dictionary/states/byCode/{$code}");
    }

    /**
     * Récupère les catégories de tickets/support configurées dans Dolibarr.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int|null $active=1
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getTicketCategories(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?int $active=1,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$body["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/ticket_categories",$body);
    }

    /**
     * Récupère les niveaux de gravité (severities) pour les tickets.
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int|null $active=1
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getTicketSeverities(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?int $active=1,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/ticket_severities",$body);
    }

    /**
     * Récupère les types de tickets disponibles (bug, demande, etc.).
     *
     * @param string $sortfield="code"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param int|null $active=1
     * @param string|null $lang=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getTicketsTypes(string $sortfield="code",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?int $active=1,?string $lang=null,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($active!=null){$body["active"]=$active;}
        if($lang!=null){$body["lang"]=$lang;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
         return $this->client->get("setup/dictionary/ticket_types",$body);
    }

    /**
     * Récupère les communes / villes (towns) avec filtres sur code postal ou nom.
     *
     * @param string $sortfield="zip
     * @param mixed town"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param string|null $zipcode=null
     * @param string|null $town=null
     * @param int|null $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getTowns(string $sortfield="zip,town",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?string $zipcode=null,?string $town=null,?int $active=1,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($zipcode!=null){$body["zipcode"]=$zipcode;}
        if($town!=null){$body["town"]=$town;}
        if($active!=null){$body["active"]=$active;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/towns",$body);
    }

    /**
     * Récupère les unités de mesure (units) utilisées pour les produits.
     *
     * @param string $sortfield="rowid"
     * @param string $sortorder="ASC"
     * @param int $limit=100
     * @param int|null $page=null
     * @param string|null $zipcode=null
     * @param string|null $town=null
     * @param int|null $active=1
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getUnits(string $sortfield="rowid",string $sortorder="ASC",int $limit=100,
    ?int $page=null,?string $zipcode=null,?string $town=null,?int $active=1,?string $sqlfilters=null):array{
        $body=[$limit,$sortfield,$sortorder];
        if($page!=null){$body["page"]=$page;}
        if($zipcode!=null){$body["zipcode"]=$zipcode;}
        if($town!=null){$body["town"]=$town;}
        if($active!=null){$body["active"]=$active;}
        if($sqlfilters!=null){$bdy["sqlfilters"]=$sqlfilters;}
        return $this->client->get("setup/dictionary/units",$body);
    }

    /**
     * Récupère la liste des établissements (sites/établissements) configurés.
     *
     * @return [type]
     * 
     */
    public function getEstablishments(){
        return $this->client->get("setup/establishments");
    }

    /**
     * Récupère les informations d'un établissement par son identifiant.
     *
     * @param int $id
     * 
     * @return [type]
     * 
     */
    public function getEstablishmentsById(int $id){
        return $this->client->get("setup/establishments/{$id}");
    }

    /**
     * Récupère la définition des champs extras (extrafields) pour un type d'élément.
     *
     * @param string $sortfield="t.pos"
     * @param string $sortorder="ASC"
     * @param string|null $elementtype=null
     * @param string|null $sqlfilters=null
     * 
     * @return array
     * 
     */
    public function getExtrafields(string $sortfield="t.pos",string $sortorder="ASC",?string $elementtype=null,?string $sqlfilters=null):array{
        $body=[$sortfield,$sortorder];
        if($elementtype!=null){$body["elementtype"]=$elementtype;}
        if($sqlfilters!=null){$body["sqlfilters"]=$$sqlfilters;}
        return $this->client->get("setup/extrafields");
    }

    /**
     * Supprime un champ extra attaché à un type d'élément donné.
     *
     * @param string $attrname
     * @param string $elementtype
     * 
     * @return array|int|string
     * 
     */
    public function deleteExtrafields(string $attrname,string $elementtype):array|int|string{
        return $this->client->delete("setup/extrafields/{$elementtype}/{$attrname}");
    }

    /**
     * Récupère la définition d'un seul champ extra pour un élément donné.
     *
     * @param string $attrname
     * @param string $elementtype
     * 
     * @return array
     * 
     */
    public function getOneExtrafields(string $attrname,string $elementtype):array{
        return $this->client->get("setup/extrafields/{$elementtype}/{$attrname}");
    }

    /**
     * Crée un nouveau champ extra pour le type d'élément indiqué.
     *
     * @param string $attrname
     * @param string $elementtype
     * @param array $request_data
     * 
     * @return array|int
     * 
     */
    public function createExtrafields(string $attrname,string $elementtype,array $request_data):array|int{
        return $this->client->post("setup/extrafields/{$elementtype}/{$attrname}",$request_data);
    }

    /**
     * Met à jour la définition d'un champ extra pour un type d'élément.
     *
     * @param string $attrname
     * @param string $elementtype
     * @param array $request_data
     * 
     * @return array
     * 
     */
    public function updateExtrafields(string $attrname,string $elementtype,array $request_data):array{
         return $this->client->put("setup/extrafields/{$elementtype}/{$attrname}",$request_data);
    }
    
    /**
     * Récupère la liste des modules disponibles/activés dans l'instance Dolibarr.
     *
     * @return array
     * 
     */
    public function getModules():array{
        return $this->client->get("setup/modules");
    }

}