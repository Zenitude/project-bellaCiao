<header>

    <nav>

        <ul>
            <li><a href="index.php"><img src="publics/resources/images/logo.png" alt=""></a></li>
            <li><a href="index.php?page=home">Accueil</a></li>

            <?php if(!isset($_SESSION['nameUser'])): ?>
                <li><a href="index.php?page=signIn">Connexion</a></li>
            <?php else: ?>
                <li><a href="index.php?page=download">Téléchargement</a></li>
            <?php endif; ?>

            <li><a href="index.php?page=contact">Contact</a></li>
            
            <?php if(isset($_SESSION['nameUser']) && $_SESSION['typeUser'] == 'Admin'): ?>
                <li><a href="index.php?page=management">Gestion</a></li>
                <li><a href="index.php?action=disconnect">Déconnexion</a></li>
            <?php endif; ?>

        </ul>

        <div class="menuH">
            <div class="hamburger"></div>
            <div class="hamburger"></div>
            <div class="hamburger"></div>
        </div>

    </nav>


</header>