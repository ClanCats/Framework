

CCF has a build in environment detector wich will configure the environment based on your `http hostname`.<br/>
But of course there are also other ways to set the running environment.
You can configure the current environment here:

```
/boot/environment.php
```

## Environment detector

Using the env detector is in most cases what you want to do. By passing an array with patterns to the detector, he will match the environment using the `http hostname`.


### Setting the default

First of all we want to set the default in case no other environment matches. To do so just add an item with the key `:all`.

```php
return array(

	/*
	 * default environment
	 */
	':all'		=> 'production',
);
```

### Full domain

You can add full domains to the detector.

```php
return array(

	/*
	 * http://localhost/
	 */
	'localhost'		=> 'development',
);
```

### Matching

The detector can try to match the env using an pattern.

```php
return array(

	/*
	 * http://staging.example.com/
	 * http://staging.foobar.com/
	 */
	'staging.*'		=> 'staging',
	
	/*
	 * http://www.example.com/
	 * http://other.example.com/
	 */
	'*.example.com'		=> 'production',
);
```

---

## Fixed Environment

If you wish you can set a fixed environment by just returning a string from your boot file:

```php
return 'production';
```

You can return here any string you want. Means you could also use $_SERVER superglobals for example:

```php
return $_SERVER[ 'CCENV' ];
```

---

## Callback

Something more specifc? You can define your own expression to set current environment using a simple callback:

```php
return function() 
{
	if ( $_GET['env'] == 'test' )
	{
		return 'test';
	}
	else 
	{
		return 'production';
	}
};
```

