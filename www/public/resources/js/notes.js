let button = $('button[type="submit"]');
let input = $('input')
let card = $('section.section-card');

async function saisirNotes(){
    let data = {};
    const notes = {}
    card.each(function(){
        const numero = $(this).data("numero")
        const note = $(this).find('input[name="notes"]').val();
        if (numero) {
            notes[numero] = note;
        }
    })
    data["feuilles"] = notes;
    data["idMatch"] = parseInt($('input[name="idMatch"]').val());
    console.log(data)
    try {
        const response = await $.ajax("https://rugbygestionapi.alwaysdata.net/fdm", {
            method: 'PATCH',
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify(data),
            headers: {"Authorization": Cookies.get("token")}
        })
        console.log(response.data)
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

button.on('click', async function(e){
    e.preventDefault();
    await saisirNotes();
})