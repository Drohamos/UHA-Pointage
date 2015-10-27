<div class="center">
	<form action="/users/login" method="POST" class="pure-form pure-form-stacked slimForm">
		<fieldset>
				<?php echo userLabel('username', 'Nom d\'utilisateur'); ?>
				<?php echo userInput('username', 'text', get_cookie('username'));  ?>

				<?php echo userLabel('password', 'Mot de passe'); ?>
				<?php echo userInput('password', 'password');  ?>

				<input type="submit" value="Connexion" class="pure-button pure-button-primary pure-u-2-3">
		</fieldset>
	</form>
	<a href="/users/register" class="xsmall">Créer un compte</a>
</div>