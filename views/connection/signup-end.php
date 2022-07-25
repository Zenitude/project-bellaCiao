<?php 
    if(isset($_SESSION['nameUser'])) { header('Location:index.php?page=home'); }
    $title = 'Inscription';
    ob_start();
?>

<?php if(isset($_POST['lastname'])): ?>

<h1>Terminez votre inscription</h1>

<section>
    <h2>Informations personnelles</h2>
    <ul>
        <li><span>Nom : </span><?php echo $_POST['lastname']; ?></li>
        <li><span>Prénom : </span><?php echo $_POST['firstname']; ?></li>
        <li><span>E-mail : </span><?php echo $_POST['mailUser']; ?></li>
        <li><span>Téléphone : </span><?php echo $_POST['phoneUser']; ?></li>
        <li><span>Carte vitale : </span><?php echo $_POST['vitalCard']; ?></li>
        <li><span>Adresse : </span><?php echo $_POST['streetUser'].' '.$_POST['zipCodeUser'].' '.$_POST['cityUser'].' en '.$_POST['countryUser']; ?></li>
    </ul>
</section>

<section>
    <h2>Informations sur votre société</h2>
    <ul>
        <li><span>Raison sociale : </span><?php echo $nameSociety; ?></li>
        <li><span>E-mail : </span><?php echo $mailSociety; ?></li>
        <li><span>Téléphone : </span><?php echo $phoneSociety; ?></li>
        <li><span>Adresse : </span><?php echo $addressSociety; ?></li>
    </ul>
</section>

<?php else: ?>

    <h1>Inscrivez-vous</h1>

    <form action="index.php?page=signUp&action=signUp-user" method="post" class="signer">

        <div>
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname">
        </div>

        <div>
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname">
        </div>

        <div>
            <label for="vitalCard">Numéro de carte vitale</label>
            <input type="text" name="vitalCard" id="vitalCard">
        </div>

        <div>
            <label for="mailUser">E-mail</label>
            <input type="mail" name="mailUser" id="mailUser" placeholder="example@mail.com">
        </div>

        <div>
            <label for="phoneUser">Téléphone</label>
            <input type="text" name="phoneUser" id="phoneUser" maxlength="14" placeholder="01.00.00.00.00">
        </div>

        <div>
            <label for="streetUser">Numéro et Nom de Voie</label>
            <input type="text" name="streetUser" id="streetUser" placeholder="Adresse - Numéro et nom de voie">
        </div>

        <div>
            <label for="zipCodeUser">Code Postal</label>
            <input type="text" name="zipCodeUser" id="zipCodeUser" maxlength="5" placeholder="Code postaux métropolitains, doms-toms, Corses">
        </div>

        <div>
            <label for="cityUser">Ville</label>
            <input type="text" name="cityUser" id="cityUser">
        </div>

        <div>
            <label for="countryUser">Pays</label>
            <input type="text" name="countryUser" id="countryUser">
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        
        <div>
            <label for="confirmPassword">Confirmer Mot de passe</label>
            <input type="password" name="confirmPassword" id="confirmPassword">
        </div>

        <div class="hiddenInput">
            <label for="idSocietyUser">Société</label>
            <input type="text" name="idSocietyUser" id="idSocietyUser" 
                value="<?php 
                    if(isset($_POST['idSociety'])){echo $_POST['idSociety'];}
                    elseif(isset($_POST['nameSociety'])){ findSocietyByName($_POST['nameSociety'], $_POST['mailSociety'], $_POST['phoneSociety']); }

            ?>">
        </div>

        <button>Continuer</button>
    </form>

<?php 
    endif; 
    $content = ob_get_clean();
    require_once('views/template.php');