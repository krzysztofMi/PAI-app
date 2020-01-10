
<header class="navbar navbar-expand-lg" id="heder">
    <img src="../../resource/img/logo_mini.svg">
    <?php if(!empty($_SESSION)){?>
        <nav>
            <a href="?page=logout">Wyloguj</a>
            <p><?=$_SESSION['id']?></p>
        </nav>
    <?php }?>
</header>
