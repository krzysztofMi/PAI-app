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
            <form action="?page=register" method="POST">
                Login:
                <input name="login" type="text">
                Email:
                <input name="email" type="email">
                Hasło:
                <input name="password" type="password">
                Powtórz hasło:
                <input name="repassword" type="password">
                <button type="submit" class="button-yellow button-round">Zarejestruj się</button>
            </form>
            <a style="width: 50%;" href="?page=login">
                <button class="button-yellow button-round">Nie masz konta? Zaloguj się!</button>
            </a>
        </div>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

