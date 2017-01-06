<ul>
	<li><a href="/">Strona główna</a></li>
	<li><span class="a-menu">Rodzaje gitar</span>
		<ul class="menu-2">
			<li><a href="klasyczna">Klasyczna</a></li>
			<li><a href="akustyczna">Akustyczna</a></li>
			<li><a href="elektryczna">Elektryczna</a></li>
		</ul>
	</li>
	<li><a href="galeria">Galeria</a></li>
	<li><a href="gitara_svg">Gitara w SVG</a></li>
	<li><a href="kontakt">Kontakt</a></li>
</ul>
<div class="login_bar">
	<?php if(!$_SESSION['log']): ?>
	<form class="login" action="login" method="POST">
		Login: <input type="text" name="login" value="<?= $_SESSION[login] ?>"/>
		Hasło: <input type="password" name="pass"/>
		<input type="submit" name="submit" value="Zaloguj się"/>
	</form>
	<span class="login">lub <button>Zarejestruj się</button></span>


	<form class="register" action="register" method="POST">
		Login: <input type="text" name="login" value="<?= $_SESSION[login] ?>"
			<?php if($_SESSION['login_error']) echo"class='error'"; ?> />
		Hasło: <input type="password" name="pass"/>
		Powtórz hasło: <input type="password" name="pass2"
			<?php if($_SESSION['pass_error']) echo"class='error'"; ?>/>
		<input type="submit" name="submit" value="Zarejestruj się"/>
		<?php if($_SESSION['reg_success']): ?>
			<span class="success">Użytkownik utworzony</span>
		<?php endif; ?>
	</form>
	<span class="register">lub <button>Zaloguj się</button></span>
	<?php else: ?>
		Witaj <?= $_SESSION['name']; ?>
	<?php endif; ?>
</div>

<script type="text/javascript">
	$(".login_bar button").click(function()
	{
		$(".login").toggle("slow");
		$(".register").toggle("slow");
	});
	<?php if(isset($_SESSION['reg_success'])): ?>
			$(".login").toggle("slow");
			$(".register").toggle("slow");
	<?php endif; 
		if($_SESSION['reg_success'])
		{
			unset($_SESSION['reg_success']);
		}
	?>
</script>