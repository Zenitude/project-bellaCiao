<?php 
    require_once('DataBase.php');

class Sign extends Database
{
    public function __construct(
        public string $mail, 
        public string $password, 
        public int $vitalCard = 0, 
        public string $lastname = '', 
        public string $firstname = '', 
        public string $street = '',
        public string $zipCode = '',
        public string $city = '',
        public string $country = '',
        public string $phone = '',
        public int $society = 0
    ){}

    public function newSignUp()
    {
        try
        {
            $requestVerifUser = 'SELECT * FROM users WHERE vitalCard = :vitalCard';
            $verifUser = $this->connectDb()->prepare($requestVerifUser);
            $verifUser->bindValue(':vitalCard', $this->vitalCard);
            $verifUser->execute();
            $user = $verifUser->fetch();

            if($user->rowCount() > 0)
            {
                return 'Un compte comportant ce numéro de carte vitale existe déjà !';
            }
            else
            {
                try
                {
                    $requestFindAddressUser = 'SELECT * FROM addressUsers WHERE streetUser = :street, AND zipCodeUser = :zipCode AND cityUser = :city';
                    $findAddressUser = $this->connectDb()->prepare($requestFindAddressUser);
                    $findAddressUser->bindValue(':street', $this->street);
                    $findAddressUser->bindValue(':zipCode', $this->zipCode);
                    $findAddressUser->bindValue(':city', $this->city);
                    $findAddressUser->execute();
                    $addressUser = $findAddressUser->fetch();
        
                    if($addressUser->rowCount() < 0)
                    {
                        $requestCreateAddressUser = 'INSERT INTO addressUsers(streetUser, zipCodeUser, cityUser, countryUser)
                                                     VALUES(:street, :zipCode, :city, :country)';

                        $createAddressUser = $this->connectDb()->prepare($requestCreateAddressUser);

                        $createAddressUser->bindValue(':street', $this->street);
                        $createAddressUser->bindValue(':zipCode', $this->zipCode);
                        $createAddressUser->bindValue(':city', $this->city);
                        $createAddressUser->bindValue(':country', $this->country);

                        $requestSelectLastAddressUser = 'SELECT idAddressUser FROM addressUsers ORDER BY idAddressUser DESC LIMIT 1';
                        $selectLastAddressUser = $this->connectDb()->prepare($requestSelectLastAddressUser);
                        $selectLastAddressUser->execute();
                        $lastAddressUser = $selectLastAddressUser->fetch();

                        $idAddress = $lastAddressUser['idAddressUser'];
                    }
                    else
                    {
                        $idAddress = $addressUser['idAddressUser'];
                    }
        
        
                    $requestCreateUser = 'INSERT INTO users(lastname, firstname, mail, phone, vitalCard, password, idAddressUser, idSociety) 
                                          VALUES (:lastname, :firstname, :mail, :phone, :vitalCard, :password, :idAddressUser, :idSociety)';
        
                    $createUser = $this->connectDb()->prepare($requestCreateUser);
        
                    $createUser->bindValue(':lastname', $this->lastname);
                    $createUser->bindValue(':firstname', $this->firstname);
                    $createUser->bindValue(':mail', $this->mail);
                    $createUser->bindValue(':phone', $this->phone);
                    $createUser->bindValue(':vitalCard', $this->vitalCard);
                    $createUser->bindValue(':password', $this->password);
                    $createUser->bindValue(':idAddressUser', $idAddress);
                    $createUser->bindValue(':idSociety', $this->society);
        
                    $createUser->execute();
                }
                catch(Exception $e)
                {
                    echo "Erreur inscription utilisateur : {$e}";
                }
            }

        
        }
        catch(Exception $e)
        {
            echo "Erreur vérification utilisateur : {$e}";
        }
        
    }

}

