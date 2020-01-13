$(document).ready(function () {
    $("#comment-form").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        const apiUrl = "http://localhost:8000";
        const $commentSection = $(".comment-section");
        $.ajax({
            url : apiUrl + "/?page=comment",
            method : "POST",
            dataType : "json",
            data : formData
        }).done((res)=>{
            $commentSection.append("<p>" + res.author + "</p>");
            $commentSection.append("<div class = 'comment'>" + res.content + "</div>");
            $commentSection.append("<button value='" + res.id + "' onclick='deleteComment(this)'>remove</button>");
            $commentSection.append("<div class = 'grade'>Ocena </div>");
            $("#comment-info").html("");
            $("#comment-info").append("Komentarz został dodany.");
        });
    });
})


function deleteComment(button) {
    const apiUrl = "http://localhost:8000";
    let id = $(button).val();
    $.ajax({
        url : apiUrl + "/?page=deleteComment&id=" + id,
    }).done((res)=>
    {
        $(button).next().remove();
        $(button).prev().remove();
        $(button).prev().remove();
        $(button).remove();
        $("#comment-info").html("");
        $("#comment-info").append("Komentarz został usunięty!");
    });
}

