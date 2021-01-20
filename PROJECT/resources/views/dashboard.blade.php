<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                    
                <img width="100%" style="" src="{{asset('welcome.png')}}" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
    </div>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
               
                    <div class="row container">
                    @foreach($products as $product)
                        <div class="col-3" style="padding-bottom: calc(var(--bs-gutter-x)/ 2);">
                            

                            <div class="card text-center">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">{{$product->brand->name}}</p>
                                    EUR {{$product->price}}
                                </div>
                                <div class="card-footer text-muted">
                                    <a href="/addtocart/{{$product->id}}" class="btn btn-primary">BUY</a>
                                </div>
                            </div>
                        
                        </div>

                    @endforeach
                    <br>
                    
                    <nav aria-label="Page navigation example">
                    {{ $products->links() }}
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
