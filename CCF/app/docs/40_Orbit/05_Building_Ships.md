For CCF2 we tried to make the plugin / package / ship development as easy as possible. Building a ship should be fast and comfortable same as managing them.

__So lets get started__

## The shipyard

The shipyard can be used to generate a basic ship, if you wish of course you can create the the ship on your own. But using the command line is fast and easy.

**Note**: 
_The shipyard is an console module if you didn't use them before read here more: [Console](/Application/Shipyard/ "Title")_

```
$ php cli shipyard::create <ship name>
```

Will generate an ship using the passed parameters and your `shipyard.conf.php` configuration.

### Namespace
If you want a namespace different to your ships name just pass it:

```
$ php cli shipyard::create <ship name> <namespace>
```

### Basic Structure
A ship doesn't need tons off stuff to work its clean and simple.
Just a `folder` containing a `blueprint`.
```
/ExampleShip
	/blueprint.json
```

### Blueprint

There are several ways how a ship can look like, but they all need a blueprint.
The blueprint in our case is a simple `JSON` file containing information.

_Example blueprint.json:_
```json
{
	"name": "ExampleShip",
	"version": "1.5.0",
	"description": "The most epic awesome CCF ship.",
	"homepage": "http://www.clancats.ch",
	"keywords": ["clancats", "test", "example"],
	"license": "MIT",
	
	"authors": [
		{
			"name": "Mario Döring",
			"email": "info@example.com"
		}
	],
	
	"namespace": "ExampleShip"
}
```

The most values like _name, version, description, tags ect.._ are `optional` values that allow the repository to better manage the packages. These values are first getting important when you publish the ship to an repository.

The important part is the `namespace` and the `shipyard` option.

## Options
These are the aviable options in the **blueprint.json**.

### Name

The name of your ship. pretty self explaining. 
if you don't set a name the directory name gets used.
```json
{
	"name": "AwesomeShip"
}
```

### Version

Please don't use any letters just numbers. 
**major.minor.patch**
```json
{
	"version": "1.0.0"
}
```

### Description

Also pretty self explaining. Write a short sentence about your ship.
```json
{
	"description": "This ship is great it does absolutely nothing."
}
```

### Homepage

Where can we find more information about this ship?
```json
{
	"homepage": "http://example.com"
}
```

### Keywords

Keywords / tags can be used when searching on an repository
```json
{
	"keywords": ["google", "maps", "geo"]
}
```

### License

Under which license you'r release the Ship / Software. _( MIT, Apache, GNU ect.. )_
```json
{
	"license": "MIT"
}
```

### Authors

Who wrote that stuff?
```json
{
	"authors": [
		{
			"name": "Zaphod Beeblebrox",
			"email": "info@example.com",
			"homepage": "http://example.com"
		}
	]
}
```

### Namespace

The namespace is an important part of the ship. You can set one on your own or let the orbit do the work for you. 
Of course we recommend to define your namespace in the blueprint.

**values:**

* __true__ 		= _The name of the ship gets used as namespace_
* __false__		= _No namespace gets created. You have to define one on your own._
* __(string)__	= _Use this string as namespace._

_Blueprint:_
```json
{
	"namespace": "MyNamespace"
}
```
_sets the defaults:_
```json
{
	"wake": "Ship::wake",
	"install": "Ship::install",
	"uninstall": "Ship::uninstall"
}
```

### Custom namespace

_Blueprint:_
```json
{
	"namespace": false,
}
```
_sets the defaults:_
```json
{
	"wake": "shipyard/wake.php",
	"install": "shipyard/install.php",
	"uninstall": "shipyard/uninstall.php"
}
```


### Shipyard options

You can set how the orbit should handle events.

**Options:**

* __wake__ 			= _Define what should happen when the orbit is loading / initialising your ship. Loading resources ect..._
* __install__		= _On install, creating DB tables ect.._
* __unintall__		= _On uninstall, remove DB tables ect.._

**Values:**

* __Class::method__ 			= _Set a class and a method to call. This only works if you have an namespace defined in your blueprint._
* __path/to/script.php__		= _Set an path to a php script to be executet.._
* __false__					= _Ignore the event do nothing._

_Blueprint:_
```json
{
	"wake": "shipyard/wake.php",
	"install": "Ship::install",
	"uninstall": false
}
```

## Ship class

The ship class is an optional file you can create to handle the default events of an ship.

**The ship class will be called only if its in your blueprints namespace or defined in the shipyard options!**

_This is a simple example for an Ship class:_
```php
namespace MyNamespace;

class Ship extends CCOrbit_Ship {
	
	/**
	 * initialise the ship
	 */
	public static function wake() {
		echo "my ship is awake";
	}
	
	/**
	 * install the ship
	 */
	public static function install() {
		// move for example some files to the public folder
	}
	
	/**
	 * uninstall the ship
	 */
	public static function uninstall() {
		// and remove them here again
	}
}
```