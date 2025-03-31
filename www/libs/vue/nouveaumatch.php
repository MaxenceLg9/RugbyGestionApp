<?php

require $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php";

use function Enum\getLieux; ?>

<div class="main div-column">
    <h1>Ajouter un match</h1>
    <article class="article-list">
        <h3>Entrez les informations du match à ajouter</h3>
        <section class="full">
            <h3>Entrez les informations du match à ajouter</h3>
            <table class="form-table">
                <tr>
                    <td><label for="datetime">Date du match</label></td>
                    <td class="input"><input type="datetime-local" id="datetime" name="datetime" required></td>
                </tr>
                <tr>
                    <td><label for="lieu">Lieu du match</label></td>
                    <td class="input">
                        <select id="lieu" name="lieu" required>
                            <?php foreach (getLieux() as $key=>$lieu) { ?>
                                <option value="<?= $key ?>"><?= htmlspecialchars($lieu) ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="adversaire">Adversaire</label></td>
                    <td class="input"><input type="text" id="adversaire" name="adversaire" placeholder="Nom de l'adversaire" required></td>
                </tr>
            </table>
            <input type="hidden" name="idMatch" value="<?= 0 ?>">
            <button type="submit" class="add">Ajouter le match</button>
        </section>
    </article>
</div>