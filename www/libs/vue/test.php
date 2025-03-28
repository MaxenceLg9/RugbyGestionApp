<div class="main">
    <article>
        <h1>Informations sur le joueur</h1>

        <!-- Player Info Section -->

        <div class="first-section">
            <section class="player-identity">
                <?php
                $url = empty($joueur["url"]) ? "/resources/img/data/default.png" : "/resources/img/joueurs/".$joueur["url"];
                ?>
                <h2>Identité du joueur</h2>

                <div class="identity-info">
                    <img src="<?= htmlspecialchars($url) ?>" alt="Photo de <?= htmlspecialchars($joueur["nom"]) ?>" width="200" height="200">
                    <div class="identity-details">
                        <p><strong>Nom :</strong> <?= htmlspecialchars($joueur["nom"]) ?></p>
                        <p><strong>Prénom :</strong> <?= htmlspecialchars($joueur["prenom"]) ?></p>
                        <p><strong>Date de Naissance :</strong> <?= htmlspecialchars($joueur["dateNaissance"]) ?></p>
                    </div>
                </div>
            </section>
            <section class="player-info">
                <h2>Caractéristiques</h2>
                <p><strong>Numéro de Licence :</strong> <?= htmlspecialchars($joueur["numeroLicence"]) ?></p>
                <p><strong>Taille :</strong> <?= htmlspecialchars($joueur["taille"]) ?> cm</p>
                <p><strong>Poids :</strong> <?= htmlspecialchars($joueur["poids"]) ?> kg</p>
                <p><strong>Poste Préféré :</strong> <?= htmlspecialchars($joueur["postePrefere"]) ?></p>
                <p><strong>Première Ligne :</strong> <?= $joueur["estPremiereLigne"]?></p>
                <p><strong>Statut :</strong> <?= htmlspecialchars($joueur["statut"]) ?></p>
                <p><strong>Commentaire :</strong> <?= nl2br(htmlspecialchars($joueur["commentaire"])) ?></p>
            </section>
        </div>

        <!-- Player Statistics Section -->
        <section class="player-stats">
            <h2>Statistiques</h2>
            <p><strong>Total de Matchs :</strong> <?= $stats['totalMatches'] ?></p>
            <p><strong>Matchs Gagnés :</strong> <?= $stats['matchesWon'] ?></p>
            <p><strong>Pourcentage de Victoires :</strong> <?= $winPercentage ?>%</p>
            <p><strong>Note Moyenne :</strong> <?= number_format($stats['avgNote'], 2) ?></p>
        </section>

        <!-- Match Participation Section -->
        <section class="match-participation">
            <h2>Participation aux Matchs</h2>
            <?php if($stats["totalMatches"] == 0){
                echo "<p class=\"color-red\">Aucun match n'est enregistré pour ce joueur.</p>";
            }else{ ?>
            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Adversaire</th>
                    <th>Lieu</th>
                    <th>Résultat</th>
                    <th>Poste</th>
                    <th>Titulaire</th>
                    <th>Note</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fdmJoueur as $numero=>$fdm){ ?>
                    <tr>
                        <td><?= htmlspecialchars($fdm["dateHeure"]) ?></td>
                        <td><?= htmlspecialchars($fdm["adversaire"]) ?></td>
                        <td><?= htmlspecialchars($fdm["lieu"]) ?></td>
                        <td><?= htmlspecialchars($fdm["resultat"]) ?></td>
                        <td><?= htmlspecialchars($numero) ?></td>
                        <td><?= $fdm->isTitulaire() ? 'Oui' : 'Non' ?></td>
                        <?php if($fdm->getNote() == -1){ ?>
                            <td>Non noté</td>
                        <?php }else{ ?>
                            <td><?= number_format($fdm->getNote()) ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </section>
        <?php } ?>
    </article>
</div>