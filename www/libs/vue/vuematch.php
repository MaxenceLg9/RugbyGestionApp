<?php

require_once $_SERVER["DOCUMENT_ROOT"]."../libs/modele/Enum.php";

?>
<div class="main">
    <h1>Saisir votre feuille de match</h1>
    <article>
        <h3>Entrez les informations du match à modifier</h3>
        <section>
            <aside>
                <p>Il y a <strong id="fieldNbJoueurs"></strong> joueurs sur la feuille de match</p>
                <p>Il y a <strong id="fieldNbPremieresLignes"></strong> joueurs ayant la spécificité 1ère ligne sur la feuille de match</p>

                <?php if($match["valider"] || $match["archive"]){?>
                    <p>Le match est archivé, vous ne pouvez plus le modifier</p>
                <?php } else {?>

                    <div class="players-container" id="players">
                        <?php
                        if($joueursNP) {
                            foreach ($joueursNP as $joueur) {
                                $class = "player-card" . ($joueur["estPremiereLigne"] === 'Oui' ? " premiere-ligne" : "");
                                ?>
                                <div class="<?=$class?>" data-id="1">
                                    <img src="<?=$joueur["url"]?>" alt="Profile picture of <?=$joueur["nom"] . " " . $joueur["prenom"]?>" width="40" height="40">
                                    <p><?=$joueur["nom"] . " " . $joueur["prenom"]?></p>
                                    <input type="hidden" name="idJoueur" value="<?=$joueur["idJoueur"]?>">
                                    <input type="hidden" name="premiereLigne" value="<?=$joueur["estPremiereLigne"]?>">
                                </div>
                            <?php }
                        }else {
                            echo "<p>Vous n'avez aucun joueur actif</p>";
                        }?>
                    </div>
                <?php } ?>
            </aside>
            <div class="form">
                <div class="field" id="field">
                    <!-- Position slots -->
                    <?php
                    $nbJoueurs = 0;
                    $nbPremieresLignes = 0;
                    for($i = 1; $i <= 23; $i++){
                        $value = ""?>
                        <div class="position-slot slot-<?=$i?>" data-position="<?=$i?>">
                            <?php
                            if(array_key_exists($i,$jouerLeMatch)) {
                                $nbJoueurs++;
                                $class = "player-card";
                                $joueur = $jouerLeMatch[$i];
                                if($joueur["estPremiereLigne"] === 'Oui'){
                                    $nbPremieresLignes++;
                                    $class = $class . " premiere-ligne";
                                }?>
                                <div class="<?=$class?>" data-id="1">
                                    <img src="<?=$joueur["url"]?>" alt="Profile picture of <?=$joueur["nom"] . " " . $joueur["prenom"]?>" width="40" height="40">
                                    <p><?=$joueur["nom"] . " " . $joueur["prenom"]?></p>
                                    <input type="hidden" name="idJoueur" value="<?=$joueur["idJoueur"]?>">
                                    <input type="hidden" name="premiereLigne" value="<?=$joueur["estPremiereLigne"]?>">
                                </div>
                                <?php
//                                $value = htmlspecialchars(openssl_encrypt($jouerLeMatch[$i]->getJoueur()->getIdJoueur(),'aes-256-cbc',$_SESSION["csrf_token"],0,$iv));
                            }
                            ?>
                        </div>
                        <input type="hidden" name="<?=$key?>" value="<?=$key?>" >
                    <?php } ?>
                </div>

                <?php if($match["archive"]){ ?>
                    <p>Le match est archivé, vous ne pouvez plus le modifier</p>
                    <p>Résultat : <?=$match["resultat"]?></p>
                    <a class="button saisie" href="/saisirnotes?idMatch=<?=$match["idMatch"]?>">
                        <p>Saisir les notes</p>
                    </a>
                <?php } else { ?>
                    <input type="hidden" name="type" value="ajout">
                    <input type="hidden" name="idMatch" value="<?=$match["idMatch"]?>">
                    <?php if($match["valider"]){ ?>
                        <div class="row">
                            <p>Feuille de match validée, vous pouvez dès à présent finaliser le match en saisissant le score</p>
                            <label for="resultat">Score</label>
                            <select id="resultat" name="resultat" required>
                                <?php foreach (Enum\getResultats() as $key=>$resultat) { ?>
                                    <option value="<?= $key ?>">
                                        <?= htmlspecialchars($resultat) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="fdm" value="0">
                        <input type="submit" name="submit" class="button saisie" value="Saisir le score" id="btnScore">
                    <?php } else { ?>
                        <input type="hidden" name="idMatch" value="<?=$match["idMatch"]?>">
                        <input type="hidden" name="fdm" value="1">
                        <button type="submit" name="submit" class="button saisie" value="ajouter" id="buttonAjouter">Saisir la feuille</button>
                        <button type="submit" name="submit" class="button modify" value="valider" id="buttonValider">Valider la feuille</button>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
    </article>
</div>
<script>
    let nbJoueurs = <?php echo $nbJoueurs ?>;
    let nbPremieresLignes = <?php echo $nbPremieresLignes ?>;
    let archiveMatch = <?php echo $match["archive"] || $match["valider"] ? 1 : 0?>;
</script>
<script src="/resources/js/fdm.js"></script>