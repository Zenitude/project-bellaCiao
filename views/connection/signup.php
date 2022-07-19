<?php 
    $title = 'Inscription';

    ob_start();
?>

<div class="connection">

    <h1>Inscrivez-vous</h1>

    <form action="index.php?page=connection&action=sign" method="post">
        <div>
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname">
        </div>

        <div>
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname">
        </div>

        <div>
            <label for="mail">E-mail</label>
            <input type="mail" name="mail" id="mail" placeholder="example@mail.com">
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="confirmPassword">Confirmer Mot de passe</label>
            <input type="password" name="confirmPassword" id="confirmPassword">
        </div>

        <button>S'inscrire</button>
    </form>

    <div class="signOr">
        <p>
            <span></span> ou <span></span>
        </p>
        <a href="index.php?page=signIn" class="signer">Déjà inscrit ?</a>    
    </div>  
    
        
</div>

<?php

    $content = ob_get_clean();

    require_once('views/template.php');