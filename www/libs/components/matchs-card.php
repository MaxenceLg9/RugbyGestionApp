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
<!--                        <h2>Match du -->{dateHeure}<!--</h2>-->
<!--                        <p><strong>Adversaire:</strong> -->{adversaire}<!--</p>-->
<!--                        <p><strong>Lieu:</strong> -->{lieu}<!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="statut">-->
<!--                    --><?php //if ($match->getDateHeure() < new DateTime()) { ?>
<!--                        <p class="result">Match passé</p>-->
<!--                        --><?php //if(!is_null($match->getResultat())){ ?>
<!--                            <p class="result">Match validé</p>-->
<!--                            <p>Score : -->{resultat}<!--</p>-->
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
<!--                    <a href="/gerermatch.php?type=vue&idMatch=-->{idMatch}<!--" class="forms saisie button"><p>Voir la feuille de match</p></a>-->
<!--                    --><?php //if($match->isValider() || JouerUnMatch::isArchiveFDM($match->getIdMatch())) {
//                        echo "<p class=\"color-red\" style='text-align: center'>Ce match est archivé et ne peut être modifié.</p>";
//                    } else {?>
<!--                        <a href="/gerermatch.php?type=modification&idMatch=-->{idMatch}<!--" class="forms modify button"><p>Modifier le match</p></a>-->
<!--                    --><?php //} ?>
                    <button type="submit" class="delete" onclick="deleteMatch({idMatch})">Supprimer</button>
<!--                </div>-->
<!--            </section>-->
<!--        --><?php //} ?>