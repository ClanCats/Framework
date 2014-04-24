<!DOCTYPE html>
<html>
  <head>
	<meta charset="<?php echo ClanCats::$config->charset; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	
	<!-- styling -->
	<?php echo CCAsset::code( 'css', 'theme' ); ?>
	<?php echo CCAsset::code( 'css' ); ?>
	
	<!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- header scripts -->
	<?php echo CCAsset::code( 'js', 'header' ); ?>
  </head>
  <body>
	<div id="ccf-header">
		<div class="container">
			<a href="<?php echo CCUrl::to( '/' ); ?>">
				<img style="width: 55px;" id="logo-img" alt="CCF Logo" title="ClanCats Logo" src="<?php echo CCAsset::uri( 'img/logo.png', 'theme' ); ?>" />
				<span class="header-title"></span>
			</a>
			<div id="ccf-main-nav" role="navigation">
				<ul>
					<li><a href="<?php echo CCUrl::to( '/' ); ?>">Home</a></li>
					<li><a href="<?php echo CCUrl::to( 'docs/' ); ?>">Documentation</a></li>
					<li><a href="#">Forums</a></li>
					<li><a href="#">Github</a></li>
					<li><a href="#">Support</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="wrapper">
		
		<?php echo $sub_header; ?>
		
		<div class="ccf-header-subline" data-spy="affix" data-offset-top="50" data-offset-bottom="200">
		  <div class="container">
			<h1 style="float: right;"><?php echo $topic; ?></h1>
		  </div>
		</div>
		
		<div id="main-container" class="container">
			<div style="margin-top: 50px;">
				<?php if ( $sidebar !== false ) : ?>
				<div class="row">
					<div class="col-md-3">
						<?php echo $sidebar; ?>
					</div>
					<div class="col-md-9">
						<?php echo $content; ?>
					</div>
				</div>
				<?php else : ?>
					<?php echo $content; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- footer scripts -->
	<?php echo CCAsset::code( 'js' ); ?>
	<?php echo CCAsset::code( 'js', 'theme' ); ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
  </body>
</html>