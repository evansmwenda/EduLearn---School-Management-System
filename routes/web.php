<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/send-email', function () {
    $mailData = [
        'title' => 'Send mail from Nicesnippets.com',
        'body' => 'This is for testing email using smtp.'
    ];



    Mail::to('evansmwenda.em@gmail.com')->send(new TestMail($mailData));

    dd("email has been sent");
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
