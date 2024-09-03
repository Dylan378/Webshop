<?php

use App\Livewire\Cart;
use App\Livewire\ProductPage;
use App\Livewire\StoreFront;
use Illuminate\Support\Facades\Route;

Route::get('/', StoreFront::class)->name('home');
Route::get('/product/{productId}', ProductPage::class)->name('product');
Route::get('/cart', Cart::class)->name('cart');
