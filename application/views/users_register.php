<div class="center">
	<?php echo validation_errors(); ?>

	<form action="" method="POST" class="pure-form pure-form-stacked slimForm">
		<fieldset>
			<?php echo userLabel('prenom', 'Prénom'); ?>
			<?php echo userInput('prenom', 'text', true);  ?>

			<?php echo userLabel('nom', 'Nom'); ?>
			<?php echo userInput('nom');  ?>

			<?php echo userLabel('username', 'Nom d\'utilisateur'); ?>
			<?php echo userInput('username');  ?>

			<?php echo userLabel('password', 'Mot de passe'); ?>
			<?php echo userInput('password', 'password');  ?>

			<?php echo userLabel('password_confirm', 'Confirmation mot de passe'); ?>
			<?php echo userInput('password_confirm', 'password');  ?>

			<input type="submit" value="Inscription" class="pure-button pure-button-primary pure-u-2-3"><br />
		</fieldset>
	</form>
	<a href="/"><button class="pure-button button-xsmall">Connexion</button></a>
</div>