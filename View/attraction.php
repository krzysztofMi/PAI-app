<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../resource/style/style.css">
    </head>
    <body>
        <?php include "fragment/header.php" ?>
        <div class="container">
            <div id = left-corner>
                <p style="border-bottom: solid 3px black">Jesteś w XXXXX</p>
            </div>
            <nav class="buttons">
                <a href="attractionSelect.php"><button class="button-yellow-height">Hotele</button></a>
                <a href="attractionSelect.php"><button class="button-yellow-height">Restauracje</button>
                <a href="attractionSelect.php"><button class="button-yellow-height">Zabytki</button></a>
                <a href="?page=city"><button class="button-yellow-height">Wybierz miasto</button></a>
            </nav>
        </div>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
