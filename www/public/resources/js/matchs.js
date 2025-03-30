let divMatchs = $('article#matchs');

async function getMatchs() {
    try {
        const response = await $.ajax('http://rugbygestion.api/matchs',{
            method: "GET",
            contentType: "application/json", // Important for sending JSON
        })
        console.log(response)
        response.data.forEach(createMatchCard);
    } catch (xhr) {
        console.error("XHR Error:", xhr);
        console.error(xhr.responseText);
        try {
            const json = JSON.parse(xhr.responseText);
            alert(json.response);
        } catch (e) {
            console.error("Could not parse response as JSON:", xhr.responseText);
            alert("An error occurred, but the response is not valid JSON.");
        }
    }
}

async function supprimer(idMatch){
    try {
        const response = await $.ajax('http://rugbygestion.api/matchs',{
            method: "DELETE",
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify({
                "idMatch": idMatch
            }),
            headers:{"Authorization": Cookies.get("token")}
        })
        $(`#section-card-${idMatch}`).remove();
    } catch (xhr) {
        console.error(xhr.responseText);
        try {
            const json = JSON.parse(xhr.responseText);
            alert(json.response);
        } catch (e) {
            console.error("Could not parse response as JSON:", xhr.responseText);
            alert("An error occurred, but the response is not valid JSON.");
        }
    }
}

function createMatchCard(match) {
    // Create section container
    const section = $("<section>").addClass("section-card").attr("id", `section-card-${match.idMatch}`);

    // Card info
    const cardInfo = $("<div>").addClass("card-info");
    const head = $("<div>").addClass("head");
    head.append($("<h2>").text(`Match du ${match.dateHeure}`));
    head.append($("<p>").html(`<strong>Adversaire:</strong> ${match.adversaire}`));
    head.append($("<p>").html(`<strong>Lieu:</strong> ${match.lieu}`));
    cardInfo.append(head);

    // Match status
    const statut = $("<div>").addClass("statut");
    const matchDate = new Date(match.dateHeure);
    const now = new Date();

    if (matchDate < now) {
        statut.append($("<p>").addClass("result").text("Match passé"));
        if (match.resultat !== null) {
            statut.append($("<p>").addClass("result").text("Match validé"));
            statut.append($("<p>").text(`Score : ${match.resultat}`));
        } else {
            statut.append($("<p>").text("Aucun résultat"));
        }
    } else {
        statut.append($("<p>").addClass("result").text("Match à venir"));
    }

    // Forms section
    const forms = $("<div>").addClass("forms");
    forms.append($("<a>")
        .attr("href", `/gerermatch.php?type=vue&idMatch=${match.idMatch}`)
        .addClass("forms saisie button")
        .append($("<p>").text("Voir la feuille de match"))
    );
    if (match.valider || match.archive) {
        forms.append($("<p>").addClass("color-red").css("text-align", "center").text("Ce match est archivé et ne peut être modifié."));
    } else {
        forms.append($("<a>")
            .attr("href", `/gerermatch.php?type=modification&idMatch=${match.idMatch}`)
            .addClass("forms modify button")
            .append($("<p>").text("Modifier le match"))
        );
    }

    // Delete button
    const deleteButton = $("<button>")
        .attr("type", "submit")
        .addClass("delete")
        .text("Supprimer")
        .click(() => supprimer(match.idMatch));

    forms.append(deleteButton);

    // Append everything to the section
    section.append(cardInfo, statut, forms);

    // Append section to the container in the DOM
    divMatchs.append(section);  // Assuming there's a container with id "matchContainer"
}

getMatchs()
// Usage Example
$(document).ready(function () {
    getMatchs();
});