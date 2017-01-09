<!DOCTYPE HTML>
<html  lang="pl">
    <head>
        <title>Struna za struną</title>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico"/>
        <meta name="author" content="Mateusz Szymanowski"/>
        <link rel="stylesheet" href="static/css/blueimp-gallery.min.css">
        <link rel="stylesheet" type="text/css" href="static/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="static/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="static/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="static/js/js.js"></script>
    </head>

    <body>
        <div id="container">
            <header>
                <a href="index"><span>Struna za struną</span></a>
            </header>

            <nav>
                <?php @include_once("fragments/nav.php");?>
            </nav>

            <section>
                <?php foreach($imgs as $img): ?>
                    <div class="img">  
                        <a href="images/<?= $img['title'].'_wm.'.$img['extension'] ?>" title="<?= $img['title'] ?>">
                            <img src="images/<?= $img['title'].'_thumb.'.$img['extension'] ?>" alt="<?= $img['title'] ?>"><br/>
                        </a>
                            <?php if($img['access'] == 'private') echo "Prywatne<br/>"; ?>
                            Autor: <?= $img['author'] ?><br/>
                            Tytuł: <?= $img['title'] ?><br/>
                        <label> <input type="checkbox" form="favorite" name="favorite[]" value="<?= $img['_id'] ?>"
                        <?php 
                            if(isset($_SESSION['favorite']) && in_array($img["_id"], $_SESSION['favorite'])):?> checked="checked" 
                        <?php endif; ?>/> Ulubione </label>
                    </div>
                    
                <?php endforeach; ?>
                <div style="clear: both;"></div>
                <form id="favorite" action="save_favorite" method="POST">
                    <input type="submit" value="Zapamiętaj wybrane"/>                    
                </form>

            </section>
        </div>

        <footer>
            <?php @include_once("fragments/footer.html");?>
        </footer>
    </body>
</html>


		
