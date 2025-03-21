<div class="main div-column">
    <header class="header-section">
        <h1>Statistiques de l'équipe</h1>
    </header>
    <article class="article-list">
        <section class="stats-globales">
            <h2>Statistiques globales</h2>
            <p>Total de matchs avec résultat : <?php /*= $totalMatchs */?></p>
            <p>Matchs gagnés : </p>
            <p>Matchs perdus : </p>
            <p>Matchs nuls : </p>
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
<!--                --><?php //foreach ($matchs as $match) { ?>
<!--                    <tr>-->
<!--                        <td>--><?php //= htmlspecialchars($match->getDateHeure()->format('d/m/Y-H:i')) ?><!--</td>-->
<!--                        <td>--><?php //= htmlspecialchars($match->getAdversaire()) ?><!--</td>-->
<!--                        <td>--><?php //= htmlspecialchars($match->getLieu()->name) ?><!--</td>-->
<!--                        <td>--><?php //= htmlspecialchars($match->getResultat()->name) ?><!--</td>-->
<!--                    </tr>-->
<!--                --><?php //} ?>
                </tbody>
            </table>
        </section>

        <section class="stats-joueurs">
            <h2>Statistiques des joueurs</h2>
            <table>
                <thead>
                <tr>
                    <th>Nom</th>
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
<!--                --><?php //foreach ($joueurs as $joueur) { ?>
<!--                    <tr>-->
<!--                        <td>--><?php //= htmlspecialchars($joueur['nom']) ?><!--</td>-->
<!--                        <td>--><?php //= htmlspecialchars($joueur['statut']) ?><!--</td>-->
<!--                        <td>--><?php //= htmlspecialchars(Poste::tryFromName($joueur['postePrefere'])->value) ?><!--</td>-->
<!--                        <td>--><?php //= $joueur['titulaire'] ?><!--</td>-->
<!--                        <td>--><?php //= $joueur['remplacant'] ?><!--</td>-->
<!--                        <td>--><?php //= number_format($joueur['moyenneNotes'], 2) ?><!--</td>-->
<!--                        <td>--><?php //= number_format($joueur['pourcentageMatchsGagnes'], 2) ?><!--%</td>-->
<!--                        <td>--><?php //= $joueur['selectionsConsecutives'] ?><!--</td>-->
<!--                    </tr>-->
<!--                --><?php //} ?>
                </tbody>
            </table>
        </section>
    </article>
</div>