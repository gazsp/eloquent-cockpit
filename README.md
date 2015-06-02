# gazsp/eloquent-cockpit

Use Cockpit and Laravel Eloquent, together at last. Uses [jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb).

**MongoDB only at the moment**

## Installation

```
    composer require jenssegers/mongodb
    composer require gazsp/eloquent-cockpit
```

### Lumen

Make sure Facades are enabled in app.php, and that the jenssegers/laravel-mongodb service provider is loaded:

```php
$app->withFacades();
// ...
$app->register('Jenssegers\Mongodb\MongodbServiceProvider');

```

### Laravel

TBC

## Usage

If you have a collection called 'Events' in Cockpit, the model in Laravel or Lumen would be:

```php
<?php namespace App\Repo\Collections;

    use Gazsp\EloquentCockpit\CockpitCollection;

    class Events extends CockpitCollection {
       protected $cockpitSlug = 'events';
    }
```

You can then use the model as normal:

```php
$events = Events::all();
// etc...
```
