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
        <div class="container">
            <!-- foreach -->
            <nav class="image-grid">
            <?php foreach($attractions as $attraction): ?>
                <form action="" method="POST">
                    <div class="wrapper">
                        <input type=hidden name="name" value="<?= $attraction->getName()?>">
                        <input type=hidden name="description" value="<?= $attraction->getShortDescription() ?>">
                        <button type="submit">
                            <img src="<?=MEDIA_FOLDER.$attraction->getImagePath()?>">
                            <div class="attraction-name">
                                <p><?= $attraction->getName()?></p>
                            </div>
                        </button>
                    </div>
                </form>
            <?php endforeach ?>
            </nav>
            <article>
                <div class="information">
                    <h1>
                        <?php
                            $isEmpty = empty($attractions);
                            if(isset($_POST['name'])){
                                echo $_POST['name'];
                            }else{
                                $text = $isEmpty ? "Brak atrakcji." : "Wybierz atrakcję";
                                echo $text;
                            }
                        ?>
                    </h1>
                    <p>
                        <?php
                        if(isset($_POST['description'])){
                           echo $_POST['description'];
                        }else{
                            $text = $isEmpty ? "Wybrane przez ciebie mastio jest nieatrakcyjne :(" : "Tu pojawi się opis wybranej przez ciebie atrakcji.";
                            echo $text;
                        }
                        ?>
                    </p>
                    <a href="?page=attraction/view" <?php if($isEmpty) echo "hidden=true"?>>
                        <button class="button-yellow black-border" id="position-down">
                            Sprawdź
                        </button>
                    </a>
                </div>
                <div>
                    <a href="?page=attraction"><button class="button-yellow">Powrót</button></a>
                </div>
            </article>
        </div>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="javascript">

</script>
