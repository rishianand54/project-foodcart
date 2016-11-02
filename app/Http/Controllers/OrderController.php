<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * OrderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAddress')->only('confirmOrder');
        $this->middleware('checkOrders')->except('index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index (Request $request)
    {
        $orders = $request->user()->orders()->where('status', 'unconfirmed')->get();
        $address = $request->user()->addresses()->first();
        return view('order')->with('orders', $orders)->with('address', $address);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmOrder (Request $request)
    {
        $request->user()->orders()->where('status', 'unconfirmed')->update(['status' => 'confirmed']);
        $message = 'Your order has been confirmed. It\'ll be delivered at your mentioned address.';
        flash()->overlay($message, 'Order Confirmed');
        return back();
    }

    /**
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateBasket (Order $order)
    {
        $name = $order->product()->first()->name;
        $order->delete();
        $message = title_case($name) . ' has been removed from your basket';

        flash($message, 'success');
        return redirect('/order');
    }
}
