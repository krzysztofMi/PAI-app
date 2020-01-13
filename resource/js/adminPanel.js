
$(document).ready(function () {
    const apiUrl = "http://localhost:8000";

    $.ajax({
        url: apiUrl + "?page=users",
        dataType: "json"
    }).done((res)=>{
        var idList = new Array();
        res.forEach(el =>{
            if(idList.includes(el.id)){

            }else {
                $("#user-table").append("<tr>" +
                    "<th>" + el.login + "</th>" +
                    "<th>" + el.email + "</th>" +
                    "<th>" + el.role + "</th>" +
                    "<th>Edytuj</th>" +
                    "<th>check</th>" +
                    "</tr>")
                idList.push(el.id);
            }
        });
    })
});

