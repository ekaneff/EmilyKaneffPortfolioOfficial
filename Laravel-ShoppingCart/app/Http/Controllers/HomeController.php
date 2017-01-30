<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->get();
        $o = $user[0]['attributes']['orderCount'];
        $order = Orders::where([['complete','=', true],['user_id', '=', $id]])->get();

        $products = array();

        $orders = array();

        $itemA = Products::all();

        $pc = 0;

        foreach($itemA as $item)
        {
            $products = array_add($products, $pc, $item['attributes']);

            $pc++;
        }

        $oc = 0;

        foreach($order as $ord)
        {
            $orders = array_add($orders, $oc, $ord['attributes']);

            $oc++;
        }

        return view('user.orderhistory', ['products' => $products, 'orders' => $orders, 'count' => $o]);
    }
}
