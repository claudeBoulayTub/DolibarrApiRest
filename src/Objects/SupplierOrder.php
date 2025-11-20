<?php
namespace Tubconcept\DolibarrApiClient\Objects;

use Tubconcept\DolibarrApiClient\Objects\Line;

class SupplierOrder
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
	private ?string $code = '';
	private $fk_incoterms = null;
	private $label_incoterms = null;
	private $location_incoterms = null;
	private $ref_supplier = null;
	private $ref_fourn = null;
	private $billed = null;
	private $socid = null;
	private $fourn_id = null;
	private $date = null;
	private $date_valid = null;
	private $date_approve = null;
	private $date_approve2 = null;
	private $date_commande = null;
	private $remise_percent = null;
	private $methode_commande_id = null;
	private $methode_commande = null;
	private $delivery_date = null;
	private $source = null;
	private $cond_reglement_code = null;
	private $cond_reglement_label = null;
	private $cond_reglement_doc = null;
	private $mode_reglement_code = null;
	private $user_author_id = null;
	private $user_approve_id = null;
	private $user_approve_id2 = null;
	private $refuse_note = null;
	private $line = null;
	private $date_lim_reglement = null;
	private $receptions = [];

	/**
	 * Convert object to array (all properties)
	 */
	public function toArray(): array
	{
		return get_object_vars($this);
	}

	/**
	 * Convert object to array but keep only non-null / non-empty properties
	 */
	public function toArrayFiltered(): array
	{
		return array_filter(get_object_vars($this), fn($value) => $value !== null && $value !== []);
	}

	/**
	 * Build a SupplierOrder from API response array
	 */
	public static function fromApiResponse(array|object $data): self
	{
		$order = new self();
		foreach ($data as $key => $value) {
			if (property_exists($order, $key) && $key !== 'lines') {
				$order->$key = $value;
			}
		}

		// lines
		$lines = [];
		if (!empty($data['lines']) && is_array($data['lines'])) {
			foreach ($data['lines'] as $lineData) {
				$line = Line::fromApiResponse($lineData);
				$lines[] = $line->toArrayFiltered();
			}
		}
		$order->setLines($lines);

		return $order;
	}

	// Basic getters/setters used commonly
	public function getId(): ?int { return $this->id; }
	public function setId(?int $id): self { $this->id = $id; return $this; }

	public function getRef(): ?string { return $this->ref; }
	public function setRef(?string $ref): self { $this->ref = $ref; return $this; }

	public function getTotalTtc(): mixed { return $this->total_ttc; }
	public function setTotalTtc($total): self { $this->total_ttc = $total; return $this; }

	public function getLines(): array { return $this->lines; }
	public function setLines(array $lines): self { $this->lines = $lines; return $this; }

	public function getSocId(): mixed { return $this->socid; }
	public function setSocId($socid): self { $this->socid = $socid; return $this; }

	public function getFournId(): mixed { return $this->fourn_id; }
	public function setFournId($fourn_id): self { $this->fourn_id = $fourn_id; return $this; }

	public function getDeliveryDate(): mixed { return $this->delivery_date; }
	public function setDeliveryDate($delivery_date): self { $this->delivery_date = $delivery_date; return $this; }

	public function getDate(): mixed { return $this->date; }
	public function setDate($date): self { $this->date = $date; return $this; }


	/**
	 * Get the value of receptions
	 */
	public function getReceptions()
	{
		return $this->receptions;
	}

	/**
	 * Set the value of receptions
	 */
	public function setReceptions($receptions): self
	{
		$this->receptions = $receptions;

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
	 * Get the value of line
	 */
	public function getLine()
	{
		return $this->line;
	}

	/**
	 * Set the value of line
	 */
	public function setLine($line): self
	{
		$this->line = $line;

		return $this;
	}

	/**
	 * Get the value of refuse_note
	 */
	public function getRefuseNote()
	{
		return $this->refuse_note;
	}

	/**
	 * Set the value of refuse_note
	 */
	public function setRefuseNote($refuse_note): self
	{
		$this->refuse_note = $refuse_note;

		return $this;
	}

	/**
	 * Get the value of user_approve_id2
	 */
	public function getUserApproveId2()
	{
		return $this->user_approve_id2;
	}

	/**
	 * Set the value of user_approve_id2
	 */
	public function setUserApproveId2($user_approve_id2): self
	{
		$this->user_approve_id2 = $user_approve_id2;

		return $this;
	}

	/**
	 * Get the value of user_approve_id
	 */
	public function getUserApproveId()
	{
		return $this->user_approve_id;
	}

	/**
	 * Set the value of user_approve_id
	 */
	public function setUserApproveId($user_approve_id): self
	{
		$this->user_approve_id = $user_approve_id;

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
	 * Get the value of source
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Set the value of source
	 */
	public function setSource($source): self
	{
		$this->source = $source;

		return $this;
	}

	/**
	 * Get the value of methode_commande
	 */
	public function getMethodeCommande()
	{
		return $this->methode_commande;
	}

	/**
	 * Set the value of methode_commande
	 */
	public function setMethodeCommande($methode_commande): self
	{
		$this->methode_commande = $methode_commande;

		return $this;
	}
    

	/**
	 * Get the value of methode_commande_id
	 */
	public function getMethodeCommandeId()
	{
		return $this->methode_commande_id;
	}

	/**
	 * Set the value of methode_commande_id
	 */
	public function setMethodeCommandeId($methode_commande_id): self
	{
		$this->methode_commande_id = $methode_commande_id;

		return $this;
	}

	/**
	 * Get the value of remise_percent
	 */
	public function getRemisePercent()
	{
		return $this->remise_percent;
	}

	/**
	 * Set the value of remise_percent
	 */
	public function setRemisePercent($remise_percent): self
	{
		$this->remise_percent = $remise_percent;

		return $this;
	}

	/**
	 * Get the value of date_commande
	 */
	public function getDateCommande()
	{
		return $this->date_commande;
	}

	/**
	 * Set the value of date_commande
	 */
	public function setDateCommande($date_commande): self
	{
		$this->date_commande = $date_commande;

		return $this;
	}

	/**
	 * Get the value of date_approve2
	 */
	public function getDateApprove2()
	{
		return $this->date_approve2;
	}

	/**
	 * Set the value of date_approve2
	 */
	public function setDateApprove2($date_approve2): self
	{
		$this->date_approve2 = $date_approve2;

		return $this;
	}

	/**
	 * Get the value of date_approve
	 */
	public function getDateApprove()
	{
		return $this->date_approve;
	}

	/**
	 * Set the value of date_approve
	 */
	public function setDateApprove($date_approve): self
	{
		$this->date_approve = $date_approve;

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
	 * Get the value of date_valid
	 */
	public function getDateValid()
	{
		return $this->date_valid;
	}

	/**
	 * Set the value of date_valid
	 */
	public function setDateValid($date_valid): self
	{
		$this->date_valid = $date_valid;

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
	 * Get the value of ref_fourn
	 */
	public function getRefFourn()
	{
		return $this->ref_fourn;
	}

	/**
	 * Set the value of ref_fourn
	 */
	public function setRefFourn($ref_fourn): self
	{
		$this->ref_fourn = $ref_fourn;

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

