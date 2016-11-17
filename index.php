<?php
	$uri = $_SERVER["REQUEST_URI"];
	if($uri==="/") $uri .="index";
	$uri = "includes$uri";

	if(file_exists($uri.".html") || file_exists($uri.".php") || file_exists($uri.".svg"))
	{
		$load = $uri;
	}
	else
	{
		$load = "includes/404";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Struna za struną</title>
		<meta charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
		<meta name="author" content="Mateusz Szymanowski"/>
		<link rel="stylesheet" href="css/blueimp-gallery.min.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="/js/js.js"></script>
	</head>

	<body>
		<div id="container">
			<header>
				<a href="index"><span>Struna za struną</span></a>
			</header>

			<nav>
				<?php @include_once("includes/nav.html");?>
			</nav>

			<section>

				<?php
					@include_once("$load.html");
					@include_once("$load.svg");
				?>
				
			</section>
		</div>

		<footer>
			<?php
				include_once("includes/footer.html");
			?>
		</footer>
	</body>
</html>