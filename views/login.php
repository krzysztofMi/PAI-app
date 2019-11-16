<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../../resource/style.css">
</head>
<body>
<?php include "fragment/header.php" ?>
    <div>
        <h1>Logowanie</h1>
    </div>
    <form>
        Login:
        <input type="text" placeholder="Twój login...">
        Hasło:
        <input type="password" placeholder="Twoje hasło...">
        <button type="button">Zaloguj się</button>
    </form>
    <div>
        <a href="index.php"><button>Powrót</button></a>
    </div>
    <div>
        <a href="register.php"><button>Nie masz konta? Zarejestruj się!</button></a>
    </div>
<?php include "fragment/foot.php" ?>
</body>
</html>
