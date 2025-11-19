<?php
namespace Tubconcept\DolibarrApiClient\Objects;
use Tubconcept\DolibarrApiClient\Objects\Line;

class Order
{
    private ?string $module = null;
    private int $id;
    private int $entity;
    private ?string $import_key = null;
    private array $array_options = [];
    private ?array $array_languages = null;
    private array $contacts_ids = [];
    private ?array $contacts_ids_internal = null;
    private ?array $linkedObjectsIds = null;
    private ?string $canvas = null;
    private ?int $fk_project = null;
    private ?int $contact_id = null;
    private ?int $user = null;
    private ?string $origin_type = null;
    private ?int $origin_id = null;
    private string $ref;
    private ?string $ref_ext = null;
    private string $statut;
    private string $status;
    private ?int $country_id = null;
    private ?string $country_code = null;
    private ?int $state_id = null;
    private ?int $region_id = null;
    private ?int $mode_reglement_id = null;
    private ?int $cond_reglement_id = null;
    private ?int $demand_reason_id = null;
    private ?int $transport_mode_id = null;
    private ?int $shipping_method_id = null;
    private ?string $shipping_method = null;
    private ?string $fk_multicurrency = null;
    private ?string $multicurrency_code = null;
    private ?string $multicurrency_tx = null;
    private ?string $multicurrency_total_ht = null;
    private ?string $multicurrency_total_tva = null;
    private ?string $multicurrency_total_localtax1 = null;
    private ?string $multicurrency_total_localtax2 = null;
    private ?string $multicurrency_total_ttc = null;
    private ?string $last_main_doc = null;
    private ?int $fk_account = null;
    private string $note_public = '';
    private string $note_private = '';
    private ?string $total_ht = null;
    private ?string $total_tva = null;
    private ?string $total_localtax1 = null;
    private ?string $total_localtax2 = null;
    private ?string $total_ttc = null;
    private array $lines = [];
    private ?string $actiontypecode = null;
    private ?string $name = null;
    private ?string $lastname = null;
    private ?string $firstname = null;
    private ?int $civility_id = null;
    private ?string $civility_code = null;
    private ?string $date_creation = null;
    private ?string $date_validation = null;
    private ?string $date_modification = null;
    private ?int $tms = null;
    private ?string $date_cloture = null;
    private ?int $user_author = null;
    private ?int $user_creation = null;
    private ?int $user_creation_id = null;
    private ?int $user_valid = null;
    private ?int $user_validation = null;
    private ?int $user_validation_id = null;
    private ?int $user_closing_id = null;
    private ?int $user_modification = null;
    private ?int $user_modification_id = null;
    private ?int $fk_user_creat = null;
    private ?int $fk_user_modif = null;
    private int $specimen = 0;
    private ?string $totalpaid = null;
    private array $extraparams = [];
    private ?string $product = null;
    private ?int $cond_reglement_supplier_id = null;
    private ?int $deposit_percent = null;
    private ?int $retained_warranty_fk_cond_reglement = null;
    private ?int $warehouse_id = null;
    private ?string $code = '';
    private ?int $fk_incoterms = 0;
    private ?string $label_incoterms = null;
    private ?string $location_incoterms = '';
    private int $socid;
    private ?string $ref_client = null;
    private ?string $ref_customer = null;
    private ?int $contactid = null;
    private ?string $billed = null;
    private ?string $date_lim_reglement = null;
    private ?string $cond_reglement_code = null;
    private ?string $cond_reglement_doc = null;
    private ?string $mode_reglement_code = null;
    private ?int $availability_id = null;
    private ?string $availability_code = null;
    private ?string $availability = null;
    private ?string $date = null;
    private ?string $date_commande = null;
    private ?string $delivery_date = null;
    private ?string $source = null;
    private ?int $signed_status = null;
    private ?string $online_payment_url = null;
    
    /**
     * Convertit l'objet Order en tableau.
     */
     public function toArrayFiltered(): array
    {
        // ne garde que les propriétés non null
        return array_filter(get_object_vars($this), fn($value) => $value !== null && $value !==[]);
    }
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * Convertit une réponse API (getByID) en objet Order
     *
     * @param array $data Tableau retourné par l'API
     * @return self
     */
    public static function fromApiResponse(array|object $data): self
    {
        $order = new self();

        foreach ($data as $key => $value) {
            if (property_exists($order, $key) && $key !== 'lines') {
                $order->$key = $value;
            }
        }

        // Gestion des lignes
        $lines = [];
        if (!empty($data['lines']) && is_array($data['lines'])) {
            foreach ($data['lines'] as $lineData) {
                $line = Line::fromApiResponse($lineData);;
               
                $lines[] = $line->toArrayFiltered();
            }
        }
        $order->setLines($lines);

        return $order;
    }


    // -------------------
    //  Getter et Setter
    // -------------------

    /**
     * Get the value of online_payment_url
     */
    public function getOnlinePaymentUrl(): ?string
    {
        return $this->online_payment_url;
    }

    /**
     * Set the value of online_payment_url
     */
    public function setOnlinePaymentUrl(?string $online_payment_url): self
    {
        $this->online_payment_url = $online_payment_url;

        return $this;
    }

    /**
     * Get the value of signed_status
     */
    public function getSignedStatus(): ?int
    {
        return $this->signed_status;
    }

    /**
     * Set the value of signed_status
     */
    public function setSignedStatus(?int $signed_status): self
    {
        $this->signed_status = $signed_status;

        return $this;
    }

    /**
     * Get the value of source
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Set the value of source
     */
    public function setSource(?string $source): self
    {
        $this->source = $source;

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
     * Get the value of delivery_date
     */
    public function getDeliveryDate(): ?string
    {
        return $this->delivery_date;
    }

    /**
     * Set the value of delivery_date
     */
    public function setDeliveryDate(?string $delivery_date): self
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }

    /**
     * Get the value of date_commande
     */
    public function getDateCommande(): ?string
    {
        return $this->date_commande;
    }

    /**
     * Set the value of date_commande
     */
    public function setDateCommande(?string $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of availability
     */
    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    /**
     * Set the value of availability
     */
    public function setAvailability(?string $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get the value of availability_code
     */
    public function getAvailabilityCode(): ?string
    {
        return $this->availability_code;
    }

    /**
     * Set the value of availability_code
     */
    public function setAvailabilityCode(?string $availability_code): self
    {
        $this->availability_code = $availability_code;

        return $this;
    }

    /**
     * Get the value of availability_id
     */
    public function getAvailabilityId(): ?int
    {
        return $this->availability_id;
    }

    /**
     * Set the value of availability_id
     */
    public function setAvailabilityId(?int $availability_id): self
    {
        $this->availability_id = $availability_id;

        return $this;
    }

    /**
     * Get the value of mode_reglement_code
     * 
     */
    public function getModeReglementCode(): ?string
    {
        return $this->mode_reglement_code;
    }

    /**
     * Set the value of mode_reglement_code
     * 
     */
    public function setModeReglementCode(?string $mode_reglement_code): self
    {
        $this->mode_reglement_code = $mode_reglement_code;

        return $this;
    }

    /**
     * Get the value of cond_reglement_doc
     * 
     */
    public function getCondReglementDoc(): ?string
    {
        return $this->cond_reglement_doc;
    }

    /**
     * Set the value of cond_reglement_doc
     */
    public function setCondReglementDoc(?string $cond_reglement_doc): self
    {
        $this->cond_reglement_doc = $cond_reglement_doc;

        return $this;
    }

    /**
     * Get the value of cond_reglement_code
     */
    public function getCondReglementCode(): ?string
    {
        return $this->cond_reglement_code;
    }

    /**
     * Set the value of cond_reglement_code
     * RECEP => Due upon receipt/30D =>Due in 30 days/30DENDMONTH => Due in 30 days, end of month/60D => Due in 60 days, end of month /
     * 60DENDMONTH => Due in 60 days, end of month/PT_ORDER => Due on order/PT_DELIVERY => Due on delivery/PT_5050 => 50% on order, 50% on delivery/
     * 10D => 10 days/10DENDMONTH => 10 days end of month/ 
     * 14D => Due in 14 days/ 14DENDMONTH => Due in 14 days, end of month /DEP30PCTDEL => __DEPOSIT_PERCENT__% deposit
     * Table=>llx_c_payment_term
     */
    public function setCondReglementCode(?string $cond_reglement_code): self
    {
        $this->cond_reglement_code = $cond_reglement_code;

        return $this;
    }

    /**
     * Get the value of date_lim_reglement
     */
    public function getDateLimReglement(): ?string
    {
        return $this->date_lim_reglement;
    }

    /**
     * Set the value of date_lim_reglement
     */
    public function setDateLimReglement(?string $date_lim_reglement): self
    {
        $this->date_lim_reglement = $date_lim_reglement;

        return $this;
    }

    /**
     * Get the value of billed
     */
    public function getBilled(): ?string
    {
        return $this->billed;
    }

    /**
     * Set the value of billed
     */
    public function setBilled(?string $billed): self
    {
        $this->billed = $billed;

        return $this;
    }

    /**
     * Get the value of contactid
     */
    public function getContactid(): ?int
    {
        return $this->contactid;
    }

    /**
     * Set the value of contactid
     */
    public function setContactid(?int $contactid): self
    {
        $this->contactid = $contactid;

        return $this;
    }

    /**
     * Get the value of ref_customer
     */
    public function getRefCustomer(): ?string
    {
        return $this->ref_customer;
    }

    /**
     * Set the value of ref_customer
     */
    public function setRefCustomer(?string $ref_customer): self
    {
        $this->ref_customer = $ref_customer;

        return $this;
    }

    /**
     * Get the value of ref_client
     */
    public function getRefClient(): ?string
    {
        return $this->ref_client;
    }

    /**
     * Set the value of ref_client
     */
    public function setRefClient(?string $ref_client): self
    {
        $this->ref_client = $ref_client;

        return $this;
    }

    /**
     * Get the value of socid
     */
    public function getSocid(): int
    {
        return $this->socid;
    }

    /**
     * Set the value of socid
     */
    public function setSocid(int $socid): self
    {
        $this->socid = $socid;

        return $this;
    }

    /**
     * Get the value of location_incoterms
     */
    public function getLocationIncoterms(): ?string
    {
        return $this->location_incoterms;
    }

    /**
     * Set the value of location_incoterms
     */
    public function setLocationIncoterms(?string $location_incoterms): self
    {
        $this->location_incoterms = $location_incoterms;

        return $this;
    }

    /**
     * Get the value of label_incoterms
     */
    public function getLabelIncoterms(): ?string
    {
        return $this->label_incoterms;
    }

    /**
     * Set the value of label_incoterms
     */
    public function setLabelIncoterms(?string $label_incoterms): self
    {
        $this->label_incoterms = $label_incoterms;

        return $this;
    }

    /**
     * Get the value of fk_incoterms
     */
    public function getFkIncoterms(): ?int
    {
        return $this->fk_incoterms;
    }

    /**
     * Set the value of fk_incoterms
     */
    public function setFkIncoterms(?int $fk_incoterms): self
    {
        $this->fk_incoterms = $fk_incoterms;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of warehouse_id
     */
    public function getWarehouseId(): ?int
    {
        return $this->warehouse_id;
    }

    /**
     * Set the value of warehouse_id
     */
    public function setWarehouseId(?int $warehouse_id): self
    {
        $this->warehouse_id = $warehouse_id;

        return $this;
    }

    /**
     * Get the value of retained_warranty_fk_cond_reglement
     */
    public function getRetainedWarrantyFkCondReglement(): ?int
    {
        return $this->retained_warranty_fk_cond_reglement;
    }

    /**
     * Set the value of retained_warranty_fk_cond_reglement
     */
    public function setRetainedWarrantyFkCondReglement(?int $retained_warranty_fk_cond_reglement): self
    {
        $this->retained_warranty_fk_cond_reglement = $retained_warranty_fk_cond_reglement;

        return $this;
    }

    /**
     * Get the value of deposit_percent
     */
    public function getDepositPercent(): ?int
    {
        return $this->deposit_percent;
    }

    /**
     * Set the value of deposit_percent
     */
    public function setDepositPercent(?int $deposit_percent): self
    {
        $this->deposit_percent = $deposit_percent;

        return $this;
    }

    /**
     * Get the value of cond_reglement_supplier_id
     */
    public function getCondReglementSupplierId(): ?int
    {
        return $this->cond_reglement_supplier_id;
    }

    /**
     * Set the value of cond_reglement_supplier_id
     */
    public function setCondReglementSupplierId(?int $cond_reglement_supplier_id): self
    {
        $this->cond_reglement_supplier_id = $cond_reglement_supplier_id;

        return $this;
    }

    /**
     * Get the value of product
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * Set the value of product
     */
    public function setProduct(?string $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of totalpaid
     */
    public function getTotalpaid(): ?string
    {
        return $this->totalpaid;
    }

    /**
     * Set the value of totalpaid
     */
    public function setTotalpaid(?string $totalpaid): self
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
    public function getFkUserModif(): ?int
    {
        return $this->fk_user_modif;
    }

    /**
     * Set the value of fk_user_modif
     */
    public function setFkUserModif(?int $fk_user_modif): self
    {
        $this->fk_user_modif = $fk_user_modif;

        return $this;
    }

    /**
     * Get the value of fk_user_creat
     */
    public function getFkUserCreat(): ?int
    {
        return $this->fk_user_creat;
    }

    /**
     * Set the value of fk_user_creat
     */
    public function setFkUserCreat(?int $fk_user_creat): self
    {
        $this->fk_user_creat = $fk_user_creat;

        return $this;
    }

    /**
     * Get the value of user_modification_id
     */
    public function getUserModificationId(): ?int
    {
        return $this->user_modification_id;
    }

    /**
     * Set the value of user_modification_id
     */
    public function setUserModificationId(?int $user_modification_id): self
    {
        $this->user_modification_id = $user_modification_id;

        return $this;
    }

    /**
     * Get the value of user_modification
     */
    public function getUserModification(): ?int
    {
        return $this->user_modification;
    }

    /**
     * Set the value of user_modification
     */
    public function setUserModification(?int $user_modification): self
    {
        $this->user_modification = $user_modification;

        return $this;
    }

    /**
     * Get the value of user_closing_id
     */
    public function getUserClosingId(): ?int
    {
        return $this->user_closing_id;
    }

    /**
     * Set the value of user_closing_id
     */
    public function setUserClosingId(?int $user_closing_id): self
    {
        $this->user_closing_id = $user_closing_id;

        return $this;
    }

    /**
     * Get the value of user_validation_id
     */
    public function getUserValidationId(): ?int
    {
        return $this->user_validation_id;
    }

    /**
     * Set the value of user_validation_id
     */
    public function setUserValidationId(?int $user_validation_id): self
    {
        $this->user_validation_id = $user_validation_id;

        return $this;
    }

    /**
     * Get the value of user_validation
     */
    public function getUserValidation(): ?int
    {
        return $this->user_validation;
    }

    /**
     * Set the value of user_validation
     */
    public function setUserValidation(?int $user_validation): self
    {
        $this->user_validation = $user_validation;

        return $this;
    }

    /**
     * Get the value of user_valid
     */
    public function getUserValid(): ?int
    {
        return $this->user_valid;
    }

    /**
     * Set the value of user_valid
     */
    public function setUserValid(?int $user_valid): self
    {
        $this->user_valid = $user_valid;

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
     * Get the value of user_creation
     */
    public function getUserCreation(): ?int
    {
        return $this->user_creation;
    }

    /**
     * Set the value of user_creation
     */
    public function setUserCreation(?int $user_creation): self
    {
        $this->user_creation = $user_creation;

        return $this;
    }

    /**
     * Get the value of user_author
     */
    public function getUserAuthor(): ?int
    {
        return $this->user_author;
    }

    /**
     * Set the value of user_author
     */
    public function setUserAuthor(?int $user_author): self
    {
        $this->user_author = $user_author;

        return $this;
    }

    /**
     * Get the value of date_cloture
     */
    public function getDateCloture(): ?string
    {
        return $this->date_cloture;
    }

    /**
     * Set the value of date_cloture
     */
    public function setDateCloture(?string $date_cloture): self
    {
        $this->date_cloture = $date_cloture;

        return $this;
    }

    /**
     * Get the value of tms
     */
    public function getTms(): ?int
    {
        return $this->tms;
    }

    /**
     * Set the value of tms
     */
    public function setTms(?int $tms): self
    {
        $this->tms = $tms;

        return $this;
    }

    /**
     * Get the value of date_modification
     */
    public function getDateModification(): ?string
    {
        return $this->date_modification;
    }

    /**
     * Set the value of date_modification
     */
    public function setDateModification(?string $date_modification): self
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    /**
     * Get the value of date_validation
     */
    public function getDateValidation(): ?string
    {
        return $this->date_validation;
    }

    /**
     * Set the value of date_validation
     */
    public function setDateValidation(?string $date_validation): self
    {
        $this->date_validation = $date_validation;

        return $this;
    }

    /**
     * Get the value of date_creation
     */
    public function getDateCreation(): ?string
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     */
    public function setDateCreation(?string $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of civility_code
     */
    public function getCivilityCode(): ?string
    {
        return $this->civility_code;
    }

    /**
     * Set the value of civility_code
     */
    public function setCivilityCode(?string $civility_code): self
    {
        $this->civility_code = $civility_code;

        return $this;
    }

    /**
     * Get the value of civility_id
     */
    public function getCivilityId(): ?int
    {
        return $this->civility_id;
    }

    /**
     * Set the value of civility_id
     */
    public function setCivilityId(?int $civility_id): self
    {
        $this->civility_id = $civility_id;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(?string $lastname): self
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
    public function getActiontypecode(): ?string
    {
        return $this->actiontypecode;
    }

    /**
     * Set the value of actiontypecode
     */
    public function setActiontypecode(?string $actiontypecode): self
    {
        $this->actiontypecode = $actiontypecode;

        return $this;
    }

    /**
     * Get the value of lines
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * Set the value of lines
     */
    public function setLines(array $lines): self
    {
      
        $this->lines = $lines;


        return $this;
    }

    /**
     * Get the value of total_ttc
     */
    public function getTotalTtc(): ?string
    {
        return $this->total_ttc;
    }

    /**
     * Set the value of total_ttc
     */
    public function setTotalTtc(?string $total_ttc): self
    {
        $this->total_ttc = $total_ttc;

        return $this;
    }

    /**
     * Get the value of total_localtax2
     */
    public function getTotalLocaltax2(): ?string
    {
        return $this->total_localtax2;
    }

    /**
     * Set the value of total_localtax2
     */
    public function setTotalLocaltax2(?string $total_localtax2): self
    {
        $this->total_localtax2 = $total_localtax2;

        return $this;
    }

    /**
     * Get the value of total_localtax1
     */
    public function getTotalLocaltax1(): ?string
    {
        return $this->total_localtax1;
    }

    /**
     * Set the value of total_localtax1
     */
    public function setTotalLocaltax1(?string $total_localtax1): self
    {
        $this->total_localtax1 = $total_localtax1;

        return $this;
    }

    /**
     * Get the value of total_tva
     */
    public function getTotalTva(): ?string
    {
        return $this->total_tva;
    }

    /**
     * Set the value of total_tva
     */
    public function setTotalTva(?string $total_tva): self
    {
        $this->total_tva = $total_tva;

        return $this;
    }

    /**
     * Get the value of total_ht
     */
    public function getTotalHt(): ?string
    {
        return $this->total_ht;
    }

    /**
     * Set the value of total_ht
     */
    public function setTotalHt(?string $total_ht): self
    {
        $this->total_ht = $total_ht;

        return $this;
    }

    /**
     * Get the value of note_private
     */
    public function getNotePrivate(): string
    {
        return $this->note_private;
    }

    /**
     * Set the value of note_private
     */
    public function setNotePrivate(string $note_private): self
    {
        $this->note_private = $note_private;

        return $this;
    }

    /**
     * Get the value of note_public
     */
    public function getNotePublic(): string
    {
        return $this->note_public;
    }

    /**
     * Set the value of note_public
     */
    public function setNotePublic(string $note_public): self
    {
        $this->note_public = $note_public;

        return $this;
    }

    /**
     * Get the value of fk_account
     */
    public function getFkAccount(): ?int
    {
        return $this->fk_account;
    }

    /**
     * Set the value of fk_account
     */
    public function setFkAccount(?int $fk_account): self
    {
        $this->fk_account = $fk_account;

        return $this;
    }

    /**
     * Get the value of last_main_doc
     */
    public function getLastMainDoc(): ?string
    {
        return $this->last_main_doc;
    }

    /**
     * Set the value of last_main_doc
     */
    public function setLastMainDoc(?string $last_main_doc): self
    {
        $this->last_main_doc = $last_main_doc;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_ttc
     */
    public function getMulticurrencyTotalTtc(): ?string
    {
        return $this->multicurrency_total_ttc;
    }

    /**
     * Set the value of multicurrency_total_ttc
     */
    public function setMulticurrencyTotalTtc(?string $multicurrency_total_ttc): self
    {
        $this->multicurrency_total_ttc = $multicurrency_total_ttc;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_localtax2
     */
    public function getMulticurrencyTotalLocaltax2(): ?string
    {
        return $this->multicurrency_total_localtax2;
    }

    /**
     * Set the value of multicurrency_total_localtax2
     */
    public function setMulticurrencyTotalLocaltax2(?string $multicurrency_total_localtax2): self
    {
        $this->multicurrency_total_localtax2 = $multicurrency_total_localtax2;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_localtax1
     */
    public function getMulticurrencyTotalLocaltax1(): ?string
    {
        return $this->multicurrency_total_localtax1;
    }

    /**
     * Set the value of multicurrency_total_localtax1
     */
    public function setMulticurrencyTotalLocaltax1(?string $multicurrency_total_localtax1): self
    {
        $this->multicurrency_total_localtax1 = $multicurrency_total_localtax1;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_tva
     */
    public function getMulticurrencyTotalTva(): ?string
    {
        return $this->multicurrency_total_tva;
    }

    /**
     * Set the value of multicurrency_total_tva
     */
    public function setMulticurrencyTotalTva(?string $multicurrency_total_tva): self
    {
        $this->multicurrency_total_tva = $multicurrency_total_tva;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_ht
     */
    public function getMulticurrencyTotalHt(): ?string
    {
        return $this->multicurrency_total_ht;
    }

    /**
     * Set the value of multicurrency_total_ht
     */
    public function setMulticurrencyTotalHt(?string $multicurrency_total_ht): self
    {
        $this->multicurrency_total_ht = $multicurrency_total_ht;

        return $this;
    }

    /**
     * Get the value of multicurrency_tx
     */
    public function getMulticurrencyTx(): ?string
    {
        return $this->multicurrency_tx;
    }

    /**
     * Set the value of multicurrency_tx
     */
    public function setMulticurrencyTx(?string $multicurrency_tx): self
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
    public function getShippingMethodId(): ?int
    {
        return $this->shipping_method_id;
    }

    /**
     * Set the value of shipping_method_id
     */
    public function setShippingMethodId(?int $shipping_method_id): self
    {
        $this->shipping_method_id = $shipping_method_id;

        return $this;
    }

    /**
     * Get the value of transport_mode_id
     */
    public function getTransportModeId(): ?int
    {
        return $this->transport_mode_id;
    }

    /**
     * Set the value of transport_mode_id
     */
    public function setTransportModeId(?int $transport_mode_id): self
    {
        $this->transport_mode_id = $transport_mode_id;

        return $this;
    }

    /**
     * Get the value of demand_reason_id
     */
    public function getDemandReasonId(): ?int
    {
        return $this->demand_reason_id;
    }

    /**
     * Set the value of demand_reason_id
     */
    public function setDemandReasonId(?int $demand_reason_id): self
    {
        $this->demand_reason_id = $demand_reason_id;

        return $this;
    }

    /**
     * Get the value of cond_reglement_id
     */
    public function getCondReglementId(): ?int
    {
        return $this->cond_reglement_id;
    }

    /**
     * Set the value of cond_reglement_id
     * Default Value=> 1:Due upon receipt/2:Due in 30 days/3:Due in 30 days, end of month/4:Due in 60 days, end of month /
     * 5:Due in 60 days, end of month/6:Due on order/7:Due on delivery/8:50% on order, 50% on delivery/9:10 days/10:10 days end of month/ 
     * 11: Due in 14 days/ 12: Due in 14 days, end of month /13:__DEPOSIT_PERCENT__% deposit
     * Table=>llx_c_payment_term
     */
    public function setCondReglementId(?int $cond_reglement_id): self
    {
        $this->cond_reglement_id = $cond_reglement_id;

        return $this;
    }

    /**
     * Get the value of mode_reglement_id
     * 1:TIP/2:Credit Transfer/3:Direct Debit/4:Cash/6:bank Card/7:Cheque/50:Online payment/51:Traite/52:LCR/53:Factor/100:Klarna/101:Sofort/102:Bancontact/103:iDeal/104:Giropay
     * 105:PayPal (table llx_c_paiement)
     */
    public function getModeReglementId(): ?int
    {
        return $this->mode_reglement_id;
    }

    /**
     * Set the value of mode_reglement_id
     */
    public function setModeReglementId(?int $mode_reglement_id): self
    {
        $this->mode_reglement_id = $mode_reglement_id;

        return $this;
    }

    /**
     * Get the value of region_id
     */
    public function getRegionId(): ?int
    {
        return $this->region_id;
    }

    /**
     * Set the value of region_id
     */
    public function setRegionId(?int $region_id): self
    {
        $this->region_id = $region_id;

        return $this;
    }

    /**
     * Get the value of state_id
     */
    public function getStateId(): ?int
    {
        return $this->state_id;
    }

    /**
     * Set the value of state_id
     */
    public function setStateId(?int $state_id): self
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut(string $statut): self
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
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * Set the value of ref
     */
    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get the value of origin_id
     * Possible Value by default : 1:Web Site/2:Mailing campaign/3:Phone campaign/4:Fax campaign/5:Commercial contact/6:Shop contact/7:Emailing campaign
     * 8:Word of mouth/9:Partner/10:Employe/11:Sponsorship/12:Incoming contact of a customer
     * (Table llx_c_input_reason)
     */
    public function getOriginId(): ?int
    {
        return $this->origin_id;
    }

    /**
     * Set the value of origin_id
     * Possible Value by default : 1:Web Site/2:Mailing campaign/3:Phone campaign/4:Fax campaign/5:Commercial contact/6:Shop contact/7:Emailing campaign
     * 8:Word of mouth/9:Partner/10:Employe/11:Sponsorship/12:Incoming contact of a customer
     */
    public function setOriginId(?int $origin_id): self
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
     * Possible Value by default : Web Site:1/Mailing campaign:2/Phone campaign:3/Fax campaign:4/Commercial contact:5/Shop contact:6/Emailing campaign:7
     * Word of mouth:8/Partner:9/Employe:10/Sponsorship:11/Incoming contact of a customer:12
     */
    public function setOriginType(?string $origin_type): self
    {
        $this->origin_type = $origin_type;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser(): ?int
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser(?int $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of contact_id
     */
    public function getContact_Id(): ?int
    {
        return $this->contact_id;
    }

    /**
     * Set the value of contact_id
     */
    public function setContact_Id(?int $contact_id): self
    {
        $this->contact_id = $contact_id;

        return $this;
    }

    /**
     * Get the value of fk_project
     */
    public function getFkProject(): ?int
    {
        return $this->fk_project;
    }

    /**
     * Set the value of fk_project
     */
    public function setFkProject(?int $fk_project): self
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
    public function getLinkedObjectsIds(): ?array
    {
        return $this->linkedObjectsIds;
    }

    /**
     * Set the value of linkedObjectsIds
     */
    public function setLinkedObjectsIds(?array $linkedObjectsIds): self
    {
        $this->linkedObjectsIds = $linkedObjectsIds;

        return $this;
    }

    /**
     * Get the value of contacts_ids_internal
     */
    public function getContactsIdsInternal(): ?array
    {
        return $this->contacts_ids_internal;
    }

    /**
     * Set the value of contacts_ids_internal
     */
    public function setContactsIdsInternal(?array $contacts_ids_internal): self
    {
        $this->contacts_ids_internal = $contacts_ids_internal;

        return $this;
    }

    /**
     * Get the value of contacts_ids
     */
    public function getContactsIds(): array
    {
        return $this->contacts_ids;
    }

    /**
     * Set the value of contacts_ids
     */
    public function setContactsIds(array $contacts_ids): self
    {
        $this->contacts_ids = $contacts_ids;

        return $this;
    }

    /**
     * Get the value of array_languages
     */
    public function getArrayLanguages(): ?array
    {
        return $this->array_languages;
    }

    /**
     * Set the value of array_languages
     */
    public function setArrayLanguages(?array $array_languages): self
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
    public function getEntity(): int
    {
        return $this->entity;
    }

    /**
     * Set the value of entity
     */
    public function setEntity(int $entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
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