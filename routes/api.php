<?php

use App\Models\Point;
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
use App\Http\Controllers\API\PointController;

Route::post('/store',[PointController::class, 'store'])->name('point.add');

Route::get('/all',function (Request $request){
    return Point::all();
})->name('point.all');
