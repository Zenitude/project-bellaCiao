<?php 
    if(isset($_SESSION['nameUser'])) { header('Location:index.php?page=home'); }
    $title = 'Inscription';
    ob_start();
?>

<div class="connection">

    <?php if((isset($_POST['selectSociety']) && $_POST['selectSociety'] == 0) || $errorZipCodeSociety != null || $errorMailSociety != null || $errorPhoneSociety != null): ?>

        <h1>Inscrivez votre société</h1>

        <form action="index.php?page=signUp&action=signUp-society" method="post" 
            <?php 
                if($errorPhoneSociety != null && $errorMailSociety != null){echo 'class="signer"';}
                elseif($errorPhoneSociety != null && $errorZipCodeSociety != null){echo 'class="signer"';}
                elseif($errorZipCodeSociety != null && $errorMailSociety != null){echo 'class="signer"';}
            ?>
        >

            <div>
                <label for="nameSociety">Raison sociale</label>
                <input type="text" name="nameSociety" id="nameSociety" value="<?php if(isset($_POST['nameSociety'])) { echo $_POST['nameSociety'];} ?>" required>
            </div>

            <div>
                <label for="mailSociety">E-mail de la société</label>
                <input type="mail" name="mailSociety" id="mailSociety" placeholder="example@mail.com" value="<?php if(isset($_POST['mailSociety'])) { echo $_POST['mailSociety'];} ?>" required>
                <?php if($errorMailSociety != null) { echo $errorMailSociety; } ?>
            </div>

            <div>
                <label for="phoneSociety">Téléphone de la société</label>
                <input type="text" name="phoneSociety" id="phoneSociety" maxlength="14" placeholder="01.00.00.00.00" value="<?php if(isset($_POST['phoneSociety'])) { echo $_POST['phoneSociety'];} ?>" required>
                <?php if($errorPhoneSociety != null) { echo $errorPhoneSociety; } ?>
            </div>
            
            <div>
                <label for="streetSociety">Numéro et Nom de voie</label>
                <input type="text" name="streetSociety" id="streetSociety" placeholder="Adresse - Numéro et nom de voie " value="<?php if(isset($_POST['streetSociety'])) { echo $_POST['streetSociety'];} ?>" required>
            </div>

            <div>
                <label for="zipCodeSociety">Code Postal</label>
                <input type="text" name="zipCodeSociety" id="zipCodeSociety" maxlength="5" placeholder="Code postaux métropolitains, doms-toms, Corses" value="<?php if(isset($_POST['zipCodeSociety'])) { echo $_POST['zipCodeSociety'];} ?>" required>
                <?php if($errorZipCodeSociety != null) { echo $errorZipCodeSociety; } ?>
            </div>

            <div>
                <label for="citySociety">Ville</label>
                <input type="text" name="citySociety" id="citySociety" value="<?php if(isset($_POST['citySociety'])) { echo $_POST['citySociety'];} ?>" required>
            </div>

            <div>
                <label for="countrySociety">Pays</label>
                <input type="text" name="countrySociety" id="countrySociety" value="<?php if(isset($_POST['countrySociety'])) { echo $_POST['countrySociety'];} ?>" required>
            </div>

            <button>Continuer</button>

        </form>

    <?php elseif((isset($_POST['selectSociety']) && $_POST['selectSociety'] != 0)): header('Location:index.php?page=signUp&action=signUp-user'); ?>

    <?php else: ?>

        <h1>Votre société est-elle déjà inscrite ?</h1>

        <form action="index.php?page=signUp&action=signUp-society" method="post">
            <div>
                <label for="selectSociety">Sélectionnez une société</label>
                <select name="selectSociety" id="selectSociety">
                    <option value="0">Autre - Société non listé</option>
                    <?php echo selectSociety(); ?>
                </select>
            </div>

            <button>Continuer</button>
        </form>

    <?php endif; ?>
         
</div>

<?php

    $content = ob_get_clean();
    require_once('views/template.php');