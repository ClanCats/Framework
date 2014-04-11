<!DOCTYPE html>
<html>
  <head>
	<meta charset="<?php echo ClanCats::$config->charset; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	
	<!-- styling -->
	<?php echo CCAsset::styles( 'theme' ); ?>
	<?php echo CCAsset::styles(); ?>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- header scripts -->
	<?php echo CCAsset::scripts( 'header' ); ?>
  </head>
  <body>
	<?php echo $content; ?>

	<!-- footer scripts -->
	<?php echo CCAsset::scripts(); ?>
	<?php echo CCAsset::scripts( 'theme' ); ?>
  </body>
</html>