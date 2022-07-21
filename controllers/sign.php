<?php 

require_once('models/Sign.php');

function signUp()
{
    require_once('views/connection/signup.php');
}

function newSignUp()
{
    try
    {
        if(isset($_POST['mail']))
        {
            $mail = '';
            $password = '';
            $vitalCard = '';
            $lastname = '';
            $firstname = '';
            $street = '';
            $zipCode = '';
            $city = '';
            $country = '';
            $phone = '';
            $idSociety = '';
            
            $newSignUp = new Sign($mail, $password, $vitalCard, $lastname, $firstname, $street, $zipCode, $city, $country, $phone, $idSociety);
            $newSignUp->newSignUp();
            header('Location:index.php?page=home');
        }
    }
    catch(Exception $e)
    {
        echo "Erreur lors de l'inscription : {$e}.";
    }

}

function signIn()
{
    require_once('views/connection/signin.php');
}

function forgotPassword()
{
    require_once('views/connection/forgotpassword.php');
}