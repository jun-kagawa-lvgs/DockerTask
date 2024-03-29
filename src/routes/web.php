<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/sheet_get', [PokemonController::class, 'get_sheet_data']);
Route::get('/sheet_set', [PokemonController::class, 'get_sheet_data']);
Route::get('/', [PokemonController::class, 'get']);