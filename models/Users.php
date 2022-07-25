<?php 
    require_once('DataBase.php');

class Users extends Database
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private int $vitalCard;
    private string $mail;
    private string $phone;
    private string $street;
    private string $zipCode;
    private string $city;
    private string $country;
    private int $idSociety;
    private string $password; 
      
    /* Setter */
    public function setId(string $idUser): void
    {
        $this->id = $idUser;
    }

    public function setFirstname(string $firstnameUser): void
    {
        $this->firstname = $firstnameUser;
    }

    public function setLastname(string $lastnameUser): void
    {
        $this->lastname = $lastnameUser;
    }

    public function setVitalCard(string $vitalCardUser): void
    {
        $this->vitalCard = $vitalCardUser;
    }

    public function setMail(string $mailUser): void
    {
        $this->mail = $mailUser;
    }

    public function setPhone(string $phoneUser): void
    {
        $this->phone = $phoneUser;
    }

    public function setStreet(string $streetUser): void
    {
        $this->street = $streetUser;
    }

    public function setZipCode(string $zipCodeUser): void
    {
        $this->zipCode = $zipCodeUser;
    }

    public function setCity(string $cityUser): void
    {
        $this->city = $cityUser;
    }

    public function setCountry(string $countryUser): void
    {
        $this->country = $countryUser;
    }

    public function setIdSociety(int $idSocietyUser): void
    {
        $this->idSociety = $idSocietyUser;
    }

    public function setPassword(string $passwordUser): void
    {
        $this->password = $passwordUser;
    }

    /* Getter */
    protected function getId(): int
    {
        return $this->id;
    }

    protected function getFirstname(): string
    {
        return $this->firstname;
    }

    protected function getLastname(): string
    {
        return $this->lastname;
    }

    protected function getVitalCard(): string
    {
        return $this->vitalCard;
    }

    protected function getMail(): string
    {
        return $this->mail;
    }

    protected function getPhone(): string
    {
        return $this->phone;
    }

    protected function getStreet(): string
    {
        return $this->street;
    }

    protected function getZipCode(): string
    {
        return $this->zipCode;
    }

    protected function getCity(): string
    {
        return $this->city;
    }

    protected function getCountry(): string
    {
        return $this->country;
    }

    protected function getIdSociety(): int
    {
        return $this->idSociety;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

}

?>