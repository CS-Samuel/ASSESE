// Function gets cookie information

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Sets cookie value to -2 so no instructor privileges or access to those pages

function logOut(){
    document.cookie = "ASSESE = -2";
    var test = getCookie("ASSESE"); 
    console.log("Permission Set to: " + test);
    window.location = "instructor.html";
}

// Window/page redirect function

function mainPage(){
    window.location = "instructorMain.html";
}


