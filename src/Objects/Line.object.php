<?php

namespace Tubconcept\DolibarrApiClient\Objects;

class Line
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
    private $origin_type = null;
    private $origin_id = null;
    private ?string $ref = null;
    private ?string $ref_ext = null;
    private $statut = null;
    private $status = null;
    private $state_id = null;
    private $region_id = null;
    private $demand_reason_id = null;
    private $transport_mode_id = null;
    private $shipping_method = null;
    private $multicurrency_tx = null;
    private ?float $multicurrency_total_ht = null;
    private ?float $multicurrency_total_tva = null;
    private $multicurrency_total_localtax1 = null;
    private $multicurrency_total_localtax2 = null;
    private ?float $multicurrency_total_ttc = null;
    private ?string $last_main_doc = null;
    private $fk_account = null;
    private ?float $total_ht = null;
    private ?float $total_tva = null;
    private ?float $total_localtax1 = null;
    private ?float $total_localtax2 = null;
    private ?float $total_ttc = null;
    private ?string $actiontypecode = null;
    private ?string $civility_code = null;
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
    private ?int $fk_user_creat = null;
    private ?int $fk_user_modif = null;
    private int $specimen = 0;
    private $totalpaid = null;
    private array $extraparams = [];
    private $product = null;
    private $cond_reglement_supplier_id = null;
    private $deposit_percent = null;
    private $retained_warranty_fk_cond_reglement = null;
    private $warehouse_id = null;
    private ?string $parent_element = null;
    private ?string $fk_parent_attribute = null;
    private ?int $rowid = null;
    private $fk_unit = null;
    private $date_debut_prevue = null;
    private $date_debut_reel = null;
    private $date_fin_prevue = null;
    private $date_fin_reel = null;
    private $weight = null;
    private $weight_units = null;
    private $length = null;
    private $length_units = null;
    private $width = null;
    private $width_units = null;
    private $height = null;
    private $height_units = null;
    private $surface = null;
    private $surface_units = null;
    private $volume = null;
    private $volume_units = null;
    private $multilangs = null;
    private ?string $product_type = null;
    private $fk_product = null;
    private ?string $desc = null;
    private ?string $description = null;
    private $product_ref = null;
    private $product_label = null;
    private $product_barcode = null;
    private $product_desc = null;
    private $fk_product_type = null;
    private ?float $qty = null;
    private $duree = null;
    private ?float $remise_percent = null;
    private ?string $info_bits = null;
    private ?string $special_code = null;
    private ?float $subprice = null;
    private ?float $subprice_ttc = null;
    private ?float $tva_tx = null;
    private ?float $multicurrency_subprice = null;
    private ?float $multicurrency_subprice_ttc = null;
    private $label = null;
    private $libelle = null;
    private $product_tosell = null;
    private $product_tobuy = null;
    private $product_tobatch = null;
    private ?float $price = null;
    private ?string $vat_src_code = null;
    private ?float $localtax1_tx = null;
    private ?float $localtax2_tx = null;
    private ?string $localtax1_type = null;
    private ?string $localtax2_type = null;
    private $fk_commande = null;
    private $commande_id = null;
    private $fk_parent_line = null;
    private $fk_facture = null;
    private $fk_remise_except = null;
    private ?int $rang = null;
    private $fk_fournprice = null;
    private ?float $pa_ht = null;
    private ?float $marge_tx = null;
    private ?float $marque_tx = null;
    private $remise = null;
    private $date_start = null;
    private $date_end = null;
    private $packaging = null;
    private ?string $line_id = null;
    private ?string $fk_elementdet = null;
    private ?string $origin_line_id = null;
    private $fk_parent = null;
    private ?string $element_type = null;
    private ?string $fk_origin = null;
    private ?string $fk_expedition = null;
    private ?float $qty_shipped = null;
    private array $detail_batch = [];
    private $detail_children = null;
    private array $details_entrepot = [];
    private ?float $qty_asked = null;
    private $stockable_product = null;


    // -------------------
    // Conversion en array
    // -------------------
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * Crée un objet OrderLine à partir d'une réponse API
     */
    public static function fromApiResponse(array|object $data): self
    {
        $line = new self();
        foreach ($data as $key => $value) {
            if (property_exists($line, $key)) {
                $line->$key = $value;
            }
        }
        return $line;
    }

    
    // -------------------
    // Getters / Setters
    // -------------------
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }
    public function getRef(): ?string { return $this->ref; }
    public function setRef(?string $ref): self { $this->ref = $ref; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $desc): self { $this->description = $desc; return $this; }
    public function getQty(): ?float { return $this->qty; }
    public function setQty(?float $qty): self { $this->qty = $qty; return $this; }
    public function getPrice(): ?float { return $this->price; }
    public function setPrice(?float $price): self { $this->price = $price; return $this; }
    public function getSubprice(): ?float { return $this->subprice; }
    public function setSubprice(?float $subprice): self { $this->subprice = $subprice; return $this; }
    

    /**
     * Get the value of packaging
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * Set the value of packaging
     */
    public function setPackaging($packaging): self
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * Get the value of date_end
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * Set the value of date_end
     */
    public function setDateEnd($date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    /**
     * Get the value of date_start
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * Set the value of date_start
     */
    public function setDateStart($date_start): self
    {
        $this->date_start = $date_start;

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
     * Get the value of marque_tx
     */
    public function getMarqueTx(): ?float
    {
        return $this->marque_tx;
    }

    /**
     * Set the value of marque_tx
     */
    public function setMarqueTx(?float $marque_tx): self
    {
        $this->marque_tx = $marque_tx;

        return $this;
    }

    /**
     * Get the value of marge_tx
     */
    public function getMargeTx(): ?float
    {
        return $this->marge_tx;
    }

    /**
     * Set the value of marge_tx
     */
    public function setMargeTx(?float $marge_tx): self
    {
        $this->marge_tx = $marge_tx;

        return $this;
    }

    /**
     * Get the value of pa_ht
     */
    public function getPaHt(): ?float
    {
        return $this->pa_ht;
    }

    /**
     * Set the value of pa_ht
     */
    public function setPaHt(?float $pa_ht): self
    {
        $this->pa_ht = $pa_ht;

        return $this;
    }

    /**
     * Get the value of fk_fournprice
     */
    public function getFkFournprice()
    {
        return $this->fk_fournprice;
    }

    /**
     * Set the value of fk_fournprice
     */
    public function setFkFournprice($fk_fournprice): self
    {
        $this->fk_fournprice = $fk_fournprice;

        return $this;
    }

    /**
     * Get the value of rang
     */
    public function getRang(): ?int
    {
        return $this->rang;
    }

    /**
     * Set the value of rang
     */
    public function setRang(?int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get the value of fk_remise_except
     */
    public function getFkRemiseExcept()
    {
        return $this->fk_remise_except;
    }

    /**
     * Set the value of fk_remise_except
     */
    public function setFkRemiseExcept($fk_remise_except): self
    {
        $this->fk_remise_except = $fk_remise_except;

        return $this;
    }

    /**
     * Get the value of fk_facture
     */
    public function getFkFacture()
    {
        return $this->fk_facture;
    }

    /**
     * Set the value of fk_facture
     */
    public function setFkFacture($fk_facture): self
    {
        $this->fk_facture = $fk_facture;

        return $this;
    }

    /**
     * Get the value of fk_parent_line
     */
    public function getFkParentLine()
    {
        return $this->fk_parent_line;
    }

    /**
     * Set the value of fk_parent_line
     */
    public function setFkParentLine($fk_parent_line): self
    {
        $this->fk_parent_line = $fk_parent_line;

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
     * Get the value of fk_commande
     */
    public function getFkCommande()
    {
        return $this->fk_commande;
    }

    /**
     * Set the value of fk_commande
     */
    public function setFkCommande($fk_commande): self
    {
        $this->fk_commande = $fk_commande;

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
     * Get the value of vat_src_code
     */
    public function getVatSrcCode(): ?string
    {
        return $this->vat_src_code;
    }

    /**
     * Set the value of vat_src_code
     */
    public function setVatSrcCode(?string $vat_src_code): self
    {
        $this->vat_src_code = $vat_src_code;

        return $this;
    }

    /**
     * Get the value of product_tobatch
     */
    public function getProductTobatch()
    {
        return $this->product_tobatch;
    }

    /**
     * Set the value of product_tobatch
     */
    public function setProductTobatch($product_tobatch): self
    {
        $this->product_tobatch = $product_tobatch;

        return $this;
    }

    /**
     * Get the value of product_tobuy
     */
    public function getProductTobuy()
    {
        return $this->product_tobuy;
    }

    /**
     * Set the value of product_tobuy
     */
    public function setProductTobuy($product_tobuy): self
    {
        $this->product_tobuy = $product_tobuy;

        return $this;
    }

    /**
     * Get the value of product_tosell
     */
    public function getProductTosell()
    {
        return $this->product_tosell;
    }

    /**
     * Set the value of product_tosell
     */
    public function setProductTosell($product_tosell): self
    {
        $this->product_tosell = $product_tosell;

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
     * Get the value of multicurrency_subprice_ttc
     */
    public function getMulticurrencySubpriceTtc(): ?float
    {
        return $this->multicurrency_subprice_ttc;
    }

    /**
     * Set the value of multicurrency_subprice_ttc
     */
    public function setMulticurrencySubpriceTtc(?float $multicurrency_subprice_ttc): self
    {
        $this->multicurrency_subprice_ttc = $multicurrency_subprice_ttc;

        return $this;
    }

    /**
     * Get the value of multicurrency_subprice
     */
    public function getMulticurrencySubprice(): ?float
    {
        return $this->multicurrency_subprice;
    }

    /**
     * Set the value of multicurrency_subprice
     */
    public function setMulticurrencySubprice(?float $multicurrency_subprice): self
    {
        $this->multicurrency_subprice = $multicurrency_subprice;

        return $this;
    }

    /**
     * Get the value of tva_tx
     */
    public function getTvaTx(): ?float
    {
        return $this->tva_tx;
    }

    /**
     * Set the value of tva_tx
     */
    public function setTvaTx(?float $tva_tx): self
    {
        $this->tva_tx = $tva_tx;

        return $this;
    }

    /**
     * Get the value of subprice_ttc
     */
    public function getSubpriceTtc(): ?float
    {
        return $this->subprice_ttc;
    }

    /**
     * Set the value of subprice_ttc
     */
    public function setSubpriceTtc(?float $subprice_ttc): self
    {
        $this->subprice_ttc = $subprice_ttc;

        return $this;
    }

    /**
     * Get the value of special_code
     */
    public function getSpecialCode(): ?string
    {
        return $this->special_code;
    }

    /**
     * Set the value of special_code
     */
    public function setSpecialCode(?string $special_code): self
    {
        $this->special_code = $special_code;

        return $this;
    }

    /**
     * Get the value of info_bits
     */
    public function getInfoBits(): ?string
    {
        return $this->info_bits;
    }

    /**
     * Set the value of info_bits
     */
    public function setInfoBits(?string $info_bits): self
    {
        $this->info_bits = $info_bits;

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
     * Get the value of duree
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     */
    public function setDuree($duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of fk_product_type
     */
    public function getFkProductType()
    {
        return $this->fk_product_type;
    }

    /**
     * Set the value of fk_product_type
     */
    public function setFkProductType($fk_product_type): self
    {
        $this->fk_product_type = $fk_product_type;

        return $this;
    }

    /**
     * Get the value of product_desc
     */
    public function getProductDesc()
    {
        return $this->product_desc;
    }

    /**
     * Set the value of product_desc
     */
    public function setProductDesc($product_desc): self
    {
        $this->product_desc = $product_desc;

        return $this;
    }

    /**
     * Get the value of product_barcode
     */
    public function getProductBarcode()
    {
        return $this->product_barcode;
    }

    /**
     * Set the value of product_barcode
     */
    public function setProductBarcode($product_barcode): self
    {
        $this->product_barcode = $product_barcode;

        return $this;
    }

    /**
     * Get the value of product_label
     */
    public function getProductLabel()
    {
        return $this->product_label;
    }

    /**
     * Set the value of product_label
     */
    public function setProductLabel($product_label): self
    {
        $this->product_label = $product_label;

        return $this;
    }

    /**
     * Get the value of product_ref
     */
    public function getProductRef()
    {
        return $this->product_ref;
    }

    /**
     * Set the value of product_ref
     */
    public function setProductRef($product_ref): self
    {
        $this->product_ref = $product_ref;

        return $this;
    }

    /**
     * Get the value of desc
     */
    public function getDesc(): ?string
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     */
    public function setDesc(?string $desc): self
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of fk_product
     */
    public function getFkProduct()
    {
        return $this->fk_product;
    }

    /**
     * Set the value of fk_product
     */
    public function setFkProduct($fk_product): self
    {
        $this->fk_product = $fk_product;

        return $this;
    }

    /**
     * Get the value of product_type
     */
    public function getProductType(): ?string
    {
        return $this->product_type;
    }

    /**
     * Set the value of product_type
     */
    public function setProductType(?string $product_type): self
    {
        $this->product_type = $product_type;

        return $this;
    }

    /**
     * Get the value of multilangs
     */
    public function getMultilangs()
    {
        return $this->multilangs;
    }

    /**
     * Set the value of multilangs
     */
    public function setMultilangs($multilangs): self
    {
        $this->multilangs = $multilangs;

        return $this;
    }

    /**
     * Get the value of volume_units
     */
    public function getVolumeUnits()
    {
        return $this->volume_units;
    }

    /**
     * Set the value of volume_units
     */
    public function setVolumeUnits($volume_units): self
    {
        $this->volume_units = $volume_units;

        return $this;
    }

    /**
     * Get the value of volume
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set the value of volume
     */
    public function setVolume($volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get the value of surface_units
     */
    public function getSurfaceUnits()
    {
        return $this->surface_units;
    }

    /**
     * Set the value of surface_units
     */
    public function setSurfaceUnits($surface_units): self
    {
        $this->surface_units = $surface_units;

        return $this;
    }

    /**
     * Get the value of surface
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set the value of surface
     */
    public function setSurface($surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get the value of height_units
     */
    public function getHeightUnits()
    {
        return $this->height_units;
    }

    /**
     * Set the value of height_units
     */
    public function setHeightUnits($height_units): self
    {
        $this->height_units = $height_units;

        return $this;
    }

    /**
     * Get the value of height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     */
    public function setHeight($height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the value of width_units
     */
    public function getWidthUnits()
    {
        return $this->width_units;
    }

    /**
     * Set the value of width_units
     */
    public function setWidthUnits($width_units): self
    {
        $this->width_units = $width_units;

        return $this;
    }

    /**
     * Get the value of width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     */
    public function setWidth($width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of length_units
     */
    public function getLengthUnits()
    {
        return $this->length_units;
    }

    /**
     * Set the value of length_units
     */
    public function setLengthUnits($length_units): self
    {
        $this->length_units = $length_units;

        return $this;
    }

    /**
     * Get the value of length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     */
    public function setLength($length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of weight_units
     */
    public function getWeightUnits()
    {
        return $this->weight_units;
    }

    /**
     * Set the value of weight_units
     */
    public function setWeightUnits($weight_units): self
    {
        $this->weight_units = $weight_units;

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
     * Get the value of date_fin_reel
     */
    public function getDateFinReel()
    {
        return $this->date_fin_reel;
    }

    /**
     * Set the value of date_fin_reel
     */
    public function setDateFinReel($date_fin_reel): self
    {
        $this->date_fin_reel = $date_fin_reel;

        return $this;
    }

    /**
     * Get the value of date_fin_prevue
     */
    public function getDateFinPrevue()
    {
        return $this->date_fin_prevue;
    }

    /**
     * Set the value of date_fin_prevue
     */
    public function setDateFinPrevue($date_fin_prevue): self
    {
        $this->date_fin_prevue = $date_fin_prevue;

        return $this;
    }

    /**
     * Get the value of date_debut_reel
     */
    public function getDateDebutReel()
    {
        return $this->date_debut_reel;
    }

    /**
     * Set the value of date_debut_reel
     */
    public function setDateDebutReel($date_debut_reel): self
    {
        $this->date_debut_reel = $date_debut_reel;

        return $this;
    }

    /**
     * Get the value of date_debut_prevue
     */
    public function getDateDebutPrevue()
    {
        return $this->date_debut_prevue;
    }

    /**
     * Set the value of date_debut_prevue
     */
    public function setDateDebutPrevue($date_debut_prevue): self
    {
        $this->date_debut_prevue = $date_debut_prevue;

        return $this;
    }

    /**
     * Get the value of fk_unit
     */
    public function getFkUnit()
    {
        return $this->fk_unit;
    }

    /**
     * Set the value of fk_unit
     */
    public function setFkUnit($fk_unit): self
    {
        $this->fk_unit = $fk_unit;

        return $this;
    }

    /**
     * Get the value of rowid
     */
    public function getRowid(): ?int
    {
        return $this->rowid;
    }

    /**
     * Set the value of rowid
     */
    public function setRowid(?int $rowid): self
    {
        $this->rowid = $rowid;

        return $this;
    }

    /**
     * Get the value of fk_parent_attribute
     */
    public function getFkParentAttribute(): ?string
    {
        return $this->fk_parent_attribute;
    }

    /**
     * Set the value of fk_parent_attribute
     */
    public function setFkParentAttribute(?string $fk_parent_attribute): self
    {
        $this->fk_parent_attribute = $fk_parent_attribute;

        return $this;
    }

    /**
     * Get the value of parent_element
     */
    public function getParentElement(): ?string
    {
        return $this->parent_element;
    }

    /**
     * Set the value of parent_element
     */
    public function setParentElement(?string $parent_element): self
    {
        $this->parent_element = $parent_element;

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
     * Get the value of line_id
     */
    public function getLineId(): ?string
    {
        return $this->line_id;
    }

    /**
     * Set the value of line_id
     */
    public function setLineId(?string $line_id): self
    {
        $this->line_id = $line_id;

        return $this;
    }

    /**
     * Get the value of fk_elementdet
     */
    public function getFkElementdet(): ?string
    {
        return $this->fk_elementdet;
    }

    /**
     * Set the value of fk_elementdet
     */
    public function setFkElementdet(?string $fk_elementdet): self
    {
        $this->fk_elementdet = $fk_elementdet;

        return $this;
    }

    /**
     * Get the value of origin_line_id
     */
    public function getOriginLineId(): ?string
    {
        return $this->origin_line_id;
    }

    /**
     * Set the value of origin_line_id
     */
    public function setOriginLineId(?string $origin_line_id): self
    {
        $this->origin_line_id = $origin_line_id;

        return $this;
    }

    /**
     * Get the value of fk_parent
     */
    public function getFkParent()
    {
        return $this->fk_parent;
    }

    /**
     * Set the value of fk_parent
     */
    public function setFkParent($fk_parent): self
    {
        $this->fk_parent = $fk_parent;

        return $this;
    }

    /**
     * Get the value of element_type
     */
    public function getElementType(): ?string
    {
        return $this->element_type;
    }

    /**
     * Set the value of element_type
     */
    public function setElementType(?string $element_type): self
    {
        $this->element_type = $element_type;

        return $this;
    }

    /**
     * Get the value of fk_origin
     */
    public function getFkOrigin(): ?string
    {
        return $this->fk_origin;
    }

    /**
     * Set the value of fk_origin
     */
    public function setFkOrigin(?string $fk_origin): self
    {
        $this->fk_origin = $fk_origin;

        return $this;
    }

    /**
     * Get the value of stockable_product
     */
    public function getStockableProduct()
    {
        return $this->stockable_product;
    }

    /**
     * Set the value of stockable_product
     */
    public function setStockableProduct($stockable_product): self
    {
        $this->stockable_product = $stockable_product;

        return $this;
    }

    /**
     * Get the value of fk_expedition
     */
    public function getFkExpedition(): ?string
    {
        return $this->fk_expedition;
    }

    /**
     * Set the value of fk_expedition
     */
    public function setFkExpedition(?string $fk_expedition): self
    {
        $this->fk_expedition = $fk_expedition;

        return $this;
    }

    /**
     * Get the value of qty_shipped
     */
    public function getQtyShipped(): ?float
    {
        return $this->qty_shipped;
    }

    /**
     * Set the value of qty_shipped
     */
    public function setQtyShipped(?float $qty_shipped): self
    {
        $this->qty_shipped = $qty_shipped;

        return $this;
    }

    /**
     * Get the value of detail_batch
     */
    public function getDetailBatch(): array
    {
        return $this->detail_batch;
    }

    /**
     * Set the value of detail_batch
     */
    public function setDetailBatch(array $detail_batch): self
    {
        $this->detail_batch = $detail_batch;

        return $this;
    }

    /**
     * Get the value of detail_children
     */
    public function getDetailChildren()
    {
        return $this->detail_children;
    }

    /**
     * Set the value of detail_children
     */
    public function setDetailChildren($detail_children): self
    {
        $this->detail_children = $detail_children;

        return $this;
    }

    /**
     * Get the value of details_entrepot
     */
    public function getDetailsEntrepot(): array
    {
        return $this->details_entrepot;
    }

    /**
     * Set the value of details_entrepot
     */
    public function setDetailsEntrepot(array $details_entrepot): self
    {
        $this->details_entrepot = $details_entrepot;

        return $this;
    }

    /**
     * Get the value of qty_asked
     */
    public function getQtyAsked(): ?float
    {
        return $this->qty_asked;
    }

    /**
     * Set the value of qty_asked
     */
    public function setQtyAsked(?float $qty_asked): self
    {
        $this->qty_asked = $qty_asked;

        return $this;
    }
}
