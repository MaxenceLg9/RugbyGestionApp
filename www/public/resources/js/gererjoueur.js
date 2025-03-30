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
    console.log(data)
    try {
        await $.ajax(`http://rugbygestion.api/joueurs`,{
            method: method,
            contentType: "application/json", // Important for sending JSON
            data: JSON.stringify(data),
            headers:{"Authorization": Cookies.get("token")}
        })
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