<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;

class PageController extends Controller
{
    public function index() {
        return view('index')->with([
          'latestProducts' => Product::orderBy('created_at', 'DESC')->take(10)->get(),
          'saleProducts' => Product::orderBy('sale_percentage', 'DESC')->take(10)->get(),
          'randomProducts' => Product::inRandomOrder()->take(10)->get(),
          'featuredProducts' => Product::where('featured', 1)->take(10)->get(),
          ]);
    }
}
