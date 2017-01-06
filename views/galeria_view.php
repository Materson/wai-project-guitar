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
                <div id="links" class="links">
                <a href="static/images/guitar1.bmp" title="Gitara elektryczna">
                    <img src="static/images/guitar1.bmp" alt="Gitara elektryczna"/>
                </a>
                <a href="static/images/guitar2.bmp" title="Gitara akustyczna">
                    <img src="static/images/guitar2.bmp" alt="Gitara akustyczna">
                </a>
                <a href="static/images/guitar3.bmp" title="Guitar art">
                    <img src="static/images/guitar3.bmp" alt="Guitar art">
                </a>
                <a href="static/images/guitar4.bmp" title="Gitary mają najróżniejsze wyglądy">
                    <img src="static/images/guitar4.bmp" alt="Gitary mają najróżniejsze wyglądy">
                </a>
                <a href="static/images/guitar5.bmp" title="Kostka gitarowa">
                    <img src="static/images/guitar5.bmp" alt="Kostka gitarowa">
                </a>
            </div>

            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>

            <script src="static/js/blueimp-gallery.min.js"></script>
            <script>
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event},
                    links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
            </script>  
            </section>
        </div>

        <footer>
            <?php @include_once("fragments/footer.html");?>
        </footer>
    </body>
</html>


		
