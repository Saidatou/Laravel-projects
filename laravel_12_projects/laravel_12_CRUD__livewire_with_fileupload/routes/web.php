<?php

use App\Livewire\Posts\PostCreate;
use App\Livewire\Posts\PostEdit;
use App\Livewire\Posts\PostIndex;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/posts', PostIndex::class)->name('posts.index');
    Route::get('/posts/create', PostCreate::class)->name('posts.create');
    Route::get('/posts/{post}/edit', PostEdit::class)->name('posts.edit');


});

require __DIR__.'/auth.php';
