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

		<section>
			<?php echo $content_for_layout; ?>
		</section>

		<footer>
			<?php if (isset($_SESSION['user'])): ?>
				<div id="userPanel"></div>
			<?php endif; ?>
		</footer>
	</body>
</html>