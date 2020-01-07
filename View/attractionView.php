<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../resource/style/style.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/attraction.css">
    </head>
    <body>
        <?php include "fragment/authorization.php" ?>
        <?php include "fragment/header.php" ?>
        <article class="verticalContainer">
            <div style="margin-top: 2em;">
                <section class="name" style="width: 20%">
                    <?=$attraction['name']?>
                </section>
                <section class="mainArticle">
                    <div class="btn-group" style="width: 100%">
                        <button class="button-yellow" style="width: 33.3%">Opis</button>
                        <button class="button-yellow" style="width: 33.3%">Ceny</button>
                        <button class="button-yellow" style="width: 33.3%">Położenie</button>
                    </div>
                    <div>
                        <p><?=$attraction['short_description']?></p>
                        <div style="padding-bottom: 0.5em">
                            Link do strony.
                            <div class="rightContent">
                                <button class="markButton">Oceń</button>
                                <img src="../resource/img/heart.svg">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="images image-grid" style="grid-template-columns: 0.5fr 0.5fr;">
                    <img src="../3S/images/attraction/wawel.jpg">
                    <img src="../3S/images/attraction/wawel.jpg">
                    <img src="../3S/images/attraction/wawel.jpg">
                    <img src="../3S/images/attraction/wawel.jpg">
                </section>
            </div>
            <section class="comment-section">
                <p class="author">Autor</p>
                <div class="comment">
                    Komentarz
                </div>
                <div class="grade">
                    Ocena
                </div>
            </section>
        </article>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
