<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BikeTripsController;
use App\Http\Controllers\Api\ExursionTripsController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\HoneymoonTripsController;
use App\Http\Controllers\Api\HotBallonTripsController;
use App\Http\Controllers\Api\NileTripsController;
use App\Http\Controllers\Api\PackageTripsController;
use App\Http\Controllers\Api\SerivcesController;
use App\Http\Controllers\Api\UserServicesController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'v1/user'],function(){
    Route::post('login', [AuthController::class , 'login']);
    Route::post('register', [AuthController::class , 'register']);
    Route::post('forgetPasswordStepOne', [AuthController::class , 'forgetPasswordStepOne']);
    Route::post('forgetPasswordStepTwo', [AuthController::class , 'forgetPasswordStepTwo']);
    Route::group(['prefix' => 'home'],function(){
        Route::get('/', [HomeController::class, 'index']);
        Route::get('foryou', [HomeController::class, 'foryou']);
    });

    /***trips****/
        Route::group(['prefix' => 'services'],function(){
            Route::get('/' , [SerivcesController::class , 'index']);
            Route::get('biketrips' , [BikeTripsController::class , 'index']);
            Route::get('exursiontrips' , [ExursionTripsController::class , 'index']);
            Route::get('niletrips' , [NileTripsController::class , 'index']);
            Route::get('hotballontrips' , [HotBallonTripsController::class , 'index']);
            Route::get('packagetrips' , [PackageTripsController::class , 'index']);
            Route::get('honeymoontrips' , [HoneymoonTripsController::class , 'index']);
        });
    /***trips****/
    Route::group(['middleware' => 'auth'],function(){
        Route::post('logout', [AuthController::class , 'logout'] );
        Route::group(['prefix' => 'userServices' ], function(){ //favourites
            Route::get('/',[ UserServicesController::class , 'index']);
            Route::post('/store',[ UserServicesController::class , 'store']);
        });
        Route::group(['prefix' => 'home'],function(){
            Route::get('foryou', [HomeController::class, 'foryou']);
        });
    });
});



