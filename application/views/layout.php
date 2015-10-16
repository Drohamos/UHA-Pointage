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
		<title><?php if (isset($title)) echo $title; ?></title>
	</head>
	<body>
		<header>
			<a href="/" id="logo">
				<img src="/images/uha40_logo.png" />
			</a>
			<?php if (isset($_SESSION['user'])): ?>
			<div id="userPanel"></div>
			<?php endif; ?>
		</header>
		<section>
			<?php echo $content_for_layout; ?>
		</section>
	</body>
</html>