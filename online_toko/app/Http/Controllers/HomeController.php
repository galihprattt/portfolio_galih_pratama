<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(8);
        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');

        $products = Product::where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->paginate(8);

        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }
}
