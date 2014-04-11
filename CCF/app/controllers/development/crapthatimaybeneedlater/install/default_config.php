<?php
return array(
	'clancats'	=> array(
		// the charset
		'charset'	=> 'utf-8',
		// if not in the root directory set the path offset. Dont forget to set the "RewriteBase" in the .htaccess
		'path'		=> '{PATH}',
		// The domain without http:// and without any slash at the end!
		'domain' 	=> '{DOMAIN}',
		// Https ?
		'https'		=> false,
		// cdns
		'cdn' 		=> array(
			'google' => 'https://ajax.googleapis.com/ajax/libs/',
		),
	),
	'security' => array(
		'salt' => '{SALT}',
	),
	'template'	=> array(
		'theme'		=> 'CCF',
		'CCF'		=> array(
			'title'	=> '%s | ClanCatsFramework',
		),
		'Bootstrap' => array(
			'assets'	=> 'assets/Bootstrap/',
			'title'		=> '%s | ClanCatsFramework',
			'project'	=> 'ClanCatsFramework'
		),
	),
	'database'	=> array(
		'main' => array (
			'host'		=> '{HOST}',
			'database'	=> '{DATABASE}',
			'user'		=> '{DB_USER}',
			'psw'		=> '{DB_PASS}',
			'charset'	=> 'utf8'
		),
	),
	'language' => array(
		'default'	=> 'en-GB',
		'aviable'	=> array(
			'en' => array(
				'GB',
				'US'
			),
			'de',
		)
	),
	'session' => array(
		'name'		=> '_katzendreck',
		'lifetime'	=> 86400,
	)
);
?>