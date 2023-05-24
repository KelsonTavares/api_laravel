<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// A way to do it.
#Route::apiResource('dogs','api\DogController');


// Another way to do it.
// Listar dog
Route::get('dogs', [DogController::class. 'index']);

// List single dog
Route::get('dog/{id}', [DogController::class. 'show']);

// Create a new dog
Route::post('dog', [DogController::class. 'store']);

// Update a dog
Route::put('dog/{id}', [DogController::class. 'update']);

// Delete a dog
Route::delete('dog/{id}', [DogController::class. 'destroy']);
