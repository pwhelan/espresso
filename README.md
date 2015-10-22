# React/Espresso

React/Espresso is a proof-of-concept microframework that integrates Silex with
React/Http.

[![Build Status](https://travis-ci.org/pwhelan/espresso.svg?branch=master)](https://travis-ci.org/pwhelan/espresso)

## Install

The recommended way to install react/espresso is [through
composer](http://getcomposer.org).

```
$ composer require react/espresso
```

## Example

> All your Controllers can remain the same, the conversion between symfony's request/response and
> reactphp's request/response is done automatically.

### react.php

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

```
$ php react.php
```

> now visit  [http://localhost:1337/hello/react](http://localhost:1337/hello/react)

## Tests

To run the test suite, you need PHPUnit.

```
$ phpunit
```

## License

MIT, see LICENSE.
