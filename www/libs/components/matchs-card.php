<!--        --><?php
//        if(empty($matchs)){
//            echo "<p class=\"color-red\">Aucun match n'est enregistré pour le moment.</p>";
//        }
//        foreach ($matchs as $match) { ?>
<!---->
<!--            <section class="section-card">-->
<!---->
<!--                <div class="card-info">-->
<!--                    <div class="head">-->
<!--                        <h2>Match du --><?php //= $match->getDateHeure()->format('d/m/Y-H:i') ?><!--</h2>-->
<!--                        <p><strong>Adversaire:</strong> --><?php //= $match->getAdversaire() ?><!--</p>-->
<!--                        <p><strong>Lieu:</strong> --><?php //= $match->getLieu()->name ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="statut">-->
<!--                    --><?php //if ($match->getDateHeure() < new DateTime()) { ?>
<!--                        <p class="result">Match passé</p>-->
<!--                        --><?php //if(!is_null($match->getResultat())){ ?>
<!--                            <p class="result">Match validé</p>-->
<!--                            <p>Score : --><?php //= $match->getResultat()->name?><!--</p>-->
<!--                        --><?php //}
//                        else { ?>
<!--                            <p>Aucun résultat</p>-->
<!--                        --><?php //}
//                    } else { ?>
<!--                        <p class="result">Match à venir</p>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--                <div class="forms">-->
<!---->
<!--                    <a href="/gerermatch.php?type=vue&idMatch=--><?php //= htmlspecialchars($match->getIdMatch()) ?><!--&csrf_token=--><?php //= htmlspecialchars(hash_hmac("sha256", $match->getIdMatch() . $_SESSION['csrf_token'] . "vue", $_SESSION['csrf_token'])) ?><!--" class="forms saisie button"><p>Voir la feuille de match</p></a>-->
<!--                    --><?php //if($match->isValider() || JouerUnMatch::isArchiveFDM($match->getIdMatch())) {
//                        echo "<p class=\"color-red\" style='text-align: center'>Ce match est archivé et ne peut être modifié.</p>";
//                    } else {?>
<!--                        <a href="/gerermatch.php?type=modification&idMatch=--><?php //= htmlspecialchars($match->getIdMatch()) ?><!--&csrf_token=--><?php //= htmlspecialchars(hash_hmac("sha256", $match->getIdMatch() . $_SESSION['csrf_token'] . "modification", $_SESSION['csrf_token'])) ?><!--" class="forms modify button"><p>Modifier le match</p></a>-->
<!--                    --><?php //} ?>
<!--                    <form method="post" action="gerermatch.php">-->
<!--                        <input type="hidden" name="type" value="suppression">-->
<!--                        <input type="hidden" name="idMatch" value="--><?php //= htmlspecialchars($match->getIdMatch()) ?><!--">-->
<!--                        <input type="hidden" name="csrf_token" value="--><?php //= htmlspecialchars(hash_hmac("sha256", $match->getIdMatch() . $_SESSION['csrf_token'] . "suppression", $_SESSION['csrf_token'])) ?><!--">-->
<!--                        <button type="submit" class="delete">Supprimer</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </section>-->
<!--        --><?php //} ?>