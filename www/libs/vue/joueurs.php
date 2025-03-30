<div class="main">
    <header class="header-section">
        <h1>Votre équipe :
<!--            --><?php //= $_SESSION["equipe"]?>
        </h1>
        <div class="forms add">
            <p class="color-red">Vous cherchez à ajouter un joueur?</p>
            <a href="/gererjoueur.php?type=ajout&idJoueur=0" class="button add"><p>Ajouter un joueur</p></a>
        </div>
    </header>
    <article class="team-list article-card" id="joueurs">
    </article>
    <script src="/resources/js/equipe.js"></script>
</div>
