<?php
namespace Tubconcept\DolibarrApiClient\Objects;

class Contact
{
    private $module = null;
    private ?string $id = null;
    private ?string $entity = null;
    private $import_key = null;
    private array $array_options = [];
    private $array_languages = null;
    private $contacts_ids = null;
    private $contacts_ids_internal = null;
    private $linkedObjectsIds = null;
    private $canvas = null;
    private $fk_project = null;
    private $contact_id = null;
    private $user = null;
    private $origin_type = null;
    private $origin_id = null;
    private ?string $ref = null;
    private $ref_ext = null;
    private ?string $statut = null;
    private $status = null;
    private ?string $country_id = null;
    private ?string $country_code = null;
    private $state_id = null;
    private $region_id = null;
    private $barcode_type = null;
    private $barcode_type_coder = null;
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
    private string $note_public = '';
    private string $note_private = '';
    private $actiontypecode = null;
    private $name = null;
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
    private ?string $civility = null;
    private $birthday_alert = null;
    private $civilite = null;
    private $fullname = null;
    private string $name_alias = '';
    private ?string $address = null;
    private ?string $zip = null;
    private ?string $town = null;
    private string $poste = '';
    private ?string $socid = null;
    private ?string $fk_soc = null;
    private $socname = null;
    private ?string $code = null;
    private ?string $email = null;
    private ?string $mail = null;
    private $url = null;
    private $no_email = null;
    private array $socialnetworks = [];
    private ?string $photo = null;
    private ?string $phone_pro = null;
    private $phone_perso = null;
    private $phone_mobile = null;
    private $fax = null;
    private ?string $priv = null;
    private $birthday = null;
    private $default_lang = null;
    private $ref_facturation = null;
    private $ref_contrat = null;
    private $ref_commande = null;
    private $ref_propal = null;
    private $user_id = null;
    private $user_login = null;
    private $ip = null;
    private $roles = null;
    private array $cacheprospectstatus = [];
    private ?string $fk_prospectlevel = null;
    private ?string $stcomm_id = null;
    private $statut_commercial = null;
    private $stcomm_picto = null;

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

    public function getCode(): ?string { return $this->code; }
    public function setCode(?string $v): self { $this->code = $v; return $this; }


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
     * Get the value of phone_pro
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
     * Get the value of statut_commercial
     */
    public function getStatutCommercial()
    {
        return $this->statut_commercial;
    }

    /**
     * Set the value of statut_commercial
     */
    public function setStatutCommercial($statut_commercial): self
    {
        $this->statut_commercial = $statut_commercial;

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
     * Get the value of fk_prospectlevel
     */
    public function getFkProspectlevel(): ?string
    {
        return $this->fk_prospectlevel;
    }

    /**
     * Set the value of fk_prospectlevel
     */
    public function setFkProspectlevel(?string $fk_prospectlevel): self
    {
        $this->fk_prospectlevel = $fk_prospectlevel;

        return $this;
    }

    /**
     * Get the value of cacheprospectstatus
     */
    public function getCacheprospectstatus(): array
    {
        return $this->cacheprospectstatus;
    }

    /**
     * Set the value of cacheprospectstatus
     */
    public function setCacheprospectstatus(array $cacheprospectstatus): self
    {
        $this->cacheprospectstatus = $cacheprospectstatus;

        return $this;
    }

    /**
     * Get the value of roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     */
    public function setRoles($roles): self
    {
        $this->roles = $roles;

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
     * Get the value of user_login
     */
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * Set the value of user_login
     */
    public function setUserLogin($user_login): self
    {
        $this->user_login = $user_login;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of ref_propal
     */
    public function getRefPropal()
    {
        return $this->ref_propal;
    }

    /**
     * Set the value of ref_propal
     */
    public function setRefPropal($ref_propal): self
    {
        $this->ref_propal = $ref_propal;

        return $this;
    }

    /**
     * Get the value of ref_commande
     */
    public function getRefCommande()
    {
        return $this->ref_commande;
    }

    /**
     * Set the value of ref_commande
     */
    public function setRefCommande($ref_commande): self
    {
        $this->ref_commande = $ref_commande;

        return $this;
    }

    /**
     * Get the value of ref_contrat
     */
    public function getRefContrat()
    {
        return $this->ref_contrat;
    }

    /**
     * Set the value of ref_contrat
     */
    public function setRefContrat($ref_contrat): self
    {
        $this->ref_contrat = $ref_contrat;

        return $this;
    }

    /**
     * Get the value of ref_facturation
     */
    public function getRefFacturation()
    {
        return $this->ref_facturation;
    }

    /**
     * Set the value of ref_facturation
     */
    public function setRefFacturation($ref_facturation): self
    {
        $this->ref_facturation = $ref_facturation;

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
     * Get the value of birthday
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     */
    public function setBirthday($birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of priv
     */
    public function getPriv(): ?string
    {
        return $this->priv;
    }

    /**
     * Set the value of priv
     */
    public function setPriv(?string $priv): self
    {
        $this->priv = $priv;

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
     * Get the value of phone_perso
     */
    public function getPhonePerso()
    {
        return $this->phone_perso;
    }

    /**
     * Set the value of phone_perso
     */
    public function setPhonePerso($phone_perso): self
    {
        $this->phone_perso = $phone_perso;

        return $this;
    }

    /**
     * Get the value of phone_pro
     */
    public function getPhonePro(): ?string
    {
        return $this->phone_pro;
    }

    /**
     * Set the value of phone_pro
     */
    public function setPhonePro(?string $phone_pro): self
    {
        $this->phone_pro = $phone_pro;

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
     * Get the value of mail
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of socname
     */
    public function getSocname()
    {
        return $this->socname;
    }

    /**
     * Set the value of socname
     */
    public function setSocname($socname): self
    {
        $this->socname = $socname;

        return $this;
    }

    /**
     * Get the value of fk_soc
     */
    public function getFkSoc(): ?string
    {
        return $this->fk_soc;
    }

    /**
     * Set the value of fk_soc
     */
    public function setFkSoc(?string $fk_soc): self
    {
        $this->fk_soc = $fk_soc;

        return $this;
    }

    /**
     * Get the value of poste
     */
    public function getPoste(): string
    {
        return $this->poste;
    }

    /**
     * Set the value of poste
     */
    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

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
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut(?string $statut): self
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
    public function getCanvas()
    {
        return $this->canvas;
    }

    /**
     * Set the value of canvas
     */
    public function setCanvas($canvas): self
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
    public function getImportKey()
    {
        return $this->import_key;
    }

    /**
     * Set the value of import_key
     */
    public function setImportKey($import_key): self
    {
        $this->import_key = $import_key;

        return $this;
    }

    /**
     * Get the value of entity
     */
    public function getEntity(): ?string
    {
        return $this->entity;
    }

    /**
     * Set the value of entity
     */
    public function setEntity(?string $entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get the value of module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set the value of module
     */
    public function setModule($module): self
    {
        $this->module = $module;

        return $this;
    }
}
