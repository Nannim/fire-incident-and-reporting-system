<?php

use App\Events\SendMessage;
use App\Http\Livewire\Crud;
use App\Http\Livewire\Click;
use App\Http\Livewire\CrudResponse;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Mail\WelcomeUser;
use Illuminate\Support\Str;
use Livewire\Livewire;

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

Route::get('/', function () {
    return view('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { return view('Dashboard'); })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/reports', Crud::class)->name('reports');

Route::middleware(['auth:sanctum', 'verified'])->get('/response', CrudResponse::class)->name('response');

Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::get('/t', function () {
    event(new \App\Events\SendMessage());
    dd('Event Run Successfully.');
});

Route::get('randomString', function ($stringGen) {
    $remember_token = Str::random(10);
    return $remember_token;
    redirect('livewire.create');
});

Route::get('event', function () {
    event(new SendMessage('Hey how are you?'));
});

Route::get('check-click-event', Click::class);
