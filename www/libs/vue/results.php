<div class="main div-column">
    <header class="header-section">
        <h1>Statistiques de l'équipe</h1>
    </header>
    <article class="article-list">
        <div class="first-section">
            <section class="stats-globales">
                <h2>Statistiques globales</h2>
                <table>
                    <thead>
                    <tr>
                        <th>Matchs gagné</th>
                        <th>Pourcentage de victoire</th>
                        <th>Matchs perdus</th>
                        <th>Matchs nul</th>
                        <th>Joueurs actifs</th>
                        <th>Nombre de joueurs utilisés</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $statsMatchs["matchesWon"] ?></td>
                            <td><?= $statsMatchs["winLossRatio"] ?></td>
                            <td><?= $statsMatchs["matchesLoss"] ?></td>
                            <td><?= $statsMatchs["matchesDrawed"] ?></td>
                            <td><?= $statsJoueurs["actifs_joueurs"]?></td>
                            <td><?= $statsJoueurs["differents_joueurs"]?></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="recap-matchs">
                <h2>Récapitulatif des matchs</h2>
                <table>
                    <thead>
                    <tr>
                        <th>Date et Heure</th>
                        <th>Adversaire</th>
                        <th>Lieu</th>
                        <th>Résultat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($matchsResultats as $match) { ?>
                        <tr>
                            <td><?= htmlspecialchars($match["dateHeure"]) ?></td>
                            <td><?= htmlspecialchars($match["adversaire"]) ?></td>
                            <td><?= htmlspecialchars($match["lieu"]) ?></td>
                            <td><?= htmlspecialchars($match["résultat"]) ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
        <section class="stats-joueurs">
            <h2>Statistiques des joueurs</h2>
            <table>
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Statut</th>
                    <th>Poste préféré</th>
                    <th>Sélections (Titulaire)</th>
                    <th>Sélections (Remplaçant)</th>
                    <th>Moyenne des notes</th>
                    <th>% de matchs gagnés</th>
                    <th>Sélections consécutives</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($statsIndiv as $joueur) { ?>
                    <tr>
                        <td><?= htmlspecialchars($joueur['nom']) ?></td>
                        <td><?= htmlspecialchars($joueur['prenom']) ?></td>
                        <td><?= htmlspecialchars($joueur['statut']) ?></td>
                        <td><?= htmlspecialchars($joueur['postePrefere']) ?></td>
                        <td><?= $joueur['titulaires'] ?></td>
                        <td><?= $joueur['remplaçants'] ?></td>
                        <td><?= $joueur['avg_note'] ?></td>
                        <td><?= $joueur['victory_ratio']?></td>
                        <td><?= $joueur['max_consecutive_matches'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </section>
    </article>
</div>