<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//------------------LOGIN------------------------
$router->post('/acceso', 'AuthController@login');
$router->get('/', 'AuthController@view');

//------------------EXAMEN-----------------------
$router->get('/examenes', 'ExamController@view');
$router->get('/examenes/{detalle}', 'ExamController@list');

$router->get('/examen/{id}', 'ExamController@viewExamen');
$router->post('/examen/{id}', 'ExamController@resultado');



// $router->get('/examen/{id}', 'ExamController@preguntasRespuestas');

//--------------------KEY------------------------
// $router->post('/key', 'KeyController@generate');

$router->group(
    ['middleware'=>'jwt.auth'],
    function () use ($router) {
        $router->post('/key', 'KeyController@generate');
    }
);

$router->group(
    ['middleware'=>['jwt.auth','jwt.key']],
    function () use ($router) {
        // $router->get('/examenes', 'ExamController@view');
    }
);