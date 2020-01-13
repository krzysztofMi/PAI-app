<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../resource/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include "fragment/authorizationAdmin.php"?>
        <?php include "fragment/header.php"?>
        <nav>
            <form action="?page=adminPanel" method="POST">
                <button type="submit" name="content" value="society">Społeczność</button>
                <button type="submit" name="content" value="content">Zawartość</button>
                <button type="submit" name="content" value="help">Pomoc</button>
                <button type="submit" name="content" value="content">Ogłoszenia</button>
            </form>
        </nav>
        <article id="admin-content">
            <?php
            if(isset($_POST['content'])) {
                switch ($_POST['content']) {
                    case "society":
                        include "fragment/admin/userFinder.php";
                        break;
                    case "content":
                        include "fragment/admin/content.php";
                        break;
                    case "help":
                        include "fragment/admin/help.php";
                        break;
                    case "classifieds":
                        include "fragment/admin/classifield.php";
                        break;
                }
            }
            ?>
        </article>
        <?php include "fragment/footer.php" ?>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
