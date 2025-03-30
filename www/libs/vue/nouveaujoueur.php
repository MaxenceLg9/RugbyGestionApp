<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php" ?>

<div class="main div-column">
<h1>Ajouter un joueur</h1>
    <article class="article-list">
        <h3>Entrez les informations du joueur à ajouter</h3>
        <section class="full">
            <table class="form-table">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td class="input"><input type="text" id="nom" name="nom" required></td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom</label></td>
                    <td class="input"><input type="text" id="prenom" name="prenom" required"></td>
                </tr>
                <tr>
                    <td><label for="dateNaissance">Date de naissance</label></td>
                    <td class="input"><input type="date" id="dateNaissance" name="dateNaissance" required"></td>
                </tr>
                <tr>
                    <td><label for="numeroLicense">Numéro de licence</label></td>
                    <td class="input"><input type="text" id="numeroLicense" name="numeroLicense" required"></td>
                </tr>
                <tr>
                    <td><label for="taille">Taille (cm)</label></td>
                    <td class="input"><input type="number" id="taille" name="taille" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="poids">Poids (kg)</label></td>
                    <td class="input"><input type="number" id="poids" name="poids" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="statut">Statut</label></td>
                    <td class="input">
                        <select id="statut" name="statut" required>
                            <?php foreach (Enum\getStatuts() as $key=>$statut) { ?>
                                <option value="<?= $key ?>">
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
                                <option value="<?= $key ?>">
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
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="commentaire">Ajouter un commentaire sur le joueur (max 400carac.)</label></td>
                    <td class="input"><input type="text" class="textfield" name="commentaire" id="commentaire"/></td>
                </tr>
            </table>
            <button type="submit" class="add" onclick="gererJoueur('POST')">Modifier le joueur</button>
        </section>
    </article>
    <script src="/resources/js/gererjoueur.js"></script>
</div>
