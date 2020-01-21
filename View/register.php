<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" type="text/css" href="../resource/style/style.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/logRegStyle.css">
    </head>
    <body>
        <?php include "fragment/header.php" ?>
        <div class="verticalContainer">
            <div class="underline-header">
                <h1>Rejestracja</h1>
            </div>
            <div class="message">
                <?php
                    if(isset($registerMessage)){
                        echo($registerMessage);
                    }
                ?>
            </div>
            <form action="?page=register" method="POST" onsubmit="return validateForm()">
                Login:
                <input id="login" name="login" type="text" placeholder="Od 3 do 16 znaków.">
                Email:
                <input id="email" name="email" type="email" placeholder="Proszę podać email typu 'abc@abc.abc'.">
                Hasło:
                <input id="password" name="password" type="password" placeholder="Hasło musi mieć conajmniej 6 znaków max 16.">
                Powtórz hasło:
                <input id="re_password" name="repassword" type="password" placeholder="Proszę powtórzyć hasło.">
                <button type="submit" class="button-yellow button-round button-higher" >Zarejestruj się</button>
            </form>
            <a style="width: 50%;" href="?page=login">
                <button class="button-yellow button-round button-higher" >Masz już konto? Zaloguj się!</button>
            </a>
        </div>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../resource/js/register.js"></script>
<script>
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
</script>