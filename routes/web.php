<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ImageUploadController;
use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\Category;
use App\Livewire\BorrowersCreate;
use App\Livewire\BorrowersEdit;
use App\Livewire\BorrowersIndex;
use App\Livewire\BorrowersShow;
use App\Livewire\ItemCreate;
use App\Livewire\ItemEdit;
use App\Livewire\ItemIndex;
use App\Livewire\ItemShow;
use App\Livewire\Location;
use App\Livewire\Locker;
use App\Livewire\Purchase;
use App\Livewire\Room;
use App\Livewire\Items;
use Illuminate\Support\Facades\Route;

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

Route::redirect('home', '/')->name('home');
Route::get('/tentang', About::class)->name('tentang');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/list', Items::class)->name('list');

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');
    Route::post('logout', LogoutController::class)
        ->name('logout');
    Route::get('kategori', Category::class)->name('kategori');
    Route::get('pembelian', Purchase::class)->name('pembelian');
    Route::get('lokasi', Location::class)->name('lokasi');
    Route::get('ruang', Room::class)->name('ruang');
    Route::get('loker', Locker::class)->name('loker');
    Route::get('barang', ItemIndex::class)->name('barang.index'); 
    Route::get('barang/create', ItemCreate::class)->name('barang.create'); 
    Route::get('barang/{id}/edit', ItemEdit::class)->name('barang.edit'); 
    Route::get('barang/{id}', ItemShow::class)->name('barang.view'); 
    Route::post('image-upload', [ImageUploadController::class, 'upload'])->name('image.upload');
    Route::get('peminjam', BorrowersIndex::class)->name('peminjam.index'); 
    Route::get('peminjam/create', BorrowersCreate::class)->name('peminjam.create'); 
    Route::get('peminjam/{id}/edit', BorrowersEdit::class)->name('peminjam.edit'); 
    Route::get('peminjam/{id}', BorrowersShow::class)->name('peminjam.view'); 
    Route::post('/capture', [ImageUploadController::class, 'store'])->name('capture.store');
  
});
