{
	"topic": "Database Bundle"
}

Let's be honest writing SQL queries can be a pain. To face this problem we rewrote the entire __query builder__ to better fit your needs. Using the query builder instead of writing plain queries has also many other benefits just as security, modifiers, same syntax with all drivers etc.

But to get startet here we have to configure the database first.


## Configuration

Your database configuration file is located in your app config directory.

_File:_ `app/config/database.config.php`


### main database

Defines the database instance that get's used when no handler instance name is given.

```php
// DB::handler();
'main' => array(
	...
),

// DB::handler( 'other' );
'other' => array(
	...
),
```

### MySql

This is an example of a MySQL configuration:

```php
'myapp' => array(
	'driver' => 'mysql',
	
	// the MySQL database name
	'db'	 => 'myapplication_database',

	// configure the connection
	'host'		=> '127.0.0.1',
	'user' 		=> 'root',
	'pass'		=> '',
	
	// set the charset default is always utf-8
	'charset'	=> 'utf8'
),
```

### Sqlite

This is an example of a Sqlite configuration:

```php
'myapp_local' => array(
	'driver' => 'sqlite',
	
	// Set the path to the db file for sqlite
	// checkout the documention for CCPath this one will load 
	// the file at: 
	//     CCF/app/myapp.db
	'path' => CCPath::get( 'myapp.db' ),
	
	// set the charset default is always utf-8
	'charset'	=> 'utf8'
),
```

### Aliasing

You can use aliases to keep your database configuration more structured.

```php
// set the main database
'main' => 'myapplication_system',

// check if the current user is a superuser and set the 
// correct client database for the clients handler
'clients' => App::$user->su() ? 'myapplication_clients' : 'third_party_clients',


'myapplication_clients' => array(
	...
),

'third_party_clients' => array(
	...
),

'myapplication_credit_carts' => array(
	...
),

'myapplication_system' => array(
	...
),
```