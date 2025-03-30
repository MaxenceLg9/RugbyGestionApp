<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php" ?>

<div class="main div-column">
    <h1>Modifier un joueur</h1>
    <article class="article-list">
        <h3>Entrez les informations du joueur à modifier</h3>
        <section class="full">
            <h3>Joueur : <?= htmlspecialchars($joueur["nom"] . " " . $joueur["prenom"]) ?></h3>
            <img src="<?=$joueur["url"]?>" alt="Photo de <?= htmlspecialchars($joueur["nom"] . " " . $joueur["prenom"]) ?>" width="200" height="200" class="profile-picture">
            <table class="form-table">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td class="input"><input type="text" id="nom" name="nom" required value="<?= htmlspecialchars($joueur["nom"]) ?>"></td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom</label></td>
                    <td class="input"><input type="text" id="prenom" name="prenom" required value="<?= htmlspecialchars($joueur["prenom"]) ?>"></td>
                </tr>
                <tr>
                    <td><label for="dateNaissance">Date de naissance</label></td>
                    <td class="input"><input type="date" id="dateNaissance" name="dateNaissance" required value="<?= htmlspecialchars($joueur["dateNaissance"]) ?>"></td>
                </tr>
                <tr>
                    <td><label for="numeroLicence">Numéro de licence</label></td>
                    <td class="input"><input type="text" id="numeroLicence" name="numeroLicence" required value="<?= htmlspecialchars($joueur["numeroLicence"]) ?>"></td>
                </tr>
                <tr>
                    <td><label for="taille">Taille (cm)</label></td>
                    <td class="input"><input type="number" id="taille" name="taille" min="0" required value="<?= htmlspecialchars($joueur["taille"]) ?>"></td>
                </tr>
                <tr>
                    <td><label for="poids">Poids (kg)</label></td>
                    <td class="input"><input type="number" id="poids" name="poids" min="0" required value="<?= htmlspecialchars($joueur["poids"]) ?>"></td>
                </tr>
                <tr>
                    <td><label for="statut">Statut</label></td>
                    <td class="input">
                        <select id="statut" name="statut" required>
                            <?php foreach (Enum\getStatuts() as $key=>$statut) { ?>
                                <option value="<?= $key ?>" <?= $joueur["statut"] === $statut ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($statut) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="postePrefere">Poste préféré</label></td>
                    <td class="input">
                        <select id="postePrefere" name="postePrefere" required>
                            <?php foreach (Enum\getPostes() as $key=>$poste) { ?>
                                <option value="<?= $key ?>" <?= $joueur["postePrefere"] == $poste ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($poste) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="estPremiereLigne">Est première ligne</label></td>
                    <td class="input">
                        <select id="estPremiereLigne" name="estPremiereLigne" required>
                            <option value="1" <?= $joueur["estPremiereLigne"] === 'Oui' ? 'selected' : '' ?>>Oui</option>
                            <option value="0" <?= $joueur["estPremiereLigne"] !== 'Oui' ? 'selected' : '' ?>>Non</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="commentaire">Ajouter un commentaire sur le joueur (max 400carac.)</label></td>
                    <td class="input"><input type="text" class="textfield" name="commentaire" id="commentaire" value="<?=$joueur["commentaire"]?>"/></td>
                </tr>
            </table>
            <input type="hidden" id="idJoueur" name="idJoueur" value="<?= htmlspecialchars($joueur["idJoueur"]) ?>">
            <button type="submit" class="add" onclick="gererJoueur('PUT')">Modifier le joueur</button>
        </section>
    </article>
    <script src="/resources/js/gererjoueur.js"></script>
</div>

