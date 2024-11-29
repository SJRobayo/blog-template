<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\PostEditor;
use App\Livewire\UserPosts;
use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use App\Livewire\HomePage;
use App\Livewire\Editor;
use App\Livewire\PostVisualizer;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', HomePage::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/post')->group(function () {
    Route::get('/create', PostEditor::class)->name('post.create');
    Route::get('/home', HomePage::class)->name('home');
    Route::get('/user', UserPosts::class)->name('user.posts');
    Route::get('/edit/{id}', PostEditor::class)->name('post.edit');
    Route::delete('/delete/{id}', action: [PostEditor::class, 'deletePost'])->name('post.delete');
    Route::get('visualize/{id}', PostVisualizer::class)->name('post.visualize');
    Route::Get('reply/{id}', [PostVisualizer::class, 'replyComment'])->name('post.reply');

});
require __DIR__ . '/auth.php';
