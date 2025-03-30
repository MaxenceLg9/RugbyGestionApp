<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php" ?>

<div class="main div-column">
    <article class="article-list">
        <h1>Modifier un match</h1>
        <section class="full">
            <h3>Entrez les informations du match à modifier</h3>
            <h3>Match du <?= $match["dateHeure"] ?> contre <?= $match["adversaire"] ?>, Lieu : <?= $match["lieu"] ?></h3>
            <form action="gerermatch.php" method="post">
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
                <input type="hidden" name="type" value="modification">
                <button type="submit" class="add">Modifier le match</button>
            </form>
        </section>
    </article>
</div>