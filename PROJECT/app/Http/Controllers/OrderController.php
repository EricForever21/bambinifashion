<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function makeorder(Request $request){
        if(Auth::check())
        {
            try {

                // Set your secret key. Remember to switch to your live secret key in production.
                // See your keys here: https://dashboard.stripe.com/account/apikeys
                \Stripe\Stripe::setApiKey('sk_test_51IBQBPKNc0F6yptNzExJJuifiEEmG6bfFz63ed7A5hBqKwoTjauDUToyHgr3SetOFnh9egIAPyENwwHiD63lNPEc00NJeeJj5S');

                // Token is created using Stripe Checkout or Elements!
                // Get the payment token ID submitted by the form:
                $token = $_POST['stripeToken'];
                $charge = \Stripe\Charge::create([
                'amount' => ($request->input('total_product_value')+10)*100,
                'currency' => 'EUR',
                'description' => Auth::user()->id." Order Payment",
                'source' => $token,
                ]);

                
                \Cart::session(Auth::user()->id)->clear();
                $order = new Order();
                $order->total_product_value = $request->input('total_product_value');
                $order->total_shipping_value = 10;
                $order->client_name = $request->input('client_name');
                $order->client_address = $request->input('client_address');
                $order->save();
                Mail::to('admin@admin.com')->send(new OrderSuccess($order));

                return redirect('/confirmation');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->back()->with('danger, Cannot place order, Please try again');
            }
        }
        else {
            return redirect('/login');
        }
    }

    public function confirmation()
    {
        if(Auth::check()){
            return view('confirmation');
        }
        else {
            return redirect('/login');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
