This little tutorial should give you a little view on how CCF works. 

In this short example we are going build a simple Blog. 

So lets get startet with the core of our core.

## The CCF bundles

The core construct of CCF is the bundle.
A bundle is a namespace for resources like classes, views, etc.<br />
The Core `CCF/core/` or the app `CCF/app/` are both bundles, also every theme or orbit ship and many more are bundles.


So lets take a look at the most important one, your application:

```
 - app/
   - classes/            // Your Application classes
   - config/             // Configuration files
   - console/            // Console scripts
   - controllers/        // Controllers
   - views/              // Views
```

These are the most common bundle components, of course there are more and you can define your own ones.

## Router

For our little blog we are going to use the url pattern `news/`. So open your **router.config.php** in this file you can define routes that get added on application _wake_ to the router.

**File:** `CCF/app/config/router.config.php`

In this file you will see the base routes for your application.
Just like #root, #404 etc. add your new route at the end of the array.

_example.com/news/ -> execute BlogController_

```php
'news'	  => 'Blog',
```

## Controller

You can create an controller manually or using the _command line interface_ just like every other class also.

**cli:**

```
$ php cli shipyard::controller Blog
```


