<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../resource/style/style.css">
    </head>
    <body>
        <?php include "fragment/header.php" ?>
        <article class="container">
            <div class="logo">
                <img src="../resource/img/logo.svg">
            </div>
            <div class="buttons">
                <div class="message">
                    <?php
                        if(isset($logoutMessage)){
                            echo $logoutMessage;
                        }
                    ?>
                </div>
                <div>
                    <a href="?page=login"><button class="button-yellow button-go-down button-round">Zaloguj się</button></a>
                </div>
                <div>
                    <a href="?page=register"><button class="button-yellow button-round">Zarejestruj się</button></a>
                </div>
            </div>
        </article>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>