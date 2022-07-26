<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Students\Controllers\Site\StudentsController;

/*
|--------------------------------------------------------------------------
| Coupons Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your main "front office" application.
| Please note that this file is auto imported in the main routes file, so it will inherit the main "prefix"
| and "namespace", so don't edit it to add for example "api" as a prefix.
*/


/* Creating a route for the index method in the StudentsController class. */
Route::get("students",  [StudentsController::class, 'index']);
/* Creating a route for the show method in the StudentsController class. */
Route::get("students/{id}",  [StudentsController::class, 'show']);
