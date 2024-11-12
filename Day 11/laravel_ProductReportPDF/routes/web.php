<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PDFReportController;

Route::get('/products', [PDFReportController::class, 'showProductsPage'])->name('products.page');

Route::get('/products/pdf', [PDFReportController::class, 'generatePDF'])->name(name: 'products.pdf');
