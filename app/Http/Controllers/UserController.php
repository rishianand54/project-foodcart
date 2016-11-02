<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index (Request $request)
    {
        $address = $request->user()->addresses()->first();
        $orders = $request->user()->orders()->get();
        return view('/user')->with('address', $address)->with('orders', $orders);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changeAddress ()
    {
        return view('edit-address');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAddress (Request $request)
    {
        $this->validate($request, [
            'address' => 'required|string',
            'city' => 'required|string',
            'pin_code' => 'required|digits:8',
            'phone' => 'required|numeric',
        ]);

        $address = Address::firstOrNew(['user_id' => $request->user()->id]);
        $address->address = $request->address;
        $address->city = $request->city;
        $address->pin_code = $request->pin_code;
        $address->phone = $request->phone;

        $address->save();

        flash('Address Updated', 'success');
        return redirect('/user');
    }
}
