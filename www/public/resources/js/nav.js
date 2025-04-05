let aLogout = $('a#logout');

aLogout.on('click', function(e){
    e.preventDefault();
    console.log("Logout clicked");
    Cookies.remove("token");
    window.location.href = "/auth";
})