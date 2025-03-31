const playersCards = $('div.player-card');
const slotsFDM = $('.position-slot');
const fieldNbJoueurs = $('#fieldNbJoueurs');
const fieldNbPremieresLignes = $('#fieldNbPremieresLignes');
const buttonValider = $('#buttonValider');
const divJoueursDisponibles = $('div#players');

let draggedPlayer = null;

updateUI();

// Add dragover and drop event listeners to the "joueurs" container
divJoueursDisponibles.on('dragover', (e) => e.preventDefault());

divJoueursDisponibles.on('drop', (e) => {
    e.preventDefault();
    divJoueursDisponibles.append(draggedPlayer); // Return player to the "joueurs" container
});

// Add drag-and-drop behavior to each slot
slotsFDM.each(function() {
    // Allow drop on the slot
    $(this).on('dragover', function(e) {
        e.preventDefault();
    });

    $(this).on('drop', function (e) {
        e.preventDefault();

        if (draggedPlayer) {
            const playerId = $(draggedPlayer).find('input[name="idJoueur"]').val();
            const playerPremiereLigne = $(draggedPlayer).find('input[name="premiereLigne"]').val() === '1';

            // Find the hidden input for this slot and set its value
            const hiddenInput = $(this).next('input[type="hidden"]');
            if (hiddenInput && hiddenInput.type === 'hidden') {
                hiddenInput.value = playerId;

                if (this.children.length === 0) {
                    // Slot was empty; update counts
                    updateCounts(playerPremiereLigne, 1);
                } else {
                    // Slot was occupied; handle swapping logic
                    const existingPlayer = this.firstElementChild;
                    const existingPremiereLigne = $(existingPlayer).find('input[name="premiereLigne"]').val() === '1';

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
                console.log("Appending draggedPlayer to the slot")
                $(this).append(draggedPlayer);

                // Update displayed counts
                updateUI();
            }
        }
    });

    $(this).on('dragleave', (e) => {
        console.log('draggedPlayer:', draggedPlayer);
        console.log('slot.firstChild:', $(this).firstChild);
        console.log("FirstChild == dragged" + $(this).firstChild === draggedPlayer);
        if (draggedPlayer && $(this).firstChild === draggedPlayer) {
            // Remove player from the slot
            $(this).remove(draggedPlayer);

            // Return player to "joueurs"
            divJoueursDisponibles.append(draggedPlayer);
            const hiddenInput = $(this).nextElementSibling;
            if (hiddenInput && hiddenInput.type === 'hidden') {
                hiddenInput.value = "";
                console.log("hiddenInput.value", hiddenInput.value);
            }
            // Update counts
            const playerPremiereLigne = $(draggedPlayer).find('input[name="premiereLigne"]').val() === '1';
            updateCounts(playerPremiereLigne, -1);
            // Update displayed counts
            updateUI();
        }
    });
});

// Helper function to update counts
function updateCounts(isPremiereLigne, delta) {
    nbJoueurs += delta;
    if (isPremiereLigne) {
        nbPremieresLignes += delta;
    }
}

// Helper function to update UI counts
function updateUI() {
    fieldNbJoueurs.innerHTML = nbJoueurs.toString();
    fieldNbPremieresLignes.innerHTML = nbPremieresLignes.toString();
    buttonValider.disabled = nbJoueurs < 11 || nbPremieresLignes < 4;
    if(nbJoueurs < 11 || nbPremieresLignes < 4)
        buttonValider.addClass('disabled');
    else
        buttonValider.removeClass('disabled');
}
console.log("Players to load");
playersCards.each(function() {
    // Allow drop on the slot
    $(this).on('dragstart', (e) => {
        draggedPlayer = $(this);
        setTimeout(() => $(this).addClass('dragging'), 0)
    });

    if(archiveMatch === 0)
        $(this).attr('draggable', 'true');


    $(this).on('dragend', (e) => {
        draggedPlayer = null;
        $(this).removeClass('dragging');
    });
});
