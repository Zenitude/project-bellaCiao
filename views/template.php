<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Conception et la maintenance de logiciel pour banque, assurances, gestion commerciale, administrations, transport maritime et aérien">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="publics/resources/images/logo.png">

    <link rel="stylesheet" href="publics/styles/main.css">

    <?php 
        switch($title)
        {
            case 'Accueil':
                $style = 'home';
                break;
            case 'Connexion':
                $style = 'forms';
                break;
            case 'Inscription':
                $style = 'forms';
                break;
            case 'Mot de passe oublié';
                $style = 'forms';
                break;
            case 'Gestion':
                $style = 'management';
                break;
            case 'Contact':
                $style = 'forms';
        }
    ?>
    
    <link rel="stylesheet" href="publics/styles/<?php echo $style; ?>.css">
    <link rel="stylesheet" href="publics/styles/mediaqueries.css">
    <title>Bella_Ciào | <?php echo $title ?></title>
</head>
<body>

    <?php require_once('views/widgets/header.php'); ?>
            
    <div class="container">

        <?php echo $content; ?>
    
    </div>

    <?php require_once('views/widgets/footer.php'); ?>

    <script src="publics/scripts/global.js"></script>
</body>
</html>