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
				<?php @include_once("fragments/nav.html");?>
			</nav>

			<section>
				<?php @include("fragments/classic_guitar.svg"); ?>
			</section>
		</div>

		<footer>
			<?php @include_once("fragments/footer.html");?>
		</footer>
	</body>
</html>