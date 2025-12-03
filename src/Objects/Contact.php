<?php
namespace Tubconcept\DolibarrApiClient\Objects;

class Contact
{
    private ?string $parentId = null;
    private ?string $source = null;
    private ?string $socid = null;
    private ?string $id = null;
    private ?string $nom = null;
    private ?string $civility = null;
    private ?string $lastname = null;
    private ?string $firstname = null;
    private $civility_id = null;
    private ?string $civility_code = null;
    private ?int $date_creation = null;
    private $date_validation = null;
    private ?int $date_modification = null;
    private $tms = null;
    private $date_cloture = null;
    private $user_author = null;
    private $user_creation = null;
    private ?string $user_creation_id = null;
    private $user_valid = null;
    private $user_validation = null;
    private $user_validation_id = null;
    private $user_closing_id = null;
    private $user_modification = null;
    private ?string $user_modification_id = null;
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
    private ?string $email = null;
    private $birthday_alert = null;
    private $civilite = null;
    private $fullname = null;
    private string $name_alias = '';
    private ?string $address = null;
    private ?string $zip = null;
    private ?string $town = null;
    private ?string $country_id = null;
    private ?string $country = null;
    private ?string $login = null;
    private ?string $photo = null;
    private ?string $gender = null;
    private ?string $statuscontact = null;
    private ?string $rowid = null;
    private ?string $code = null;
    private ?string $libelle = null;
    private ?int $status = null;
    private ?string $fk_c_type_contact = null;

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
     * Build Contact from API response
     */
    public static function fromApiResponse(array|object $data): self
    {
        $c = new self();
        foreach ($data as $key => $value) {
            // direct match
            if (property_exists($c, $key)) {
                $c->$key = $value;
                continue;
            }
            // common mappings
            $map = [
                'parent_id' => 'parentId',
                'status_contact' => 'statuscontact',
                'fk_c_type_contact' => 'fk_c_type_contact',
            ];
            if (isset($map[$key]) && property_exists($c, $map[$key])) {
                $c->{$map[$key]} = $value;
            }
        }
        return $c;
    }

    // Common getters / setters
    public function getId(): ?string { return $this->id; }
    public function setId(?string $id): self { $this->id = $id; return $this; }

    public function getFirstname(): ?string { return $this->firstname; }
    public function setFirstname(?string $v): self { $this->firstname = $v; return $this; }

    public function getLastname(): ?string { return $this->lastname; }
    public function setLastname(?string $v): self { $this->lastname = $v; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $v): self { $this->email = $v; return $this; }

    public function getAddress(): ?string { return $this->address; }
    public function setAddress(?string $v): self { $this->address = $v; return $this; }

    public function getZip(): ?string { return $this->zip; }
    public function setZip(?string $v): self { $this->zip = $v; return $this; }

    public function getTown(): ?string { return $this->town; }
    public function setTown(?string $v): self { $this->town = $v; return $this; }

    public function getCountryId(): ?string { return $this->country_id; }
    public function setCountryId(?string $v): self { $this->country_id = $v; return $this; }

    public function getRowId(): ?string { return $this->rowid; }
    public function setRowId(?string $v): self { $this->rowid = $v; return $this; }

    public function getCode(): ?string { return $this->code; }
    public function setCode(?string $v): self { $this->code = $v; return $this; }

    public function getLibelle(): ?string { return $this->libelle; }
    public function setLibelle(?string $v): self { $this->libelle = $v; return $this; }

    public function getStatus(): ?int { return $this->status; }
    public function setStatus(?int $v): self { $this->status = $v; return $this; }

    public function getFkCTypeContact(): ?string { return $this->fk_c_type_contact; }
    public function setFkCTypeContact(?string $v): self { $this->fk_c_type_contact = $v; return $this; }


    /**
     * Get the value of statuscontact
     */
    public function getStatuscontact(): ?string
    {
        return $this->statuscontact;
    }

    /**
     * Set the value of statuscontact
     */
    public function setStatuscontact(?string $statuscontact): self
    {
        $this->statuscontact = $statuscontact;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     */
    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of login
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */
    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of country
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Set the value of country
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of civility
     */
    public function getCivility(): ?string
    {
        return $this->civility;
    }

    /**
     * Set the value of civility
     */
    public function setCivility(?string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of socid
     */
    public function getSocid(): ?string
    {
        return $this->socid;
    }

    /**
     * Set the value of socid
     */
    public function setSocid(?string $socid): self
    {
        $this->socid = $socid;

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
     * Get the value of parentId
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * Set the value of parentId
     */
    public function setParentId(?string $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get the value of name_alias
     */
    public function getNameAlias(): string
    {
        return $this->name_alias;
    }

    /**
     * Set the value of name_alias
     */
    public function setNameAlias(string $name_alias): self
    {
        $this->name_alias = $name_alias;

        return $this;
    }

    /**
     * Get the value of fullname
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set the value of fullname
     */
    public function setFullname($fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get the value of civilite
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set the value of civilite
     */
    public function setCivilite($civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get the value of birthday_alert
     */
    public function getBirthdayAlert()
    {
        return $this->birthday_alert;
    }

    /**
     * Set the value of birthday_alert
     */
    public function setBirthdayAlert($birthday_alert): self
    {
        $this->birthday_alert = $birthday_alert;

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
    public function getUserModificationId(): ?string
    {
        return $this->user_modification_id;
    }

    /**
     * Set the value of user_modification_id
     */
    public function setUserModificationId(?string $user_modification_id): self
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
    public function getUserCreationId(): ?string
    {
        return $this->user_creation_id;
    }

    /**
     * Set the value of user_creation_id
     */
    public function setUserCreationId(?string $user_creation_id): self
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
}
