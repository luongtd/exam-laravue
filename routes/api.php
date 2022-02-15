<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\TodosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::get('/index', [TodosController::class, 'index']);
Route::post('/add', [TodosController::class, 'add']);
Route::post('/remove', [TodosController::class, 'remove']);
Route::post('/removeAll', [TodosController::class, 'removeAll']);
Route::post('/doneAll', [TodosController::class, 'doneAll']);

Route::middleware('api')->group(function () {
    Route::resource('products', ProductController::class);
});
