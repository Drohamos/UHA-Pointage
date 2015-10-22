<div class="center">
	<?php if ($this->router->method == 'login') echo validation_errors(); ?>

	<form action="/users/login" method="POST" class="pure-form pure-form-stacked slimForm">
		<fieldset>
				<?php echo userLabel('username', 'Nom d\'utilisateur'); ?>
				<?php echo userInput('username', 'text', true);  ?>

				<?php echo userLabel('password', 'Mot de passe'); ?>
				<?php echo userInput('password', 'password');  ?>

				<input type="submit" value="Connexion" class="pure-button pure-button-primary pure-u-2-3">
		</fieldset>
	</form>
	<a href="/users/register" class="pure-button button-xsmall">Inscription</a>
</div>