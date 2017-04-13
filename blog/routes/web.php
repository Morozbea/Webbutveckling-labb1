<?php

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

$app->get('/', function () use ($app) {
  $products = json_decode(file_get_contents("../resources/produkter.json"));
    return response()->json($products);
});

$app->get('/products', 'ProductController@index');
$app->get('/products/{id}', 'ProductController@show');
$app->put('/products/{id}', function($id){
  return "Will update product with id: " . $id;
});
$app->post('/products', 'ProductController@create');
$app->delete('/products/{id}', function($id){
  return "Will delete product with id: " . $id;
});
