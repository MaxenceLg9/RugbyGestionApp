<div class="main">
    <h1>RugbyGestionPlus</h1>
    <article>
        <!-- Welcome Section -->
        <section class="section-index">
            <h2>Bienvenue <strong class="strong-bienvenue"> <!-- PHP Code for Dynamic Name --> </strong> !</h2>
            <p>
                RugbyGestionPlus vous permet de gérer efficacement votre équipe de rugby et d’améliorer vos performances.
                Accédez à vos matchs, analysez les résultats et préparez vos stratégies gagnantes !
            </p>
        </section>

        <!-- KPI Section -->
        <section class="section-index" id="team-performance">
            <div id="stats-collective">
                <h2>Performance de l'équipe</h2>
                <div class="stat-grid">
                    <ul>
                        <li><div class="stat-card">Victoires: <span><?=$statsMatchs["matchesWon"]?></span></div></li>
                        <li><div class="stat-card">Défaites: <span><?=$statsMatchs["matchesLoss"]?></span></div></li>
                        <li><div class="stat-card">Nuls: <span><?=$statsMatchs["matchesDrawed"]?></span></div></li>
                        <li><div class="stat-card">Joueurs utilisés: <span><?=$statsJoueurs["differents_joueurs"]?></span></div></li>
                        <li><div class="stat-card">Joueurs actifs: <span><?=$statsJoueurs["actifs_joueurs"]?></span></div</li>
                    </ul>
                </div>
            </div>
            <div id="stats-individuelles">
                <h2>Joueurs les plus utilisés</h2>
                <div class="stat-grid">
                    <ul>
                        <?php if(!empty($statsJoueurs["joueurs"])){
                            foreach ($statsJoueurs["joueurs"] as $joueur){ ?>
                                <li><div class="stat-card"><?=$joueur["nom"]?> <?=$joueur["prenom"]?>: <span><?=$joueur["nombreDeMatchs"]?></span></div></li>
                            <?php }
                        } else { ?>
                            <li><div class="stat-card">Aucun joueur n'a joué</div></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Recent Results Section -->
        <section class="section-index" id="recent-results">
            <h2>Vos derniers résultats</h2>
            <table>
                <thead><tr></tr></thead>
                <tbody>
                <?php if(!empty($matchsResultats)) {
                    foreach ($matchsResultats as $match) { ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($match["dateHeure"]) ?></strong> - <em><?= htmlspecialchars($match["adversaire"]) ?></em> (<?= htmlspecialchars($match["lieu"]) ?>) : <span class='resultat'><?= htmlspecialchars($match["résultat"]) ?></span>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td>Aucun match résultat récent trouvé.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- Upcoming Matches Section -->
        <section class="section-index" id="upcoming-matches">
            <h2>Matchs à venir</h2>
            <table>
                <tbody>
                <tr>
                    <?php if(!empty($matchsProchains)){
                    foreach ($matchsProchains as $match) { ?>
                    <td>
                        <div class="match-info">
                            <strong><?= $match["dateHeure"]?></strong> - vs <em><?= $match["adversaire"]?></em> (<?= $match["lieu"]?>)
                        </div>
                    </td>
                    <td>
                        <div class="action">
                            <a href="/gerermatch?type=vue&idMatch=<?= $match["idMatch"]?>" class="button modify"><p>Saisir la feuille de match</p></a>
                        </div>
                    </td>
                </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td>Aucun match à venir trouvé.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- Quick Actions Section -->
        <section class="section-index">
            <h2>Actions rapides</h2>
            <div class="forms actions">
                <a href="/gererjoueur.php?type=ajout&idJoueur=0" class="button add"><p>Ajouter un match</p></a>
                <a href="/gerermatch.php?type=ajout&idMatch=0" class="button add"><p>Ajouter un joueur</p></a>
            </div>
        </section>
    </article>
</div>