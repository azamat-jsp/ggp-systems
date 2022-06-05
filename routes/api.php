<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here iwes where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['jwt.verify', 'api']], function() {
    Route::get('companies', [CompanyController::class, 'index']);
    Route::get('clients/{company}', [ClientController::class, 'index']);
    Route::get('client_companies/{client}', [ClientController::class, 'getCompaniesByClient']);
});

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Api\Auth',
    'prefix' => 'auth'

], function () {    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});


