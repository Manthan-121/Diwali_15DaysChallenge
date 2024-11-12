<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
class PDFReportController extends Controller
{

    // Display all products in a table with a download button
    public function showProductsPage()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function generatePDF()
    {
        // Fetch all product data
        $products = Product::all();

        // Load the view and pass the product data
        $pdf = PDF::loadView('products', compact('products'));

        // Return the generated PDF as a download
        return $pdf->download('products_report.pdf');
    }
}
