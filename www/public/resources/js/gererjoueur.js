let input = $('input')
let select = $('select')
let button = $('button[type="submit"]')

async function gererJoueur(method){
    let data = {};
    input.each(function(){
        data[this.name] = this.value;
    })
    select.each(function(){
        data[this.name] = this.value;
    })
    data["estPremiereLigne"] = parseInt(data["estPremiereLigne"]);
    data["taille"] = parseInt(data["taille"]);
    data["poids"] = parseInt(data["poids"]);
    data["numeroLicence"] = parseInt(data["numeroLicence"]);

    console.log(JSON.stringify(data))
    try {
        const response = await $.ajax(`https://rugbygestionapi.alwaysdata.net/joueurs`,{
            method: method,
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify(data),
            headers:{"Authorization": Cookies.get("token")}
        })
        console.log(response.data)
        alert(response.response)
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