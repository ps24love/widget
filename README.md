Simple Widget System - Laravel 4.*
=========

Simple widget system for create awesome feature on blade templating Laravel 4


## Installation
Open your composer.json file, and add the new required package.

```
  "Ps24love/widget": "dev-master" 
```

Next, open a terminal and run.

```
  composer update 
```

After the composer updated. Add new service provider in app/config/app.php.

```
  'Ps24love\Widget\WidgetServiceProvider'
```

Done.

## Example 

### Registering your widget
To register your widget, simply create a file `widgets.php` in your `app` folder and put your widgets code in that file. Like this.

```
laravel/
|-- app/
	|-- commands/
	...
	|-- views/
	|-- filters.php
	|-- routes.php
	|-- widgets.php
|-- bootstrap/
|-- vendor/
```

Simple Widget :
```php

Widget::register('awesome', function(){

	return View::make('awesome');

});
```
Widgets with one or more parameters:

```php

Widget::register('hello', function($name){

	return "Hello, $name !";

});

Widget::register('box', function($title, $description){

	return View::make('widgets.box', compact('title', 'description'));

});

```

Widget grouping of widgets that have previously been defined.

```php

// First, you must registering one or more widget

Widget::register('categories', function(){
	return View::make('widgets.categories');
});

Widget::register('latestPost', function(){
	return View::make('widgets.latestPost');
});

// Next, you can group some widgets like this:

Widget::group('sidebar', array('categories', 'latestPost'));

Widget::group('footer', array('hello', 'box'));

```

### Calling your widget 

Globally calling the widget just like below:
```php

Widget::awesome();

Widget::hello('John');

Widget::box('Latest News', 'This is a description of latest news');

// calling widget group just like below
// Widget::$name();
Widget::sidebar();

// calling widget group which parameters just like below
// Widget::$name($params1, $params2, $params3, ....);
Widget::box(array('name'), array('My Tweets', '.....Latest Tweets'));

```
simple calling widget on view :

```php

@awesome

@hello('John')

//calling group widget

@sidebar()

@box(array('name'), array('My Tweets', '.....Latest Tweets'))

```

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
