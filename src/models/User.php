<?php

enum Type
{
    case ADMINISTRATOR;
    case OWNER;
    case TENANT;
}

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $passwordHash;
    private string $phoneNumber;
    private ?string $aadhaar;
    private ?string $eb;
    private ?string $shopName;
    private ?string $address;
    private Type $type;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setPasswordHash(string $passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setAadhaar(string $aadhaar)
    {
        $this->aadhaar = $aadhaar;
    }

    public function getAadhaar(): ?string
    {
        return $this->aadhaar;
    }

    public function setEB(string $eb)
    {
        $this->eb = $eb;
    }

    public function getEB(): ?string
    {
        return $this->eb;
    }

    public function setShopName(string $shopName)
    {
        $this->shopName = $shopName;
    }

    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setType(Type $type)
    {
        $this->type = $type;
    }

    public function getType(): Type
    {
        return $this->type;
    }
}

?>
