<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('addToBasket');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index (Product $product)
    {
        return view('product')->with('product', $product);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToBasket (Request $request, Product $product)
    {
        $this->validate($request, [
            'quantity' => 'required',
        ]);
        $order = new Order;
        $order->product_id = $product->id;
        $order->quantity = $request->quantity;
        $order->status = 'unconfirmed';

        $request->user()->orders()->save($order);

        flash('Item added to your basket', 'success');
        return back();
    }
}
