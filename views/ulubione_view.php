<!DOCTYPE HTML>
<html  lang="pl">
    <head>
        <title>Struna za struną</title>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico"/>
        <meta name="author" content="Mateusz Szymanowski"/>
        <link rel="stylesheet" type="text/css" href="static/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="static/js/jquery-3.1.1.min.js"></script>
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
                <?php if(isset($imgs)):
                    foreach($imgs as $img): ?>
                    <div class="img">  
                        <a href="images/<?= $img['title'].'_wm.'.$img['extension'] ?>" title="<?= $img['title'] ?>">
                            <img src="images/<?= $img['title'].'_thumb.'.$img['extension'] ?>" alt="<?= $img['title'] ?>"><br/>
                        </a>
                            <?php if($img['access'] == 'private') echo "Prywatne<br/>"; ?>
                            Autor: <?= $img['author'] ?><br/>
                            Tytuł: <?= $img['title'] ?><br/>
                        <label> <input type="checkbox" form="del_favorite" name="del_favorite[]" value="<?= $img['_id'] ?>"/> Ulubione </label>
                    </div>
                    
                <?php endforeach; 
                endif; ?>
                <div style="clear: both;"></div>
                <form id="del_favorite" action="del_favorite" method="POST">
                    <input type="submit" value="Usuń zaznaczone z zapamiętanych"/>                    
                </form>

            </section>
        </div>

        <footer>
            <?php @include_once("fragments/footer.html");?>
        </footer>
    </body>
</html>


		
