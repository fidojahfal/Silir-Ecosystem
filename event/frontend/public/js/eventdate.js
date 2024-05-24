function getQueryParam(name) {
    var urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

function getSessionData(key) {
    return sessionStorage.getItem(key);
}

function setEventDate() {
    
    var queryDate = getQueryParam("date");
    
    var selectedDate = getSessionData("selectedDate");

    if (queryDate) {
        document.getElementById("eventDate").value = decodeURIComponent(queryDate);
    }
    
    else if (selectedDate) {
        document.getElementById("eventDate").value = selectedDate;
    } else {
        
        document.getElementById("eventDate").value = "";
    }

    sessionStorage.removeItem("selectedDate");
}

window.addEventListener("load", setEventDate);