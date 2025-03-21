<div class="main div-column">
    <header class="header-section">
        <h1>Votre équipe :
<!--            --><?php //= $_SESSION["equipe"]?>
        </h1>
        <div class="add">
            <p class="color-red">Vous cherchez à ajouter un joueur?</p>
            <a href="/gererjoueur.php?type=ajout&idJoueur=0&csrf_token=<?php //= htmlspecialchars(hash_hmac("sha256","0" . $_SESSION['csrf_token'] . "ajout", $_SESSION['csrf_token'])) ?>" class="forms button add"><p>Ajouter un joueur</p></a>
        </div>
    </header>
    <article class="team-list article-card">
    </article>
</div>
