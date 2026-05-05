<?php

use App\Http\Controllers\Api\CompanyStatsController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\EmpoweringBusinessThroughSmartVertexWaveController;
use App\Http\Controllers\Api\HearFromOurHappyCustomerController;
use App\Http\Controllers\Api\PortfolioProjectController;
use App\Http\Controllers\Api\ReadyToTransformYourBusinessController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Contact API Routes
Route::apiResource('contacts', ContactController::class);


// Hear From Our Happy Customers API Routes
Route::apiResource(
    'hear-from-our-happy-customers',
    HearFromOurHappyCustomerController::class
);



Route::post('ready-to-transform', [ReadyToTransformYourBusinessController::class, 'store']);

Route::get('/projects', [PortfolioProjectController::class, 'index']);
Route::get('/projects/{id}', [PortfolioProjectController::class, 'show']);

Route::get('company-stats', [CompanyStatsController::class, 'show']);

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);

Route::get('empowering-stats', [EmpoweringBusinessThroughSmartVertexWaveController::class, 'show']);
