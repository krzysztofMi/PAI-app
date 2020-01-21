
function changeContentToAddress(addressId) {
    const apiUrl = "http://localhost:8000";
    $.ajax({
        url: apiUrl + "/?page=address&id="+ addressId,
        dataType: "json"
    }
    ).done((res)=>{
        $("#content-paragraph").html(res.name)
        if(res.street != null ){
            $("#content-paragraph").append(" ul. " + res.street);
        }
        if(res.number != null){
            $("#content-paragraph").append(" kod pocztowy: " + res.number);
        }
    });
}

function changeContentToDescription(attractionId) {
    const apiUrl = "http://localhost:8000";
    $.ajax({
            url: apiUrl + "/?page=attraction&id="+ attractionId,
            dataType: "json"
        }
    ).done((res)=>{
        let description = res["description"] === null ? "Brak opisu." : res["description"];
        $("#content-paragraph").html(description);
    });
}

function openGradeList() {
    $(".dropdown-content").addClass("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.markButton')) {
        var $dropdowns = $(".dropdown-content");
        var i;
        for (i = 0; i < $dropdowns.length; i++) {
            var openDropdown = $dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}