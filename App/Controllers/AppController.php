<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class AppController
{
    private static $container;

    public static function setContainer($container)
    {
        AppController::$container = $container;
    }

    public static function get(Request $request, Response $response)
    {

        AppController::$container->get('db');

        $results = Capsule::select('select * from tb_course');

        $json = json_encode($results);

        $response->getBody()->write($json);

        return  $response
            ->withHeader('Content-Type', 'application/json');
    }

    public static function getById(Request $request, Response $response, $args)
    {

        AppController::$container->get('db');

        $id = $args['id'];

        $results = Capsule::table('tb_course')->selectRaw('*')->whereRaw('id = ?', [$id])->get();

        $json = json_encode($results);

        $response->getBody()->write($json);

        return  $response
            ->withHeader('Content-Type', 'application/json');
    }


    public static function put(Request $request, Response $response)
    {
        AppController::$container->get('db');

        $course = json_decode($request->getBody());
    
        // updating record
        Capsule::table('tb_course')
        ->updateOrInsert(['id' => $course->id], [
            'name' => $course->name,
            'description' => $course->description,
            'price' => $course->price,
            'rating'=> $course->rating
        ]);
    
        return $response;
    }

    public static function delete(Request $request, Response $response, $args)
    {
        AppController::$container->get('db');

        $id = $args['id'];
    
        Capsule::table('tb_course')->where('id', '=', $id)->delete();
    
        return $response;
    }
}
