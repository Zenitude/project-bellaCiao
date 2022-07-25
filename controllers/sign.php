<?php 

require_once('models/Users.php');
require_once('models/Societies.php');

function signUpStart()
{
    require_once('views/connection/signup-start.php');
}

function signUpSociety()
{
    if(isset($_POST['nameSociety']))
    {
        /* */
        $nameSociety = empty($_POST['nameSociety']) ? null : htmlspecialchars(trim($_POST['nameSociety']));
        $mailSociety = empty($_POST['mailSociety']) ? null : htmlspecialchars(trim($_POST['mailSociety']));
        $phoneSociety = empty($_POST['phoneSociety']) ? null : htmlspecialchars(trim($_POST['phoneSociety']));
        $streetSociety = empty($_POST['streetSociety']) ? null : htmlspecialchars(trim($_POST['streetSociety']));
        $zipCodeSociety = empty($_POST['zipCodeSociety']) ? null : intval(htmlspecialchars(trim($_POST['zipCodeSociety'])));
        $citySociety = empty($_POST['citySociety']) ? null : htmlspecialchars(trim($_POST['citySociety']));
        $countrySociety = empty($_POST['countrySociety']) ? null : htmlspecialchars(trim($_POST['countrySociety']));

        if($zipCodeSociety != null && $mailSociety != null && $phoneSociety != null)
        {
            /* */
            $regexPhone = '#[0][1-9]([.]{1}[0-9]{2}){4}$#';
            $regexZipCode = '#([0-8][0-9]|[9][0-8]|[2][a-bA-B]{1})[0-9]{3}$#';
            $regexMail = '#[-.a-z0-9]+@+[-.a-z0-9]+[.]+([a-z]{2,3})$#';
            
            /* */
            $errorZipCodeSociety = preg_match_all($regexZipCode, $zipCodeSociety) == false ? '<p class="msgError">Le format du Code Postal n\'est pas valide</p>' : null;
            $errorMailSociety = preg_match_all($regexMail, $mailSociety) == false ? '<p class="msgError">L\'email n\'est pas valide</p>' : null;
            $errorPhoneSociety = preg_match_all($regexPhone, $phoneSociety) == false ? '<p class="msgError">Le format du téléphone n\'est pas valide</p>' : null;
        }
        
        if($errorZipCodeSociety == null && $errorMailSociety == null && $errorPhoneSociety == null)
        {
            $society = new Society;
            $society->setName($nameSociety);
            $society->setMail($mailSociety);
            $society->setPhone($phoneSociety);
            $society->setStreet($streetSociety);
            $society->setZipCode($zipCodeSociety);
            $society->setCity($citySociety);
            $society->setCountry($countrySociety);
            $society->verifAddress();
            $society->createSociety();
            //header('Location:index.php?page=signUp&action=signUp-user')
            
        }
        require_once('views/connection/signup-start.php');
    }
    require_once('views/connection/signup-start.php');

}

function signUpUser()
{

    require_once('views/connection/signup-end.php');
}

function signUpEnd()
{
    if(isset($_POST['idSociety']))
    {
        findSocietyById(intval($_POST['idSociety']));
    }
    require_once('views/connection/signup-end.php');
}

function findSocietyByName(string $name, string $mail, string $phone): int
{
    $findSocietyByName = new Society;
    $findSocietyByName->setName($name);
    $findSocietyByName->setMail($mail);
    $findSocietyByName->setPhone($phone);
    $findSocietyByName->findSocietyByName();
    $findSociety = $findSocietyByName['idSociety'];

    return $findSociety;
}

function findSocietyById(int $idSociety)
{
    $findSocietyById = new Society;
    $findSocietyById->setId($idSociety);
    $findSocietyById->findSocietyById();
    
    $nameSociety = $findSocietyById['nameSociety'];
    $mailSociety = $findSocietyById['mailSociety'];
    $phoneSociety = $findSocietyById['phoneSociety'];
    $addressSociety = $findSocietyById['streetSociety'].' '.$findSocietyById['zipCodeSociety'].' '.$findSocietyById['citySociety'].' '.$findSocietyById['countrySociety'];
}

function selectSociety(): void
{
    $selectSociety = new Society;
    $selectSociety->selectSociety();
}

function signIn()
{
    require_once('views/connection/signin.php');
}

function forgotPassword()
{
    require_once('views/connection/forgotpassword.php');
}