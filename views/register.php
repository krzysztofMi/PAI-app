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
            <form>
                Login:
                <input type="text">
                Email:
                <input type="email">
                Hasło:
                <input type="password">
                Powtórz hasło:
                <input type="password">
                <button type="button" class="button-yellow">Zarejestruj się</button>
            </form>
            <a style="width: 50%;" href="login.php">
                <button class="button-yellow">Nie masz konta? Zaloguj się!</button>
            </a>
        </div>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

