<?php 
    $title = 'Connexion';

    ob_start();
?>

<div class="connection">

    <h1>Connectez-vous</h1>

    <form action="index.php?page=connection&action=login" method="post">
        <div>
            <label for="mail">E-mail</label>
            <input type="mail" name="mail" id="mail" placeholder="example@mail.com">
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <a href="index.php?page=forgotPassword" class="forgotPassword">Mot de passe oublié ?</a>
        </div>

        <button>Se connecter</button>
    </form>

    <div class="signOr">
        <p>
            <span></span> ou <span></span>
        </p>
        <a href="index.php?page=signUp">S'inscire</a>    
    </div>
        
</div>

<?php

    $content = ob_get_clean();

    require_once('views/template.php');