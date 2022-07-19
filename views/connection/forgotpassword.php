<?php 
    $title = 'Mot de passe oublié';

    ob_start();
?>

<div class="connection">

    <h1>Récupération de mot de passe</h1>

    <form action="index.php?page=connection&action=resetpassword" method="post">
        <div>
            <label for="mail">E-mail</label>
            <input type="mail" name="mail" id="mail" placeholder="example@mail.com">
        </div>

        <button>Recevoir un nouveau mot de passe</button>
    </form>

    <div class="signOr">
        <p>
            <span></span> ou <span></span>
        </p>
        <a href="index.php?page=signIn">Se connecter</a>    
    </div>  
        
</div>

<?php

    $content = ob_get_clean();

    require_once('views/template.php');