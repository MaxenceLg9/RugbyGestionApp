<div class="main div-column">
    <header class="header-section">
        <h1>Liste des matchs du <?php //=$_SESSION["equipe"]?></h1>
        <div class="add">
            <p class="color-red">Vous cherchez à ajouter un match?</p>
            <a href="/gerermatch.php?type=ajout&idMatch=0&csrf_token=<?php //= htmlspecialchars(hash_hmac("sha256","0" . $_SESSION['csrf_token'] . "ajout", $_SESSION['csrf_token'])) ?>" class="forms button add"><p>Ajouter un match</p></a>
        </div>
    </header>
    <article class="match-list article-card">

    </article>
</div>