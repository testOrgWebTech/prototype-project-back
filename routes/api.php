<?php

use App\Http\Controllers\Api\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);

Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class);

//Message Route
Route::group([
    'middleware' => 'api','prefix' => 'messages'
], function ($router)
{
    Route::get('getSentMessage',[\App\Http\Controllers\Api\MessageController::class,'getSentMessage']);
});
Route::apiResource('messages',\App\Http\Controllers\Api\MessageController::class);

Route::apiResource('teams', \App\Http\Controllers\Api\TeamController::class);

Route::apiResource('challenges', \App\Http\Controllers\Api\ChallengeController::class);

Route::post('upload-image', [\App\Http\Controllers\ImageController::class, 'store']);

Route::apiResource('categories',\App\Http\Controllers\Api\CategoryController::class);

Route::apiResource('comments',\App\Http\Controllers\Api\CommentController::class);

Route::post('comments-by-post-id/{id}', [\App\Http\Controllers\Api\CommentController::class, 'getCommentsByPostId']);

Route::get('posts-by-cate-id/{id}', [\App\Http\Controllers\Api\PostController::class, 'getPostsByCateId']);

Route::post('getUserByEmail',[\App\Http\Controllers\Api\UserController::class, "getUserByEmail"]);

Route::get('getAllPosts',[\App\Http\Controllers\Api\PostController::class, "getAllPosts"]);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
});
