<?php require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Urls.php" ?>
<nav>
    <ul id="nav">
        <li><a href="<?php echo $URL['accueil']?>">Accueil</a></li>
        <li><a href="<?php echo $URL['equipe']?>">Mon Equipe</a></li>
        <li><a href="<?php echo $URL['matchs']?>">Matchs</a></li>
        <li><a href="<?php echo $URL['results']?>">Résultats</a></li>
        <li><a href="<?php echo $URL['me']?>">Mon Profil</a></li>
    </ul>
    <ul id="logout">
        <li><a href="<?php echo $URL['logout']?>">Se Déconnecter</a></li>
    </ul>
</nav>