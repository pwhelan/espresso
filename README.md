# React/Espresso

React/Espresso is a proof-of-concept microframework that integrates Silex with
React/Http.

[![Build Status](https://secure.travis-ci.org/reactphp/espresso.png?branch=master)](http://travis-ci.org/reactphp/espresso)

## Install

The recommended way to install react/espresso is [through
composer](http://getcomposer.org).

```JSON
{
    "require": {
        "minimum-stability": "dev",
        "aheart/espresso": "0.2.*"
    }
}
```

## Example

```php
$app = new React\Espresso\Application();

$app->get('/', function ($request, $response) {
    return 'Hello World';
});

$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->error(function (\Exception $e, $code) use ($app) {
	return 'Page not found';
});

$stack = new React\Espresso\Stack($app);
$stack->listen(1337);
```

## Tests

To run the test suite, you need PHPUnit.

    $ phpunit

## License

MIT, see LICENSE.
