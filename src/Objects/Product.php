<?php

namespace DolibarrApi\Objects;

class Product
{
    private ?string $module = null;
    private ?int $id = null;
    private ?int $entity = null;
    private ?string $import_key = null;

    private array $array_options = [];
    private $array_languages = null;

    private $contacts_ids = null;
    private $contacts_ids_internal = null;

    private $linkedObjectsIds = null;

    private ?string $canvas = null;
    private ?string $origin_type = null;

    private ?string $ref = null;
    private ?string $ref_ext = null;

    private ?string $status = null;

    private ?int $country_id = null;
    private ?string $country_code = null;
    private ?int $state_id = null;
    private ?int $region_id = null;

    private ?string $barcode_type = null;
    private ?string $barcode_type_coder = null;

    private ?string $shipping_method = null;

    private ?int $fk_multicurrency = null;
    private ?string $multicurrency_code = null;
    private ?float $multicurrency_tx = null;

    private ?float $multicurrency_total_ht = null;
    private ?float $multicurrency_total_tva = null;
    private ?float $multicurrency_total_localtax1 = null;
    private ?float $multicurrency_total_localtax2 = null;
    private ?float $multicurrency_total_ttc = null;

    private ?string $last_main_doc = null;

    private ?string $note_public = null;
    private ?string $note_private = null;

    private ?float $total_ht = null;
    private ?float $total_tva = null;
    private ?float $total_localtax1 = null;
    private ?float $total_localtax2 = null;
    private ?float $total_ttc = null;

    private ?string $actiontypecode = null;
    private ?string $civility_code = null;

    private ?int $date_creation = null;
    private ?int $date_validation = null;
    private ?int $date_modification = null;
    private $tms = null;
    private ?int $date_cloture = null;

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

    private ?int $specimen = null;

    private $totalpaid = null;

    private array $extraparams = [];
    private $product = null;

    private $cond_reglement_supplier_id = null;
    private $deposit_percent = null;
    private $retained_warranty_fk_cond_reglement = null;

    private $warehouse_id = null;

    private ?string $label = null;
    private ?string $description = null;
    private $other = null;

    private ?string $type = null;

    private ?float $price = null;
    private $price_formated = null;

    private ?float $price_ttc = null;
    private $price_ttc_formated = null;

    private ?float $price_min = null;
    private ?float $price_min_ttc = null;

    private ?string $price_base_type = null;
    private $price_label = null;

    private array $multiprices = [];
    private array $multiprices_ttc = [];
    private array $multiprices_base_type = [];
    private array $multiprices_default_vat_code = [];
    private array $multiprices_min = [];
    private array $multiprices_min_ttc = [];
    private array $multiprices_tva_tx = [];

    private array $prices_by_qty = [];
    private array $prices_by_qty_list = [];

    private $level = null;
    private array $multilangs = [];

    private $default_vat_code = null;
    private ?float $tva_tx = null;

    private $remise_percent = null;

    private ?float $localtax1_tx = null;
    private ?float $localtax2_tx = null;

    private ?string $localtax1_type = null;
    private ?string $localtax2_type = null;

    private $desc_supplier = null;
    private $vatrate_supplier = null;
    private $default_vat_code_supplier = null;

    private $fourn_multicurrency_price = null;
    private $fourn_multicurrency_unitprice = null;
    private $fourn_multicurrency_tx = null;
    private $fourn_multicurrency_id = null;
    private $fourn_multicurrency_code = null;

    private $packaging = null;
    private $lifetime = null;
    private $qc_frequency = null;

    private ?float $stock_reel = null;
    private $stock_theorique = null;

    private ?float $cost_price = null;
    private ?float $pmp = null;

    private ?int $seuil_stock_alerte = null;
    private ?int $desiredstock = null;

    private ?int $duration_value = null;
    private $duration_unit = null;
    private ?string $duration = null;

    private $fk_default_workstation = null;
    private $tosell = null;
    private ?string $status_buy = null;
    private $tobuy = null;
    private $finished = null;
    private $fk_default_bom = null;
    private $product_fourn_price_id = null;
    private $buyprice = null;
    private $tobatch = null;

    private ?string $status_batch = null;
    private ?string $sell_or_eat_by_mandatory = null;
    private ?string $batch_mask = null;

    private ?string $customcode = null;

    private ?string $url = null;

    private ?float $weight = null;
    private ?int $weight_units = null;

    private ?float $length = null;
    private ?int $length_units = null;

    private ?float $width = null;
    private ?int $width_units = null;

    private ?float $height = null;
    private ?int $height_units = null;

    private ?float $surface = null;
    private ?int $surface_units = null;

    private ?float $volume = null;
    private ?int $volume_units = null;

    private $net_measure = null;
    private $net_measure_units = null;

    private ?string $accountancy_code_sell = null;
    private ?string $accountancy_code_sell_intra = null;
    private ?string $accountancy_code_sell_export = null;

    private ?string $accountancy_code_buy = null;
    private ?string $accountancy_code_buy_intra = null;
    private ?string $accountancy_code_buy_export = null;

    private ?string $barcode = null;

    private array $stats_proposal_supplier = [];
    private array $stats_expedition = [];
    private array $stats_mo = [];
    private array $stats_bom = [];
    private array $stats_facturerec = [];
    private array $stats_facture_fournisseur = [];
    private array $stats_facturefournrec = [];

    private array $stock_warehouse = [];

    private $fk_default_warehouse = null;
    private $fk_price_expression = null;

    private $fourn_qty = null;
    private $fk_unit = null;

    private ?string $price_autogen = null;

    private array $sousprods = [];

    private $res = null;
    private $is_object_used = null;
    private $is_sousproduit_qty = null;
    private $is_sousproduit_incdec = null;

    private ?string $mandatory_period = null;
    private ?string $stockable_product = null;

    /** Construction rapide */
    public static function fromApiResponse(array $data): self
    {
        $p = new self();

        foreach ($data as $key => $value) {
            $property = self::snakeToCamel($key);
            if (property_exists($p, $property)) {
                $p->$property = $value;
            }
        }

        return $p;
    }

    /** Convertit snake_case → camelCase */
    private static function snakeToCamel(string $str): string
    {
        return lcfirst(str_replace('_', '', ucwords($str, '_')));
    }

    /** Retourne un tableau complet */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /** Retourne un tableau filtré (sans null / vides) */
    public function toArrayFiltered(): array
    {
        $arr = $this->toArray();

        return array_filter($arr, function ($v) {
            if ($v === null) return false;
            if ($v === []) return false;
            return true;
        });
    }

    /* =======================
       GETTERS / SETTERS
    ======================== */

    public function getId(): ?int { return $this->id; }
    public function setId(int $id): self { $this->id = $id; return $this; }

    public function getRef(): ?string { return $this->ref; }
    public function setRef(string $ref): self { $this->ref = $ref; return $this; }

    public function getLabel(): ?string { return $this->label; }
    public function setLabel(string $label): self { $this->label = $label; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $d): self { $this->description = $d; return $this; }

    public function getPrice(): ?float { return $this->price; }
    public function setPrice(float $price): self { $this->price = $price; return $this; }

    public function getPriceTtc(): ?float { return $this->price_ttc; }
    public function setPriceTtc(float $p): self { $this->price_ttc = $p; return $this; }

    public function getTvaTx(): ?float { return $this->tva_tx; }
    public function setTvaTx(float $t): self { $this->tva_tx = $t; return $this; }

    public function getUrl(): ?string { return $this->url; }
    public function setUrl(string $url): self { $this->url = $url; return $this; }

    public function getBarcode(): ?string { return $this->barcode; }
    public function setBarcode(string $code): self { $this->barcode = $code; return $this; }

    public function getCustomcode(): ?string { return $this->customcode; }
    public function setCustomcode(string $c): self { $this->customcode = $c; return $this; }

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
     * Get the value of type
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of price_min
     */
    public function getPriceMin(): ?float
    {
        return $this->price_min;
    }

    /**
     * Set the value of price_min
     */
    public function setPriceMin(?float $price_min): self
    {
        $this->price_min = $price_min;

        return $this;
    }

    /**
     * Get the value of price_min_ttc
     */
    public function getPriceMinTtc(): ?float
    {
        return $this->price_min_ttc;
    }

    /**
     * Set the value of price_min_ttc
     */
    public function setPriceMinTtc(?float $price_min_ttc): self
    {
        $this->price_min_ttc = $price_min_ttc;

        return $this;
    }

    /**
     * Get the value of price_base_type
     */
    public function getPriceBaseType(): ?string
    {
        return $this->price_base_type;
    }

    /**
     * Set the value of price_base_type
     */
    public function setPriceBaseType(?string $price_base_type): self
    {
        $this->price_base_type = $price_base_type;

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
     * Get the value of pmp
     */
    public function getPmp(): ?float
    {
        return $this->pmp;
    }

    /**
     * Set the value of pmp
     */
    public function setPmp(?float $pmp): self
    {
        $this->pmp = $pmp;

        return $this;
    }

    /**
     * Get the value of seuil_stock_alerte
     */
    public function getSeuilStockAlerte(): ?int
    {
        return $this->seuil_stock_alerte;
    }

    /**
     * Set the value of seuil_stock_alerte
     */
    public function setSeuilStockAlerte(?int $seuil_stock_alerte): self
    {
        $this->seuil_stock_alerte = $seuil_stock_alerte;

        return $this;
    }

    /**
     * Get the value of desiredstock
     */
    public function getDesiredstock(): ?int
    {
        return $this->desiredstock;
    }

    /**
     * Set the value of desiredstock
     */
    public function setDesiredstock(?int $desiredstock): self
    {
        $this->desiredstock = $desiredstock;

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
     * Get the value of length_units
     */
    public function getLengthUnits(): ?int
    {
        return $this->length_units;
    }

    /**
     * Set the value of length_units
     */
    public function setLengthUnits(?int $length_units): self
    {
        $this->length_units = $length_units;

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
     * Get the value of status_buy
     */
    public function getStatusBuy(): ?string
    {
        return $this->status_buy;
    }

    /**
     * Set the value of status_buy
     */
    public function setStatusBuy(?string $status_buy): self
    {
        $this->status_buy = $status_buy;

        return $this;
    }

    /**
     * Get the value of status_batch
     */
    public function getStatusBatch(): ?string
    {
        return $this->status_batch;
    }

    /**
     * Set the value of status_batch
     */
    public function setStatusBatch(?string $status_batch): self
    {
        $this->status_batch = $status_batch;

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

    public function getTms() {
      return $this->tms;
    }
    public function setTms($value) {
      $this->tms = $value;
    }

    public function getUser_author() {
      return $this->user_author;
    }
    public function setUser_author($value) {
      $this->user_author = $value;
    }

    public function getUser_creation() {
      return $this->user_creation;
    }
    public function setUser_creation($value) {
      $this->user_creation = $value;
    }

    public function getUser_creation_id() {
      return $this->user_creation_id;
    }
    public function setUser_creation_id($value) {
      $this->user_creation_id = $value;
    }

    public function getUser_valid() {
      return $this->user_valid;
    }
    public function setUser_valid($value) {
      $this->user_valid = $value;
    }

    public function getUser_validation() {
      return $this->user_validation;
    }
    public function setUser_validation($value) {
      $this->user_validation = $value;
    }

    public function getUser_validation_id() {
      return $this->user_validation_id;
    }
    public function setUser_validation_id($value) {
      $this->user_validation_id = $value;
    }

    public function getUser_closing_id() {
      return $this->user_closing_id;
    }
    public function setUser_closing_id($value) {
      $this->user_closing_id = $value;
    }

    public function getUser_modification() {
      return $this->user_modification;
    }
    public function setUser_modification($value) {
      $this->user_modification = $value;
    }

    public function getUser_modification_id() {
      return $this->user_modification_id;
    }
    public function setUser_modification_id($value) {
      $this->user_modification_id = $value;
    }

    public function getFk_user_creat() {
      return $this->fk_user_creat;
    }
    public function setFk_user_creat($value) {
      $this->fk_user_creat = $value;
    }

    public function getFk_user_modif() {
      return $this->fk_user_modif;
    }
    public function setFk_user_modif($value) {
      $this->fk_user_modif = $value;
    }

    public function getTotalpaid() {
      return $this->totalpaid;
    }
    public function setTotalpaid($value) {
      $this->totalpaid = $value;
    }

    public function getProduct() {
      return $this->product;
    }
    public function setProduct($value) {
      $this->product = $value;
    }

    public function getCond_reglement_supplier_id() {
      return $this->cond_reglement_supplier_id;
    }
    public function setCond_reglement_supplier_id($value) {
      $this->cond_reglement_supplier_id = $value;
    }

    public function getDeposit_percent() {
      return $this->deposit_percent;
    }
    public function setDeposit_percent($value) {
      $this->deposit_percent = $value;
    }

    public function getRetained_warranty_fk_cond_reglement() {
      return $this->retained_warranty_fk_cond_reglement;
    }
    public function setRetained_warranty_fk_cond_reglement($value) {
      $this->retained_warranty_fk_cond_reglement = $value;
    }

    public function getWarehouse_id() {
      return $this->warehouse_id;
    }
    public function setWarehouse_id($value) {
      $this->warehouse_id = $value;
    }

    public function getOther() {
      return $this->other;
    }
    public function setOther($value) {
      $this->other = $value;
    }

    public function getPrice_formated() {
      return $this->price_formated;
    }
    public function setPrice_formated($value) {
      $this->price_formated = $value;
    }

    public function getPrice_ttc_formated() {
      return $this->price_ttc_formated;
    }
    public function setPrice_ttc_formated($value) {
      $this->price_ttc_formated = $value;
    }

    public function getPrice_label() {
      return $this->price_label;
    }
    public function setPrice_label($value) {
      $this->price_label = $value;
    }

    public function getLevel() {
      return $this->level;
    }
    public function setLevel($value) {
      $this->level = $value;
    }

    public function getDefault_vat_code() {
      return $this->default_vat_code;
    }
    public function setDefault_vat_code($value) {
      $this->default_vat_code = $value;
    }

    public function getRemise_percent() {
      return $this->remise_percent;
    }
    public function setRemise_percent($value) {
      $this->remise_percent = $value;
    }

    public function getDesc_supplier() {
      return $this->desc_supplier;
    }
    public function setDesc_supplier($value) {
      $this->desc_supplier = $value;
    }

    public function getVatrate_supplier() {
      return $this->vatrate_supplier;
    }
    public function setVatrate_supplier($value) {
      $this->vatrate_supplier = $value;
    }

    public function getDefault_vat_code_supplier() {
      return $this->default_vat_code_supplier;
    }
    public function setDefault_vat_code_supplier($value) {
      $this->default_vat_code_supplier = $value;
    }

    public function getFourn_multicurrency_price() {
      return $this->fourn_multicurrency_price;
    }
    public function setFourn_multicurrency_price($value) {
      $this->fourn_multicurrency_price = $value;
    }

    public function getFourn_multicurrency_unitprice() {
      return $this->fourn_multicurrency_unitprice;
    }
    public function setFourn_multicurrency_unitprice($value) {
      $this->fourn_multicurrency_unitprice = $value;
    }

    public function getFourn_multicurrency_tx() {
      return $this->fourn_multicurrency_tx;
    }
    public function setFourn_multicurrency_tx($value) {
      $this->fourn_multicurrency_tx = $value;
    }

    public function getFourn_multicurrency_id() {
      return $this->fourn_multicurrency_id;
    }
    public function setFourn_multicurrency_id($value) {
      $this->fourn_multicurrency_id = $value;
    }

    public function getFourn_multicurrency_code() {
      return $this->fourn_multicurrency_code;
    }
    public function setFourn_multicurrency_code($value) {
      $this->fourn_multicurrency_code = $value;
    }

    public function getPackaging() {
      return $this->packaging;
    }
    public function setPackaging($value) {
      $this->packaging = $value;
    }

    public function getLifetime() {
      return $this->lifetime;
    }
    public function setLifetime($value) {
      $this->lifetime = $value;
    }

    public function getQc_frequency() {
      return $this->qc_frequency;
    }
    public function setQc_frequency($value) {
      $this->qc_frequency = $value;
    }

    public function getStock_theorique() {
      return $this->stock_theorique;
    }
    public function setStock_theorique($value) {
      $this->stock_theorique = $value;
    }

    public function getDuration_unit() {
      return $this->duration_unit;
    }
    public function setDuration_unit($value) {
      $this->duration_unit = $value;
    }

    public function getFk_default_workstation() {
      return $this->fk_default_workstation;
    }
    public function setFk_default_workstation($value) {
      $this->fk_default_workstation = $value;
    }

    public function getTosell() {
      return $this->tosell;
    }
    public function setTosell($value) {
      $this->tosell = $value;
    }

    public function getTobuy() {
      return $this->tobuy;
    }
    public function setTobuy($value) {
      $this->tobuy = $value;
    }

    public function getFinished() {
      return $this->finished;
    }
    public function setFinished($value) {
      $this->finished = $value;
    }

    public function getFk_default_bom() {
      return $this->fk_default_bom;
    }
    public function setFk_default_bom($value) {
      $this->fk_default_bom = $value;
    }

    public function getProduct_fourn_price_id() {
      return $this->product_fourn_price_id;
    }
    public function setProduct_fourn_price_id($value) {
      $this->product_fourn_price_id = $value;
    }

    public function getBuyprice() {
      return $this->buyprice;
    }
    public function setBuyprice($value) {
      $this->buyprice = $value;
    }

    public function getTobatch() {
      return $this->tobatch;
    }
    public function setTobatch($value) {
      $this->tobatch = $value;
    }

    public function getNet_measure() {
      return $this->net_measure;
    }
    public function setNet_measure($value) {
      $this->net_measure = $value;
    }

    public function getNet_measure_units() {
      return $this->net_measure_units;
    }
    public function setNet_measure_units($value) {
      $this->net_measure_units = $value;
    }

    public function getFk_default_warehouse() {
      return $this->fk_default_warehouse;
    }
    public function setFk_default_warehouse($value) {
      $this->fk_default_warehouse = $value;
    }

    public function getFk_price_expression() {
      return $this->fk_price_expression;
    }
    public function setFk_price_expression($value) {
      $this->fk_price_expression = $value;
    }

    public function getFourn_qty() {
      return $this->fourn_qty;
    }
    public function setFourn_qty($value) {
      $this->fourn_qty = $value;
    }

    public function getFk_unit() {
      return $this->fk_unit;
    }
    public function setFk_unit($value) {
      $this->fk_unit = $value;
    }

    public function getRes() {
      return $this->res;
    }
    public function setRes($value) {
      $this->res = $value;
    }

    public function getIs_object_used() {
      return $this->is_object_used;
    }
    public function setIs_object_used($value) {
      $this->is_object_used = $value;
    }

    public function getIs_sousproduit_qty() {
      return $this->is_sousproduit_qty;
    }
    public function setIs_sousproduit_qty($value) {
      $this->is_sousproduit_qty = $value;
    }

    public function getIs_sousproduit_incdec() {
      return $this->is_sousproduit_incdec;
    }
    public function setIs_sousproduit_incdec($value) {
      $this->is_sousproduit_incdec = $value;
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
     * Get the value of multiprices
     */
    public function getMultiprices(): array
    {
        return $this->multiprices;
    }

    /**
     * Set the value of multiprices
     */
    public function setMultiprices(array $multiprices): self
    {
        $this->multiprices = $multiprices;

        return $this;
    }

    /**
     * Get the value of multiprices_ttc
     */
    public function getMultipricesTtc(): array
    {
        return $this->multiprices_ttc;
    }

    /**
     * Set the value of multiprices_ttc
     */
    public function setMultipricesTtc(array $multiprices_ttc): self
    {
        $this->multiprices_ttc = $multiprices_ttc;

        return $this;
    }

    /**
     * Get the value of multiprices_base_type
     */
    public function getMultipricesBaseType(): array
    {
        return $this->multiprices_base_type;
    }

    /**
     * Set the value of multiprices_base_type
     */
    public function setMultipricesBaseType(array $multiprices_base_type): self
    {
        $this->multiprices_base_type = $multiprices_base_type;

        return $this;
    }

    /**
     * Get the value of multiprices_default_vat_code
     */
    public function getMultipricesDefaultVatCode(): array
    {
        return $this->multiprices_default_vat_code;
    }

    /**
     * Set the value of multiprices_default_vat_code
     */
    public function setMultipricesDefaultVatCode(array $multiprices_default_vat_code): self
    {
        $this->multiprices_default_vat_code = $multiprices_default_vat_code;

        return $this;
    }

    /**
     * Get the value of multiprices_min
     */
    public function getMultipricesMin(): array
    {
        return $this->multiprices_min;
    }

    /**
     * Set the value of multiprices_min
     */
    public function setMultipricesMin(array $multiprices_min): self
    {
        $this->multiprices_min = $multiprices_min;

        return $this;
    }

    /**
     * Get the value of stock_reel
     */
    public function getStockReel(): ?float
    {
        return $this->stock_reel;
    }

    /**
     * Set the value of stock_reel
     */
    public function setStockReel(?float $stock_reel): self
    {
        $this->stock_reel = $stock_reel;

        return $this;
    }

    /**
     * Get the value of multiprices_min_ttc
     */
    public function getMultipricesMinTtc(): array
    {
        return $this->multiprices_min_ttc;
    }

    /**
     * Set the value of multiprices_min_ttc
     */
    public function setMultipricesMinTtc(array $multiprices_min_ttc): self
    {
        $this->multiprices_min_ttc = $multiprices_min_ttc;

        return $this;
    }

    /**
     * Get the value of accountancy_code_sell_intra
     */
    public function getAccountancyCodeSellIntra(): ?string
    {
        return $this->accountancy_code_sell_intra;
    }

    /**
     * Set the value of accountancy_code_sell_intra
     */
    public function setAccountancyCodeSellIntra(?string $accountancy_code_sell_intra): self
    {
        $this->accountancy_code_sell_intra = $accountancy_code_sell_intra;

        return $this;
    }

    /**
     * Get the value of price_autogen
     */
    public function getPriceAutogen(): ?string
    {
        return $this->price_autogen;
    }

    /**
     * Set the value of price_autogen
     */
    public function setPriceAutogen(?string $price_autogen): self
    {
        $this->price_autogen = $price_autogen;

        return $this;
    }

    /**
     * Get the value of cost_price
     */
    public function getCostPrice(): ?float
    {
        return $this->cost_price;
    }

    /**
     * Set the value of cost_price
     */
    public function setCostPrice(?float $cost_price): self
    {
        $this->cost_price = $cost_price;

        return $this;
    }

    /**
     * Get the value of accountancy_code_sell_export
     */
    public function getAccountancyCodeSellExport(): ?string
    {
        return $this->accountancy_code_sell_export;
    }

    /**
     * Set the value of accountancy_code_sell_export
     */
    public function setAccountancyCodeSellExport(?string $accountancy_code_sell_export): self
    {
        $this->accountancy_code_sell_export = $accountancy_code_sell_export;

        return $this;
    }

    /**
     * Get the value of localtax2_type
     */
    public function getLocaltax2Type(): ?string
    {
        return $this->localtax2_type;
    }

    /**
     * Set the value of localtax2_type
     */
    public function setLocaltax2Type(?string $localtax2_type): self
    {
        $this->localtax2_type = $localtax2_type;

        return $this;
    }

    /**
     * Get the value of duration_value
     */
    public function getDurationValue(): ?int
    {
        return $this->duration_value;
    }

    /**
     * Set the value of duration_value
     */
    public function setDurationValue(?int $duration_value): self
    {
        $this->duration_value = $duration_value;

        return $this;
    }

    /**
     * Get the value of sousprods
     */
    public function getSousprods(): array
    {
        return $this->sousprods;
    }

    /**
     * Set the value of sousprods
     */
    public function setSousprods(array $sousprods): self
    {
        $this->sousprods = $sousprods;

        return $this;
    }

    /**
     * Get the value of stock_warehouse
     */
    public function getStockWarehouse(): array
    {
        return $this->stock_warehouse;
    }

    /**
     * Set the value of stock_warehouse
     */
    public function setStockWarehouse(array $stock_warehouse): self
    {
        $this->stock_warehouse = $stock_warehouse;

        return $this;
    }

    /**
     * Get the value of stockable_product
     */
    public function getStockableProduct(): ?string
    {
        return $this->stockable_product;
    }

    /**
     * Set the value of stockable_product
     */
    public function setStockableProduct(?string $stockable_product): self
    {
        $this->stockable_product = $stockable_product;

        return $this;
    }

    /**
     * Get the value of mandatory_period
     */
    public function getMandatoryPeriod(): ?string
    {
        return $this->mandatory_period;
    }

    /**
     * Set the value of mandatory_period
     */
    public function setMandatoryPeriod(?string $mandatory_period): self
    {
        $this->mandatory_period = $mandatory_period;

        return $this;
    }

    /**
     * Get the value of stats_facturefournrec
     */
    public function getStatsFacturefournrec(): array
    {
        return $this->stats_facturefournrec;
    }

    /**
     * Set the value of stats_facturefournrec
     */
    public function setStatsFacturefournrec(array $stats_facturefournrec): self
    {
        $this->stats_facturefournrec = $stats_facturefournrec;

        return $this;
    }

    /**
     * Get the value of stats_facture_fournisseur
     */
    public function getStatsFactureFournisseur(): array
    {
        return $this->stats_facture_fournisseur;
    }

    /**
     * Set the value of stats_facture_fournisseur
     */
    public function setStatsFactureFournisseur(array $stats_facture_fournisseur): self
    {
        $this->stats_facture_fournisseur = $stats_facture_fournisseur;

        return $this;
    }

    /**
     * Get the value of stats_facturerec
     */
    public function getStatsFacturerec(): array
    {
        return $this->stats_facturerec;
    }

    /**
     * Set the value of stats_facturerec
     */
    public function setStatsFacturerec(array $stats_facturerec): self
    {
        $this->stats_facturerec = $stats_facturerec;

        return $this;
    }

    /**
     * Get the value of accountancy_code_buy_intra
     */
    public function getAccountancyCodeBuyIntra(): ?string
    {
        return $this->accountancy_code_buy_intra;
    }

    /**
     * Set the value of accountancy_code_buy_intra
     */
    public function setAccountancyCodeBuyIntra(?string $accountancy_code_buy_intra): self
    {
        $this->accountancy_code_buy_intra = $accountancy_code_buy_intra;

        return $this;
    }

    /**
     * Get the value of multiprices_tva_tx
     */
    public function getMultipricesTvaTx(): array
    {
        return $this->multiprices_tva_tx;
    }

    /**
     * Set the value of multiprices_tva_tx
     */
    public function setMultipricesTvaTx(array $multiprices_tva_tx): self
    {
        $this->multiprices_tva_tx = $multiprices_tva_tx;

        return $this;
    }

    /**
     * Get the value of stats_bom
     */
    public function getStatsBom(): array
    {
        return $this->stats_bom;
    }

    /**
     * Set the value of stats_bom
     */
    public function setStatsBom(array $stats_bom): self
    {
        $this->stats_bom = $stats_bom;

        return $this;
    }

    /**
     * Get the value of batch_mask
     */
    public function getBatchMask(): ?string
    {
        return $this->batch_mask;
    }

    /**
     * Set the value of batch_mask
     */
    public function setBatchMask(?string $batch_mask): self
    {
        $this->batch_mask = $batch_mask;

        return $this;
    }

    /**
     * Get the value of volume_units
     */
    public function getVolumeUnits(): ?int
    {
        return $this->volume_units;
    }

    /**
     * Set the value of volume_units
     */
    public function setVolumeUnits(?int $volume_units): self
    {
        $this->volume_units = $volume_units;

        return $this;
    }

    /**
     * Get the value of date_cloture
     */
    public function getDateCloture(): ?int
    {
        return $this->date_cloture;
    }

    /**
     * Set the value of date_cloture
     */
    public function setDateCloture(?int $date_cloture): self
    {
        $this->date_cloture = $date_cloture;

        return $this;
    }

    /**
     * Get the value of volume
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * Set the value of volume
     */
    public function setVolume(?float $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get the value of weight
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     */
    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of accountancy_code_buy_export
     */
    public function getAccountancyCodeBuyExport(): ?string
    {
        return $this->accountancy_code_buy_export;
    }

    /**
     * Set the value of accountancy_code_buy_export
     */
    public function setAccountancyCodeBuyExport(?string $accountancy_code_buy_export): self
    {
        $this->accountancy_code_buy_export = $accountancy_code_buy_export;

        return $this;
    }

    /**
     * Get the value of stats_mo
     */
    public function getStatsMo(): array
    {
        return $this->stats_mo;
    }

    /**
     * Set the value of stats_mo
     */
    public function setStatsMo(array $stats_mo): self
    {
        $this->stats_mo = $stats_mo;

        return $this;
    }

    /**
     * Get the value of surface_units
     */
    public function getSurfaceUnits(): ?int
    {
        return $this->surface_units;
    }

    /**
     * Set the value of surface_units
     */
    public function setSurfaceUnits(?int $surface_units): self
    {
        $this->surface_units = $surface_units;

        return $this;
    }

    /**
     * Get the value of stats_expedition
     */
    public function getStatsExpedition(): array
    {
        return $this->stats_expedition;
    }

    /**
     * Set the value of stats_expedition
     */
    public function setStatsExpedition(array $stats_expedition): self
    {
        $this->stats_expedition = $stats_expedition;

        return $this;
    }

    /**
     * Get the value of stats_proposal_supplier
     */
    public function getStatsProposalSupplier(): array
    {
        return $this->stats_proposal_supplier;
    }

    /**
     * Set the value of stats_proposal_supplier
     */
    public function setStatsProposalSupplier(array $stats_proposal_supplier): self
    {
        $this->stats_proposal_supplier = $stats_proposal_supplier;

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
    public function getDateValidation(): ?int
    {
        return $this->date_validation;
    }

    /**
     * Set the value of date_validation
     */
    public function setDateValidation(?int $date_validation): self
    {
        $this->date_validation = $date_validation;

        return $this;
    }

    /**
     * Get the value of surface
     */
    public function getSurface(): ?float
    {
        return $this->surface;
    }

    /**
     * Set the value of surface
     */
    public function setSurface(?float $surface): self
    {
        $this->surface = $surface;

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
     * Get the value of duration
     */
    public function getDuration(): ?string
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     */
    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of localtax1_type
     */
    public function getLocaltax1Type(): ?string
    {
        return $this->localtax1_type;
    }

    /**
     * Set the value of localtax1_type
     */
    public function setLocaltax1Type(?string $localtax1_type): self
    {
        $this->localtax1_type = $localtax1_type;

        return $this;
    }

    /**
     * Get the value of localtax2_tx
     */
    public function getLocaltax2Tx(): ?float
    {
        return $this->localtax2_tx;
    }

    /**
     * Set the value of localtax2_tx
     */
    public function setLocaltax2Tx(?float $localtax2_tx): self
    {
        $this->localtax2_tx = $localtax2_tx;

        return $this;
    }

    /**
     * Get the value of height
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * Set the value of height
     */
    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the value of width
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * Set the value of width
     */
    public function setWidth(?float $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of length
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * Set the value of length
     */
    public function setLength(?float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of sell_or_eat_by_mandatory
     */
    public function getSellOrEatByMandatory(): ?string
    {
        return $this->sell_or_eat_by_mandatory;
    }

    /**
     * Set the value of sell_or_eat_by_mandatory
     */
    public function setSellOrEatByMandatory(?string $sell_or_eat_by_mandatory): self
    {
        $this->sell_or_eat_by_mandatory = $sell_or_eat_by_mandatory;

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
     * Get the value of localtax1_tx
     */
    public function getLocaltax1Tx(): ?float
    {
        return $this->localtax1_tx;
    }

    /**
     * Set the value of localtax1_tx
     */
    public function setLocaltax1Tx(?float $localtax1_tx): self
    {
        $this->localtax1_tx = $localtax1_tx;

        return $this;
    }

    /**
     * Get the value of prices_by_qty
     */
    public function getPricesByQty(): array
    {
        return $this->prices_by_qty;
    }

    /**
     * Set the value of prices_by_qty
     */
    public function setPricesByQty(array $prices_by_qty): self
    {
        $this->prices_by_qty = $prices_by_qty;

        return $this;
    }

    /**
     * Get the value of multilangs
     */
    public function getMultilangs(): array
    {
        return $this->multilangs;
    }

    /**
     * Set the value of multilangs
     */
    public function setMultilangs(array $multilangs): self
    {
        $this->multilangs = $multilangs;

        return $this;
    }

    /**
     * Get the value of prices_by_qty_list
     */
    public function getPricesByQtyList(): array
    {
        return $this->prices_by_qty_list;
    }

    /**
     * Set the value of prices_by_qty_list
     */
    public function setPricesByQtyList(array $prices_by_qty_list): self
    {
        $this->prices_by_qty_list = $prices_by_qty_list;

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
    public function getMulticurrencyTotalLocaltax2(): ?float
    {
        return $this->multicurrency_total_localtax2;
    }

    /**
     * Set the value of multicurrency_total_localtax2
     */
    public function setMulticurrencyTotalLocaltax2(?float $multicurrency_total_localtax2): self
    {
        $this->multicurrency_total_localtax2 = $multicurrency_total_localtax2;

        return $this;
    }

    /**
     * Get the value of multicurrency_total_localtax1
     */
    public function getMulticurrencyTotalLocaltax1(): ?float
    {
        return $this->multicurrency_total_localtax1;
    }

    /**
     * Set the value of multicurrency_total_localtax1
     */
    public function setMulticurrencyTotalLocaltax1(?float $multicurrency_total_localtax1): self
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
    public function getMulticurrencyTx(): ?float
    {
        return $this->multicurrency_tx;
    }

    /**
     * Set the value of multicurrency_tx
     */
    public function setMulticurrencyTx(?float $multicurrency_tx): self
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
    public function getFkMulticurrency(): ?int
    {
        return $this->fk_multicurrency;
    }

    /**
     * Set the value of fk_multicurrency
     */
    public function setFkMulticurrency(?int $fk_multicurrency): self
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
     * Get the value of barcode_type_coder
     */
    public function getBarcodeTypeCoder(): ?string
    {
        return $this->barcode_type_coder;
    }

    /**
     * Set the value of barcode_type_coder
     */
    public function setBarcodeTypeCoder(?string $barcode_type_coder): self
    {
        $this->barcode_type_coder = $barcode_type_coder;

        return $this;
    }

    /**
     * Get the value of barcode_type
     */
    public function getBarcodeType(): ?string
    {
        return $this->barcode_type;
    }

    /**
     * Set the value of barcode_type
     */
    public function setBarcodeType(?string $barcode_type): self
    {
        $this->barcode_type = $barcode_type;

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
}
