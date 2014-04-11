The DB class knows to types of execution: `run` and `fetch`. The function name actually say's it all. 

## run queries

The function `run` returns meta information like the last inserted id or the number of affected rows.

### Basic execution

This example shows an simple insert query wich will return the last inserted id.

```php
DB::run( "insert into `people` ( `name`, `age` ) values ( 'peter', '42' )" );
```
```php
DB::run( "update `people` set `name` = 'Zaphod'" );
```
```php
DB::run( "delete from `people` where `age` < 18" );
```

**Return values:**

```php
DB::run( 'insert ...' ); // returns the last insert id 
DB::run( 'update ...' ); // returns number of affected rows
DB::run( 'delete ...' ); // returns same as update
DB::run( 'select ...' ); // returns a PDOStatement object
```

### Using parameters

You should always avoid adding data directly to the query. Use parameters instead.

```php
DB::run( 'insert into `people` ( `name` ) values ( ? )', array( 'peter' ) );
```

### Using a different Handler

When you configured multiple databases you can run queries with a different handler.

```php
DB::run( 'insert into `people` ...', array(), 'my_other_database' );
```

--- 

## Fetching data

The function `fetch` will fetch actual data from your database.

```php
DB::fetch( "select * from people" );
```

**Return values:**

```php
DB::fetch( 'select ...' ); // returns an array of results
DB::fetch( 'describe ...' ); // returns the describe data
```

### Fetch options

At the end the database bundle also just uses PDO so you can pass fetch arguments / options:

 * `obj = \PDO::FETCH_OBJ`
 * `assoc = \PDO::FETCH_ASSOC`
 * `both = \PDO::FETCH_BOTH`
 * etc..

```php
// DB::fetch( <query>, <params>, <handler>, <fetch arguments> );
DB::fetch( 'select ...', array(), null, array( 'assoc' ) );
```

Will return something like: 

```php
array(
	array( 'name' => 'Peter', 'age' => 42 ),
	array( 'name' => 'Zaphod', 'age' => 84 ),
);
```

### Need the pdo statement?

Sometimes you might want to just get raw PDO statement and do custom binding etc.. 

```php
// DB::handler( <handler> )->statement( <query>, <params> );
$statement = DB::handler()->statement( 'select * from people' );

// $statement is an instance of \PDOStatement
```

```php
DB::handler()->statement( 'drop table people' );
```

---

## Getting and using the handler

In some cases, mostly when you have to do a lot of DB operations on one handler you might want to use the handler directly.