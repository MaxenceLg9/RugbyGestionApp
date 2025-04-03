<div class="main div-column">
    <header class="header-section">
        <h1>Statistiques de l'équipe</h1>
    </header>
    <article class="article-list">
        <section class="stats-globales">
            <h2>Statistiques globales</h2>
            <p>Total de matchs avec résultat : <?php /*= $totalMatchs */?></p>
            <p>Matchs gagnés : <?= $statsMatchs["matchesWon"] ?></p>
            <p>Pourcentage de victoire : <?= $statsMatchs["winLossRatio"] ?></p>
            <p>Matchs perdus : <?= $statsMatchs["matchesLoss"] ?></p>
            <p>Matchs nuls : <?= $statsMatchs["matchesDrawed"] ?></p>
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
                <?php foreach ($matchs as $match) { ?>
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
                <?php foreach ($statsJoueurs as $joueur) { ?>
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