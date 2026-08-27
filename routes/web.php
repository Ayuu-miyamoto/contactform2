<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagController;

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
// お問い合せフォーム
// 入力画面
Route::get('/', [ContactController::class, 'index']);

// 確認画面
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

// 送信
Route::post('/contacts', [ContactController::class, 'store']);

// サンクス画面
Route::get('/thanks', [ContactController::class, 'thanks']);

// 管理者画面
// 一覧
Route::get('/admin', [AdminController::class, 'index']);

// 詳細
Route::get('/admin/contacts/{contact}', [AdminController::class, 'show']);

// タグ追加
Route::post('/admin/tags', [TagController::class, 'store']);

// タグ編集
Route::get('/admin/tags/{tag}/edit', [TagController::class, 'edit']);
Route::put('/admin/tags/{tag}', [TagController::class, 'update']);

// タグ削除
Route::delete('/admin/tags/{tag}', [TagController::class, 'destroy']);