ClanCats Framework 2.0
======================

[![Build Status](https://travis-ci.org/ClanCats/Framework.svg?branch=master)](https://travis-ci.org/ClanCats/Framework)
[![License](http://img.shields.io/packagist/l/clancats/framework.svg)](https://github.com/ClanCats/Framework)
[![Downloads](http://img.shields.io/packagist/dm/clancats/core.svg)](https://github.com/ClanCats/Framework)


ClanCats Framework succeed with efficiency, clarity and performance. 

_This is the Application repository if you like to contribute take a look at the core repository:_ https://github.com/ClanCats/Core

## About CCF

This PHP framework was originally build 2010 as the core of a social Plattform called "ClanCats". In 2012 we decided to split the core and the application apart, so the CCF was born. After developing several application on CCF v1.0, the point has come to rethink the core structure and rewrite the entire thing to a new version that should go open source.

**This is an absolute work in progress!**<br>If you still would like to contribute feel free. Every line of code makes us happy,

## Why CCF?

There are many brilliant frameworks out there, so why should you use this one? Every Framework has it's own beauty, with CCF we strongly focus on performance, dynamic and efficiency. Just give a us try you will not be disappointed. 

When someone asks me for about the benefits in CCF:

 * Scalability 
 * Performence
 * Structure
 * Extensibilty
 * Theming
 * Routing
 
## Installation

Setting up a new instance of CCF2 can be done in just command. Or with other words with composer.

Run the following command ( without the '$' ) to create a new project with CCF.

```
$ composer create-project clancats/framework <your project name> -s dev
```

_Composer installed? Read the installation guide here: https://getcomposer.org/download/_

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