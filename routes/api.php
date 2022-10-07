<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\StateController;
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

Route::apiResource('/states',StateController::class);
Route::apiResource('/city',CityController::class);

Route::prefix('/company')->group(function () {
    Route::get('', [CompanyController::class, 'index'])->name('api.company.index');
    Route::get('/find/state/{state_id}', [CompanyController::class, 'companyFindForState'])->name('api.company.companyFindForState');
    Route::get('/find/city/{city_id}', [CompanyController::class, 'companyFindForCity'])->name('api.company.companyFindForCity');
    Route::get('/find/name/{name_id}', [CompanyController::class, 'companyFindForName'])->name('api.company.companyFindForName');
});
