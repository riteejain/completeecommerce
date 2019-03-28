<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\FooterSetting;
use App\Category;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=DB::table('footer_settings')->first();
        $information=FooterSetting::find(1)->footerInfo;
        $extra=FooterSetting::find(1)->extraInfo;
        $account=FooterSetting::find(1)->MyAccountInfo;
        $copyright=FooterSetting::find(1);

        $pro=Category::with('subcategories','products')->get();
        $orders = Auth::user()->orders;

        $total=Cart::total();
        $tax=Cart::tax();
        $cart=Cart::content();
        $count=Cart::count();

        return view('frontend.myorders',compact('orders','result','information','extra','account',
            'copyright','pro','total','tax','cart','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //this will show the order in details
        $orderdetails = OrderDetail::where('order_id','=',$id)->get();

      $data = Order::find($id);
        $orderdetails['payment_mode'] = $data->payment_mode;
        return view('frontend.myorderdetails',compact('orderdetails'));

        //here we have to send all the items related to the order ID





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
