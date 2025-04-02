const playersCards = $('div.player-card');
const slotsFDM = $('.position-slot');
const fieldNbJoueurs = $('#fieldNbJoueurs');
const fieldNbPremieresLignes = $('#fieldNbPremieresLignes');
const buttonValider = $('button#buttonValider');
const buttonAjouter = $('button#buttonAjouter');
const buttonSaisirScore = $('button#buttonScore');
const divJoueursDisponibles = $('div#players');

let draggedPlayer = null;


// Helper function to update UI counts
function updateUI() {
    fieldNbJoueurs.text(nbJoueurs.toString());
    fieldNbPremieresLignes.text(nbPremieresLignes.toString());
    buttonValider.disabled = nbJoueurs < 11 || nbPremieresLignes < 4;
    if(nbJoueurs < 11 || nbPremieresLignes < 4)
        buttonValider.addClass('disabled');
    else
        buttonValider.removeClass('disabled');
}

async function remplirFDM(){
    const feuilles = {};
    slotsFDM.each(function() {
        const idJoueur = $(this).find('input[name="idJoueur"]').val();
        if (idJoueur) {
            console.log(idJoueur);
            console.log($(this).data("position"));
            feuilles[$(this).data("position")] = idJoueur;
        }
    });
    const data = {}
    data["feuilles"] = feuilles;
    data["idMatch"] = parseInt($('input[name="idMatch"]').val());
    console.log("data", data);
    try{
        const response = await $.ajax("https://rugbygestionapi.alwaysdata.net/fdm", {
            method: "POST",
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify(data),
            headers:{"Authorization": Cookies.get("token")}
        })
        console.log(response.response)
        alert(response.response)
    }catch(xhr){
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

async function validerFDM(){
    try{
        const response = await $.ajax("https://rugbygestionapi.alwaysdata.net/fdm", {
            method: "PUT",
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify({
                "idMatch" : parseInt($('input[name="idMatch"]').val())
            }),
            headers:{"Authorization": Cookies.get("token")}
        })
        console.log(response.response)
        alert(response.response)
    }catch(xhr){
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

async function saisirScore(){
    try{
        const response = await $.ajax("https://rugbygestionapi.alwaysdata.net/matchs", {
            method: "PATCH",
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify({
                "idMatch" : parseInt($('input[name="idMatch"]').val()),
                "resultat" : $('select[name="resultat"]').val()
            }),
            headers:{"Authorization": Cookies.get("token")}
        })
        console.log(response.response)
        alert(response.response)
    }catch(xhr){
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

// Helper function to update counts
function updateCounts(isPremiereLigne, delta) {
    nbJoueurs += delta;
    if (isPremiereLigne) {
        nbPremieresLignes += delta;
    }
}

updateUI();
if(archiveMatch === 0) {
// Add dragover and drop event listeners to the "joueurs" container
    divJoueursDisponibles.on('dragover', (e) => e.preventDefault());

    divJoueursDisponibles.on('drop', (e) => {
        e.preventDefault();
        divJoueursDisponibles.append(draggedPlayer); // Return player to the "joueurs" container
    });

// Add drag-and-drop behavior to each slot
    slotsFDM.each(function () {
        // Allow drop on the slot
        $(this).on('dragover', function (e) {
            e.preventDefault();
        });

        $(this).on('drop', function (e) {
            e.preventDefault();

            if (draggedPlayer) {
                const playerId = $(draggedPlayer).find('input[name="idJoueur"]').val();
                const playerPremiereLigne = $(draggedPlayer).find('input[name="premiereLigne"]').val() === 'Oui';

                // Find the hidden input for this slot and set its value
                const hiddenInput = $(this).next('input[type="hidden"]');
                if (hiddenInput.length > 0 && hiddenInput[0].type === 'hidden') {
                    hiddenInput.val(playerId);

                    if ($(this).children().length === 0) {
                        // Slot was empty; update counts
                        updateCounts(playerPremiereLigne, 1);
                    } else {
                        // Slot was occupied; handle swapping logic
                        const existingPlayer = $(this).children().first();
                        const existingPremiereLigne = $(existingPlayer).find('input[name="premiereLigne"]').val() === 'Oui';

                        // Return the existing player to "joueurs"
                        divJoueursDisponibles.append(existingPlayer);

                        // Adjust counts based on swapping
                        if (playerPremiereLigne && !existingPremiereLigne) {
                            nbPremieresLignes++;
                        } else if (!playerPremiereLigne && existingPremiereLigne) {
                            nbPremieresLignes--;
                        }
                    }

                    // Add the dragged player to the slot
                    console.log("Appending draggedPlayer to the slot");
                    $(this).append(draggedPlayer);

                    // Update displayed counts
                    updateUI();
                }
            }
        });

        $(this).on('dragleave', (e) => {
            console.log('draggedPlayer:', draggedPlayer);
            console.log('slot.firstChild:', $(this).children().first());
            console.log("FirstChild == dragged" + $(this).firstChild === draggedPlayer);
            if (draggedPlayer && $(this).children().first().is(draggedPlayer)) {
                // Remove player from the slot
                $(this).remove(draggedPlayer);

                // Return player to "joueurs"
                divJoueursDisponibles.append(draggedPlayer);
                const hiddenInput = $(this).next('input[type="hidden"]');
                if (hiddenInput.length > 0) {
                    hiddenInput.val("");
                    console.log("hiddenInput.value", hiddenInput.val());
                }
                // Update counts
                const playerPremiereLigne = $(draggedPlayer).find('input[name="premiereLigne"]').val() === 'Oui';
                updateCounts(playerPremiereLigne, -1);
                // Update displayed counts
                updateUI();
            }
        });
    });

    console.log("Players to load");
    playersCards.each(function () {
        // Allow drop on the slot
        $(this).on('dragstart', (e) => {
            setTimeout(() => $(this).addClass('dragging'), 0)
            draggedPlayer = $(this);
        });

        if (archiveMatch === 0)
            $(this).attr('draggable', 'true');


        $(this).on('dragend', (e) => {
            draggedPlayer = null;
            $(this).removeClass('dragging');
        });
    });
}

buttonAjouter.on("click", async function(e){
    e.preventDefault();
    await remplirFDM();
    console.log("Saisie de la FDM")
})

buttonValider.on("click",async function(e){
    e.preventDefault()
    await validerFDM();
    console.log("Validation de la fdm")
})

buttonSaisirScore.on("click",async function(e){
    e.preventDefault()
    await saisirScore()
    console.log("Saisie du score")
})