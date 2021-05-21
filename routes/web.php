<?php

use App\Events\SendMessage;
use App\Http\Livewire\Crud;
use App\Http\Livewire\Click;
use App\Http\Livewire\CrudResponse;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AutoAddressController;
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


// display dashboard from funtion that returns dashboard view using keyword name and verified authentication middleware
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { return view('Dashboard'); })->name('dashboard');

// display reports from Crud livewire class and use verified authentication middleware
Route::middleware(['auth:sanctum', 'verified'])->get('/reports', Crud::class)->name('reports');

// display responses from CrudResponse livewire class and use verified authentication middleware
Route::middleware(['auth:sanctum', 'verified'])->get('/response', CrudResponse::class)->name('response');

// display auto-complete-address from AutoAddressController controller class and use verified authentication middleware
Route::get('auto-complete-address', [AutoAddressController::class, 'googleAutoAddress']);

// send email web routes definition using MailController class
Route::get('/send-email', [MailController::class, 'sendEmail']);

// search reports and report history for matchig reports
Route::middleware(['auth:sanctum', 'verified'])->get('/livesearch', [ReportController::class, 'getReport']);

Route::get('/t', function () {
    event(new \App\Events\SendMessage());
    dd('Event Run Successfully.');
});

Route::middleware(['auth:sanctum', 'verified'])->get('randomString', Crud::class);

Route::get('event', function () {
    event(new SendMessage('Hey how are you?'));
});

Route::get('check-click-event', Click::class);
