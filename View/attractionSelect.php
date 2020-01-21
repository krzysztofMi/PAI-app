<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../resource/style/style.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/attraction.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/attractionSelect.css">
    </head>
    <body>
        <?php include "fragment/authorizationUser.php" ?>
        <?php include "fragment/header.php" ?>
        <div class="container">
            <nav class="image-grid">
            <?php foreach($attractions as $attraction): ?>
                    <div class="wrapper">
                        <button value="<?=$attraction->getId()?>" onclick="myFunction(this)">
                            <img src="<?=MEDIA_FOLDER.$attraction->getImagePath()?>">
                            <div class="attraction-name">
                                <p><?=$attraction->getName()?></p>
                            </div>
                        </button>
                    </div>
            <?php endforeach ?>
            </nav>
            <article>
                <div class="information">
                    <form style="display: none" action="?page=attraction/view" method="post" id="form">
                        <input name="aId" type="hidden" id="aId"/>
                    </form>
                    <h1 id="aName">
                        <?php
                            $isEmpty = empty($attractions);
                            $text = $isEmpty ? "Brak atrakcji." : "Wybierz atrakcję";
                            echo $text;
                        ?>
                    </h1>
                    <p id="aDesc">
                        <?php
                            $text = $isEmpty ? "Wybrane przez ciebie mastio jest nieatrakcyjne :(" : "Tu pojawi się opis wybranej przez ciebie atrakcji.";
                            echo $text;
                        ?>
                    </p>
                    <button <?php if($isEmpty) echo "hidden=true"?> onclick="nextPage()" class="button-yellow black-border" id="position-down">
                        Sprawdź
                    </button>
                </div>
                <div>
                    <a href="?page=attraction/type"><button class="button-yellow">Powrót</button></a>
                </div>
            </article>
        </div>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../resource/js/ajax.js"></script>

<script>
    $(document).ready(function () {
        if($("#aId").val() == ""){
            $("#position-down").attr("disabled", true);
        }
    })
</script>