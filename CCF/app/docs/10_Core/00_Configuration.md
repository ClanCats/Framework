{
	"topic": "Configuration"
}

CCConfig is the configuration handler. At the moment CCF ships with 2 configuration drivers `File` and `Json`.

## CCConfig instances

Every configuration file is an instance of CCConfig. When you load one, the instance gets stored on runtime. So you can load your configurations without actually loading the physically files multiple times.

### App, main etc.

An pattern we like is adding an configuration instance as a static property to a class. The best two examples is the App and the ClanCats class.

```php
App::$config->name;
```

The ClanCats class also implements this pattern with the main configuration.

```php
ClanCats::$config->get( 'error.handler' );
```

---

## Accessing values

You can access your values directly if they are in the first dimension of the array:

```php
CCConfig::create( 'app' )->name;
```

or multidimensional using the getter:

```php
CCConfig::create( 'main' )->get( 'profiler.enabled', false );
```
The _dot_ marks an array dimension, this would equal `$array["profiler"]["enabeld"]`.<br />
You can also set a _default value_ using the _second parameter_, so if the configuration value doesn't exists the object is going to return your default value.

```php
$config = CCConfig::create( 'user' );
$username = $config->get( 'defaults.username', 'New user' );
```

### Defaults

One really important thing is how the file configuration driver gets the defaults. You can overwrite any configuration value from your app without modifying the core or bundle config file. 
For example the `main.config.php` is placed in the core, but you should never modify core files directly. But you can create the same file in your app config directory and the files will be merged by config handler.

_Core::session_ -> session<br>
_GeoIP::geo_ -> geo

`<bundle>::<file>` gets merged with `app::<file>`<br>
`<bundle path>/config/<file>` -> `app/config/<file>` 

So lets say you want to change the session configuration ( _Core::session_ ). Then you just need to create a session config file in your application bundle ( _app/config/session.config.php_ ).

---

## Loading files

This will load the _user_ configuration file from the _application bundle_.

_File:_ `CCF/app/config/user.config.php`

```php
$config = CCConfig::create( 'user' );
```

You can also load your configuration using another driver:

_File:_ `CCF/app/config/user.json`

```php
$config = CCConfig::create( 'user', 'json' );
```

Or using another bundle:

_File:_ `CCF/app/themes/CCF/config/theme.json`

```php
$config = CCConfig::create( 'CCFTheme::theme', 'json' );
```

---

## creating files

A configuration file depending on the driver is a simple key value store.

With the default file driver for example:

```php
return array(
	'roles' => array(
		'mechanic' => array(
			'name'   => 'Kaywinnet Lee Frye',
			'short'  => 'Kaylee'
		),
	), 
);
```

or a simple json file when using his driver.

```json
{
	"roles": {
		"mechanic": {
			"name": "Kaywinnet Lee Frye",
			"short": "Kaylee"
		}
	}
}
```

---

## Setting values

This will set the value for the current execution but not store the new value. If you wish to save the value check the `save` function.

```php
CCConfig::create( 'search' )->charset = 'utf-8';
```

there is also a setter function:

```php
CCConfig::create( 'search' )->set( 'cache.lifetime', 300 );
```

---

## Environment specific

CCF provides an easy system to make configuration files environment specific. Just create an subfolder in your config directory with the name of the environment.

**Note:** The normal configuration and the environment get not merged. When an environment configuration exists it's going to replace the normal configuration.

```
 // The configuration folder of some bundle.
 - <bundle>/config/
   - engine.config.php
   
 // You app configuration folder
 - app/config/
   - engine.config.php // will be merged with bundle config file if no env specific file exists
   - production/
     - engine.config.php // will be merged with bundle config file if the current env is production.
   - test/
     - engine.config.php // and here if the current env is test.
```
 