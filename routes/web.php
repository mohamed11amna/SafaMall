<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/', [CatalogController::class, 'home'])->name('home');
Route::get('/departments', [CatalogController::class, 'categories'])->name('categories');
Route::get('/departments/{slug}', [CatalogController::class, 'showCategory'])->name('categories.show');
Route::get('/products/{slug}', [CatalogController::class, 'showProduct'])->name('products.show');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
