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
            <h1>Logowanie</h1>
        </div>
        <form action="?page=login" method="POST">
            <div class="message">
                <?php
                if(isset($loginMessage)){
                    echo $loginMessage;
                }
                ?>
            </div>
            Login:
            <input name="login" type="text" placeholder="Twój login...">
            Hasło:
            <input name="password" type="password" placeholder="Twoje hasło...">
            <button type="submit" class="button-yellow">Zaloguj się</button>
        </form>
        <a href="?page=register" style="width: 50%">
            <button class="button-yellow">Nie masz konta? Zarejestruj się!</button>
        </a>
    </div>
<?php include "fragment/footer.php" ?>
</body>
</html>
