<?php 
    $title = 'Accueil';
    ob_start();
?>

<div class="home">

    <p class='msgAccueil'>
        
        Bonjour, bienvenue sur le site de BellaCiào<?php if(isset($_SESSION['nameUser'])) { echo '<span>, '.$_SESSION['prenomUser'].'</span>';}?>.
    </p>
    
    <h1>Présentation</h1>
    
    <p class="presentation">

        Fondée en 1997, la société Bella_Ciào est spécialisée dans la conception et la maintenance de logiciel. Ses clients sont principalement dans le domaine de la banque, des assurances, de la gestion commerciale, dans le transport maritime, le transport aérien et les administrations. 
    
    </p>

</div>


<?php

    $content = ob_get_clean();
    require_once('views/template.php');