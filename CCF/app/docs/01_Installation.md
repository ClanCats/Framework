{
	"topic": "Instllation / Setup"
}

Setting up a new instance of CCF2 is fast and easy. Just clone the source an there you go.<br/>
Of course you can also [download](https://github.com/mario-deluna/CCF/archive/master.zip "Download CCF2 source") the source manually if you don't have git installed on your maschine.

```
$ git clone git@github.com:mario-deluna/CCF.git
```

## Requirements

To run this framework please check the following requirements:

 * PHP >= 5.3.9
 * PHP JSON
 * PHP MCrypt
 * PHP Multibyte String
 * Apache with mod_rewrite or Nginx

## Permissions

For some operations ( storage, packtacular etc. ) we may need to grant write permissions in the file system. 

**Storage:** `/CCF/storage/`<br/>
**Packtacular:** `/public/assets/packtacular/`

you can also set these using the `cli` doctor.

```
$ php cli doctor::permissions
```

If you get an error setting the permissions try to run the that command with `sudo`.

---

## Structure

In the new CCF2 folder structure we splittet some things apart to make deployment much more efficient.<br/>


```
 - CCF/
   - app/                // Your Application 
   - core/               // The CCF Core
   - orbit/              // Orbit ships ( plugins / modules ) 
   - storage/            // Internal file storage for logs, cache etc.
   - vendor/             // Composer vendor

 - boot/
   - environment.php     // The Environment configuration
   - paths.php           // Framework paths configuration

 - cli                   // Command line utility
 - composer.json
 - framework.php
 - phpunit.xml

 - public/
   - index.php           // Web Application public
```

---

## Configuration

There is actual no configuration needed to just run the framework (depending on your environment). But we recommend to do some configuration before you start developing your awesome application.

### Boot

The boot configuration allow you change the core behaviour of the CCF.

#### Environment

Define how your application detects the environment.<br />
You can create your complete own script to return the runtime environment or you can make use of the env detector.
[read more...](/docs/application/environment)

```
/boot/environment.php
```

#### Paths

Plan to run multiple CCF installations on one mashine? Using just one single core? This is absolutely no problem you can modify the CCF paths. 

```
/boot/paths.php
```

You are also free to add new paths. Adding a new element to the array will add the path to runtime and also create an path define:

```
<value> = <value>PATH
test = TESTPATH
```

### main config

You will find an initial **main configuration** file under:

```
/CCF/app/config/main.config.php
```

**1. Security Salt**

At several point CCF is going to crypt stuff and to do that it uses a salt. You should define your own salt to keep your application secure.

```php
'security' => array(
    'salt' => 'L~7(%(9=@9+8u.Oo4+ysT45fkA4,82',
),
```

**2. Path**

Maybe you would like to run your application not from the domain root. Instead from a subfolder in this example *forums*.

```php
// www.yourdomain.com/forums/
'url'	=> array(
    'path'		=> '/forums/',
),
```

---

## Routing

Depending on your system you will need to setup something that all public request end on the `public/index.php` file.

CCF ships with an `.htaccess` for apache systems with `mod_rewrite` enabled:

```ini
RewriteEngine On
# RewriteBase /subdir/

# Only Rewrite URL if file not exits
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# Default
RewriteRule ^(.*)$ index.php?/$1 [QSA,L]
```