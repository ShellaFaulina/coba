<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCtr;
use App\Http\Controllers\AboutUsCtr;
use App\Http\Controllers\ContactCtr;
use App\Http\Controllers\ServiceCtr;
use App\Http\Controllers\TestimonialCtr;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::match(['get', 'post'], '/main/menu', [MenuCtr::class, 'menu'])->name('main.menu');

Route::get('/', function () {
    return view('/main/index');
});

Route::get('/dashboard', [MenuCtr::class, 'layout'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/main/index', [MenuCtr::class, 'layout'])
    ->middleware(['auth', 'verified'])
    ->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('kategoris', MenuCtr::class)->middleware('auth');
Route::resource('kategoris', MenuCtr::class)->middleware(['auth', 'admin']);
require __DIR__.'/auth.php';


Route::post('/kategoris/search', [MenuCtr::class, 'search'])->name('kategoris.search');
Auth::routes();

Route::post('/main/search', [BookController::class, 'mainsearch'])->name('main.search');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/books/{id}/show', [BookController::class, 'show'])->name('books.show');

Route::get('/about-us', function () {
    return view('main.about');
});

Route::get('/main/menu', function () {
    return view('main.menu');
});

Route::get('/contact', function () {
    return view('main.contact');
});

Route::get('/testimonial', function () {
    return view('main.testimonial');
});

Route::get('/service', function () {
    return view('main.service');
});

Route::get('/books/{id}/pinjam', [BookController::class, 'borrow'])->name('books.borrow');
Route::post('/books/{id}/pinjamval', [BookController::class, 'borrowval']);

Route::get('/main/{id}/pengembalian', [BookController::class, 'return'])->name('main.return');
Route::post('/main/{id}/konfirmasipengembalian', [BookController::class, 'returnconfirm']);

Route::get('/main/{id}/validasipengembalian', [BookController::class, 'returnval'])->name('main.dashboard');




