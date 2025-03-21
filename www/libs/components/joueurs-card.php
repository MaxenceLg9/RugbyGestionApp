<!--        --><?php
//        require_once "../modele/Joueur.php";
//
//        // Assuming $equipes is an array of Equipe objects passed to this page
//        if(empty($joueurs)){
//            echo "<p class=\"color-red\">Aucun joueur n'est enregistré pour le moment.</p>";
//        }
//        else{
//            foreach ($joueurs as $joueur) {
//                if ($joueur->getUrl() == "") {
//                    $url = "../resources/img/data/default.png";
//                } else {
//                    $url = $joueur->getUrl();
//                } ?>
<!--                <section class="section-card">-->
<!--                    <div class="card-info">-->
<!--                        <div class="head">-->
<!--                            <h2>--><?php //= htmlspecialchars($joueur->getNom() . " joueurs.php" . $joueur->getPrenom()) ?><!--</h2>-->
<!--                            <p>Date de naissance : --><?php //= htmlspecialchars($joueur->getDateNaissance()->format('d/m/Y')) ?><!--</p>-->
<!--                            <p>Numéro de licence : --><?php //= htmlspecialchars($joueur->getNumeroLicense()) ?><!--</p>-->
<!--                            <p>Taille : --><?php //= htmlspecialchars($joueur->getTaille()) ?><!-- cm</p>-->
<!--                            <p>Poids : --><?php //= htmlspecialchars($joueur->getPoids()) ?><!-- kg</p>-->
<!--                            <p>Statut : --><?php //= htmlspecialchars($joueur->getStatut()->name) ?><!--</p>-->
<!--                            <p>Poste préféré : --><?php //= htmlspecialchars($joueur->getPostePrefere()->value) ?><!--</p>-->
<!--                            <p>Est première ligne : --><?php //= $joueur->isPremiereLigne() ? "Oui" : "Non" ?><!--</p>-->
<!--                        </div>-->
<!--                        <img src="--><?php //= $url?><!--" alt="Photo de profil de --><?php //= htmlspecialchars($joueur->getNom() . " joueurs.php" . $joueur->getPrenom()) ?><!--" width="80" height="80">-->
<!--                    </div>-->
<!---->
<!--                    <div class="forms">-->
<!--                        <!-- Modification Form -->
<!--                        <a href="/gererjoueur.php?type=vue&idJoueur=--><?php //= htmlspecialchars($joueur->getIdJoueur()) ?><!--&csrf_token=--><?php //= htmlspecialchars(hash_hmac("sha256", $joueur->getIdJoueur() . $_SESSION['csrf_token'] . "vue", $_SESSION['csrf_token'])) ?><!--" class="forms saisie button"><p>Consulter le joueur</p></a>-->
<!--                        <a href="/gererjoueur.php?type=modification&idJoueur=--><?php //= htmlspecialchars($joueur->getIdJoueur()) ?><!--&csrf_token=--><?php //= htmlspecialchars(hash_hmac("sha256", $joueur->getIdJoueur() . $_SESSION['csrf_token'] . "modification", $_SESSION['csrf_token'])) ?><!--" class="forms modify button">-->
<!--                            <p>Modifier le joueur</p>-->
<!--                        </a>-->
<!---->
<!--                        <!-- Suppression Form -->
<!--                        <form method="post" action="gererjoueur.php">-->
<!--                            <input type="hidden" name="type" value="suppression">-->
<!--                            <input type="hidden" name="idJoueur" value="--><?php //= htmlspecialchars($joueur->getIdJoueur()) ?><!--">-->
<!--                            <input type="hidden" name="csrf_token" value="--><?php //= htmlspecialchars(hash_hmac("sha256", $joueur->getIdJoueur() . $_SESSION['csrf_token'] . "suppression", $_SESSION['csrf_token'])) ?><!--">-->
<!--                            <button type="submit" class="delete">Supprimer</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </section>-->
<!--            --><?php //} ?>
<!--        --><?php //} ?>