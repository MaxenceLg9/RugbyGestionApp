let input = $('input')
let select = $('select')

async function gererMatch(method){
    let data = {};
    input.each(function(){
        data[this.name] = this.value;
    })
    select.each(function(){
        data[this.name] = this.value;
    })
    const date = new Date(data["dateHeure"]);

    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');

    data["dateHeure"] = `${year}-${month}-${day} ${hours}:${minutes}`;
    console.log(JSON.stringify(data))
    try {
        const response = await $.ajax(`https://rugbygestionapi.alwaysdata.net/matchs`,{
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