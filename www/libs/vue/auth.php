<?php

//require_once "{$_SERVER["DOCUMENT_ROOT"]}/../libs/modele/Token.php";
//
//use function Token\apiVerifyToken;
//
//if(apiVerifyToken()){
//    header("Location: /index.php");
//    die();
//}
?>
<div class="form flex-column">
    <div class="flex-column">
        <h1>Bienvenue sur RugbyGestion!</h1>
        <p>Veuillez entrer vos informations</p>
    </div>
    <form id="login">
        <label for="email">EMAIL</label>
        <input type="text" id="email" name="email">
        <label for="password">MOT DE PASSE</label>
        <input type="password" id="password" name="password">
        <button id="login">Connexion</button>
    </form>
    <form id="register">
        <label for="firstname">PRENOM</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="name">NOM</label>
        <input type="text" id="name" name="name" required>

        <label for="email">EMAIL</label>
        <input type="email" id="email" name="email" required>

        <label for="equipe">EQUIPE</label>
        <input type="text" id="equipe" name="equipe" required>

        <label for="password">MOT DE PASSE</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmpassword">CONFIRMATION DU MOT DE PASSE</label>
        <input type="password" id="password" name="confirmpassword" required>
        <button id="register">Inscription</button>
    </form>
    <div class="add"><p id="toggle">Vous n'avez pas de compte? </p><strong id="toggle">S'inscrire</strong></div>
</div>
<script src="/resources/js/auth.js"></script>