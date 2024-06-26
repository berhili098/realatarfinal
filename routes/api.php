<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CitiesController;
use App\Http\Controllers\api\QuizController;
use App\Http\Controllers\api\SitesController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/first_complete_profile', [AuthController::class, 'CompleteProfile']);
    Route::post('/upload_profile_picture', [AuthController::class, 'UploadProfilePicture']);
    
    Route::get('/get_all_cities', [CitiesController::class, 'index']);
    Route::get('/get_city/{id}', [CitiesController::class, 'show']);
    
    Route::get('/get_all_sites', [SitesController::class, 'getHomeSites']);
    Route::get('/get_all_sites_map', [SitesController::class, 'getAllSites']);
    Route::get('/get_favorised_sites/{uid}', [SitesController::class, 'getFavorised']);
    
    Route::post('/favorise/{id}', [SitesController::class, 'favorise']);
    Route::get('/get_site_media/{id}', [SitesController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/get_quiz/{id}', [QuizController::class, 'show']);
    Route::post('/updates_points/{id}', [QuizController::class, 'updatePoints']);
});
