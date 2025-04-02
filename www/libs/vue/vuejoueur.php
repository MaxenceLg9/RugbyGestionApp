<div class="main">
    <h1>Informations sur le joueur</h1>
    <article>
        <!-- Player Info Section -->

        <div class="first-section">
            <section class="player-identity">
                <h2>Identité du joueur</h2>
                <div class="identity-info">
                    <img src="<?= htmlspecialchars($joueur["url"]) ?>" alt="Photo de <?= htmlspecialchars($joueur["nom"]) ?>" width="200" height="200">
                    <div class="identity-details">
                        <p><strong>Nom :</strong> <?= htmlspecialchars($joueur["nom"]) ?></p>
                        <p><strong>Prénom :</strong> <?= htmlspecialchars($joueur["prenom"]) ?></p>
                        <p><strong>Date de Naissance :</strong> <?= htmlspecialchars($joueur["dateNaissance"]) ?></p>
                    </div>
                </div>
            </section>
            <section class="player-info">
                <h2>Caractéristiques</h2>
                <table>
                    <tbody>
                    <tr>
                        <td><strong>Numéro de Licence :</strong></td>
                        <td><?= htmlspecialchars($joueur["numeroLicence"]) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Taille :</strong> </td>
                        <td><?= htmlspecialchars($joueur["taille"]) ?> cm</td>
                    </tr>
                    <tr>
                        <td><strong>Poids :</strong></td>
                        <td><?= htmlspecialchars($joueur["poids"]) ?>kg</td>
                    </tr>
                    <tr>
                        <td><strong>Poste Préféré :</strong></td>
                        <td><?= htmlspecialchars($joueur["postePrefere"]) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Première Ligne :</strong></td>
                        <td><?= $joueur["estPremiereLigne"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Statut :</strong></td>
                        <td><?= htmlspecialchars($joueur["statut"]) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Commentaire :</strong></td>
                        <td><?= nl2br(htmlspecialchars($joueur["commentaire"])) ?></td>
                    </tr>
                    </tbody>
                </table>
            </section>
        </div>
        <section class="player-stats">
            <h2>Statistiques</h2>
            <table>
                <tbody>
                <tr>
                    <td><strong>Total de Matchs :</strong></td>
                    <td><?= $stats['totalMatches'] ?></td>
                </tr>
                <tr>
                    <td><strong>Matchs Gagnés :</strong></td>
                    <td><?= $stats['matchesWon'] ?></td>
                </tr>
                <tr>
                    <td><strong>Pourcentage de Victoires :</strong></td>
                    <td><?= $stats["winPercentage"] ?>%</td>
                </tr>
                <tr>
                    <td><strong>Note Moyenne :</strong></td>
                    <td><?= number_format($stats['avgNote'], 2) ?></td>
                </tr>
                </tbody>
            </table>
            <p> </p>
            <p> </p>
            <p> </p>
            <p></p>
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
                <?php foreach ($matchs as $idMatch=>$match){
                    $numero = array_keys($match["feuilles"])[0];
                    $fdm = $match["feuilles"][$numero];
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($fdm["dateHeure"]) ?></td>
                        <td><?= htmlspecialchars($fdm["adversaire"]) ?></td>
                        <td><?= htmlspecialchars($fdm["lieu"]) ?></td>
                        <td><?= htmlspecialchars($fdm["resultat"]) ?></td>
                        <td><?= htmlspecialchars($numero) ?></td>
                        <td><?= $numero < 16 ? 'Oui' : 'Non' ?></td>
                        <?php if($fdm["note"] == -1){ ?>
                            <td>Non noté</td>
                        <?php }else{ ?>
                            <td><?= number_format($fdm["note"]) ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </section>
        <?php } ?>
    </article>
</div>