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
    private ?string $email = null;
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
}
