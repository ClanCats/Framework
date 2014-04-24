{
	"topic": "Session Bundle"
}

## Configuration

Your session configuration file is located in your app config directory.

_File:_ `app/config/session.config.php`

Every session has it's own configuration, means defining for example the lifetime in the first configuration dimension won't work.

### main session

Defines the session manager that get's used when no manager instance name is given.

```php
// CCSession::manager();
'main' => array(
	...
),

// CCSession::manager( 'other' );
'other' => array(
	...
),
```

### Options

<table class="table table-bordered">
	<tr>
		<th>Key</th>
		<th>Default</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>lifetime</td>
		<td><code>0</code></td>
		<td>The session lifetime. 0 means just during the browser session.</td>
	</tr>
	<tr>
		<td>min_lifetime</td>
		<td><code>CCDate::minutes(5)</code></td>
		<td>The minimum session lifetime, this one is a bit diffrent than the normal lifetime. This defines how long a session is valid without any user action.</td>
	</tr>
	<tr>
		<td>gc.enabled</td>
		<td><code>true</code></td>
		<td>Garbage collector, deletes old and outdated sessions when enabled.</td>
	</tr>
	<tr>
		<td>gc.factor</td>
		<td><code>25</code></td>
		<td>The factor defines how often should gc be executed, ca. every x request. You should scale this value with the number of page views you got. When you plaan a massive system you should disable gc and delete old sessions using a background job.</td>
	</tr>
	<tr>
		<td>driver</td>
		<td><code>file</code></td>
		<td>
			Choose the driver to store the sessions with.
			We hopefully ship with:
			<ul>
				<li>array ( Just for testing purposes. )</li>
				<li>file</li>
				<li>cookie</li>
				<li>database</li>
			</ul>
		</td>
	</tr>
</table>

### File Driver

This is an example file driver configuration:

```php
'main' => array(
	'driver'	 => 'file',
	
	// The session lifetime. 0 means just during the browser session.
	'lifetime'	=> 0,
	
	// The minimum session lifetime, this one is a bit diffrent 
	// This defines how long a session is valid without any user
	// action.
	'min_lifetime'	=> CCDate::minutes(5),
	
	// Garbage collector
	// The gc deletes old and outdated sessions.
	'gc' => array(
		'enabled' => true,
		
		// The factor means how often should gc be executed.
		// ca. every x request. You should scale this value 
		// with the number of page views you got. When you plaan
		// a massive system you should disable gc and delete old
		// sessions using a background job.
		'factor' => 25,
	),
),
```