<?php
namespace Tubconcept\DolibarrApiClient\Objects;

class ThirdParty
{
    private ?string $module = null;
    private ?int $id = null;
    private $entity = null;
    private ?string $import_key = null;
    private array $array_options = [];
    private $array_languages = null;
    private $contacts_ids = null;
    private $contacts_ids_internal = null;
    private $linkedObjectsIds = null;
    private ?string $canvas = null;
    private $fk_project = null;
    private $contact_id = null;
    private $user = null;
    private $origin_type = null;
    private $origin_id = null;
    private ?string $ref = null;
    private ?string $ref_ext = null;
    private $statut = null;
    private ?string $status = null;
    private ?int $country_id = null;
    private ?string $country_code = null;
    private $state_id = null;
    private $region_id = null;
    private $barcode_type = null;
    private $barcode_type_coder = null;
    private ?string $mode_reglement_id = null;
    private $cond_reglement_id = null;
    private $demand_reason_id = null;
    private $transport_mode_id = null;
    private $shipping_method_id = null;
    private $shipping_method = null;
    private ?string $fk_multicurrency = null;
    private ?string $multicurrency_code = null;
    private $multicurrency_tx = null;
    private $multicurrency_total_ht = null;
    private $multicurrency_total_tva = null;
    private $multicurrency_total_localtax1 = null;
    private $multicurrency_total_localtax2 = null;
    private $multicurrency_total_ttc = null;
    private $last_main_doc = null;
    private ?string $fk_account = null;
    private $note_public = null;
    private $note_private = null;
    private $actiontypecode = null;
    private ?string $name = null;
    private $lastname = null;
    private $firstname = null;
    private $civility_id = null;
    private $civility_code = null;
    private $date_creation = null;
    private $date_validation = null;
    private $date_modification = null;
    private $tms = null;
    private $date_cloture = null;
    private $user_author = null;
    private $user_creation = null;
    private ?int $user_creation_id = null;
    private $user_valid = null;
    private $user_validation = null;
    private $user_validation_id = null;
    private $user_closing_id = null;
    private $user_modification = null;
    private $user_modification_id = null;
    private $fk_user_creat = null;
    private $fk_user_modif = null;
    private ?int $specimen = 0;
    private $totalpaid = null;
    private array $extraparams = [];
    private $product = null;
    private $cond_reglement_supplier_id = null;
    private $deposit_percent = null;
    private $retained_warranty_fk_cond_reglement = null;
    private $warehouse_id = null;
    private array $SupplierCategories = [];
    private $prefixCustomerIsRequired = null;
    private ?string $name_alias = null;
    private ?string $phone = null;
    private $phone_mobile = null;
    private $fax = null;
    private $email = null;
    private $no_email = null;
    private $skype = null;
    private $twitter = null;
    private $facebook = null;
    private $linkedin = null;
    private $url = null;
    private $barcode = null;
    private ?string $idprof1 = null;
    private ?string $idprof2 = null;
    private ?string $idprof3 = null;
    private ?string $idprof4 = null;
    private ?string $idprof5 = null;
    private ?string $idprof6 = null;
    private $idprof7 = null;
    private $idprof8 = null;
    private $idprof9 = null;
    private $idprof10 = null;
    private $socialobject = null;
    private ?string $tva_assuj = null;
    private ?string $tva_intra = null;
    private ?int $vat_reverse_charge = null;
    private ?string $localtax1_assuj = null;
    private ?float $localtax1_value = null;
    private ?string $localtax2_assuj = null;
    private ?float $localtax2_value = null;
    private $managers = null;
    private ?float $capital = null;
    private ?string $typent_id = null;
    private $typent_code = null;
    private $effectif = null;
    private $effectif_id = null;
    private $forme_juridique_code = null;
    private $forme_juridique = null;
    private ?float $remise_percent = null;
    private ?float $remise_supplier_percent = null;
    private $mode_reglement_supplier_id = null;
    private $transport_mode_supplier_id = null;
    private $fk_prospectlevel = null;
    private ?int $client = null;
    private ?int $prospect = null;
    private ?int $fournisseur = null;
    private ?string $code_client = null;
    private $code_fournisseur = null;
    private $code_compta_client = null;
    private $accountancy_code_customer_general = null;
    private $accountancy_code_customer = null;
    private $code_compta_fournisseur = null;
    private $accountancy_code_supplier_general = null;
    private $accountancy_code_supplier = null;
    private $code_compta_product = null;
    private ?string $stcomm_id = null;
    private $stcomm_picto = null;
    private ?string $status_prospect_label = null;
    private $price_level = null;
    private $outstanding_limit = null;
    private $order_min_amount = null;
    private $supplier_order_min_amount = null;
    private $parent = null;
    private $default_lang = null;
    private $ip = null;
    private $webservices_url = null;
    private $webservices_key = null;
    private $logo = null;
    private $logo_small = null;
    private $logo_mini = null;
    private $logo_squarred = null;
    private $logo_squarred_small = null;
    private $logo_squarred_mini = null;
    private ?string $accountancy_code_sell = null;
    private ?string $accountancy_code_buy = null;
    private $currency_code = null;
    private $fk_warehouse = null;
    private $termsofsale = null;
    private array $partnerships = [];
    private $bank_account = null;
    private $code_compta = null;
    private ?string $fk_incoterms = null;
    private $label_incoterms = null;
    private $location_incoterms = null;
    private array $socialnetworks = [];
    private ?string $address = null;
    private ?string $zip = null;
    private ?string $town = null;
    private ?float $absolute_discount = null;
    private ?float $absolute_creditnote = null;
    
     public function toArray(): array
    {
        $data = get_object_vars($this);
        return $data;
    }

    /**
     * Crée un objet Invoice à partir d'une réponse API
     */
    public static function fromApiResponse(array $data): self
    {
        $Thirdparty = new self();
        foreach ($data as $key => $value) {
            if (property_exists($Thirdparty, $key)) {
                    $Thirdparty->$key = $value;
            }
        }
        return $Thirdparty;
    } 

    /**
     * Get the value of absolute_creditnote
     */
    public function getAbsoluteCreditnote(): ?float
    {
        return $this->absolute_creditnote;
    }

    /**
     * Set the value of absolute_creditnote
     */
    public function setAbsoluteCreditnote(?float $absolute_creditnote): self
    {
        $this->absolute_creditnote = $absolute_creditnote;

        return $this;
    }

    /**
     * Get the value of absolute_discount
     */
    public function getAbsoluteDiscount(): ?float
    {
        return $this->absolute_discount;
    }

    /**
     * Set the value of absolute_discount
     */
    public function setAbsoluteDiscount(?float $absolute_discount): self
    {
        $this->absolute_discount = $absolute_discount;

        return $this;
    }

    /**
     * Get the value of town
     */
    public function getTown(): ?string
    {
        return $this->town;
    }

    /**
     * Set the value of town
     */
    public function setTown(?string $town): self
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get the value of zip
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * Set the value of zip
     */
    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of socialnetworks
     */
    public function getSocialnetworks(): array
    {
        return $this->socialnetworks;
    }

    /**
     * Set the value of socialnetworks
     */
    public function setSocialnetworks(array $socialnetworks): self
    {
        $this->socialnetworks = $socialnetworks;

        return $this;
    }

    /**
     * Get the value of location_incoterms
     */
    public function getLocationIncoterms()
    {
        return $this->location_incoterms;
    }

    /**
     * Set the value of location_incoterms
     */
    public function setLocationIncoterms($location_incoterms): self
    {
        $this->location_incoterms = $location_incoterms;

        return $this;
    }

    /**
     * Get the value of label_incoterms
     */
    public function getLabelIncoterms()
    {
        return $this->label_incoterms;
    }

    /**
     * Set the value of label_incoterms
     */
    public function setLabelIncoterms($label_incoterms): self
    {
        $this->label_incoterms = $label_incoterms;

        return $this;
    }

    /**
     * Get the value of fk_incoterms
     */
    public function getFkIncoterms(): ?string
    {
        return $this->fk_incoterms;
    }

    /**
     * Set the value of fk_incoterms
     */
    public function setFkIncoterms(?string $fk_incoterms): self
    {
        $this->fk_incoterms = $fk_incoterms;

        return $this;
    }

    /**
     * Get the value of code_compta
     */
    public function getCodeCompta()
    {
        return $this->code_compta;
    }

    /**
     * Set the value of code_compta
     */
    public function setCodeCompta($code_compta): self
    {
        $this->code_compta = $code_compta;

        return $this;
    }

    /**
     * Get the value of bank_account
     */
    public function getBankAccount()
    {
        return $this->bank_account;
    }

    /**
     * Set the value of bank_account
     */
    public function setBankAccount($bank_account): self
    {
        $this->bank_account = $bank_account;

        return $this;
    }

    /**
     * Get the value of partnerships
     */
    public function getPartnerships(): array
    {
        return $this->partnerships;
    }

    /**
     * Set the value of partnerships
     */
    public function setPartnerships(array $partnerships): self
    {
        $this->partnerships = $partnerships;

        return $this;
    }

    /**
     * Get the value of termsofsale
     */
    public function getTermsofsale()
    {
        return $this->termsofsale;
    }

    /**
     * Set the value of termsofsale
     */
    public function setTermsofsale($termsofsale): self
    {
        $this->termsofsale = $termsofsale;

        return $this;
    }

    /**
     * Get the value of fk_warehouse
     */
    public function getFkWarehouse()
    {
        return $this->fk_warehouse;
    }

    /**
     * Set the value of fk_warehouse
     */
    public function setFkWarehouse($fk_warehouse): self
    {
        $this->fk_warehouse = $fk_warehouse;

        return $this;
    }

    /**
     * Get the value of currency_code
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * Set the value of currency_code
     */
    public function setCurrencyCode($currency_code): self
    {
        $this->currency_code = $currency_code;

        return $this;
    }

    /**
     * Get the value of stcomm_picto
     */
    public function getStcommPicto()
    {
        return $this->stcomm_picto;
    }

    /**
     * Set the value of stcomm_picto
     */
    public function setStcommPicto($stcomm_picto): self
    {
        $this->stcomm_picto = $stcomm_picto;

        return $this;
    }

    /**
     * Get the value of remise_supplier_percent
     */
    public function getRemiseSupplierPercent(): ?float
    {
        return $this->remise_supplier_percent;
    }

    /**
     * Set the value of remise_supplier_percent
     */
    public function setRemiseSupplierPercent(?float $remise_supplier_percent): self
    {
        $this->remise_supplier_percent = $remise_supplier_percent;

        return $this;
    }

    /**
     * Get the value of status_prospect_label
     */
    public function getStatusProspectLabel(): ?string
    {
        return $this->status_prospect_label;
    }

    /**
     * Set the value of status_prospect_label
     */
    public function setStatusProspectLabel(?string $status_prospect_label): self
    {
        $this->status_prospect_label = $status_prospect_label;

        return $this;
    }

    /**
     * Get the value of accountancy_code_buy
     */
    public function getAccountancyCodeBuy(): ?string
    {
        return $this->accountancy_code_buy;
    }

    /**
     * Set the value of accountancy_code_buy
     */
    public function setAccountancyCodeBuy(?string $accountancy_code_buy): self
    {
        $this->accountancy_code_buy = $accountancy_code_buy;

        return $this;
    }

    /**
     * Get the value of price_level
     */
    public function getPriceLevel()
    {
        return $this->price_level;
    }

    /**
     * Set the value of price_level
     */
    public function setPriceLevel($price_level): self
    {
        $this->price_level = $price_level;

        return $this;
    }

    /**
     * Get the value of accountancy_code_sell
     */
    public function getAccountancyCodeSell(): ?string
    {
        return $this->accountancy_code_sell;
    }

    /**
     * Set the value of accountancy_code_sell
     */
    public function setAccountancyCodeSell(?string $accountancy_code_sell): self
    {
        $this->accountancy_code_sell = $accountancy_code_sell;

        return $this;
    }

    /**
     * Get the value of vat_reverse_charge
     */
    public function getVatReverseCharge(): ?int
    {
        return $this->vat_reverse_charge;
    }

    /**
     * Set the value of vat_reverse_charge
     */
    public function setVatReverseCharge(?int $vat_reverse_charge): self
    {
        $this->vat_reverse_charge = $vat_reverse_charge;

        return $this;
    }

    /**
     * Get the value of logo_squarred_mini
     */
    public function getLogoSquarredMini()
    {
        return $this->logo_squarred_mini;
    }

    /**
     * Set the value of logo_squarred_mini
     */
    public function setLogoSquarredMini($logo_squarred_mini): self
    {
        $this->logo_squarred_mini = $logo_squarred_mini;

        return $this;
    }

    /**
     * Get the value of logo_squarred_small
     */
    public function getLogoSquarredSmall()
    {
        return $this->logo_squarred_small;
    }

    /**
     * Set the value of logo_squarred_small
     */
    public function setLogoSquarredSmall($logo_squarred_small): self
    {
        $this->logo_squarred_small = $logo_squarred_small;

        return $this;
    }

    /**
     * Get the value of idprof2
     */
    public function getIdprof2(): ?string
    {
        return $this->idprof2;
    }

    /**
     * Set the value of idprof2
     */
    public function setIdprof2(?string $idprof2): self
    {
        $this->idprof2 = $idprof2;

        return $this;
    }

    /**
     * Get the value of logo_squarred
     */
    public function getLogoSquarred()
    {
        return $this->logo_squarred;
    }

    /**
     * Set the value of logo_squarred
     */
    public function setLogoSquarred($logo_squarred): self
    {
        $this->logo_squarred = $logo_squarred;

        return $this;
    }

    /**
     * Get the value of outstanding_limit
     */
    public function getOutstandingLimit()
    {
        return $this->outstanding_limit;
    }

    /**
     * Set the value of outstanding_limit
     */
    public function setOutstandingLimit($outstanding_limit): self
    {
        $this->outstanding_limit = $outstanding_limit;

        return $this;
    }

    /**
     * Get the value of logo_mini
     */
    public function getLogoMini()
    {
        return $this->logo_mini;
    }

    /**
     * Set the value of logo_mini
     */
    public function setLogoMini($logo_mini): self
    {
        $this->logo_mini = $logo_mini;

        return $this;
    }

    /**
     * Get the value of logo_small
     */
    public function getLogoSmall()
    {
        return $this->logo_small;
    }

    /**
     * Set the value of logo_small
     */
    public function setLogoSmall($logo_small): self
    {
        $this->logo_small = $logo_small;

        return $this;
    }

    /**
     * Get the value of logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     */
    public function setLogo($logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of localtax1_assuj
     */
    public function getLocaltax1Assuj(): ?string
    {
        return $this->localtax1_assuj;
    }

    /**
     * Set the value of localtax1_assuj
     */
    public function setLocaltax1Assuj(?string $localtax1_assuj): self
    {
        $this->localtax1_assuj = $localtax1_assuj;

        return $this;
    }

    /**
     * Get the value of order_min_amount
     */
    public function getOrderMinAmount()
    {
        return $this->order_min_amount;
    }

    /**
     * Set the value of order_min_amount
     */
    public function setOrderMinAmount($order_min_amount): self
    {
        $this->order_min_amount = $order_min_amount;

        return $this;
    }

    /**
     * Get the value of webservices_key
     */
    public function getWebservicesKey()
    {
        return $this->webservices_key;
    }

    /**
     * Set the value of webservices_key
     */
    public function setWebservicesKey($webservices_key): self
    {
        $this->webservices_key = $webservices_key;

        return $this;
    }

    /**
     * Get the value of localtax1_value
     */
    public function getLocaltax1Value(): ?float
    {
        return $this->localtax1_value;
    }

    /**
     * Set the value of localtax1_value
     */
    public function setLocaltax1Value(?float $localtax1_value): self
    {
        $this->localtax1_value = $localtax1_value;

        return $this;
    }

    /**
     * Get the value of webservices_url
     */
    public function getWebservicesUrl()
    {
        return $this->webservices_url;
    }

    /**
     * Set the value of webservices_url
     */
    public function setWebservicesUrl($webservices_url): self
    {
        $this->webservices_url = $webservices_url;

        return $this;
    }

    /**
     * Get the value of ip
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set the value of ip
     */
    public function setIp($ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get the value of default_lang
     */
    public function getDefaultLang()
    {
        return $this->default_lang;
    }

    /**
     * Set the value of default_lang
     */
    public function setDefaultLang($default_lang): self
    {
        $this->default_lang = $default_lang;

        return $this;
    }

    /**
     * Get the value of parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the value of parent
     */
    public function setParent($parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get the value of supplier_order_min_amount
     */
    public function getSupplierOrderMinAmount()
    {
        return $this->supplier_order_min_amount;
    }

    /**
     * Set the value of supplier_order_min_amount
     */
    public function setSupplierOrderMinAmount($supplier_order_min_amount): self
    {
        $this->supplier_order_min_amount = $supplier_order_min_amount;

        return $this;
    }

    /**
     * Get the value of stcomm_id
     */
    public function getStcommId(): ?string
    {
        return $this->stcomm_id;
    }

    /**
     * Set the value of stcomm_id
     */
    public function setStcommId(?string $stcomm_id): self
    {
        $this->stcomm_id = $stcomm_id;

        return $this;
    }

    /**
     * Get the value of code_compta_product
     */
    public function getCodeComptaProduct()
    {
        return $this->code_compta_product;
    }

    /**
     * Set the value of code_compta_product
     */
    public function setCodeComptaProduct($code_compta_product): self
    {
        $this->code_compta_product = $code_compta_product;

        return $this;
    }

    /**
     * Get the value of accountancy_code_supplier
     */
    public function getAccountancyCodeSupplier()
    {
        return $this->accountancy_code_supplier;
    }

    /**
     * Set the value of accountancy_code_supplier
     */
    public function setAccountancyCodeSupplier($accountancy_code_supplier): self
    {
        $this->accountancy_code_supplier = $accountancy_code_supplier;

        return $this;
    }

    /**
     * Get the value of accountancy_code_supplier_general
     */
    public function getAccountancyCodeSupplierGeneral()
    {
        return $this->accountancy_code_supplier_general;
    }

    /**
     * Set the value of accountancy_code_supplier_general
     */
    public function setAccountancyCodeSupplierGeneral($accountancy_code_supplier_general): self
    {
        $this->accountancy_code_supplier_general = $accountancy_code_supplier_general;

        return $this;
    }

    /**
     * Get the value of code_compta_fournisseur
     */
    public function getCodeComptaFournisseur()
    {
        return $this->code_compta_fournisseur;
    }

    /**
     * Set the value of code_compta_fournisseur
     */
    public function setCodeComptaFournisseur($code_compta_fournisseur): self
    {
        $this->code_compta_fournisseur = $code_compta_fournisseur;

        return $this;
    }

    /**
     * Get the value of accountancy_code_customer
     */
    public function getAccountancyCodeCustomer()
    {
        return $this->accountancy_code_customer;
    }

    /**
     * Set the value of accountancy_code_customer
     */
    public function setAccountancyCodeCustomer($accountancy_code_customer): self
    {
        $this->accountancy_code_customer = $accountancy_code_customer;

        return $this;
    }

    /**
     * Get the value of accountancy_code_customer_general
     */
    public function getAccountancyCodeCustomerGeneral()
    {
        return $this->accountancy_code_customer_general;
    }

    /**
     * Set the value of accountancy_code_customer_general
     */
    public function setAccountancyCodeCustomerGeneral($accountancy_code_customer_general): self
    {
        $this->accountancy_code_customer_general = $accountancy_code_customer_general;

        return $this;
    }

    /**
     * Get the value of mode_reglement_supplier_id
     */
    public function getModeReglementSupplierId()
    {
        return $this->mode_reglement_supplier_id;
    }

    /**
     * Set the value of mode_reglement_supplier_id
     */
    public function setModeReglementSupplierId($mode_reglement_supplier_id): self
    {
        $this->mode_reglement_supplier_id = $mode_reglement_supplier_id;

        return $this;
    }

    /**
     * Get the value of code_compta_client
     */
    public function getCodeComptaClient()
    {
        return $this->code_compta_client;
    }

    /**
     * Set the value of code_compta_client
     */
    public function setCodeComptaClient($code_compta_client): self
    {
        $this->code_compta_client = $code_compta_client;

        return $this;
    }

    /**
     * Get the value of code_fournisseur
     */
    public function getCodeFournisseur()
    {
        return $this->code_fournisseur;
    }

    /**
     * Set the value of code_fournisseur
     */
    public function setCodeFournisseur($code_fournisseur): self
    {
        $this->code_fournisseur = $code_fournisseur;

        return $this;
    }

    /**
     * Get the value of code_client
     */
    public function getCodeClient(): ?string
    {
        return $this->code_client;
    }

    /**
     * Set the value of code_client
     */
    public function setCodeClient(?string $code_client): self
    {
        $this->code_client = $code_client;

        return $this;
    }

    /**
     * Get the value of fournisseur
     */
    public function getFournisseur(): ?int
    {
        return $this->fournisseur;
    }

    /**
     * Set the value of fournisseur
     */
    public function setFournisseur(?int $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get the value of prospect
     */
    public function getProspect(): ?int
    {
        return $this->prospect;
    }

    /**
     * Set the value of prospect
     */
    public function setProspect(?int $prospect): self
    {
        $this->prospect = $prospect;

        return $this;
    }

    /**
     * Get the value of client
     */
    public function getClient(): ?int
    {
        return $this->client;
    }

    /**
     * Set the value of client
     */
    public function setClient(?int $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of fk_prospectlevel
     */
    public function getFkProspectlevel()
    {
        return $this->fk_prospectlevel;
    }

    /**
     * Set the value of fk_prospectlevel
     */
    public function setFkProspectlevel($fk_prospectlevel): self
    {
        $this->fk_prospectlevel = $fk_prospectlevel;

        return $this;
    }

    /**
     * Get the value of localtax2_assuj
     */
    public function getLocaltax2Assuj(): ?string
    {
        return $this->localtax2_assuj;
    }

    /**
     * Set the value of localtax2_assuj
     */
    public function setLocaltax2Assuj(?string $localtax2_assuj): self
    {
        $this->localtax2_assuj = $localtax2_assuj;

        return $this;
    }

    /**
     * Get the value of transport_mode_supplier_id
     */
    public function getTransportModeSupplierId()
    {
        return $this->transport_mode_supplier_id;
    }

    /**
     * Set the value of transport_mode_supplier_id
     */
    public function setTransportModeSupplierId($transport_mode_supplier_id): self
    {
        $this->transport_mode_supplier_id = $transport_mode_supplier_id;

        return $this;
    }

    /**
     * Get the value of remise_percent
     */
    public function getRemisePercent(): ?float
    {
        return $this->remise_percent;
    }

    /**
     * Set the value of remise_percent
     */
    public function setRemisePercent(?float $remise_percent): self
    {
        $this->remise_percent = $remise_percent;

        return $this;
    }

    /**
     * Get the value of forme_juridique
     */
    public function getFormeJuridique()
    {
        return $this->forme_juridique;
    }

    /**
     * Set the value of forme_juridique
     */
    public function setFormeJuridique($forme_juridique): self
    {
        $this->forme_juridique = $forme_juridique;

        return $this;
    }

    /**
     * Get the value of forme_juridique_code
     */
    public function getFormeJuridiqueCode()
    {
        return $this->forme_juridique_code;
    }

    /**
     * Set the value of forme_juridique_code
     */
    public function setFormeJuridiqueCode($forme_juridique_code): self
    {
        $this->forme_juridique_code = $forme_juridique_code;

        return $this;
    }

    /**
     * Get the value of effectif_id
     */
    public function getEffectifId()
    {
        return $this->effectif_id;
    }

    /**
     * Set the value of effectif_id
     */
    public function setEffectifId($effectif_id): self
    {
        $this->effectif_id = $effectif_id;

        return $this;
    }

    /**
     * Get the value of effectif
     */
    public function getEffectif()
    {
        return $this->effectif;
    }

    /**
     * Set the value of effectif
     */
    public function setEffectif($effectif): self
    {
        $this->effectif = $effectif;

        return $this;
    }

    /**
     * Get the value of tva_intra
     */
    public function getTvaIntra(): ?string
    {
        return $this->tva_intra;
    }

    /**
     * Set the value of tva_intra
     */
    public function setTvaIntra(?string $tva_intra): self
    {
        $this->tva_intra = $tva_intra;

        return $this;
    }

    /**
     * Get the value of typent_code
     */
    public function getTypentCode()
    {
        return $this->typent_code;
    }

    /**
     * Set the value of typent_code
     */
    public function setTypentCode($typent_code): self
    {
        $this->typent_code = $typent_code;

        return $this;
    }

    /**
     * Get the value of typent_id
     */
    public function getTypentId(): ?string
    {
        return $this->typent_id;
    }

    /**
     * Set the value of typent_id
     */
    public function setTypentId(?string $typent_id): self
    {
        $this->typent_id = $typent_id;

        return $this;
    }

    /**
     * Get the value of capital
     */
    public function getCapital(): ?float
    {
        return $this->capital;
    }

    /**
     * Set the value of capital
     */
    public function setCapital(?float $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get the value of managers
     */
    public function getManagers()
    {
        return $this->managers;
    }

    /**
     * Set the value of managers
     */
    public function setManagers($managers): self
    {
        $this->managers = $managers;

        return $this;
    }

    /**
     * Get the value of localtax2_value
     */
    public function getLocaltax2Value(): ?float
    {
        return $this->localtax2_value;
    }

    /**
     * Set the value of localtax2_value
     */
    public function setLocaltax2Value(?float $localtax2_value): self
    {
        $this->localtax2_value = $localtax2_value;

        return $this;
    }

    /**
     * Get the value of tva_assuj
     */
    public function getTvaAssuj(): ?string
    {
        return $this->tva_assuj;
    }

    /**
     * Set the value of tva_assuj
     */
    public function setTvaAssuj(?string $tva_assuj): self
    {
        $this->tva_assuj = $tva_assuj;

        return $this;
    }

    /**
     * Get the value of fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set the value of fax
     */
    public function setFax($fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get the value of socialobject
     */
    public function getSocialobject()
    {
        return $this->socialobject;
    }

    /**
     * Set the value of socialobject
     */
    public function setSocialobject($socialobject): self
    {
        $this->socialobject = $socialobject;

        return $this;
    }

    /**
     * Get the value of idprof10
     */
    public function getIdprof10()
    {
        return $this->idprof10;
    }

    /**
     * Set the value of idprof10
     */
    public function setIdprof10($idprof10): self
    {
        $this->idprof10 = $idprof10;

        return $this;
    }

    /**
     * Get the value of idprof9
     */
    public function getIdprof9()
    {
        return $this->idprof9;
    }

    /**
     * Set the value of idprof9
     */
    public function setIdprof9($idprof9): self
    {
        $this->idprof9 = $idprof9;

        return $this;
    }

    /**
     * Get the value of idprof8
     */
    public function getIdprof8()
    {
        return $this->idprof8;
    }

    /**
     * Set the value of idprof8
     */
    public function setIdprof8($idprof8): self
    {
        $this->idprof8 = $idprof8;

        return $this;
    }

    /**
     * Get the value of idprof1
     */
    public function getIdprof1(): ?string
    {
        return $this->idprof1;
    }

    /**
     * Set the value of idprof1
     */
    public function setIdprof1(?string $idprof1): self
    {
        $this->idprof1 = $idprof1;

        return $this;
    }

    /**
     * Get the value of idprof7
     */
    public function getIdprof7()
    {
        return $this->idprof7;
    }

    /**
     * Set the value of idprof7
     */
    public function setIdprof7($idprof7): self
    {
        $this->idprof7 = $idprof7;

        return $this;
    }

    /**
     * Get the value of idprof6
     */
    public function getIdprof6(): ?string
    {
        return $this->idprof6;
    }

    /**
     * Set the value of idprof6
     */
    public function setIdprof6(?string $idprof6): self
    {
        $this->idprof6 = $idprof6;

        return $this;
    }

    /**
     * Get the value of idprof5
     */
    public function getIdprof5(): ?string
    {
        return $this->idprof5;
    }

    /**
     * Set the value of idprof5
     */
    public function setIdprof5(?string $idprof5): self
    {
        $this->idprof5 = $idprof5;

        return $this;
    }

    /**
     * Get the value of idprof4
     */
    public function getIdprof4(): ?string
    {
        return $this->idprof4;
    }

    /**
     * Set the value of idprof4
     */
    public function setIdprof4(?string $idprof4): self
    {
        $this->idprof4 = $idprof4;

        return $this;
    }

    /**
     * Get the value of idprof3
     */
    public function getIdprof3(): ?string
    {
        return $this->idprof3;
    }

    /**
     * Set the value of idprof3
     */
    public function setIdprof3(?string $idprof3): self
    {
        $this->idprof3 = $idprof3;

        return $this;
    }

    /**
     * Get the value of barcode
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set the value of barcode
     */
    public function setBarcode($barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     */
    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of linkedin
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set the value of linkedin
     */
    public function setLinkedin($linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get the value of user_author
     */
    public function getUserAuthor()
    {
        return $this->user_author;
    }

    /**
     * Set the value of user_author
     */
    public function setUserAuthor($user_author): self
    {
        $this->user_author = $user_author;

        return $this;
    }

    /**
     * Get the value of user_creation
     */
    public function getUserCreation()
    {
        return $this->user_creation;
    }

    /**
     * Set the value of user_creation
     */
    public function setUserCreation($user_creation): self
    {
        $this->user_creation = $user_creation;

        return $this;
    }

    /**
     * Get the value of user_creation_id
     */
    public function getUserCreationId(): ?int
    {
        return $this->user_creation_id;
    }

    /**
     * Set the value of user_creation_id
     */
    public function setUserCreationId(?int $user_creation_id): self
    {
        $this->user_creation_id = $user_creation_id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of no_email
     */
    public function getNoEmail()
    {
        return $this->no_email;
    }

    /**
     * Set the value of no_email
     */
    public function setNoEmail($no_email): self
    {
        $this->no_email = $no_email;

        return $this;
    }

    /**
     * Get the value of facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set the value of facebook
     */
    public function setFacebook($facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get the value of twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set the value of twitter
     */
    public function setTwitter($twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get the value of skype
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set the value of skype
     */
    public function setSkype($skype): self
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get the value of phone_mobile
     */
    public function getPhoneMobile()
    {
        return $this->phone_mobile;
    }

    /**
     * Set the value of phone_mobile
     */
    public function setPhoneMobile($phone_mobile): self
    {
        $this->phone_mobile = $phone_mobile;

        return $this;
    }

    /**
     * Get the value of date_cloture
     */
    public function getDateCloture()
    {
        return $this->date_cloture;
    }

    /**
     * Set the value of date_cloture
     */
    public function setDateCloture($date_cloture): self
    {
        $this->date_cloture = $date_cloture;

        return $this;
    }

    /**
     * Get the value of tms
     */
    public function getTms()
    {
        return $this->tms;
    }

    /**
     * Set the value of tms
     */
    public function setTms($tms): self
    {
        $this->tms = $tms;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of name_alias
     */
    public function getNameAlias(): ?string
    {
        return $this->name_alias;
    }

    /**
     * Set the value of name_alias
     */
    public function setNameAlias(?string $name_alias): self
    {
        $this->name_alias = $name_alias;

        return $this;
    }

    /**
     * Get the value of user_valid
     */
    public function getUserValid()
    {
        return $this->user_valid;
    }

    /**
     * Set the value of user_valid
     */
    public function setUserValid($user_valid): self
    {
        $this->user_valid = $user_valid;

        return $this;
    }

    /**
     * Get the value of prefixCustomerIsRequired
     */
    public function getPrefixCustomerIsRequired()
    {
        return $this->prefixCustomerIsRequired;
    }

    /**
     * Set the value of prefixCustomerIsRequired
     */
    public function setPrefixCustomerIsRequired($prefixCustomerIsRequired): self
    {
        $this->prefixCustomerIsRequired = $prefixCustomerIsRequired;

        return $this;
    }

    /**
     * Get the value of SupplierCategories
     */
    public function getSupplierCategories(): array
    {
        return $this->SupplierCategories;
    }

    /**
     * Set the value of SupplierCategories
     */
    public function setSupplierCategories(array $SupplierCategories): self
    {
        $this->SupplierCategories = $SupplierCategories;

        return $this;
    }

    /**
     * Get the value of user_validation
     */
    public function getUserValidation()
    {
        return $this->user_validation;
    }

    /**
     * Set the value of user_validation
     */
    public function setUserValidation($user_validation): self
    {
        $this->user_validation = $user_validation;

        return $this;
    }

    /**
     * Get the value of warehouse_id
     */
    public function getWarehouseId()
    {
        return $this->warehouse_id;
    }

    /**
     * Set the value of warehouse_id
     */
    public function setWarehouseId($warehouse_id): self
    {
        $this->warehouse_id = $warehouse_id;

        return $this;
    }

    /**
     * Get the value of retained_warranty_fk_cond_reglement
     */
    public function getRetainedWarrantyFkCondReglement()
    {
        return $this->retained_warranty_fk_cond_reglement;
    }

    /**
     * Set the value of retained_warranty_fk_cond_reglement
     */
    public function setRetainedWarrantyFkCondReglement($retained_warranty_fk_cond_reglement): self
    {
        $this->retained_warranty_fk_cond_reglement = $retained_warranty_fk_cond_reglement;

        return $this;
    }

    /**
     * Get the value of user_validation_id
     */
    public function getUserValidationId()
    {
        return $this->user_validation_id;
    }

    /**
     * Set the value of user_validation_id
     */
    public function setUserValidationId($user_validation_id): self
    {
        $this->user_validation_id = $user_validation_id;

        return $this;
    }

    /**
     * Get the value of date_modification
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Set the value of date_modification
     */
    public function setDateModification($date_modification): self
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    /**
     * Get the value of deposit_percent
     */
    public function getDepositPercent()
    {
        return $this->deposit_percent;
    }

    /**
     * Set the value of deposit_percent
     */
    public function setDepositPercent($deposit_percent): self
    {
        $this->deposit_percent = $deposit_percent;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_localtax2
     */
    public function getMulticurrencyTotalLocaltax2()
    {
        return $this->multicurrency_total_localtax2;
    }

    /**
     * Set the value of multicurrency_total_localtax2
     */
    public function setMulticurrencyTotalLocaltax2($multicurrency_total_localtax2): self
    {
        $this->multicurrency_total_localtax2 = $multicurrency_total_localtax2;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_ttc
     */
    public function getMulticurrencyTotalTtc()
    {
        return $this->multicurrency_total_ttc;
    }

    /**
     * Set the value of multicurrency_total_ttc
     */
    public function setMulticurrencyTotalTtc($multicurrency_total_ttc): self
    {
        $this->multicurrency_total_ttc = $multicurrency_total_ttc;

        return $this;
    }

    /**
     * Get the value of user_closing_id
     */
    public function getUserClosingId()
    {
        return $this->user_closing_id;
    }

    /**
     * Set the value of user_closing_id
     */
    public function setUserClosingId($user_closing_id): self
    {
        $this->user_closing_id = $user_closing_id;

        return $this;
    }

    /**
     * Get the value of last_main_doc
     */
    public function getLastMainDoc()
    {
        return $this->last_main_doc;
    }

    /**
     * Set the value of last_main_doc
     */
    public function setLastMainDoc($last_main_doc): self
    {
        $this->last_main_doc = $last_main_doc;

        return $this;
    }

    /**
     * Get the value of fk_account
     */
    public function getFkAccount(): ?string
    {
        return $this->fk_account;
    }

    /**
     * Set the value of fk_account
     */
    public function setFkAccount(?string $fk_account): self
    {
        $this->fk_account = $fk_account;

        return $this;
    }

    /**
     * Get the value of note_public
     */
    public function getNotePublic()
    {
        return $this->note_public;
    }

    /**
     * Set the value of note_public
     */
    public function setNotePublic($note_public): self
    {
        $this->note_public = $note_public;

        return $this;
    }

    /**
     * Get the value of cond_reglement_supplier_id
     */
    public function getCondReglementSupplierId()
    {
        return $this->cond_reglement_supplier_id;
    }

    /**
     * Set the value of cond_reglement_supplier_id
     */
    public function setCondReglementSupplierId($cond_reglement_supplier_id): self
    {
        $this->cond_reglement_supplier_id = $cond_reglement_supplier_id;

        return $this;
    }

    /**
     * Get the value of note_private
     */
    public function getNotePrivate()
    {
        return $this->note_private;
    }

    /**
     * Set the value of note_private
     */
    public function setNotePrivate($note_private): self
    {
        $this->note_private = $note_private;

        return $this;
    }

    /**
     * Get the value of user_modification
     */
    public function getUserModification()
    {
        return $this->user_modification;
    }

    /**
     * Set the value of user_modification
     */
    public function setUserModification($user_modification): self
    {
        $this->user_modification = $user_modification;

        return $this;
    }

    /**
     * Get the value of product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     */
    public function setProduct($product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of extraparams
     */
    public function getExtraparams(): array
    {
        return $this->extraparams;
    }

    /**
     * Set the value of extraparams
     */
    public function setExtraparams(array $extraparams): self
    {
        $this->extraparams = $extraparams;

        return $this;
    }

    /**
     * Get the value of date_validation
     */
    public function getDateValidation()
    {
        return $this->date_validation;
    }

    /**
     * Set the value of date_validation
     */
    public function setDateValidation($date_validation): self
    {
        $this->date_validation = $date_validation;

        return $this;
    }

    /**
     * Get the value of totalpaid
     */
    public function getTotalpaid()
    {
        return $this->totalpaid;
    }

    /**
     * Set the value of totalpaid
     */
    public function setTotalpaid($totalpaid): self
    {
        $this->totalpaid = $totalpaid;

        return $this;
    }

    /**
     * Get the value of specimen
     */
    public function getSpecimen(): ?int
    {
        return $this->specimen;
    }

    /**
     * Set the value of specimen
     */
    public function setSpecimen(?int $specimen): self
    {
        $this->specimen = $specimen;

        return $this;
    }

    /**
     * Get the value of fk_user_modif
     */
    public function getFkUserModif()
    {
        return $this->fk_user_modif;
    }

    /**
     * Set the value of fk_user_modif
     */
    public function setFkUserModif($fk_user_modif): self
    {
        $this->fk_user_modif = $fk_user_modif;

        return $this;
    }

    /**
     * Get the value of fk_user_creat
     */
    public function getFkUserCreat()
    {
        return $this->fk_user_creat;
    }

    /**
     * Set the value of fk_user_creat
     */
    public function setFkUserCreat($fk_user_creat): self
    {
        $this->fk_user_creat = $fk_user_creat;

        return $this;
    }

    /**
     * Get the value of user_modification_id
     */
    public function getUserModificationId()
    {
        return $this->user_modification_id;
    }

    /**
     * Set the value of user_modification_id
     */
    public function setUserModificationId($user_modification_id): self
    {
        $this->user_modification_id = $user_modification_id;

        return $this;
    }

    /**
     * Get the value of date_creation
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     */
    public function setDateCreation($date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of civility_code
     */
    public function getCivilityCode()
    {
        return $this->civility_code;
    }

    /**
     * Set the value of civility_code
     */
    public function setCivilityCode($civility_code): self
    {
        $this->civility_code = $civility_code;

        return $this;
    }

    /**
     * Get the value of civility_id
     */
    public function getCivilityId()
    {
        return $this->civility_id;
    }

    /**
     * Set the value of civility_id
     */
    public function setCivilityId($civility_id): self
    {
        $this->civility_id = $civility_id;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of actiontypecode
     */
    public function getActiontypecode()
    {
        return $this->actiontypecode;
    }

    /**
     * Set the value of actiontypecode
     */
    public function setActiontypecode($actiontypecode): self
    {
        $this->actiontypecode = $actiontypecode;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_localtax1
     */
    public function getMulticurrencyTotalLocaltax1()
    {
        return $this->multicurrency_total_localtax1;
    }

    /**
     * Set the value of multicurrency_total_localtax1
     */
    public function setMulticurrencyTotalLocaltax1($multicurrency_total_localtax1): self
    {
        $this->multicurrency_total_localtax1 = $multicurrency_total_localtax1;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_tva
     */
    public function getMulticurrencyTotalTva()
    {
        return $this->multicurrency_total_tva;
    }

    /**
     * Set the value of multicurrency_total_tva
     */
    public function setMulticurrencyTotalTva($multicurrency_total_tva): self
    {
        $this->multicurrency_total_tva = $multicurrency_total_tva;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_ht
     */
    public function getMulticurrencyTotalHt()
    {
        return $this->multicurrency_total_ht;
    }

    /**
     * Set the value of multicurrency_total_ht
     */
    public function setMulticurrencyTotalHt($multicurrency_total_ht): self
    {
        $this->multicurrency_total_ht = $multicurrency_total_ht;

        return $this;
    }

    /**
     * Get the value of multicurrency_tx
     */
    public function getMulticurrencyTx()
    {
        return $this->multicurrency_tx;
    }

    /**
     * Set the value of multicurrency_tx
     */
    public function setMulticurrencyTx($multicurrency_tx): self
    {
        $this->multicurrency_tx = $multicurrency_tx;

        return $this;
    }

    /**
     * Get the value of multicurrency_code
     */
    public function getMulticurrencyCode(): ?string
    {
        return $this->multicurrency_code;
    }

    /**
     * Set the value of multicurrency_code
     */
    public function setMulticurrencyCode(?string $multicurrency_code): self
    {
        $this->multicurrency_code = $multicurrency_code;

        return $this;
    }

    /**
     * Get the value of fk_multicurrency
     */
    public function getFkMulticurrency(): ?string
    {
        return $this->fk_multicurrency;
    }

    /**
     * Set the value of fk_multicurrency
     */
    public function setFkMulticurrency(?string $fk_multicurrency): self
    {
        $this->fk_multicurrency = $fk_multicurrency;

        return $this;
    }

    /**
     * Get the value of shipping_method
     */
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * Set the value of shipping_method
     */
    public function setShippingMethod($shipping_method): self
    {
        $this->shipping_method = $shipping_method;

        return $this;
    }

    /**
     * Get the value of shipping_method_id
     */
    public function getShippingMethodId()
    {
        return $this->shipping_method_id;
    }

    /**
     * Set the value of shipping_method_id
     */
    public function setShippingMethodId($shipping_method_id): self
    {
        $this->shipping_method_id = $shipping_method_id;

        return $this;
    }

    /**
     * Get the value of transport_mode_id
     */
    public function getTransportModeId()
    {
        return $this->transport_mode_id;
    }

    /**
     * Set the value of transport_mode_id
     */
    public function setTransportModeId($transport_mode_id): self
    {
        $this->transport_mode_id = $transport_mode_id;

        return $this;
    }

    /**
     * Get the value of demand_reason_id
     */
    public function getDemandReasonId()
    {
        return $this->demand_reason_id;
    }

    /**
     * Set the value of demand_reason_id
     */
    public function setDemandReasonId($demand_reason_id): self
    {
        $this->demand_reason_id = $demand_reason_id;

        return $this;
    }

    /**
     * Get the value of cond_reglement_id
     */
    public function getCondReglementId()
    {
        return $this->cond_reglement_id;
    }

    /**
     * Set the value of cond_reglement_id
     */
    public function setCondReglementId($cond_reglement_id): self
    {
        $this->cond_reglement_id = $cond_reglement_id;

        return $this;
    }

    /**
     * Get the value of mode_reglement_id
     */
    public function getModeReglementId(): ?string
    {
        return $this->mode_reglement_id;
    }

    /**
     * Set the value of mode_reglement_id
     */
    public function setModeReglementId(?string $mode_reglement_id): self
    {
        $this->mode_reglement_id = $mode_reglement_id;

        return $this;
    }

    /**
     * Get the value of barcode_type_coder
     */
    public function getBarcodeTypeCoder()
    {
        return $this->barcode_type_coder;
    }

    /**
     * Set the value of barcode_type_coder
     */
    public function setBarcodeTypeCoder($barcode_type_coder): self
    {
        $this->barcode_type_coder = $barcode_type_coder;

        return $this;
    }

    /**
     * Get the value of barcode_type
     */
    public function getBarcodeType()
    {
        return $this->barcode_type;
    }

    /**
     * Set the value of barcode_type
     */
    public function setBarcodeType($barcode_type): self
    {
        $this->barcode_type = $barcode_type;

        return $this;
    }

    /**
     * Get the value of region_id
     */
    public function getRegionId()
    {
        return $this->region_id;
    }

    /**
     * Set the value of region_id
     */
    public function setRegionId($region_id): self
    {
        $this->region_id = $region_id;

        return $this;
    }

    /**
     * Get the value of state_id
     */
    public function getStateId()
    {
        return $this->state_id;
    }

    /**
     * Set the value of state_id
     */
    public function setStateId($state_id): self
    {
        $this->state_id = $state_id;

        return $this;
    }

    /**
     * Get the value of country_code
     */
    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    /**
     * Set the value of country_code
     */
    public function setCountryCode(?string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Get the value of country_id
     */
    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    /**
     * Set the value of country_id
     */
    public function setCountryId(?int $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut($statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of ref_ext
     */
    public function getRefExt(): ?string
    {
        return $this->ref_ext;
    }

    /**
     * Set the value of ref_ext
     */
    public function setRefExt(?string $ref_ext): self
    {
        $this->ref_ext = $ref_ext;

        return $this;
    }

    /**
     * Get the value of ref
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * Set the value of ref
     */
    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get the value of origin_id
     */
    public function getOriginId()
    {
        return $this->origin_id;
    }

    /**
     * Set the value of origin_id
     */
    public function setOriginId($origin_id): self
    {
        $this->origin_id = $origin_id;

        return $this;
    }

    /**
     * Get the value of origin_type
     */
    public function getOriginType()
    {
        return $this->origin_type;
    }

    /**
     * Set the value of origin_type
     */
    public function setOriginType($origin_type): self
    {
        $this->origin_type = $origin_type;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of contact_id
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set the value of contact_id
     */
    public function setContactId($contact_id): self
    {
        $this->contact_id = $contact_id;

        return $this;
    }

    /**
     * Get the value of fk_project
     */
    public function getFkProject()
    {
        return $this->fk_project;
    }

    /**
     * Set the value of fk_project
     */
    public function setFkProject($fk_project): self
    {
        $this->fk_project = $fk_project;

        return $this;
    }

    /**
     * Get the value of canvas
     */
    public function getCanvas(): ?string
    {
        return $this->canvas;
    }

    /**
     * Set the value of canvas
     */
    public function setCanvas(?string $canvas): self
    {
        $this->canvas = $canvas;

        return $this;
    }

    /**
     * Get the value of linkedObjectsIds
     */
    public function getLinkedObjectsIds()
    {
        return $this->linkedObjectsIds;
    }

    /**
     * Set the value of linkedObjectsIds
     */
    public function setLinkedObjectsIds($linkedObjectsIds): self
    {
        $this->linkedObjectsIds = $linkedObjectsIds;

        return $this;
    }

    /**
     * Get the value of contacts_ids_internal
     */
    public function getContactsIdsInternal()
    {
        return $this->contacts_ids_internal;
    }

    /**
     * Set the value of contacts_ids_internal
     */
    public function setContactsIdsInternal($contacts_ids_internal): self
    {
        $this->contacts_ids_internal = $contacts_ids_internal;

        return $this;
    }

    /**
     * Get the value of contacts_ids
     */
    public function getContactsIds()
    {
        return $this->contacts_ids;
    }

    /**
     * Set the value of contacts_ids
     */
    public function setContactsIds($contacts_ids): self
    {
        $this->contacts_ids = $contacts_ids;

        return $this;
    }

    /**
     * Get the value of array_languages
     */
    public function getArrayLanguages()
    {
        return $this->array_languages;
    }

    /**
     * Set the value of array_languages
     */
    public function setArrayLanguages($array_languages): self
    {
        $this->array_languages = $array_languages;

        return $this;
    }

    /**
     * Get the value of array_options
     */
    public function getArrayOptions(): array
    {
        return $this->array_options;
    }

    /**
     * Set the value of array_options
     */
    public function setArrayOptions(array $array_options): self
    {
        $this->array_options = $array_options;

        return $this;
    }

    /**
     * Get the value of import_key
     */
    public function getImportKey(): ?string
    {
        return $this->import_key;
    }

    /**
     * Set the value of import_key
     */
    public function setImportKey(?string $import_key): self
    {
        $this->import_key = $import_key;

        return $this;
    }

    /**
     * Get the value of entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set the value of entity
     */
    public function setEntity($entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of module
     */
    public function getModule(): ?string
    {
        return $this->module;
    }

    /**
     * Set the value of module
     */
    public function setModule(?string $module): self
    {
        $this->module = $module;

        return $this;
    }
}
