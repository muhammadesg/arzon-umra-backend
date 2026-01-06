<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\HomeApiController;
use Illuminate\Support\Facades\Route;


Route::get('settings' ,[ApiController::class, 'setting']);
Route::get('videos' ,[ApiController::class, 'videos']);
Route::get('comments' ,[ApiController::class, 'comments']);
Route::get('packages' ,[ApiController::class, 'packages']);
Route::get('packages/{id}' ,[ApiController::class, 'packages_show']);
Route::get('advantages' ,[ApiController::class, 'advantages']);
Route::get('sendcontacts' ,[ApiController::class, 'sendcontacts']);
Route::post('sendcontacts' ,[ApiController::class, 'store']);
Route::get('brands' ,[ApiController::class, 'brands']);
Route::get('abouts' ,[ApiController::class, 'abouts']);
Route::get('sliders' ,[ApiController::class, 'sliders']);
Route::get('tourCards' ,[ApiController::class, 'tourCards']);
Route::post('orders' ,[ApiController::class, 'order_store']);

Route::get('filters', [ApiController::class, 'getFilters']);
Route::get('search-tours', [ApiController::class, 'searchTours']);
