<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $products = Product::paginate(16);
            return view('dashboard',[
                'products' => $products
            ]);
        }
        else {
            return redirect('/login');
        }

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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addtocart($id)
    {
        try {
            if(Product::where('id',$id)->exists())
            {
                $product = Product::where('id',$id)->first();
                \Cart::session(Auth::user()->id)->add(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'brand' => $product->brand->name,
                    'quantity' => 1
                ));
                
                return redirect()->back()->with('success', 'Item Added to cart'); 
            }
            else {
                return redirect()->back()->with('danger', 'Error, try Again'); 
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Error, try Again'); 
        }
    }

    public function cart()
    {
        if(\Cart::session(Auth::user()->id)->isEmpty())
        {
            return view('cart')->with('info','Your Cart is Empty');
        }
        else {
            $products = \Cart::session(Auth::user()->id)->getContent(); 
            return view('cart',[
                'products' => $products
            ]);

        }
    }
}
