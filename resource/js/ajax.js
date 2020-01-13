function myFunction(button) {
    const apiUrl = "http://localhost:8000";
    const id = $(button).val();
    const $attractionName = $("#aName");
    const $attractionDescription = $("#aDesc");
    const $attractionId = $("#aId");
    $.ajax({
        url : apiUrl + "/?page=attraction&id=" + id,
        dataType: "json"
    }).done( (res) =>{
        $attractionName.empty();
        $attractionName.text(res.name);
        $attractionDescription.empty();
        $attractionDescription.text(res.short_description);
        $attractionId.val(id);
        if($("#aId").val() != ""){
            $("#position-down").attr("disabled", false);
        }
    });

}

function nextPage(){
    attrId = $("#aId").val();

    if(attrId == ""){
        return
    }
    $("#form").submit();
}

function getUrlParameter(parameter) {
    let pageUrl = window.location.search.substring(1);
    let urlVariables = pageUrl.split("&");
    for(let urlVariable of urlVariables){
        let splitUrlVariable = urlVariable.split("=");
        if(splitUrlVariable[0] == parameter){
            return splitUrlVariable[1];
        }
    }
}
