{
	"topic": "Shipyard"
}


The shipyard is an helper that generates classes, configuration files, ships and other stuff for you. The generator is able to place the file automatically where you want it by just using the CCPath syntax.

It's fast and easy to use give so give it a try.

**Note**: 
_The shipyard is an console module if you didn't use them before read here more: [Console](/Application/Shipyard/ "Title")_


## Header settings

It will also generate an header with the default settings. 
Change them in the `main configuration` under `shipyard.defaults`

These are the available settings:

```php
'defaults' => array(
	'version'		=> '1.0.0',
	'description'	=> 'just a short description.',
	'homepage'		=> 'http://example.com',
	'keywords'		=> array(),
	'license'		=> 'MIT',
	'copyright'		=> '2014 Magrathea inc.',
	'package'		=> 'CCFApplication',

	'author'			=> array(
		array(
			'name' 		=> 'Zaphod Beeblebrox',
			'email'		=> 'info@example.com',
		),
	),
),
```
