<?php
	$uri = $_SERVER["REQUEST_URI"];
	if($uri==="/") $uri .="index";
	$uri = "includes$uri";

	if(file_exists($uri.".html") || file_exists($uri.".php"))
	{
		$load = $uri;
	}
	else
	{
		echo "Error 404 file not found";
		//header();
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Struna za struną</title>
		<meta charset="utf-8"/>
		<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/> -->
		<meta name="author" content="Mateusz Szymanowski"/>
		<link rel="stylesheet" type="text/css" href="/style.css"/>
	</head>

	<body>
		<div id="container">
			<header>
				<a href="index"><span>Struna za struną</span></a>
			</header>

			<nav>
				<?php include_once("includes/menu.html");?>
			</nav>

			<section>

				<?php
					include_once("$load.html");
				?>
				
			</section>
		</div>
		<footer>
			Strona przygotowana na potrzeby projektu z WAI oraz HiHu &copy; Mateusz Szymanowski
		</footer>
	</body>
</html>