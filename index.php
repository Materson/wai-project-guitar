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
		<script type="text/javascript" src="/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js.js"></script>
	</head>

	<body>
		<div id="container">
			<header>
				<a href="index"><span>Struna za struną</span></a>
			</header>

			<nav>
				<?php include_once("includes/nav.html");?>
			</nav>

			<section>

				<?php
					include_once("$load.html");
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