<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\PwTrackController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
    Route::group(['prefix' => '/pw/track'], function () {
        Route::get('/all', [PwTrackController::class, 'index']);
        Route::post('/create', [PwTrackController::class, 'create']);
    });

    Route::group(['prefix' => '/tag'], function () {
        Route::post('/create', [TagsController::class, 'create']);
    });

    Route::group(['prefix' => 'account-type'], function () {
        Route::post('/create', [AccountTypeController::class, 'create']);
        Route::get('/all', [AccountTypeController::class, 'all']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/exist/{email}', [UsersController::class, 'checkExist']);
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [UsersController::class, 'login']);
        Route::post('/register', [UsersController::class, 'register']);
    });
});
