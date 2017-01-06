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
				<p>W razie pytań wyślij do mnie maila: <a href="mailto:adres@wp.pl">adres@wp.pl</a></p>

				<p>lub skorzystaj z formularza kontaktowego</p>

				<form name="contact" method="post" onsubmit="return saveStorage()">
				<h3>Formularz kontaktowy</h3>
				Imie: <input type="text" name="first_name" required="required" /><br/>
				Nazwisko: <input type="text" name="last_name"/><br/>
				Płeć: <label><input type="radio" name="sex"/>Mężczyzna</label><label><input type="radio" name="sex"/>Kobieta</label><br/>
				E-mail: <input type="email" name="email" required="required" /><br/>
				Województwo:
				<select name="region">
					<option>Dolnośląskie</option>
					<option>Kujawsko-pomorskie</option>
					<option>Lubelskie</option>
					<option>Lubuskie</option>
					<option>Łódzkie</option>
					<option>Małopolskie</option>
					<option>Mazowieckie</option>
					<option>Opolskie</option>
					<option>Podkarpackie</option>
					<option>Podlaskie</option>
					<option>Pomorskie</option>
					<option>Ślaskie</option>
					<option>Świetokrzyskie</option>
					<option>Warminsko-mazurskie</option>
					<option>Wielkopolskie</option>
					<option>Zachodniopomorskie</option>
				</select><br/>
				Temat: <input type="text" name="title" required="required" /><br/>
				Treść:
				<textarea name="text" required="required"></textarea><br/>
				<input type="submit" value="Wyślij"/><input type="reset" value="Wyczyść" onclick="resetStorage()"/>
				</form>

				<script type="text/javascript">
					function saveStorage()
					{
						var form = document.forms["contact"];
						sessionStorage.first_name=form.first_name.value;
						sessionStorage.last_name=form.last_name.value;
						sessionStorage.sex=form.sex.value;
						sessionStorage.email=form.email.value;
						sessionStorage.region=form.region.value;
						sessionStorage.title=form.title.value;
						sessionStorage.text=form.text.value;
						alert("Wysłano wiadomość. Nadal możesz dokonywać zmian w swojej wiadomości i wysłać kolejną lub wyczyścić pola i napisać wiadomość od nowa.");
						return false;
					}

					function resetStorage()
					{
						sessionStorage.clear();
					}

					var first_name="";
					var last_name="";
					var sex="";
					var email="";
					var region="";
					var title="";
					var text="";
					if(sessionStorage.first_name!="" && sessionStorage.first_name!=undefined)
					{
						first_name=sessionStorage.first_name;
						last_name=sessionStorage.last_name;
						sex=sessionStorage.sex;
						email=sessionStorage.email;
						region=sessionStorage.region;
						title=sessionStorage.title;
						text=sessionStorage.text;
					}

					var form = document.forms["contact"];
					form.first_name.value=first_name;
					form.last_name.value=last_name;
					form.sex.value=sex;
					form.email.value=email;
					form.title.value=title;
					form.text.value=text;

					for(var i=1; i<form.region.length; i++)
					{
						if(form.region[i].value==region) form.region[i].selected="selected"
					}
				</script>
			</section>
		</div>

		<footer>
			<?php @include_once("fragments/footer.html");?>
		</footer>
	</body>
</html>