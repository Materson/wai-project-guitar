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
				<h2>Dodaj zdjęcie</h2>

				<form action="upload_img" method="POST" enctype="multipart/form-data">
					Wybierz zdjecie: <input type="file" name="file" required="required" /><br/>
					Znak wodny: <input type="text" name="watermark" required="required" /><br/>
					Autor: <input type="text" name="author" required="required"
						<?php
							if(isset($_SESSION['email_error'])) echo"class='input_error'";
							if(isset($_SESSION['user_id'])) echo"value='$_SESSION[name]'";
						?>/><br/>
					Tytuł: <input type="text" name="title" required="required"
						<?php
							if(isset($_SESSION['title_error'])) echo"class='input_error'";
						?>/><br/>
					<?php if(isset($_SESSION['user_id'])): ?>
						Dostęp:
							<label><input type="radio" name="access" value="public" checked="checked">Publiczny</label>
							<label><input type="radio" name="access" value="private">Prywatny</label><br/>
					<?php endif; ?>
					<input type="submit" value="Wyślij"/>

					<?php if(isset($_SESSION['type_error'])): ?>
						<div class="error">
							Zły format pliku
						</div>
					<?php 
						unset($_SESSION['type_error']);
						endif;

						if(isset($_SESSION['size_error'])):
					?>
						<div class="error">
							Za duży rozmiar, maksymalny rozmiar to 1MB
						</div>
					<?php 
						unset($_SESSION['size_error']);
						endif;

						if(isset($_SESSION['upload_error'])):
					?>
						<div class="error">
							Błąd podczas przesyłania pliku
						</div>
					<?php 
						unset($_SESSION['upload_error']);
						endif;

						if(isset($_SESSION['upload_success'])):
					?>
						<div class="success">
							Pomyślnie załadowano zdjęcie
						</div>
					<?php 
						unset($_SESSION['upload_success']);
						endif;
					?>


				</form>
			</section>
		</div>

		<footer>
			<?php @include_once("fragments/footer.html");?>
		</footer>
	</body>
</html>