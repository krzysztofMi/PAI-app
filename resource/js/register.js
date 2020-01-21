
function validateForm() {
    let pass = true;
    let $login = $('#login');
    let $email = $('#email');
    let $password = $('#password');
    let $re_password = $('#re_password');
    if(validate($login, 3, 16)){
        pass = false;
    }else resetInputCss($login);
    if(validate($email)){
        pass = false;
    }else resetInputCss($email);
    if(validate($password, 6, 16)){
        pass = false;
    }else resetInputCss($password);
    if($password.val() !== $re_password.val()){
        changeInputCss($re_password, "Hasła różnią się od siebie.");
        pass = false;
    }else resetInputCss($re_password);
    return pass;
}

function validate($form, minSize = 0, maxSize = 0) {
    if(empty($form)){
        changeInputCss($form, "Pole " +  $form.attr('id') + " nie może być puste!");
        return true;
    }
    if($form.attr('type') !== "email"){
        if(checkTextSize($form, minSize, maxSize)) {
            return true;
        }
    }
    return false;
}

function checkTextSize($form, min, max) {
    if(checkIfTooSmall($form.val(), min)) {
        changeInputCss($form, $form.attr('id') + " za małe od " + min + " do " + max + " znaków.");
        return true;
    }
    if(checkIfTooLarge($form.val(), max)){
        changeInputCss($form, $form.attr('id') + " za duże od " + min + " do " + max + " znaków.");
        return true;
    }
    return false;
}

function checkIfTooSmall(txt, minSize) {
    return txt.length < minSize;
}

function checkIfTooLarge(txt, maxSize) {
    return txt.length > maxSize;
}

function empty($field) {
    if($field.val() === ""){
        return true;
    }
    return false;
}

function changeInputCss($form, txt){
    $form.val("");
    $form.css(  "border", "10px solid red");
    $form.attr('placeholder', txt);
}

function resetInputCss($form) {
    $form.css("border", "none");
    $form.attr('placeholder', "");
}