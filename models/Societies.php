<?php 
    require_once('DataBase.php');

class Society extends Database
{
    private int $id;
    private string $name;
    private string $mail;
    private string $phone;
    private string $street;
    private int $zipCode;
    private string $city;
    private string $country;
    private int $idAddress;

    /* Setter */
    public function setId(int $idSociety): void
    {
        $this->id = $idSociety;
    }

    public function setName(string $nameSociety): void
    {
        $this->name = $nameSociety;
    }

    public function setMail(string $mailSociety): void
    {
        $this->mail = $mailSociety;
    }

    public function setPhone(string $phoneSociety): void
    {
        $this->phone = $phoneSociety;
    }

    public function setStreet(string $streetSociety): void
    {
        $this->street = $streetSociety;
    }

    public function setZipCode(int $zipCodeSociety): void
    {
        $this->zipCode = $zipCodeSociety;
    }

    public function setCity(string $citySociety): void
    {
        $this->city = $citySociety;
    }

    public function setCountry(string $countrySociety): void
    {
        $this->country = $countrySociety;
    }

    public function setIdAddress(int $idAddressSociety): void
    {
        $this->idAddress = $idAddressSociety;
    }

    /* Getter */
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getZipCode(): int
    {
        return $this->zipCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getIdAddress(): int
    {
        return $this->idAddress;
    }

    /* Verification if address exist */
    public function verifAddress(): void
    {
        try
        {
            /* */
            $requestVerifAddressSociety = 'SELECT * FROM addresssocieties WHERE streetSociety = :street AND zipCodeSociety = :zipCode AND citySociety = :city';
            $verifAddressSociety = $this->connectDb()->prepare($requestVerifAddressSociety);
            $verifAddressSociety->bindValue(':street', $this->getStreet());
            $verifAddressSociety->bindValue(':zipCode', $this->getZipCode());
            $verifAddressSociety->bindValue(':city', $this->getCity());
            $verifAddressSociety->execute();
            $addressSociety = $verifAddressSociety->fetch();

            if(count($addressSociety) == 0)
            {
                try
                {
                    /* */
                    $requestCreateAddressSociety = 'INSERT INTO addresssocieties(streetSociety, zipCodeSociety, citySociety, countrySociety)
                                                    VALUES (:street, :zipCode, :city, :country)';
                    $createAddressSociety = $this->connectDb()->prepare($requestCreateAddressSociety);
                    $createAddressSociety->bindValue(':street', $this->getStreet());
                    $createAddressSociety->bindValue(':zipCode', $this->getZipCode());
                    $createAddressSociety->bindValue(':city', $this->getCity());
                    $createAddressSociety->bindValue(':country', $this->getCountry());
                    $createAddressSociety->execute();
                    
                    try
                    {
                        /* */
                        $requestFindLastAdressSociety = 'SELECT idAddressSociety FROM addresssocieties ORDER BY idAddressSociety DESC LIMIT 1';
                        $findLastAddressSociety = $this->connectDb()->prepare($requestFindLastAdressSociety);
                        $findLastAddressSociety->execute();
                        $lastAddressSociety = $findLastAddressSociety->fetchAll();
                        
                        if(count($lastAddressSociety) == 1)
                        {
                            $this->setIdAddress(intval($lastAddressSociety['idAddressSociety']));
                        }
                    }
                    catch(Exception $e)
                    {
                        echo 'Error find Last Address Society : '.$e;
                    }
                }
                catch(Exception $e)
                {
                    echo 'Error create Address Society : '.$e;
                }
            }
            else
            {
                /*  */
                $this->setIdAddress(intval($addressSociety['idAddressSociety']));
            }
        }
        catch(Exception $e)
        {
            echo 'Error verif Address Society : '.$e;
        }
    }

    /* Select Society for SignUp */
    public function selectSociety(): void
    {
        $requestSelectSocieties = 'SELECT * FROM societies 
                                   JOIN addresssocieties ON addresssocieties.idAddressSociety = societies.idAddressS
                                   ORDER BY countrySociety, citySociety, zipCodeSociety, nameSociety';
        $selectSocieties = $this->connectDb()->prepare($requestSelectSocieties);
        $selectSocieties->execute();
        $societies = $selectSocieties->fetchAll();
        $countSocieties = $selectSocieties->rowCount();

        if($countSocieties > 0)
        {
            foreach($societies as $society)
            {
                echo '<option value="'.$society['idSociety'].'">'.$society['nameSociety'].' - ('.$society['zipCodeSociety'].' '.$society['citySociety'].' '.$society['countrySociety'].')</option>';
            }
        }
        else
        {
            echo '<option value="0">Autre</option>';
        }
    }

    /* Create Society */
    public function createSociety()
    {
        
        try
        {
            $requestCreateSociety = 'INSERT INTO societies(nameSociety, mailSociety, phoneSociety, idAddressS)
                                     VALUES(:nameSociety, :mailSociety, :phoneSociety, :idAddress)';
            $createSociety = $this->connectDb()->prepare($requestCreateSociety);
            $createSociety->bindValue(':nameSociety', $this->getName());
            $createSociety->bindValue(':mailSociety', $this->getMail());
            $createSociety->bindValue(':phoneSociety', $this->getPhone());
            $createSociety->bindValue(':idAddress', $this->getIdAddress());
            $createSociety->execute();
        }
        catch(Exception $e)
        {
            echo 'Error create society : '.$e;
        }

    }

    /* Find Informations Society by Name, Mail and Phone */
    public function findSocietyByName(): mixed
    {
        try
        {
            $requestFindSociety = 'SELECT * FROM societies WHERE nameSociety = :nameSociety, mailSociety = :mailSociety, phoneSociety = :phoneSociety';
            $findSociety = $this->connectDb()->prepare($requestFindSociety);
            $findSociety->bindValue(':nameSociety', $this->getName());
            $findSociety->bindValue(':mailSociety', $this->getMail());
            $findSociety->bindValue(':phoneSociety', $this->getPhone());
            $findSociety->execute();
            $society = $findSociety->fetch();

            return $society;
        }
        catch(Exception $e)
        {
            echo 'Error find Last Society : '.$e;
        }
    }

    /* Find Informations Society by Id */
    public function findSocietyById()
    {
        try
        {
            $requestFinSocietyById = 'SELECT * FROM societies WHERE idSociety = :id
                                      JOIN addresssocieties ON addresssocieties.idAddressSociety = societies.idAddressS';
            $findSocietyById = $this->connectDb()->prepare($requestFinSocietyById);
            $findSocietyById->bindValue(':id', $this->getId());
            $findSocietyById->execute();
            $society = $findSocietyById->fetch();

            return $society;

        }
        catch(Exception $e)
        {
            echo 'Error find society by id : '.$e;
        }
    }

}

?>