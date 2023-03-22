<?php

use App\Http\Controllers\GptChatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GptChatController::class, 'index']);
Route::post('/send-gpt', [GptChatController::class, 'sendGpt'])->name('sendGpt');
Route::post('/create-image', [GptChatController::class, 'createImage'])->name('createImage');
