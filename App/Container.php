<?php


use DI\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

$container = new Container();

$container->set('db', function () {

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'courses_manager',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ]);

    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();

    // Setup the Eloquent ORM.. (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();

    return $capsule;
});