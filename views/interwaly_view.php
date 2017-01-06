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
				<h3>Interwał</h3>
				<p>
				Nazwy interwałów pochodzą od łacińskich nazw liczebników i określają liczbę stopni zawartych między dźwiękami tworzącymi dany interwał, wraz z tymi dźwiękami.
				</p>
				<table>
					<tr>
						<th>Nazwa interwału</th>
						<th>Liczba półtonów</th>
					</tr>
					<tr>
						<td>pryma czysta</td>
						<td>ten sam dźwięk</td>
					</tr>
					<tr>
						<td>sekunda mała</td>
						<td>1 półton</td>
					</tr>
					<tr>
						<td>sekunda wielka</td>
						<td>2 półtony</td>
					</tr>
					<tr>
						<td>tercja mała</td>
						<td>3 półtony</td>
					</tr>
					<tr>
						<td>tercja wielka</td>
						<td>4 półtony</td>
					</tr>
					<tr>
						<td>kwarta czysta</td>
						<td>5 półtonów</td>
					</tr>
					<tr>
						<td>kwarta zwiększona</td>
						<td>6 półtonów</td>
					</tr>
					<tr>
						<td>kwinta czysta</td>
						<td>7 półtonów</td>
					</tr>
					<tr>
						<td>seksta mała</td>
						<td>8 półtonów</td>
					</tr>
					<tr>
						<td>seksta wielka</td>
						<td>9 półtonów</td>
					</tr>
					<tr>
						<td>septyma mała</td>
						<td>10 półtonów</td>
					</tr>
					<tr>
						<td>septyma wielka</td>
						<td>11 półtonów</td>
					</tr>
					<tr>
						<td>oktawa czysta</td>
						<td>12 półtonów</td>
					</tr>
				</table>
			</section>
		</div>

		<footer>
			<?php @include_once("fragments/footer.html");?>
		</footer>
	</body>
</html>