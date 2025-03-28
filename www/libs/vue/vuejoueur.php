<div class="main">
    <article>
        <h1>Informations sur le joueur</h1>

        <!-- Player Info Section -->
        <div class="first-section">
            <section class="player-identity" id="player-identity">
                <h2>Identité du joueur</h2>
                <div class="identity-info" id="identity-info">
                    <img src="" alt="Photo de " width="200" height="200" id="player-photo">
                    <div class="identity-details" id="identity-details">
                        <p><strong>Nom :</strong> <span id="player-nom"></span></p>
                        <p><strong>Prénom :</strong> <span id="player-prenom"></span></p>
                        <p><strong>Date de Naissance :</strong> <span id="player-dateNaissance"></span></p>
                    </div>
                </div>
            </section>
            <section class="player-info" id="player-info">
                <h2>Caractéristiques</h2>
                <p><strong>Numéro de Licence :</strong> <span id="player-numeroLicence"></span></p>
                <p><strong>Taille :</strong> <span id="player-taille"></span> cm</p>
                <p><strong>Poids :</strong> <span id="player-poids"></span> kg</p>
                <p><strong>Poste Préféré :</strong> <span id="player-postePrefere"></span></p>
                <p><strong>Première Ligne :</strong> <span id="player-estPremiereLigne"></span></p>
                <p><strong>Statut :</strong> <span id="player-statut"></span></p>
                <p><strong>Commentaire :</strong> <span id="player-commentaire"></span></p>
            </section>
        </div>

        <!-- Player Statistics Section -->
        <section class="player-stats" id="player-stats">
            <h2>Statistiques</h2>
            <p><strong>Total de Matchs :</strong> <span id="stats-totalMatches"></span></p>
            <p><strong>Matchs Gagnés :</strong> <span id="stats-matchesWon"></span></p>
            <p><strong>Pourcentage de Victoires :</strong> <span id="stats-winPercentage"></span>%</p>
            <p><strong>Note Moyenne :</strong> <span id="stats-avgNote"></span></p>
        </section>

        <!-- Match Participation Section -->
        <section class="match-participation" id="match-participation">
            <h2>Participation aux Matchs</h2>
            <p class="color-red" id="no-matches-message" style="display: none;">Aucun match n'est enregistré pour ce joueur.</p>
            <table id="matches-table" style="display: none;">
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
                <tbody id="matches-tbody">
                </tbody>
            </table>
        </section>
    </article>
</div>