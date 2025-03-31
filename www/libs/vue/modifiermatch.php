<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php" ?>

<div class="main div-column">
    <h1>Modifier un match</h1>
    <article class="article-list">
        <h3>Entrez les informations du match à modifier</h3>
        <section class="full">
            <h3>Entrez les informations du match à modifier</h3>
            <h3>Match du <?= $match["dateHeure"] ?> contre <?= $match["adversaire"] ?>, Lieu : <?= $match["lieu"] ?></h3>
            <table class="form-table">
                <tr>
                    <td><label for="datetime">Date du match</label></td>
                    <td class="input"><input type="datetime-local" id="datetime" name="datetime" required value="<?= $match["dateHeure"] ?>"></td>
                </tr>
                <tr>
                    <td><label for="lieu">Lieu du match</label></td>
                    <td class="input">
                        <select id="lieu" name="lieu" required>
                            <?php foreach (Enum\getLieux() as $key=>$lieuPossible) { ?>
                                <option value="<?= $key?>" <?= $match["lieu"] === $lieuPossible ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($lieuPossible) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="adversaire">Adversaire</label></td>
                    <td class="input"><input type="text" id="adversaire" name="adversaire" placeholder="Nom de l'adversaire" required value="<?= $match["adversaire"] ?>"></td>
                </tr>
            </table>
            <input type="hidden" name="idMatch" value="<?= $match["idMatch"] ?>">
            <button type="submit" class="add">Modifier le match</button>
        </section>
    </article>
</div>