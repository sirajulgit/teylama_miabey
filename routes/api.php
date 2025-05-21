<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\api\CmsController;
use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\AwardController;
use App\Http\Controllers\api\BlogController; 
use App\Http\Controllers\api\ContactQueryController;
use App\Http\Controllers\api\BibliographyController;
use App\Http\Controllers\api\VisiterController;

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


Route::prefix('v1')->group(function () {

    Route::get('/cms-content', [CmsController::class, 'cmsList']);


    Route::get('/book', [BookController::class, 'bookList']);

    Route::get('/bibliography', [BibliographyController::class, 'index']);


    Route::get('/event', [EventController::class, 'index']);
    Route::get('/event/{id}', [EventController::class, 'singleRecord']);

    Route::get('/award', [AwardController::class, 'index']);
    Route::get('/award/{id}', [AwardController::class, 'singleRecord']);


    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/{id}', [BlogController::class, 'singleRecord']);


    Route::post('/contact-query', [ContactQueryController::class, 'contact_submit']);

    Route::post('/visiter-submit', [VisiterController::class, 'visiter_submit']);

});