<?php
namespace Tubconcept\DolibarrApiClient\Objects;

use Tubconcept\DolibarrApiClient\Objects\Line;

class Shipment
{
    private ?string $module = null;
    private ?int $id = null;
    private $entity = null;
    private ?string $import_key = null;
    private array $array_options = [];
    private $array_languages = null;
    private $contacts_ids = null;
    private $contacts_ids_internal = null;
    private $linkedObjectsIds = [];
    private $fk_project = null;
    private $contact_id = null;
    private $user = null;
    private ?string $origin_type = null;
    private $origin_id = null;
    private ?string $ref = null;
    private $ref_ext = null;
    private $statut = null;
    private $status = null;
    private $country_id = null;
    private $country_code = null;
    private $state_id = null;
    private $region_id = null;
    private $mode_reglement_id = null;
    private $cond_reglement_id = null;
    private $demand_reason_id = null;
    private $transport_mode_id = null;
    private $shipping_method_id = null;
    private ?string $shipping_method = null;
    private $fk_multicurrency = null;
    private ?string $multicurrency_code = null;
    private $multicurrency_tx = null;
    private ?float $multicurrency_total_ht = null;
    private ?float $multicurrency_total_tva = null;
    private $multicurrency_total_localtax1 = null;
    private $multicurrency_total_localtax2 = null;
    private ?float $multicurrency_total_ttc = null;
    private $last_main_doc = null;
    private $fk_account = null;
    private ?float $total_ht = null;
    private ?float $total_tva = null;
    private ?float $total_localtax1 = null;
    private ?float $total_localtax2 = null;
    private ?float $total_ttc = null;
    private array $lines = [];
    private $actiontypecode = null;
    private $name = null;
    private $lastname = null;
    private $firstname = null;
    private $civility_id = null;
    private $civility_code = null;
    private ?int $date_creation = null;
    private $date_validation = null;
    private ?int $date_modification = null;
    private $tms = null;
    private $date_cloture = null;
    private $user_author = null;
    private $user_creation = null;
    private $user_creation_id = null;
    private $user_valid = null;
    private $user_validation = null;
    private $user_validation_id = null;
    private $user_closing_id = null;
    private $user_modification = null;
    private $user_modification_id = null;
    private $fk_user_creat = null;
    private $fk_user_modif = null;
    private int $specimen = 0;
    private $totalpaid = null;
    private array $extraparams = [];
    private $product = null;
    private $cond_reglement_supplier_id = null;
    private $deposit_percent = null;
    private $retained_warranty_fk_cond_reglement = null;
    private $warehouse_id = null;
    private $user_author_id = null;
    private $fk_user_author = null;
    private $socid = null;
    private $ref_client = null;
    private $ref_customer = null;
    private $entrepot_id = null;
    private ?string $tracking_number = null;
    private ?string $tracking_url = null;
    private $billed = null;
    private ?float $trueWeight = null;
    private ?int $weight_units = null;
    private ?float $trueWidth = null;
    private ?int $width_units = null;
    private ?float $trueHeight = null;
    private ?int $height_units = null;
    private ?float $trueDepth = null;
    private ?int $depth_units = null;
    private ?string $trueSize = null;
    private $livraison_id = null;
    private $multicurrency_subprice = null;
    private ?int $size_units = null;
    private $sizeH = null;
    private $sizeS = null;
    private $sizeW = null;
    private $weight = null;
    private ?int $date_delivery = null;
    private ?int $date = null;
    private ?int $date_expedition = null;
    private ?int $date_shipping = null;
    private ?string $date_valid = null;
    private $meths = null;
    private $listmeths = null;
    private $commande_id = null;
    private $commande = null;
    private ?string $fk_incoterms = null;
    private $label_incoterms = null;
    private $location_incoterms = null;
    private ?string $signed_status = null;

   

    public function toArray(): array
    {
        $data = get_object_vars($this);
        // Convertir les lignes si ce sont des objets Line
        if (!empty($this->lines)) {
            $data['lines'] = array_map(fn($line) => is_object($line) && method_exists($line, 'toArray') ? $line->toArray() : $line, $this->lines);
        }
        return $data;
    }

    /**
     * Crée un objet Shipment à partir d'une réponse API
     */
    public static function fromApiResponse(array $data): self
    {
        $shipment = new self();
        foreach ($data as $key => $value) {
            if (property_exists($shipment, $key)) {
                if ($key === 'lines' && (is_array($value) || is_object($value))) {
                    // Convertir les lignes en objets ShipmentLine
                    $lines=Line::fromApiResponse($value);
                    if($lines instanceof Line){
                       $shipment->lines = $lines->toArray(); 
                    }
                    
                } else {
                    $shipment->$key = $value;
                }
            }
        }
        return $shipment;
    } 
    
    // -------------------
    // Getters / Setters simplifiés
    // -------------------
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getRef(): ?string { return $this->ref; }
    public function setRef(?string $ref): self { $this->ref = $ref; return $this; }

    public function getTrackingNumber(): ?string { return $this->tracking_number; }
    public function setTrackingNumber(?string $tracking_number): self { $this->tracking_number = $tracking_number; return $this; }

    public function getLines(): array { return $this->lines; }
    public function setLines(array|Line $lines): self { 
        if($lines instanceof Line) {
            $this->lines = $lines->toArray();
        } else {
            $this->lines = $lines;
        }
         return $this;
    }

    /**
     * Get the value of signed_status
     */
    public function getSignedStatus(): ?string
    {
        return $this->signed_status;
    }

    /**
     * Set the value of signed_status
     */
    public function setSignedStatus(?string $signed_status): self
    {
        $this->signed_status = $signed_status;

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
     * Get the value of commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set the value of commande
     */
    public function setCommande($commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get the value of commande_id
     */
    public function getCommandeId()
    {
        return $this->commande_id;
    }

    /**
     * Set the value of commande_id
     */
    public function setCommandeId($commande_id): self
    {
        $this->commande_id = $commande_id;

        return $this;
    }

    /**
     * Get the value of tracking_url
     */
    public function getTrackingUrl(): ?string
    {
        return $this->tracking_url;
    }

    /**
     * Set the value of tracking_url
     */
    public function setTrackingUrl(?string $tracking_url): self
    {
        $this->tracking_url = $tracking_url;

        return $this;
    }

    /**
     * Get the value of billed
     */
    public function getBilled()
    {
        return $this->billed;
    }

    /**
     * Set the value of billed
     */
    public function setBilled($billed): self
    {
        $this->billed = $billed;

        return $this;
    }

    /**
     * Get the value of trueWeight
     */
    public function getTrueWeight(): ?float
    {
        return $this->trueWeight;
    }

    /**
     * Set the value of trueWeight
     */
    public function setTrueWeight(?float $trueWeight): self
    {
        $this->trueWeight = $trueWeight;

        return $this;
    }

    /**
     * Get the value of listmeths
     */
    public function getListmeths()
    {
        return $this->listmeths;
    }

    /**
     * Set the value of listmeths
     */
    public function setListmeths($listmeths): self
    {
        $this->listmeths = $listmeths;

        return $this;
    }

    /**
     * Get the value of weight_units
     */
    public function getWeightUnits(): ?int
    {
        return $this->weight_units;
    }

    /**
     * Set the value of weight_units
     */
    public function setWeightUnits(?int $weight_units): self
    {
        $this->weight_units = $weight_units;

        return $this;
    }

    /**
     * Get the value of meths
     */
    public function getMeths()
    {
        return $this->meths;
    }

    /**
     * Set the value of meths
     */
    public function setMeths($meths): self
    {
        $this->meths = $meths;

        return $this;
    }

    /**
     * Get the value of date_valid
     */
    public function getDateValid(): ?string
    {
        return $this->date_valid;
    }

    /**
     * Set the value of date_valid
     */
    public function setDateValid(?string $date_valid): self
    {
        $this->date_valid = $date_valid;

        return $this;
    }

    /**
     * Get the value of date_shipping
     */
    public function getDateShipping(): ?int
    {
        return $this->date_shipping;
    }

    /**
     * Set the value of date_shipping
     */
    public function setDateShipping(?int $date_shipping): self
    {
        $this->date_shipping = $date_shipping;

        return $this;
    }

    /**
     * Get the value of date_expedition
     */
    public function getDateExpedition(): ?int
    {
        return $this->date_expedition;
    }

    /**
     * Set the value of date_expedition
     */
    public function setDateExpedition(?int $date_expedition): self
    {
        $this->date_expedition = $date_expedition;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(?int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of date_delivery
     */
    public function getDateDelivery(): ?int
    {
        return $this->date_delivery;
    }

    /**
     * Set the value of date_delivery
     */
    public function setDateDelivery(?int $date_delivery): self
    {
        $this->date_delivery = $date_delivery;

        return $this;
    }

    /**
     * Get the value of entrepot_id
     */
    public function getEntrepotId()
    {
        return $this->entrepot_id;
    }

    /**
     * Set the value of entrepot_id
     */
    public function setEntrepotId($entrepot_id): self
    {
        $this->entrepot_id = $entrepot_id;

        return $this;
    }

    /**
     * Get the value of weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     */
    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of sizeW
     */
    public function getSizeW()
    {
        return $this->sizeW;
    }

    /**
     * Set the value of sizeW
     */
    public function setSizeW($sizeW): self
    {
        $this->sizeW = $sizeW;

        return $this;
    }

    /**
     * Get the value of sizeS
     */
    public function getSizeS()
    {
        return $this->sizeS;
    }

    /**
     * Set the value of sizeS
     */
    public function setSizeS($sizeS): self
    {
        $this->sizeS = $sizeS;

        return $this;
    }

    /**
     * Get the value of sizeH
     */
    public function getSizeH()
    {
        return $this->sizeH;
    }

    /**
     * Set the value of sizeH
     */
    public function setSizeH($sizeH): self
    {
        $this->sizeH = $sizeH;

        return $this;
    }

    /**
     * Get the value of size_units
     */
    public function getSizeUnits(): ?int
    {
        return $this->size_units;
    }

    /**
     * Set the value of size_units
     */
    public function setSizeUnits(?int $size_units): self
    {
        $this->size_units = $size_units;

        return $this;
    }

    /**
     * Get the value of multicurrency_subprice
     */
    public function getMulticurrencySubprice()
    {
        return $this->multicurrency_subprice;
    }

    /**
     * Set the value of multicurrency_subprice
     */
    public function setMulticurrencySubprice($multicurrency_subprice): self
    {
        $this->multicurrency_subprice = $multicurrency_subprice;

        return $this;
    }

    /**
     * Get the value of ref_customer
     */
    public function getRefCustomer()
    {
        return $this->ref_customer;
    }

    /**
     * Set the value of ref_customer
     */
    public function setRefCustomer($ref_customer): self
    {
        $this->ref_customer = $ref_customer;

        return $this;
    }

    /**
     * Get the value of trueWidth
     */
    public function getTrueWidth(): ?float
    {
        return $this->trueWidth;
    }

    /**
     * Set the value of trueWidth
     */
    public function setTrueWidth(?float $trueWidth): self
    {
        $this->trueWidth = $trueWidth;

        return $this;
    }

    /**
     * Get the value of livraison_id
     */
    public function getLivraisonId()
    {
        return $this->livraison_id;
    }

    /**
     * Set the value of livraison_id
     */
    public function setLivraisonId($livraison_id): self
    {
        $this->livraison_id = $livraison_id;

        return $this;
    }

    /**
     * Get the value of trueSize
     */
    public function getTrueSize(): ?string
    {
        return $this->trueSize;
    }

    /**
     * Set the value of trueSize
     */
    public function setTrueSize(?string $trueSize): self
    {
        $this->trueSize = $trueSize;

        return $this;
    }

    /**
     * Get the value of depth_units
     */
    public function getDepthUnits(): ?int
    {
        return $this->depth_units;
    }

    /**
     * Set the value of depth_units
     */
    public function setDepthUnits(?int $depth_units): self
    {
        $this->depth_units = $depth_units;

        return $this;
    }

    /**
     * Get the value of trueDepth
     */
    public function getTrueDepth(): ?float
    {
        return $this->trueDepth;
    }

    /**
     * Set the value of trueDepth
     */
    public function setTrueDepth(?float $trueDepth): self
    {
        $this->trueDepth = $trueDepth;

        return $this;
    }

    /**
     * Get the value of height_units
     */
    public function getHeightUnits(): ?int
    {
        return $this->height_units;
    }

    /**
     * Set the value of height_units
     */
    public function setHeightUnits(?int $height_units): self
    {
        $this->height_units = $height_units;

        return $this;
    }

    /**
     * Get the value of trueHeight
     */
    public function getTrueHeight(): ?float
    {
        return $this->trueHeight;
    }

    /**
     * Set the value of trueHeight
     */
    public function setTrueHeight(?float $trueHeight): self
    {
        $this->trueHeight = $trueHeight;

        return $this;
    }

    /**
     * Get the value of width_units
     */
    public function getWidthUnits(): ?int
    {
        return $this->width_units;
    }

    /**
     * Set the value of width_units
     */
    public function setWidthUnits(?int $width_units): self
    {
        $this->width_units = $width_units;

        return $this;
    }

    /**
     * Get the value of ref_client
     */
    public function getRefClient()
    {
        return $this->ref_client;
    }

    /**
     * Set the value of ref_client
     */
    public function setRefClient($ref_client): self
    {
        $this->ref_client = $ref_client;

        return $this;
    }

    /**
     * Get the value of socid
     */
    public function getSocid()
    {
        return $this->socid;
    }

    /**
     * Set the value of socid
     */
    public function setSocid($socid): self
    {
        $this->socid = $socid;

        return $this;
    }

    /**
     * Get the value of fk_user_author
     */
    public function getFkUserAuthor()
    {
        return $this->fk_user_author;
    }

    /**
     * Set the value of fk_user_author
     */
    public function setFkUserAuthor($fk_user_author): self
    {
        $this->fk_user_author = $fk_user_author;

        return $this;
    }

    /**
     * Get the value of user_author_id
     */
    public function getUserAuthorId()
    {
        return $this->user_author_id;
    }

    /**
     * Set the value of user_author_id
     */
    public function setUserAuthorId($user_author_id): self
    {
        $this->user_author_id = $user_author_id;

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
    public function getSpecimen(): int
    {
        return $this->specimen;
    }

    /**
     * Set the value of specimen
     */
    public function setSpecimen(int $specimen): self
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
     * Get the value of user_creation_id
     */
    public function getUserCreationId()
    {
        return $this->user_creation_id;
    }

    /**
     * Set the value of user_creation_id
     */
    public function setUserCreationId($user_creation_id): self
    {
        $this->user_creation_id = $user_creation_id;

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
     * Get the value of date_modification
     */
    public function getDateModification(): ?int
    {
        return $this->date_modification;
    }

    /**
     * Set the value of date_modification
     */
    public function setDateModification(?int $date_modification): self
    {
        $this->date_modification = $date_modification;

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
     * Get the value of date_creation
     */
    public function getDateCreation(): ?int
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     */
    public function setDateCreation(?int $date_creation): self
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
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
     * Get the value of total_ttc
     */
    public function getTotalTtc(): ?float
    {
        return $this->total_ttc;
    }

    /**
     * Set the value of total_ttc
     */
    public function setTotalTtc(?float $total_ttc): self
    {
        $this->total_ttc = $total_ttc;

        return $this;
    }

    /**
     * Get the value of total_localtax2
     */
    public function getTotalLocaltax2(): ?float
    {
        return $this->total_localtax2;
    }

    /**
     * Set the value of total_localtax2
     */
    public function setTotalLocaltax2(?float $total_localtax2): self
    {
        $this->total_localtax2 = $total_localtax2;

        return $this;
    }

    /**
     * Get the value of total_localtax1
     */
    public function getTotalLocaltax1(): ?float
    {
        return $this->total_localtax1;
    }

    /**
     * Set the value of total_localtax1
     */
    public function setTotalLocaltax1(?float $total_localtax1): self
    {
        $this->total_localtax1 = $total_localtax1;

        return $this;
    }

    /**
     * Get the value of total_tva
     */
    public function getTotalTva(): ?float
    {
        return $this->total_tva;
    }

    /**
     * Set the value of total_tva
     */
    public function setTotalTva(?float $total_tva): self
    {
        $this->total_tva = $total_tva;

        return $this;
    }

    /**
     * Get the value of total_ht
     */
    public function getTotalHt(): ?float
    {
        return $this->total_ht;
    }

    /**
     * Set the value of total_ht
     */
    public function setTotalHt(?float $total_ht): self
    {
        $this->total_ht = $total_ht;

        return $this;
    }

    /**
     * Get the value of fk_account
     */
    public function getFkAccount()
    {
        return $this->fk_account;
    }

    /**
     * Set the value of fk_account
     */
    public function setFkAccount($fk_account): self
    {
        $this->fk_account = $fk_account;

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
     * Get the value of multicurrency_total_ttc
     */
    public function getMulticurrencyTotalTtc(): ?float
    {
        return $this->multicurrency_total_ttc;
    }

    /**
     * Set the value of multicurrency_total_ttc
     */
    public function setMulticurrencyTotalTtc(?float $multicurrency_total_ttc): self
    {
        $this->multicurrency_total_ttc = $multicurrency_total_ttc;

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
    public function getMulticurrencyTotalTva(): ?float
    {
        return $this->multicurrency_total_tva;
    }

    /**
     * Set the value of multicurrency_total_tva
     */
    public function setMulticurrencyTotalTva(?float $multicurrency_total_tva): self
    {
        $this->multicurrency_total_tva = $multicurrency_total_tva;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_ht
     */
    public function getMulticurrencyTotalHt(): ?float
    {
        return $this->multicurrency_total_ht;
    }

    /**
     * Set the value of multicurrency_total_ht
     */
    public function setMulticurrencyTotalHt(?float $multicurrency_total_ht): self
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
    public function getFkMulticurrency()
    {
        return $this->fk_multicurrency;
    }

    /**
     * Set the value of fk_multicurrency
     */
    public function setFkMulticurrency($fk_multicurrency): self
    {
        $this->fk_multicurrency = $fk_multicurrency;

        return $this;
    }

    /**
     * Get the value of shipping_method
     */
    public function getShippingMethod(): ?string
    {
        return $this->shipping_method;
    }

    /**
     * Set the value of shipping_method
     */
    public function setShippingMethod(?string $shipping_method): self
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
    public function getModeReglementId()
    {
        return $this->mode_reglement_id;
    }

    /**
     * Set the value of mode_reglement_id
     */
    public function setModeReglementId($mode_reglement_id): self
    {
        $this->mode_reglement_id = $mode_reglement_id;

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
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set the value of country_code
     */
    public function setCountryCode($country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Get the value of country_id
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Set the value of country_id
     */
    public function setCountryId($country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
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
    public function getRefExt()
    {
        return $this->ref_ext;
    }

    /**
     * Set the value of ref_ext
     */
    public function setRefExt($ref_ext): self
    {
        $this->ref_ext = $ref_ext;

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
    public function getOriginType(): ?string
    {
        return $this->origin_type;
    }

    /**
     * Set the value of origin_type
     */
    public function setOriginType(?string $origin_type): self
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