<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php" ?>

<div class="main div-column">
    <article class="article-list">
        <h1>Modifier un match</h1>
        <section class="full">
            <h3>Entrez les informations du match à modifier</h3>
            <h3>Match du <?= $date ?> contre <?= $adversaire ?>, Lieu : <?= $lieu ?></h3>
            <form action="gerermatch.php" method="post">
                <div class="form-row">
                    <label for="datetime">Date du match</label>
                    <input type="datetime-local" id="datetime" name="datetime" required value="<?= $date ?>">
                </div>
                <div class="form-row">
                    <label for="lieu">Lieu du match</label>
                    <select id="lieu" name="lieu" required>
                        <?php foreach (Enum\getLieux() as $lieuPossible) { ?>
                            <option value="<?= $lieuPossible?>" <?= $lieu === $lieuPossible ? 'selected' : '' ?>>
                                <?= htmlspecialchars($lieuPossible) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="adversaire">Adversaire</label>
                    <input type="text" id="adversaire" name="adversaire" placeholder="Nom de l'adversaire" required value="<?= $adversaire ?>">
                </div>

                <input type="hidden" name="idMatch" value="<?= $id ?>">
                <input type="hidden" name="type" value="modification">
                <button type="submit" class="ajout">Modifier le match</button>
            </form>
        </section>
    </article>
</div>
