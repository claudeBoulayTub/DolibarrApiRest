<?php
namespace Tubconcept\DolibarrApiClient\Objects;

use Tubconcept\DolibarrApiClient\Objects\Line;

class SupplierInvoice
{
    private ?string $module = null;
    private ?int $id = null;
    private ?int $entity = null;
    private ?string $import_key = null;
    private array $array_options = [];
    private ?array $array_languages = null;
    private $contacts_ids = null;
    private $contacts_ids_internal = null;
    private $linkedObjectsIds = null;
    private ?string $canvas = null;
    private ?int $fk_project = null;
    private $contact_id = null;
    private $user = null;
    private $origin_type = null;
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
    private $shipping_method = null;
    private $fk_multicurrency = null;
    private $multicurrency_code = null;
    private $multicurrency_tx = null;
    private $multicurrency_total_ht = null;
    private $multicurrency_total_tva = null;
    private $multicurrency_total_localtax1 = null;
    private $multicurrency_total_localtax2 = null;
    private $multicurrency_total_ttc = null;
    private $last_main_doc = null;
    private $fk_account = null;
    private ?string $note_public = '';
    private ?string $note_private = '';
    private $total_ht = null;
    private $total_tva = null;
    private $total_localtax1 = null;
    private $total_localtax2 = null;
    private $total_ttc = null;
    private array $lines = [];
    private $actiontypecode = null;
    private $name = null;
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
    private $user_creation_id = null;
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
    private $title = null;
    private $type = null;
    private $subtype = null;
    private $fk_soc = null;
    private $socid = null;
    private $paye = null;
    private $date = null;
    private $date_lim_reglement = null;
    private $cond_reglement_code = null;
    private $cond_reglement_label = null;
    private $cond_reglement_doc = null;
    private $mode_reglement_code = null;
    private $revenuestamp = null;
    private $totaldeposits = null;
    private $totalcreditnotes = null;
    private $sumpayed = null;
    private $sumpayed_multicurrency = null;
    private $sumdeposit = null;
    private $sumdeposit_multicurrency = null;
    private $sumcreditnote = null;
    private $sumcreditnote_multicurrency = null;
    private $remaintopay = null;
    private $nbofopendirectdebitorcredittransfer = null;
    private array $creditnote_ids = [];
    private $stripechargedone = null;
    private $stripechargeerror = null;
    private $description = null;
    private $ref_client = null;
    private $situation_cycle_ref = null;
    private $close_code = null;
    private $close_note = null;
    private $postactionmessages = null;
    private $fk_incoterms = null;
    private $label_incoterms = null;
    private $location_incoterms = null;
    private $ref_supplier = null;
    private $libelle = null;
    private $label = null;
    private $fk_statut = null;
    private $paid = null;
    private $datec = null;
    private $date_echeance = null;
    private $amount = null;
    private $remise = null;
    private $tva = null;
    private $localtax1 = null;
    private $localtax2 = null;
    private $propalid = null;
    private $vat_reverse_charge = null;
    private $fournisseur = null;
    private $fk_facture_source = null;
    private $fac_rec = null;
    private $fk_fac_rec_source = null;
    private $fk_user_valid = null;

    /**
     * Return all properties as an array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * Return only non-null/non-empty properties
     */
    public function toArrayFiltered(): array
    {
        return array_filter(get_object_vars($this), fn($v) => $v !== null && $v !== []);
    }

    /**
     * Build SupplierInvoice from API response
     */
    public static function fromApiResponse(array|object $data): self
    {
        $inv = new self();
        foreach ($data as $key => $value) {
            if (property_exists($inv, $key) && $key !== 'lines') {
                $inv->$key = $value;
            }
        }

        $lines = [];
        if (!empty($data['lines']) && is_array($data['lines'])) {
            foreach ($data['lines'] as $lineData) {
                $line = Line::fromApiResponse($lineData);
                $lines[] = $line->toArrayFiltered();
            }
        }
        $inv->setLines($lines);

        return $inv;
    }

    // Common getters/setters
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getRef(): ?string { return $this->ref; }
    public function setRef(?string $ref): self { $this->ref = $ref; return $this; }

    public function getTotalTtc(): mixed { return $this->total_ttc; }
    public function setTotalTtc($v): self { $this->total_ttc = $v; return $this; }

    public function getLines(): array { return $this->lines; }
    public function setLines(array $lines): self { $this->lines = $lines; return $this; }

    public function getSocId(): mixed { return $this->socid; }
    public function setSocId($v): self { $this->socid = $v; return $this; }

    public function getDate(): mixed { return $this->date; }
    public function setDate($v): self { $this->date = $v; return $this; }

    public function getDatec(): mixed { return $this->datec; }
    public function setDatec($v): self { $this->datec = $v; return $this; }

    public function getDateEcheance(): mixed { return $this->date_echeance; }
    public function setDateEcheance($v): self { $this->date_echeance = $v; return $this; }

    public function getAmount(): mixed { return $this->amount; }
    public function setAmount($v): self { $this->amount = $v; return $this; }


    /**
     * Get the value of fk_user_valid
     */
    public function getFkUserValid()
    {
        return $this->fk_user_valid;
    }

    /**
     * Set the value of fk_user_valid
     */
    public function setFkUserValid($fk_user_valid): self
    {
        $this->fk_user_valid = $fk_user_valid;

        return $this;
    }

    /**
     * Get the value of fk_fac_rec_source
     */
    public function getFkFacRecSource()
    {
        return $this->fk_fac_rec_source;
    }

    /**
     * Set the value of fk_fac_rec_source
     */
    public function setFkFacRecSource($fk_fac_rec_source): self
    {
        $this->fk_fac_rec_source = $fk_fac_rec_source;

        return $this;
    }

    /**
     * Get the value of fac_rec
     */
    public function getFacRec()
    {
        return $this->fac_rec;
    }

    /**
     * Set the value of fac_rec
     */
    public function setFacRec($fac_rec): self
    {
        $this->fac_rec = $fac_rec;

        return $this;
    }

    /**
     * Get the value of fk_facture_source
     */
    public function getFkFactureSource()
    {
        return $this->fk_facture_source;
    }

    /**
     * Set the value of fk_facture_source
     */
    public function setFkFactureSource($fk_facture_source): self
    {
        $this->fk_facture_source = $fk_facture_source;

        return $this;
    }

    /**
     * Get the value of fournisseur
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set the value of fournisseur
     */
    public function setFournisseur($fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get the value of vat_reverse_charge
     */
    public function getVatReverseCharge()
    {
        return $this->vat_reverse_charge;
    }

    /**
     * Set the value of vat_reverse_charge
     */
    public function setVatReverseCharge($vat_reverse_charge): self
    {
        $this->vat_reverse_charge = $vat_reverse_charge;

        return $this;
    }

    /**
     * Get the value of propalid
     */
    public function getPropalid()
    {
        return $this->propalid;
    }

    /**
     * Set the value of propalid
     */
    public function setPropalid($propalid): self
    {
        $this->propalid = $propalid;

        return $this;
    }

    /**
     * Get the value of localtax2
     */
    public function getLocaltax2()
    {
        return $this->localtax2;
    }

    /**
     * Set the value of localtax2
     */
    public function setLocaltax2($localtax2): self
    {
        $this->localtax2 = $localtax2;

        return $this;
    }

    /**
     * Get the value of localtax1
     */
    public function getLocaltax1()
    {
        return $this->localtax1;
    }

    /**
     * Set the value of localtax1
     */
    public function setLocaltax1($localtax1): self
    {
        $this->localtax1 = $localtax1;

        return $this;
    }

    /**
     * Get the value of tva
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set the value of tva
     */
    public function setTva($tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get the value of remise
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set the value of remise
     */
    public function setRemise($remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get the value of paid
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set the value of paid
     */
    public function setPaid($paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get the value of fk_statut
     */
    public function getFkStatut()
    {
        return $this->fk_statut;
    }

    /**
     * Set the value of fk_statut
     */
    public function setFkStatut($fk_statut): self
    {
        $this->fk_statut = $fk_statut;

        return $this;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     */
    public function setLabel($label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of libelle
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     */
    public function setLibelle($libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of ref_supplier
     */
    public function getRefSupplier()
    {
        return $this->ref_supplier;
    }

    /**
     * Set the value of ref_supplier
     */
    public function setRefSupplier($ref_supplier): self
    {
        $this->ref_supplier = $ref_supplier;

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
    public function getFkIncoterms()
    {
        return $this->fk_incoterms;
    }

    /**
     * Set the value of fk_incoterms
     */
    public function setFkIncoterms($fk_incoterms): self
    {
        $this->fk_incoterms = $fk_incoterms;

        return $this;
    }

    /**
     * Get the value of postactionmessages
     */
    public function getPostactionmessages()
    {
        return $this->postactionmessages;
    }

    /**
     * Set the value of postactionmessages
     */
    public function setPostactionmessages($postactionmessages): self
    {
        $this->postactionmessages = $postactionmessages;

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
     * Get the value of fk_soc
     */
    public function getFkSoc()
    {
        return $this->fk_soc;
    }

    /**
     * Set the value of fk_soc
     */
    public function setFkSoc($fk_soc): self
    {
        $this->fk_soc = $fk_soc;

        return $this;
    }

    /**
     * Get the value of paye
     */
    public function getPaye()
    {
        return $this->paye;
    }

    /**
     * Set the value of paye
     */
    public function setPaye($paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    /**
     * Get the value of close_note
     */
    public function getCloseNote()
    {
        return $this->close_note;
    }

    /**
     * Set the value of close_note
     */
    public function setCloseNote($close_note): self
    {
        $this->close_note = $close_note;

        return $this;
    }

    /**
     * Get the value of close_code
     */
    public function getCloseCode()
    {
        return $this->close_code;
    }

    /**
     * Set the value of close_code
     */
    public function setCloseCode($close_code): self
    {
        $this->close_code = $close_code;

        return $this;
    }

    /**
     * Get the value of date_lim_reglement
     */
    public function getDateLimReglement()
    {
        return $this->date_lim_reglement;
    }

    /**
     * Set the value of date_lim_reglement
     */
    public function setDateLimReglement($date_lim_reglement): self
    {
        $this->date_lim_reglement = $date_lim_reglement;

        return $this;
    }

    /**
     * Get the value of cond_reglement_code
     */
    public function getCondReglementCode()
    {
        return $this->cond_reglement_code;
    }

    /**
     * Set the value of cond_reglement_code
     */
    public function setCondReglementCode($cond_reglement_code): self
    {
        $this->cond_reglement_code = $cond_reglement_code;

        return $this;
    }

    /**
     * Get the value of cond_reglement_label
     */
    public function getCondReglementLabel()
    {
        return $this->cond_reglement_label;
    }

    /**
     * Set the value of cond_reglement_label
     */
    public function setCondReglementLabel($cond_reglement_label): self
    {
        $this->cond_reglement_label = $cond_reglement_label;

        return $this;
    }

    /**
     * Get the value of situation_cycle_ref
     */
    public function getSituationCycleRef()
    {
        return $this->situation_cycle_ref;
    }

    /**
     * Set the value of situation_cycle_ref
     */
    public function setSituationCycleRef($situation_cycle_ref): self
    {
        $this->situation_cycle_ref = $situation_cycle_ref;

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
     * Get the value of mode_reglement_code
     */
    public function getModeReglementCode()
    {
        return $this->mode_reglement_code;
    }

    /**
     * Set the value of mode_reglement_code
     */
    public function setModeReglementCode($mode_reglement_code): self
    {
        $this->mode_reglement_code = $mode_reglement_code;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of stripechargeerror
     */
    public function getStripechargeerror()
    {
        return $this->stripechargeerror;
    }

    /**
     * Set the value of stripechargeerror
     */
    public function setStripechargeerror($stripechargeerror): self
    {
        $this->stripechargeerror = $stripechargeerror;

        return $this;
    }

    /**
     * Get the value of stripechargedone
     */
    public function getStripechargedone()
    {
        return $this->stripechargedone;
    }

    /**
     * Set the value of stripechargedone
     */
    public function setStripechargedone($stripechargedone): self
    {
        $this->stripechargedone = $stripechargedone;

        return $this;
    }

    /**
     * Get the value of creditnote_ids
     */
    public function getCreditnoteIds(): array
    {
        return $this->creditnote_ids;
    }

    /**
     * Set the value of creditnote_ids
     */
    public function setCreditnoteIds(array $creditnote_ids): self
    {
        $this->creditnote_ids = $creditnote_ids;

        return $this;
    }

    /**
     * Get the value of nbofopendirectdebitorcredittransfer
     */
    public function getNbofopendirectdebitorcredittransfer()
    {
        return $this->nbofopendirectdebitorcredittransfer;
    }

    /**
     * Set the value of nbofopendirectdebitorcredittransfer
     */
    public function setNbofopendirectdebitorcredittransfer($nbofopendirectdebitorcredittransfer): self
    {
        $this->nbofopendirectdebitorcredittransfer = $nbofopendirectdebitorcredittransfer;

        return $this;
    }

    /**
     * Get the value of remaintopay
     */
    public function getRemaintopay()
    {
        return $this->remaintopay;
    }

    /**
     * Set the value of remaintopay
     */
    public function setRemaintopay($remaintopay): self
    {
        $this->remaintopay = $remaintopay;

        return $this;
    }

    /**
     * Get the value of sumcreditnote_multicurrency
     */
    public function getSumcreditnoteMulticurrency()
    {
        return $this->sumcreditnote_multicurrency;
    }

    /**
     * Set the value of sumcreditnote_multicurrency
     */
    public function setSumcreditnoteMulticurrency($sumcreditnote_multicurrency): self
    {
        $this->sumcreditnote_multicurrency = $sumcreditnote_multicurrency;

        return $this;
    }

    /**
     * Get the value of sumcreditnote
     */
    public function getSumcreditnote()
    {
        return $this->sumcreditnote;
    }

    /**
     * Set the value of sumcreditnote
     */
    public function setSumcreditnote($sumcreditnote): self
    {
        $this->sumcreditnote = $sumcreditnote;

        return $this;
    }

    /**
     * Get the value of sumdeposit_multicurrency
     */
    public function getSumdepositMulticurrency()
    {
        return $this->sumdeposit_multicurrency;
    }

    /**
     * Set the value of sumdeposit_multicurrency
     */
    public function setSumdepositMulticurrency($sumdeposit_multicurrency): self
    {
        $this->sumdeposit_multicurrency = $sumdeposit_multicurrency;

        return $this;
    }

    /**
     * Get the value of sumdeposit
     */
    public function getSumdeposit()
    {
        return $this->sumdeposit;
    }

    /**
     * Set the value of sumdeposit
     */
    public function setSumdeposit($sumdeposit): self
    {
        $this->sumdeposit = $sumdeposit;

        return $this;
    }

    /**
     * Get the value of sumpayed_multicurrency
     */
    public function getSumpayedMulticurrency()
    {
        return $this->sumpayed_multicurrency;
    }

    /**
     * Set the value of sumpayed_multicurrency
     */
    public function setSumpayedMulticurrency($sumpayed_multicurrency): self
    {
        $this->sumpayed_multicurrency = $sumpayed_multicurrency;

        return $this;
    }

    /**
     * Get the value of sumpayed
     */
    public function getSumpayed()
    {
        return $this->sumpayed;
    }

    /**
     * Set the value of sumpayed
     */
    public function setSumpayed($sumpayed): self
    {
        $this->sumpayed = $sumpayed;

        return $this;
    }

    /**
     * Get the value of totalcreditnotes
     */
    public function getTotalcreditnotes()
    {
        return $this->totalcreditnotes;
    }

    /**
     * Set the value of totalcreditnotes
     */
    public function setTotalcreditnotes($totalcreditnotes): self
    {
        $this->totalcreditnotes = $totalcreditnotes;

        return $this;
    }

    /**
     * Get the value of totaldeposits
     */
    public function getTotaldeposits()
    {
        return $this->totaldeposits;
    }

    /**
     * Set the value of totaldeposits
     */
    public function setTotaldeposits($totaldeposits): self
    {
        $this->totaldeposits = $totaldeposits;

        return $this;
    }

    /**
     * Get the value of revenuestamp
     */
    public function getRevenuestamp()
    {
        return $this->revenuestamp;
    }

    /**
     * Set the value of revenuestamp
     */
    public function setRevenuestamp($revenuestamp): self
    {
        $this->revenuestamp = $revenuestamp;

        return $this;
    }

    /**
     * Get the value of cond_reglement_doc
     */
    public function getCondReglementDoc()
    {
        return $this->cond_reglement_doc;
    }

    /**
     * Set the value of cond_reglement_doc
     */
    public function setCondReglementDoc($cond_reglement_doc): self
    {
        $this->cond_reglement_doc = $cond_reglement_doc;

        return $this;
    }

    /**
     * Get the value of subtype
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * Set the value of subtype
     */
    public function setSubtype($subtype): self
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

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
     * Get the value of total_localtax2
     */
    public function getTotalLocaltax2()
    {
        return $this->total_localtax2;
    }

    /**
     * Set the value of total_localtax2
     */
    public function setTotalLocaltax2($total_localtax2): self
    {
        $this->total_localtax2 = $total_localtax2;

        return $this;
    }

    /**
     * Get the value of total_localtax1
     */
    public function getTotalLocaltax1()
    {
        return $this->total_localtax1;
    }

    /**
     * Set the value of total_localtax1
     */
    public function setTotalLocaltax1($total_localtax1): self
    {
        $this->total_localtax1 = $total_localtax1;

        return $this;
    }

    /**
     * Get the value of total_tva
     */
    public function getTotalTva()
    {
        return $this->total_tva;
    }

    /**
     * Set the value of total_tva
     */
    public function setTotalTva($total_tva): self
    {
        $this->total_tva = $total_tva;

        return $this;
    }

    /**
     * Get the value of total_ht
     */
    public function getTotalHt()
    {
        return $this->total_ht;
    }

    /**
     * Set the value of total_ht
     */
    public function setTotalHt($total_ht): self
    {
        $this->total_ht = $total_ht;

        return $this;
    }

    /**
     * Get the value of note_private
     */
    public function getNotePrivate(): ?string
    {
        return $this->note_private;
    }

    /**
     * Set the value of note_private
     */
    public function setNotePrivate(?string $note_private): self
    {
        $this->note_private = $note_private;

        return $this;
    }

    /**
     * Get the value of note_public
     */
    public function getNotePublic(): ?string
    {
        return $this->note_public;
    }

    /**
     * Set the value of note_public
     */
    public function setNotePublic(?string $note_public): self
    {
        $this->note_public = $note_public;

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
    public function getMulticurrencyCode()
    {
        return $this->multicurrency_code;
    }

    /**
     * Set the value of multicurrency_code
     */
    public function setMulticurrencyCode($multicurrency_code): self
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
    public function getEntity(): ?int
    {
        return $this->entity;
    }

    /**
     * Set the value of entity
     */
    public function setEntity(?int $entity): self
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
