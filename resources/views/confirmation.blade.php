<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Success') }}
        </h2>
    </x-slot>
   
    


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Order Completed Successfully!!</h4>
                    <p>Thank you for ordering. We received your order and will begin processing it soon. Your order information appears in given email.</p>
                    <hr>
                    <p class="mb-0"><a href="/dashboard">BACK TO STORE.</a></p>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
