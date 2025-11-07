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
     * Récupère la liste des produits depuis Dolibarr via l’API REST.
     *
     * Cette méthode permet de filtrer, trier et paginer les produits.
     *
     * Exemple d’utilisation :
     * ```php
     * $products = $dolibarr->products()->getAll([
     *     'sortfield' => 't.ref',
     *     'sortorder' => 'ASC',
     *     'limit' => 100,
     *     'page' => 0,
     *     'mode' => 1, // uniquement les produits
     *     'category' => 3, // catégorie spécifique
     *     'includestockdata' => true,
     *     'properties' => 'id,ref,label,price'
     * ]);
     * ```
     *
     * @param array $params Tableau associatif des paramètres de filtrage et pagination :
     * 
     *                    - **sortfield** *(string, optionnel)* : Champ utilisé pour trier les produits (ex: `t.ref`).  
     *                    - **sortorder** *(string, optionnel)* : Ordre de tri (`ASC` ou `DESC`).  
     *                    - **limit** *(int, optionnel)* : Nombre maximum d’éléments à retourner (par défaut 100).  
     *                    - **page** *(int, optionnel)* : Numéro de page pour la pagination (commence à 0).  
     *                    - **mode** *(int, optionnel)* : Filtre par type (`0` = tous, `1` = produits uniquement, `2` = services uniquement).  
     *                    - **category** *(int, optionnel)* : Filtrer par catégorie de produit.  
     *                    - **sqlfilters** *(string, optionnel)* : Critères supplémentaires de filtrage SQL (ex: `(t.tobuy:=:0) and (t.tosell:=:1)`).  
     *                    - **ids_only** *(bool, optionnel)* : Retourne uniquement les IDs des produits si true.  
     *                    - **variant_filter** *(int, optionnel)* : Filtre sur variantes (`0` = tous, `1` = sans variantes, `2` = parents, `3` = variantes).  
     *                    - **pagination_data** *(bool, optionnel)* : Inclure les données de pagination (false par défaut).  
     *                    - **includestockdata** *(bool, optionnel)* : Inclure les informations de stock (plus lent).  
     *                    - **properties** *(string, optionnel)* : Liste de propriétés à retourner, séparées par des virgules.  
     *
     * @return array Retourne un tableau d’objets produits, example :
     * ```json
     * [
     *   {
     *       "module": null,
     *       "id": "1",
     *       "entity": "1",
     *       "import_key": null,
     *       "array_options": [],
     *       "array_languages": null,
     *       "contacts_ids": null,
     *       "contacts_ids_internal": null,
     *       "linkedObjectsIds": null,
     *       "canvas": "",
     *       "origin_type": null,
     *       "ref": "P3-100001",
     *       "ref_ext": null,
     *       "status": "1",
     *       "country_id": "1",
     *       "country_code": "FR",
     *       "state_id": null,
     *       "region_id": null,
     *       "barcode_type": null,
     *       "barcode_type_coder": null,
     *       "shipping_method": null,
     *       "fk_multicurrency": null,
     *       "multicurrency_code": null,
     *       "multicurrency_tx": null,
     *       "multicurrency_total_ht": null,
     *       "multicurrency_total_tva": null,
     *       "multicurrency_total_localtax1": null,
     *       "multicurrency_total_localtax2": null,
     *       "multicurrency_total_ttc": null,
     *       "last_main_doc": null,
     *       "note_public": null,
     *       "note_private": "",
     *       "total_ht": null,
     *       "total_tva": null,
     *       "total_localtax1": null,
     *       "total_localtax2": null,
     *       "total_ttc": null,
     *       "actiontypecode": null,
     *       "civility_code": null,
     *       "date_creation": 1762501419,
     *       "date_validation": null,
     *       "date_modification": 1762501419,
     *       "tms": null,
     *       "date_cloture": null,
     *       "user_author": null,
     *       "user_creation": null,
     *       "user_creation_id": null,
     *       "user_valid": null,
     *       "user_validation": null,
     *       "user_validation_id": null,
     *       "user_closing_id": null,
     *       "user_modification": null,
     *       "user_modification_id": null,
     *       "fk_user_creat": null,
     *       "fk_user_modif": null,
     *       "specimen": 0,
     *       "totalpaid": null,
     *       "extraparams": [],
     *       "product": null,
     *       "cond_reglement_supplier_id": null,
     *       "deposit_percent": null,
     *       "retained_warranty_fk_cond_reglement": null,
     *       "warehouse_id": null,
     *       "label": "Casque EVOLite® ventilé avec porte-badge - blanc",
     *       "description": "Le EVOLite® est un produit révolutionnaire qui permet aux agents de santé et de sécurité d'atteindre de nouveaux niveaux de conformité grâce à son confort inégalé. Il est léger. extrêmement confortable et s'adapte à la plus large gamme de formes et de tailles de tête. Le harnais et la coque sont véritablement intégrés pour offrir les meilleures performances en le gardant fermement ancré sur la tête. même lorsqu'il est complètement inversé. Offre une sécurité et une protection accrues lors de travaux en hauteur. par vent fort ou en cas d'activité intense. comme lors de l'entretien des autoroutes.Pesant moins de 300 g (selon le modèle). l'EVOLite® est le casque de sécurité le plus léger en vente au Royaume-Uni.Un système de harnais à berceau textile à 6 points offre un confort inégalé.Bandeau anti-transpiration en coton avec revêtement PU poreux pour une absorption maximale. PH neutre. testé dermatologiquement.Fentes universelles permettant un ajustement ferme d'une gamme de visières de sécurité et de protège-oreilles Surefit™. Également compatible avec la gamme de produits EVOGuard®.MADE IN EUROPE&nbsp;",
     *       "other": null,
     *       "type": "0",
     *       "price": "48.79000000",
     *       "price_formated": null,
     *       "price_ttc": "58.55000000",
     *       "price_ttc_formated": null,
     *       "price_min": "0.00000000",
     *       "price_min_ttc": "0.00000000",
     *       "price_base_type": "HT",
     *       "price_label": null,
     *       "multiprices": [],
     *       "multiprices_ttc": [],
     *       "multiprices_base_type": [],
     *       "multiprices_default_vat_code": [],
     *       "multiprices_min": [],
     *       "multiprices_min_ttc": [],
     *       "multiprices_tva_tx": [],
     *       "prices_by_qty": [],
     *       "prices_by_qty_list": [],
     *       "level": null,
     *       "multilangs": [],
     *       "default_vat_code": null,
     *       "tva_tx": "20.0000",
     *       "remise_percent": null,
     *       "localtax1_tx": "0.0000",
     *       "localtax2_tx": "0.0000",
     *       "localtax1_type": "0",
     *       "localtax2_type": "0",
     *       "desc_supplier": null,
     *       "vatrate_supplier": null,
     *       "default_vat_code_supplier": null,
     *       "fourn_multicurrency_price": null,
     *       "fourn_multicurrency_unitprice": null,
     *       "fourn_multicurrency_tx": null,
     *       "fourn_multicurrency_id": null,
     *       "fourn_multicurrency_code": null,
     *       "packaging": null,
     *       "lifetime": null,
     *       "qc_frequency": null,
     *       "stock_reel": null,
     *       "stock_theorique": null,
     *       "cost_price": null,
     *       "pmp": "0.00000000",
     *       "seuil_stock_alerte": "0",
     *       "desiredstock": "10",
     *       "duration_value": 0,
     *       "duration_unit": null,
     *       "duration": "",
     *       "fk_default_workstation": null,
     *       "tosell": null,
     *       "status_buy": "1",
     *       "tobuy": null,
     *       "finished": null,
     *       "fk_default_bom": null,
     *       "product_fourn_price_id": null,
     *       "buyprice": null,
     *       "tobatch": null,
     *       "status_batch": "0",
     *       "sell_or_eat_by_mandatory": "0",
     *       "batch_mask": "",
     *       "customcode": "",
     *       "url": "https://cdn1.tubconcept.fr/p3/images/60847983.jpg",
     *       "weight": null,
     *       "weight_units": "-6",
     *       "length": null,
     *       "length_units": "-3",
     *       "width": null,
     *       "width_units": "-3",
     *       "height": null,
     *       "height_units": "-3",
     *       "surface": null,
     *       "surface_units": "-6",
     *       "volume": null,
     *       "volume_units": "-9",
     *       "net_measure": null,
     *       "net_measure_units": null,
     *       "accountancy_code_sell": "",
     *       "accountancy_code_sell_intra": "",
     *       "accountancy_code_sell_export": "",
     *       "accountancy_code_buy": "60847983",
     *       "accountancy_code_buy_intra": "",
     *       "accountancy_code_buy_export": "",
     *       "barcode": null,
     *       "stats_proposal_supplier": [],
     *       "stats_expedition": [],
     *       "stats_mo": [],
     *       "stats_bom": [],
     *       "stats_facturerec": [],
     *       "stats_facture_fournisseur": [],
     *       "stats_facturefournrec": [],
     *       "stock_warehouse": [],
     *       "fk_default_warehouse": null,
     *       "fk_price_expression": null,
     *       "fourn_qty": null,
     *       "fk_unit": null,
     *       "price_autogen": "0",
     *       "sousprods": [],
     *       "res": null,
     *       "is_object_used": null,
     *       "is_sousproduit_qty": null,
     *       "is_sousproduit_incdec": null,
     *       "mandatory_period": "0",
     *       "stockable_product": "1"
     *     }
     *  ]
     * ```
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue.
     */
    public function getAll(array $params = []): array
    {
        return $this->client->get('products', $params);
    }

   /**
     * Récupère un produit par son ID via l'API Dolibarr.
     *
     * Cette méthode permet d'obtenir les détails complets d'un produit,
     * avec la possibilité d'inclure les informations de stock, les sous-produits,
     * l'ID du produit parent et les traductions.
     *
     * @param int $id ID du produit à récupérer.
     * @param bool $includestockdata Charger également les informations de stock (optionnel, défaut false).
     * @param bool $includesubproducts Charger les informations des sous-produits (optionnel, défaut false).
     * @param bool $includeparentid Charger l'ID du produit parent si le produit est une variante (optionnel, défaut false).
     * @param bool $includetrans Charger également les traductions du label et de la description (optionnel, défaut false).
     *
     * @return array Détails du produit.
     *
     * @throws \Exception Si l'appel à l'API échoue ou si l'ID est invalide.
     *
     * Exemple d'utilisation :
     * ```php
     * $product = $dolibarr->products()->getById(1, true, true, false, true);
     * ```
     */
    public function getById(
        int $id,
        bool $includestockdata = false,
        bool $includesubproducts = false,
        bool $includeparentid = false,
        bool $includetrans = false
    ): array {
        $params = [
            'includestockdata' => $includestockdata,
            'includesubproducts' => $includesubproducts,
            'includeparentid' => $includeparentid,
            'includetrans' => $includetrans,
        ];

        return $this->client->get("products/{$id}", $params);
    }

    /**
     * Crée un nouveau produit dans Dolibarr via l’API REST.
     *
     * Cette méthode envoie les données du produit au endpoint `products` et retourne
     * l’objet produit créé avec son ID et les informations renseignées.
     *
     * Exemple d’utilisation :
     * ```php
     * $product = $dolibarr->products()->create([
     *     'ref' => 'P3-100002',
     *     'label' => 'Nouveau casque EVOLite',
     *     'description' => 'Casque EVOLite® nouvelle génération',
     *     'price' => '49.99',
     *     'price_ttc' => '59.99',
     *     'tva_tx' => '20.0000',
     *     'status_buy' => '1',
     *     'stockable_product' => '1',
     *     'desiredstock' => 10,
     *     'url' => 'https://cdn1.tubconcept.fr/p3/images/nouveau_casque.jpg'
     * ]);
     * ```
     *
     * @param array $data Tableau associatif contenant les champs du produit :
     *                    - **ref** *(string, obligatoire)* : Référence du produit.  
     *                    - **ref_ext** *(string, optionnel)* : Référence externe.  
     *                    - **label** *(string, obligatoire)* : Nom du produit.  
     *                    - **description** *(string, optionnel)* : Description complète.  
     *                    - **type** *(string, optionnel)* : Type de produit (`0` = produit, `1` = service).  
     *                    - **status_buy** *(string, optionnel)* : Statut achat (`1` = actif).  
     *                    - **stockable_product** *(string, optionnel)* : Produit stockable (`1` = oui).  
     *                    - **desiredstock** *(int, optionnel)* : Stock souhaité.  
     *                    - **price** *(string, optionnel)* : Prix unitaire HT.  
     *                    - **price_ttc** *(string, optionnel)* : Prix TTC.  
     *                    - **tva_tx** *(string, optionnel)* : Taux de TVA.  
     *                    - **weight** *(float, optionnel)* : Poids du produit.  
     *                    - **weight_units** *(string, optionnel)* : Unité de poids.  
     *                    - **length**, **width**, **height** *(float, optionnel)* : Dimensions.  
     *                    - **length_units**, **width_units**, **height_units** *(string, optionnel)* : Unités.  
     *                    - **url** *(string, optionnel)* : URL de l’image du produit.  
     *                    - **array_options** *(array, optionnel)* : Options personnalisées.  
     *                    - **extraparams** *(array, optionnel)* : Paramètres supplémentaires.  
     *                    - **tobuy** *(string, optionnel)* : Indique si le produit est à acheter.  
     *                    - **tosell** *(string, optionnel)* : Indique si le produit est à vendre.  
     *
     * @return array Retourne l’objet produit créé, exemple :
     * ```json
     * {
     *   "id": "1",
     *   "ref": "P3-100001",
     *   "label": "Casque EVOLite® ventilé avec porte-badge - blanc",
     *   "description": "Le EVOLite® est un produit révolutionnaire...",
     *   "price": "48.79000000",
     *   "price_ttc": "58.55000000",
     *   "tva_tx": "20.0000",
     *   "stockable_product": "1",
     *   "status_buy": "1",
     *   "desiredstock": "10",
     *   "url": "https://cdn1.tubconcept.fr/p3/images/60847983.jpg",
     *   "date_creation": 1762501419
     * }
     * ```
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue.
     */
    public function create(array $data): array
    {
        return $this->client->post('products', $data);
    }

    /**
     * Met à jour un produit existant dans Dolibarr via l’API REST.
     *
     * Cette méthode envoie les données modifiées du produit au endpoint `products/{id}`.
     * Elle retourne l’objet produit mis à jour avec les informations actuelles.
     *
     * Exemple d’utilisation :
     * ```php
     * $updatedProduct = $dolibarr->products()->update(1, [
     *     'label' => 'Casque EVOLite® ventilé modifié',
     *     'price' => '50.00',
     *     'price_ttc' => '60.00',
     *     'desiredstock' => 15
     * ]);
     * ```
     *
     * @param int $id ID du produit à mettre à jour.
     * @param array $data Tableau associatif contenant les champs à modifier :
     *                    - **ref** *(string, optionnel)* : Référence du produit.  
     *                    - **ref_ext** *(string, optionnel)* : Référence externe.  
     *                    - **label** *(string, optionnel)* : Nom du produit.  
     *                    - **description** *(string, optionnel)* : Description complète.  
     *                    - **type** *(string, optionnel)* : Type de produit (`0` = produit, `1` = service).  
     *                    - **status_buy** *(string, optionnel)* : Statut achat (`1` = actif).  
     *                    - **stockable_product** *(string, optionnel)* : Produit stockable (`1` = oui).  
     *                    - **desiredstock** *(int, optionnel)* : Stock souhaité.  
     *                    - **price** *(string, optionnel)* : Prix unitaire HT.  
     *                    - **price_ttc** *(string, optionnel)* : Prix TTC.  
     *                    - **tva_tx** *(string, optionnel)* : Taux de TVA.  
     *                    - **weight** *(float, optionnel)* : Poids du produit.  
     *                    - **weight_units** *(string, optionnel)* : Unité de poids.  
     *                    - **length**, **width**, **height** *(float, optionnel)* : Dimensions.  
     *                    - **length_units**, **width_units**, **height_units** *(string, optionnel)* : Unités.  
     *                    - **url** *(string, optionnel)* : URL de l’image du produit.  
     *                    - **array_options** *(array, optionnel)* : Options personnalisées.  
     *                    - **extraparams** *(array, optionnel)* : Paramètres supplémentaires.  
     *                    - **tobuy** *(string, optionnel)* : Indique si le produit est à acheter.  
     *                    - **tosell** *(string, optionnel)* : Indique si le produit est à vendre.  
     *
     * @return array Retourne l’objet produit mis à jour, exemple :
     * ```json
     * {
     *   "id": "1",
     *   "ref": "P3-100001",
     *   "label": "Casque EVOLite® ventilé modifié",
     *   "description": "Le EVOLite® est un produit révolutionnaire...",
     *   "price": "50.00000000",
     *   "price_ttc": "60.00000000",
     *   "tva_tx": "20.0000",
     *   "stockable_product": "1",
     *   "status_buy": "1",
     *   "desiredstock": "15",
     *   "url": "https://cdn1.tubconcept.fr/p3/images/60847983.jpg",
     *   "date_modification": 1762509999
     * }
     * ```
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function update(int $id, array $data): array
    {
        return $this->client->put("products/{$id}", $data);
    }

    /**
     * Supprimer un produit par ID
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->client->delete("products/{$id}/delete");
    }

    /**
     * Récupère les catégories associées à un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des catégories liées à un produit spécifique
     * en utilisant son ID. Des options de tri et de pagination sont également disponibles.
     *
     * Exemple d’utilisation :
     * ```php
     * $categories = $dolibarr->products()->getCategories(1, 't.rowid', 'ASC', 100, 0);
     * ```
     *
     * @param int $id ID du produit dont on souhaite récupérer les catégories.
     * @param string $sortfield Champ utilisé pour trier les catégories (ex: `t.rowid`).
     * @param string $sortorder Ordre de tri (`ASC` ou `DESC`).
     * @param int $limit Nombre maximum de catégories à retourner (par défaut 100).
     * @param int $page Numéro de page pour la pagination (commence à 0).
     *
     * @return array Retourne un tableau d’objets catégories associées au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getCategories(int $id,string $sortfield='t.rowid',string $sortorder='ASC',int $limit=100,int $page=0): array
    {
        $params = [
            'sortfield' => $sortfield,
            'sortorder' => $sortorder,
            'limit' => $limit,
            'page' => $page
        ];
        return $this->client->get("products/{$id}/categories", $params);
    }
    /**
     * Récupère les prix d'achat associés à un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des prix d'achat liés à un produit spécifique
     * en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $purchasePrices = $dolibarr->products()->getPurchasePrices(1);
     * ```
     *
     * @param int $id ID du produit dont on souhaite récupérer les prix d'achat.
     * @param string $ref Référence du produit (optionnel).
     * @param string $ref_ext Référence externe du produit (optionnel).
     * @param string $barcode Code-barres du produit (optionnel).
     *
     * @return array Retourne un tableau d’objets prix d'achat associés au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getPurchasePrices(int $id,string|null $ref=null,string|null $ref_ext=null,string|null $barcode=null): array
    {
        $body=[];
        if($ref !== null){
            $body['ref']=$ref;
        }
        if($ref_ext !== null){
            $body['ref_ext']=$ref_ext;
        }
        if($barcode !== null){
            $body['barcode']=$barcode;
        }
        return $this->client->get("products/{$id}/purchase_prices",$body);
    }

    /**
     * Ajoute ou met à jour un prix d'achat pour un produit donné.
     *
     * Cette méthode permet de créer ou de mettre à jour un prix d'achat pour un produit spécifique
     * en utilisant son ID, avec gestion de quantité minimale, TVA, remises et informations fournisseurs.
     *
     * Exemple d’utilisation :
     * ```php
     * $newPurchasePrice = $dolibarr->products()->addPurchasePrice(1, [
     *     'qty' => 1,
     *     'buyprice' => 30.00,
     *     'price_base_type' => 'HT',
     *     'fourn_id' => 2,
     *     'availability' => 10,
     *     'ref_fourn' => 'REF123',
     *     'tva_tx' => 20,
     *     'remise_percent' => 5,
     *     'delivery_time_days' => 7,
     *     'supplier_reputation' => 'FAVORITE'
     * ]);
     * ```
     *
     * @param int $id ID du produit pour lequel le prix d'achat est ajouté ou mis à jour.
     * @param array $data Tableau associatif contenant les champs du prix d'achat :
     *                    - **qty** *(number, obligatoire)* : Quantité minimale pour laquelle le prix est valide.  
     *                    - **buyprice** *(number, obligatoire)* : Prix d'achat pour la quantité minimale.  
     *                    - **price_base_type** *(string, obligatoire)* : Type de prix "HT" ou "TTC".  
     *                    - **fourn_id** *(int, obligatoire)* : ID du fournisseur.  
     *                    - **availability** *(int, obligatoire)* : Disponibilité du produit.  
     *                    - **ref_fourn** *(string, obligatoire)* : Référence fournisseur.  
     *                    - **tva_tx** *(number, obligatoire)* : Taux de TVA.  
     *                    - **charges** *(number, optionnel)* : Coûts liés au produit.  
     *                    - **remise_percent** *(number, optionnel)* : Remise en pourcentage.  
     *                    - **remise** *(number, optionnel)* : Remise en montant.  
     *                    - **newnpr** *(int, optionnel)* : Définir NPR ou non.  
     *                    - **delivery_time_days** *(int, optionnel)* : Délai maximal de livraison en jours.  
     *                    - **supplier_reputation** *(string, optionnel)* : Réputation fournisseur ("", "FAVORITE", "DONOTORDER").  
     *                    - **localtaxes_array** *(array, optionnel)* : Tableau d’informations sur les taxes locales.  
     *                    - **newdefaultvatcode** *(string, optionnel)* : Code TVA par défaut.  
     *                    - **multicurrency_buyprice** *(number, optionnel)* : Prix d'achat en devise.  
     *                    - **multicurrency_price_base_type** *(string, optionnel)* : Type de prix HT ou TTC en devise.  
     *                    - **multicurrency_tx** *(number, optionnel)* : Taux de conversion.  
     *                    - **multicurrency_code** *(string, optionnel)* : Code devise.  
     *                    - **desc_fourn** *(string, optionnel)* : Description personnalisée pour ce prix fournisseur.  
     *                    - **barcode** *(string, optionnel)* : Code-barres du produit.  
     *                    - **fk_barcode_type** *(int, optionnel)* : Type de code-barres.
     *
     * @return array Retourne l'ID du prix d'achat créé ou mis à jour, exemple :
     * ```json
     * {
     *   "id": "1"
     * }
     * ```
     *
     * @throws \Exception Si l'appel à l'API échoue ou si l'ID du produit est invalide.
     */
    public function addPurchasePrice(int $id, array $data): array
    {
        return $this->client->post("products/{$id}/purchase_prices", $data);
    }

    /**
     * Supprime un prix d'achat spécifique d'un produit donné.
     *
     * Cette méthode permet de supprimer un prix d'achat associé à un produit
     * en utilisant les IDs du produit et du prix.
     *
     * Exemple d’utilisation :
     * ```php
     * $response = $dolibarr->products()->deletePurchasePrice(1, 2);
     * ```
     *
     * @param int $id_product ID du produit dont le prix d'achat doit être supprimé.
     * @param int $id_price ID du prix d'achat à supprimer.
     *
     * @return array Retourne une confirmation de la suppression, exemple :
     * ```json
     * {
     *   "success": true,
     *   "message": "Purchase price deleted successfully."
     * }
     * ```
     * 
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si les IDs sont invalides.
     */
    public function deletePurchasePrice(int $id_product,int $id_price): array
    {
        return $this->client->delete("products/{$id_product}/purchase_prices/{$id_price}");
    }

    /**
     * Récupère les prix par client pour un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des prix spécifiques par client
     * liés à un produit en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $customerPrices = $dolibarr->products()->getPricesPerCustomer(1);
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les prix par client.
     *
     * @return array Retourne un tableau d’objets prix par client associés au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getPricesPerCustomer(int $id_product): array
    {
        return $this->client->get("products/{$id_product}/selling_multiprices/per_customer");
    }

    /**
     * Récupère les prix par quantité pour un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des prix spécifiques par quantité
     * liés à un produit en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $quantityPrices = $dolibarr->products()->getPricesPerQuantity(1);
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les prix par quantité.
     *
     * @return array Retourne un tableau d’objets prix par quantité associés au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getPricesPerQuantity(int $id_product): array
    {
        return $this->client->get("products/{$id_product}/selling_multiprices/per_quantity");
    }

    /**
     * Récupère les prix par segment pour un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des prix spécifiques par segment
     * liés à un produit en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $segmentPrices = $dolibarr->products()->getPricesPerSegment(1);
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les prix par segment.
     *
     * @return array Retourne un tableau d’objets prix par segment associés au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getPricesPerSegment(int $id_product): array
    {
        return $this->client->get("products/{$id_product}/selling_multiprices/per_segment");
    }

    /**
     * Récupère les données de stock pour un produit donné.
     *
     * Cette méthode permet d'obtenir les informations de stock
     * liés à un produit en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $stockData = $dolibarr->products()->getStockData(1);
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les données de stock.
     *
     * @return array Retourne un tableau d’objets contenant les données de stock du produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getStockData(int $id_product): array
    {
        return $this->client->get("products/{$id_product}/stock");
    }

    /**
     * Récupère les sous-produits associés à un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des sous-produits liés à un produit spécifique
     * en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $subProducts = $dolibarr->products()->getSubProducts(1);
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les sous-produits.
     *
     * @return array Retourne un tableau d’objets sous-produits associés au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getSubProducts(int $id_product): array
    {
        return $this->client->get("products/{$id_product}/subproducts");
    }

    /**
     * Ajoute un sous-produit à un produit donné.
     *
     * Cette méthode permet de créer un sous-produit pour un produit spécifique
     * en utilisant son ID, avec la quantité et d'autres informations.
     *
     * Exemple d’utilisation :
     * ```php
     * $newSubProduct = $dolibarr->products()->addSubProduct(1, [
     *     'subproduct_id' => 2,
     *     'qty' => 5,
     *     'incdec' => 1
     * ]);
     * ```
     *
     * @param int $id_product ID du produit auquel le sous-produit est ajouté.
     * @param array $data Tableau associatif contenant les champs du sous-produit :
     *                    - **subproduct_id** *(int, obligatoire)* : ID du produit à ajouter en tant que sous-produit.  
     *                    - **qty** *(number, obligatoire)* : Quantité du sous-produit.  
     *                    - **incdec** *(int, obligatoire)* : Indicateur d'incrémentation/décrémentation (`1` = incrémenter stock of child when parent stock increases/decreases, `0` = décrémenter stock of child when parent stock increases/decreases).  
     *
     * @return array Retourne l’objet sous-produit créé, exemple :
     * ```json
     * {
     *   "id": "1",
     *   "subproduct_id": "2",
     *   "qty": "5",
     *   "incdec": "1"
     * }
     * ```
     *
     * @throws \Exception Si l'appel à l'API échoue ou si l'ID du produit est invalide.
     */
    public function addSubProduct(int $id_product, array $data): array
    {
        return $this->client->post("products/{$id_product}/subproducts", $data);
    }

    /**
     * Supprime un sous-produit spécifique d'un produit donné.
     *
     * Cette méthode permet de supprimer un sous-produit associé à un produit
     * en utilisant les IDs du produit et du sous-produit.
     *
     * Exemple d’utilisation :
     * ```php
     * $response = $dolibarr->products()->deleteSubProduct(1, 2);
     * ```
     *
     * @param int $id_product ID du produit dont le sous-produit doit être supprimé.
     * @param int $id_subproduct ID du sous-produit à supprimer.
     *
     * @return array Retourne une confirmation de la suppression, exemple :
     * ```json
     * {
     *   "success": true,
     *   "message": "Sub-product deleted successfully."
     * }
     * ```
     * 
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si les IDs sont invalides.
     */
    public function deleteSubProduct(int $id_product,int $id_subproduct): array
    {
        return $this->client->delete("products/{$id_product}/subproducts/remove/{$id_subproduct}");
    }

    /**
     * Récupère les variantes associées à un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des variantes liées à un produit spécifique
     * en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $variants = $dolibarr->products()->getVariants(1);
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les variantes.
     * @param int $include_stock Inclure les informations de stock dans la réponse (1 pour oui, 0 pour non).
     * 
     * @return array Retourne un tableau d’objets variantes associés au produit.
     *
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function getVariants(int $id_product,int $include_stock=0): array
    {
        return $this->client->get("products/{$id_product}/variants", ['includestock' => $include_stock]);
    }

    /**
     * Ajoute une variante à un produit donné.
     *
     * Cette méthode permet de créer une variante pour un produit spécifique
     * en utilisant son ID, avec les attributs et autres informations.
     *
     * Exemple d’utilisation :
     * ```php
     * $newVariant = $dolibarr->products()->addVariant(1, [
     *     'reference' => 'P3-100001-RED',
     *     'weight_impact' => 0.5,
     *     'price_impact' => 19.99,
     *     'price_impact_is_percent' =>False,
     *     'features' => [
     *          'Couleur'=> 'Rouge', // Couleur: Rouge
     *          'Taille'=> 'M'  // Taille: M
     *     ]
     * ]);
     * ```
     *
     * @param int $id_product ID du produit auquel la variante est ajoutée.
     * @param array $data Tableau associatif contenant les champs de la variante :
     *                    - **weight_impact** *(float, obligatoire)* : Weight impact of variant.  
     *                    - **price_impact** *(float, obligatoire)* : Price impact of variant .  
     *                    - **price_impact_is_percent** *(boolean, obligatoire)* : Price impact in percent (true or false) .  
     *                    - **features** *(array, optionnel)* : List of attributes pairs id_attribute->id_value. Example: array(id_color=>id_Blue, id_size=>id_small, id_option=>id_val_a, ...).  
     *                    - **reference** *(string, optionnel)* : Customized reference of variant .  
     *                    - **ref_ext** *(string, optionnel)* : External reference of variant.  
     *                    
     * @return array Retourne l’objet variante créé, exemple :
     * ```json
     * {
     *   "id": "10",
     *   "reference": "P3-100001-RED",
     *   "weight_impact": "0.5",
     *   "price_impact_is_percent": False,
     *   "price_impact": "19.99",
     *  "features": [
     *    
     *      "attribute_id"=> "value_id",
     *      "attribute_id2"=> "value_id2"
     *   ]
     * 
     */
    public  function addVariant(int $id_product, array $data): array
    {
        return $this->client->post("products/{$id_product}/variants", $data);
    }

   /**  Récupère les attributs disponibles pour un produit donné.
     *
     * Cette méthode permet d'obtenir la liste des attributs liés à un produit spécifique
     * en utilisant son ID, avec des options de tri, de pagination et de filtrage.
     *
     * Exemple d’utilisation :
     * ```php
     * $attributes = $dolibarr->products()->getAttributes(1, 't.ref', 'ASC', 100, null, '', '');
     * ```
     *
     * @param int $id_product ID du produit dont on souhaite récupérer les attributs.
     * @param string $sortfield Champ utilisé pour trier les attributs (ex: `t.ref`).
     * @param string $sortorder Ordre de tri (`ASC` ou `DESC`).
     * @param int $limit Nombre maximum d’attributs à retourner (par défaut 100).
     * @param int|null $page Numéro de page pour la pagination (commence à 0, null pour ne pas paginer).
     * @param string $sqlfilters Filtres SQL supplémentaires à appliquer (optionnel).
     * @param string $properties Propriétés supplémentaires à inclure dans la réponse (optionnel).
     *
     * @return array Retourne un tableau d’objets attributs associés au produit.
     *
     * @example Réponse typique :
     * ```json
     * [
     *     {
     *       "id": "1",
     *       "ref": "COLOR_RED",
     *       "label": "Rouge",
     *       "type": "attribute",
     *       "active": "1",
     *       "default_value": "0",
     *       "position": "1",
     *       "date_creation": 1762501419,
     *       "date_modification": null,
     *       "fk_product_attribute_category": "2",
     *       "attribute_category_label": "Couleur",
     *       "attribute_category_type": "attribute"
     *     },
     *     {
     *       "id": "2",
     *       "ref": "SIZE_M",
     *       "label": "Moyen",
     *       "type": "attribute",
     *       "active": "1",
     *       "default_value": "0",
     *       "position": "2",
     *       "date_creation": 1762501420,
     *       "date_modification": null,
     *       "fk_product_attribute_category": "3",
     *       "attribute_category_label": "Taille",
     *       "attribute_category_type": "attribute"
     *     }
     * ]
     * ```
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’
     * ID est invalide.
     */
    public function getAttributes(int $id_product,string $sortfield="t.ref",string $sortorder="ASC",int $limit=100,int|null $page,string $sqlfilters='',string $properties=''): array
    {
        $params = [
            'sortfield' => $sortfield,
            'sortorder' => $sortorder,
            'limit' => $limit,
        ];
        if($page !== null){
            $params['page'] = $page;
        }
        if($sqlfilters !== ''){
            $params['sqlfilters'] = $sqlfilters;
        }
        if($properties !== ''){             
            $params['properties'] = $properties;
        }
        return $this->client->get("products/attributes", $params);
    }

    /**
     * Supprime un attribut spécifique par son ID.
     *
     * Cette méthode permet de supprimer un attribut en utilisant son ID.
     *
     * Exemple d’utilisation :
     * ```php
     * $response = $dolibarr->products()->deleteAttribute(1);
     * ```
     *
     * @param int $id_attribute ID de l’attribut à supprimer.
     *
     * @return array Retourne une confirmation de la suppression, exemple :
     * ```json
     * {
     *   "success": true,
     *   "message": "Attribute deleted successfully."
     * }
     * ```
     * 
     * @throws \Exception Si l’appel à l’API Dolibarr échoue ou si l’ID est invalide.
     */
    public function deleteAttribute(int $id_attribute): array
    {
        return $this->client->delete("products/attributes/{$id_attribute}");
    }

}
