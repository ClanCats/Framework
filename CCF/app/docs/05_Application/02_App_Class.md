{
	"topic": "App"
}

The App class is a central object. It can be used to assign, for example the current user object to it. This would allow a syntax like `App::$user->email`. Also the class implements the initial wake event and the environment specific wake events.

## App name

Give your application a name.

```php
/**
 * The application name
 *
 * @var string
 */
public static $name = 'My Application';
```

If you have custom expression to generate your applications name just overwrite the static _name()_ function from _CCApp_.

---

## Application Wake

The application wake is nothing else than your application initialisation.

```php
public static function wake() 
{
	static::$user =& Auth::instance()->user;
}
```

If you wish you can return a response from your application wake wich will stop any further execution.

```php
public static function wake() 
{
	if ( CCServer::client( 'ip' ) !== '127.0.0.1' )
	{
		return CCResponse::create( 'Sorry no remote access.' );
	}
}
```

---

## Environment specific wake

There is also a wake event that gets called specific to your current environment.

`wake_<current environment>`

**Example:**

```php
public static function wake_development() 
{	
	// do stuff only in development
}
```

```php
public static function wake_production() 
{	
	// do stuff only in production
}
```

---

## Routes

You can return default routes from your app class. By default _CCApp_ just return the config file defined in your _main config_ under `router.map`.

```php
public static function routes() 
{
	return CCConfig::create( ClanCats::$config->get( 'router.map' ) )->raw();
}
```