<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            
                            <li class="page-item disabled">
                            <a class="btn btn-success" href="/cart" tabindex="-1" aria-disabled="true">Cart <span class="badge bg-primary">{{\Cart::session(Auth::user()->id)->getTotalQuantity()}}</span> EUR {{\Cart::session(Auth::user()->id)->getTotal()}} </a>
                            
                            </li>                            
                        </ul>
                    </nav>
                    @include('flash.index')
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(\Cart::session(Auth::user()->id)->isEmpty())     
                        Your Cart is empty <a href="/dashboard">dashboard</a>
                        
                    @else      
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                @foreach($products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$product->name}}
                                    <span class="badge bg-primary rounded-pill">EUR {{$product->price}} x{{$product->quantity}}</span>
                                </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Shipping
                                    <span class="badge bg-primary rounded-pill">EUR 10</span>
                                </li>
                                <br><br>
                                
                                
                                
                            </ul>
                        </div>
                        <div class="col-6">
                            <form action="{{route('makeorder')}}" method="post" id="payment-form">
                                @csrf 
                                <input type="hidden" name="total_product_value" value="{{\Cart::session(Auth::user()->id)->getTotal()}}" >
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input required type="text" maxlength="100" name="client_name" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->name}}" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                    <textarea required class="form-control"  name="client_address" maxlength="250" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                    <input required type="email" maxlength="100" name="email" class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->email}}" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Card</label>
                                    <div  id="card-element"><!--Stripe.js injects the Card Element--></div>
                                </div>
                                
                                <ul class="list-group">
                                    
                                    
                                    
                                    <li class="list-group-item d-flex  justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Confirm Order</button>
                                    </li>
                                    
                                </ul>
                            </form>
                        </div>
                        
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
