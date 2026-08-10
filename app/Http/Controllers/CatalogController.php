<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function home()
    {
        $featuredCategories = Category::take(3)->get();
        return view('home', compact('featuredCategories'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->with('products')->firstOrFail();
        return view('categories.show', compact('category'));
    }

    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();
        return view('products.show', compact('product'));
    }
}
