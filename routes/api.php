<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\MemberController;
use App\Models\Member;
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

// Book Api Controller
Route::get('books', [BookController::class, 'viewBook']);
Route::post('books', [BookController::class, 'saveBook']);
Route::put('books/{id}', [BookController::class, 'updateBook']);
Route::delete('books/{id}', [BookController::class, 'deleteBook']);
Route::get('books/{title}', [BookController::class, 'searchBook']);

// Member Api Controller
Route::get('members', [MemberController::class, 'viewMember']);
Route::post('members', [MemberController::class, 'saveMember']);
Route::put('members/{id}', [MemberController::class, 'updateMember']);
Route::delete('members/{id}', [MemberController::class, 'deleteMember']);