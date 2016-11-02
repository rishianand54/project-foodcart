<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        return view('welcome');
    }

    /**
     * @param null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show ($category = null)
    {
        if (is_null($category)) {
            $products = Product::where('status', 'available')
                ->inRandomOrder()
                ->limit(32)
                ->get();
        }
        else {
            $products = Product::where([
                ['status', 'available'],
                ['category', $category]
            ])->get();
            flash($category, 'info');
        }

        return view('home')->with('products', $products);
    }
}
