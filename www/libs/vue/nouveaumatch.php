<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php";

use function Enum\getLieux; ?>

<div class="main div-column">
    <article class="article-list">
        <h1>Ajouter un match</h1>
        <section class="full">
            <h3>Entrez les informations du match à ajouter</h3>
            <form action="gerermatch.php" method="post">
                <div class="form-row">
                    <label for="datetime">Date du match</label>
                    <input type="datetime-local" id="datetime" name="datetime" required>
                </div>
                <div class="form-row">
                    <label for="lieu">Lieu du match</label>
                    <select id="lieu" name="lieu" required>
                        <?php foreach (getLieux() as $key=>$lieu) { ?>
                            <option value="<?= $key ?>"><?= htmlspecialchars($lieu) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="adversaire">Adversaire</label>
                    <input type="text" id="adversaire" name="adversaire" placeholder="Nom de l'adversaire" required>
                </div>

                <input type="hidden" name="idMatch" value="<?= 0 ?>">
                <input type="hidden" name="type" value="ajout">
                <button type="submit" class="add">Ajouter le match</button>
            </form>
        </section>
    </article>
</div>