<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../resource/style/style.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/attraction.css">
        <link rel="stylesheet" type="text/css" href="../resource/style/attractionView.css">
    </head>
    <body>
        <?php include "fragment/authorizationUser.php" ?>
        <?php include "fragment/header.php" ?>
        <article class="verticalContainer">
            <div style="margin-top: 2em;">
                <section class="name" style="width: 20%">
                    <?=$attraction['name']?>
                </section>
                <section class="mainArticle">
                    <div class="btn-group" style="width: 100%">
                        <button class="button-yellow" style="width: 33.3%" onclick="changeContentToDescription(<?=json_encode($attraction['id'])?>)">Opis</button>
                        <button class="button-yellow" style="width: 33.3%">Ceny</button>
                        <button class="button-yellow" onclick="changeContentToAddress(<?=json_encode($attraction['address_id'])?>)" style="width: 33.3%">Położenie</button>
                    </div>
                    <div>
                        <p id="content-paragraph"><?=$attraction['description']?></p>
                        <div style="padding-bottom: 0.5em">
                            Link do strony.
                            <div class="rightContent">
                                <button class="markButton" onclick="openGradeList()">Oceń</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <button value="1" onclick="setGrade(this)">1</button>
                                    <button value="2" onclick="setGrade(this)">2</button>
                                    <button value="3" onclick="setGrade(this)">3</button>
                                    <button value="4" onclick="setGrade(this)">4</button>
                                    <button value="5" onclick="setGrade(this)">5</button>
                                </div>
                                <img src="../resource/img/heart.svg">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="images image-grid" style="grid-template-columns: 0.5fr 0.5fr;">
                    <img class="image" src="../3S/images/attraction/wawel.jpg">
                    <img class="image" src="../3S/images/attraction/wawel.jpg">
                    <img class="image" src="../3S/images/attraction/wawel.jpg">
                    <img class="image" src="../3S/images/attraction/wawel.jpg">
                </section>
            </div>
            <section class="comment-section">
                <h3>Dodaj komentarz: </h3>
                <div style="display:inline;">
                    <form action="?page=attraction/view&comment=add" id="comment-form" method="POST">
                        <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                        <input type="hidden" name="attraction_id" value="<?=$attraction['id']?>">
                        <input id="hello" type="text" name="content" style="width: 100%;" placeholder="treść ...">
                        <input type="submit" value="Dodaj komentarz">
                    </form>
                </div>
                <div>
                    <p id="comment-info"></p>
                </div>
                <?php foreach ($comments as $comment) : ?>
                <p class="author"><?=$comment->getAuthorLogin();?></p>
                <div class="comment">
                    <?=$comment->getContent();?>
                </div>
                <button value="<?=$comment->getId()?>"
                        <?php $isWriteByMe = $comment->getAuthor()->getId() === $_SESSION['user_id'];
                            if($isWriteByMe || $privileges){

                            }else{
                                echo "hidden='true'";
                            }?>
                        onclick="deleteComment(this)">remove</button>
                <div class="grade">
                    Ocena
                </div>
                <?php endforeach;?>
            </section>
        </article>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../resource/js/comment.js"></script>
<script src="../resource/js/attractionViewScripts.js"></script>
<script src="../resource/js/gradeAjax.js"></script>