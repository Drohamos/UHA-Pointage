<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="/pure-min.css">
		<!--[if lte IE 8]>
			<link rel="stylesheet" href="/grid-old-ie.css">
		<![endif]-->
		<!--[if gt IE 8]><!-->
			<link rel="stylesheet" href="/grid.css">
		<!--<![endif]-->
		<link rel="stylesheet" href="/design.css">
		<title><?php if (isset($title)) echo $title.' - '; ?>Pointage UHA 4.0</title>
	</head>
	<body>
		<header>
			<a href="/" id="logo" class="center">
				<img src="/images/uha40_logo.png" />
			</a>
			<h1><?php if (isset($title)) echo $title; ?></h1>
		</header>

		<?php if ($this->session->flashdata('message')): ?>
		<div class="message <?php echo $_SESSION['message']['type'];  ?>">
			<span class="title"><?php echo $_SESSION['message']['title']; ?></span>
			<?php if ($_SESSION['message']['message']) echo $_SESSION['message']['message']; ?>
		</div>
		<?php endif; ?>

		<section id="content">
			<?php echo $content_for_layout; ?>
		</section>

		<footer>
			<?php if (isset($_SESSION['user'])): ?>
				<div id="userPanel">
					<strong><?php echo $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom'];  ?></strong>
					 - <a href="/users/logout">Déconnexion</a>
				</div>
			<?php endif; ?>
		</footer>
	</body>
</html>