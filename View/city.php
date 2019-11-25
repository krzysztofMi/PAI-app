<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../resource/style/style.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/city.css">
    </head>
    <body>
        <?php include "fragment/header.php" ?>
            <div class="container">

                <nav class="cityView">
                    <p style="text-align: center">Wybierz miasto które cię interesuje</p>
                    <form action="" method="POST">
                        <input type="submit" value="Kraków" class="button-yellow-height" name="cityButton">
                        <input type="submit" value="Warszawa" class="button-yellow-height" name="cityButton">
                        <input type="submit" value="Gdańsk" class="button-yellow-height" name="cityButton">
                        <input type="submit" value="Wrocław" class="button-yellow-height" name="cityButton">
                        <input type="submit" value="Łódź" class="button-yellow-height" name="cityButton">
                    </form>
                </nav>
                <article>
                    <div>
                        <div class="cityDescription">
                            <h1 style="text-align: center">
                                <?php
                                    if(isset($_POST['cityButton'])) {
                                        $_SESSION['city'] = $_POST["cityButton"];
                                        echo $_POST["cityButton"];}
                                    else{
                                        echo "Miasto";
                                    }
                                 ?>
                            </h1>
                            <p>DesaesalehahelsaheDesaesalehahelsaheDesaesalehahelsaheDesaesalehahelsahe</p>
                        </div>
                        <a href="?page=attraction" class="flexCenter"><button class="button-yellow button-rounder">Dalej</button></a>
                    </div>
                </article>
            </div>
        <?php include "fragment/footer.php" ?>
    </body>
    </html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
