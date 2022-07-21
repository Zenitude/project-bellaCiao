<?php 
    $title = 'Contact';
    ob_start();
?>

<div class="connection">
    <?php if(isset($success)) { echo $success; } ?>

    <h1>Contactez-moi</h1>

    <form action="index.php?page=contact&action=send" method="post">
        <div>
            <label for="mail">E-mail</label>
            <input type="mail" name="mail" id="mail" placeholder="example@mail.com" 
                value="<?php 
                    if(isset($_POST['mail'])){echo $_POST['mail'];}
                    elseif(isset($_SEESION['mailUser'])){echo $_SESSION['mailUser'];}
                ?>">
        </div>

        <div>
            <label for="message">Message</label>
            <textarea name="message" id="message"><?php if(isset($_POST['message'])){ echo $_POST['message'];} ?></textarea>
        </div>

        <button>Envoyer</button>
    </form>
        
</div>

<?php
    $content = ob_get_clean();
    require_once('views/template.php');