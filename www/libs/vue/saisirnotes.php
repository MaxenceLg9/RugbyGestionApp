<div class="main div-column">
    <header class="header-section">
        <h1>Noter les joueurs</h1>
        <p>Attribuez une note à chaque joueur sur une <strong>échelle de 0 à 20</strong>.</p>
    </header>
    <article class="player-list">
        <?php
        if (empty($joueurs)) {
            echo "<p class=\"color-red\">Aucun joueur n'est disponible pour ce match.</p>";
        } else { ?>
            <div class="form-notes">
                <?php foreach ($joueurs as $key=> $joueur) { ?>
                    <section class="section-card" data-id="<?= htmlspecialchars($key)?>">
                        <div class="card-info">
                            <img src="<?= $joueur["url"] ?>" alt="Photo de <?= htmlspecialchars($joueur["prenom"] . ' ' . $joueur["nom"]) ?>" class="profile-picture">
                            <h2><?= htmlspecialchars($joueur["prenom"] . ' ' . $joueur["nom"]) ?></h2>
                            <p><strong>Position: </strong><?= htmlspecialchars($key) ?></p>
                        </div>
                        <!-- Use unique names for inputs -->
                        <div class="row">
                            <label for="note-<?= $key ?>">Note :</label>
                            <input type="number" id="note-<?= $key ?>" name="notes" min="0" max="20" step="0.25" value="<?= $joueur["note"] == -1 ? 0 : $joueur["note"]?>" required>
                        </div>
                    </section>
                <?php } ?>
            </div>
            <input type="hidden" name="idMatch" value="<?= htmlspecialchars($_GET["idMatch"]) ?>">
            <button type="submit" class="button save-note">Enregistrer les notes</button>
        <?php } ?>
    </article>
</div>