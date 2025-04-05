let divJoueurs = $('article#joueurs');

async function getJoueurs() {
    try {
        const response = await $.ajax('https://rugbygestionapi.alwaysdata.net/joueurs',{
            method: "GET",
            contentType: "application/json", // Important for sending JSON
            headers:{"Authorization": Cookies.get("token")}
        })
        console.log(response)
        response.data.forEach(createPlayerCard);
    } catch (xhr) {
        console.error("XHR Error:", xhr);
        try {
            const json = JSON.parse(xhr.responseText);
            console.log(json);
            alert(json.response);
        } catch (e) {
            console.error("Could not parse response as JSON:", xhr.responseText);
            alert("An error occurred, but the response is not valid JSON.");
        }
    }
}

async function supprimer(idJoueur){
    if(!confirm("Voulez-vous vraiment supprimer ce joueur ?"))
        return;
    try {
        const response = await $.ajax('https://rugbygestionapi.alwaysdata.net/joueurs',{
            method: "DELETE",
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify({
                "idJoueur": idJoueur
            }),
            headers:{"Authorization": Cookies.get("token")}
        })
        $(`#section-card-${idJoueur}`).remove();
    } catch (xhr) {
        console.error(xhr.responseText);
        try {
            const json = JSON.parse(xhr.responseText);
            console.log(json);
            alert(json.response);
        } catch (e) {
            console.error("Could not parse response as JSON:", xhr.responseText);
            alert("An error occurred, but the response is not valid JSON.");
        }
    }
}

function createPlayerCard(player) {
    divJoueurs.append($(`
        <section class="section-card" id="section-card-${player.idJoueur}">
            <div class="card-info">
                <div class="head">
                    <h2>${player.nom} ${player.prenom}</h2>
                    <p>Date de naissance : ${player.dateNaissance}</p>
                    <p>Numéro de licence : ${player.numeroLicence}</p>
                    <p>Taille : ${player.taille} cm</p>
                    <p>Poids : ${player.poids} kg</p>
                    <p>Statut : ${player.statut}</p>
                    <p>Poste préféré : ${player.postePrefere}</p>
                    <p>Est première ligne : ${player.estPremiereLigne}</p>
                </div>
                <img src="${player.url}" alt="Photo de profil de ${player.nom} ${player.prenom}" width="80" height="80" class="identity-image profile-picture">
            </div>
            <div class="forms">
                <!-- Consultation -->
                <a href="/gererjoueur.php?type=vue&idJoueur=${player.idJoueur}" class="forms saisie button">
                    <p>Consulter le joueur</p>
                </a>
                <!-- Modification -->
                <a href="/gererjoueur.php?type=modification&idJoueur=${player.idJoueur}" class="forms modify button">
                    <p>Modifier le joueur</p>
                </a>
                <!-- Suppression -->
                <button type="submit" class="delete" value="${player.idJoueur}" onclick="supprimer(${player.idJoueur})">Supprimer</button>
            </div>
        </section>
    `));
}

// Usage Example
$(document).ready(async function () {
    await getJoueurs()
});