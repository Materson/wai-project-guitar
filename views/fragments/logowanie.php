<div class="login_bar">
	<?php if(!isset($_SESSION['user_id'])): ?>
	<form class="login" action="login" method="POST">
		Login: <input autofocus="autofocus" type="text" name="login" value="<?= $_SESSION[login_log] ?>"/>
		Hasło: <input type="password" name="pass"/>
		<input type="submit" name="submit" value="Zaloguj się"/>
		<?php if(isset($_SESSION['log_error'])): ?>
			<span class="error">Błędny użytkownik lub hasło</span>
		<?php endif; 
			unset($_SESSION['log_error']);
		?>
	</form>
	<span class="login">lub <button>Zarejestruj się</button></span>


	<form class="register" action="register" method="POST">
		E-mail: <input type="email" name="email" required="required"
			<?php 
				if(!$_SESSION['reg_success']) echo "value='$_SESSION[email]'";
				if($_SESSION['email_error']) echo"class='input_error'"; 
			?> />
		Login: <input type="text" name="login" required="required"
			<?php 
				if(!$_SESSION['reg_success']) echo "value='$_SESSION[login]'";
				if($_SESSION['login_error']) echo"class='input_error'"; 
			?> />
		Hasło: <input type="password" name="pass" required="required"/>
		Powtórz hasło: <input type="password" name="pass2" required="required"
			<?php if($_SESSION['pass_error']) echo"class='input_error'"; ?>/>
		<input type="submit" name="submit" value="Zarejestruj się"/>
		<?php if($_SESSION['reg_success']): ?>
			<span class="success">Użytkownik utworzony</span>
		<?php endif; ?>
	</form>
	<span class="register">lub <button>Zaloguj się</button></span>
	<?php else: ?>
		Witaj <?= $_SESSION['name']; ?>
		<form class="logout" action="logout" method="POST">
			<input type="submit" value="Wyloguj"/>
		</form>
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
			session_unset();
		}
	?>
</script>