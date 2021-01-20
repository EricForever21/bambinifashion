 <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Checkout')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            
                            <li class="page-item disabled">
                            <a class="btn btn-success" href="/cart" tabindex="-1" aria-disabled="true">Cart <span class="badge bg-primary"><?php echo e(\Cart::session(Auth::user()->id)->getTotalQuantity()); ?></span> EUR <?php echo e(\Cart::session(Auth::user()->id)->getTotal()); ?> </a>
                            
                            </li>                            
                        </ul>
                    </nav>
                    <?php echo $__env->make('flash.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <?php if(\Cart::session(Auth::user()->id)->isEmpty()): ?>     
                        Your Cart is empty <a href="/dashboard">dashboard</a>
                        
                    <?php else: ?>      
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo e($product->name); ?>

                                    <span class="badge bg-primary rounded-pill">EUR <?php echo e($product->price); ?> x<?php echo e($product->quantity); ?></span>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Shipping
                                    <span class="badge bg-primary rounded-pill">EUR 10</span>
                                </li>
                                <br><br>
                                
                                
                                
                            </ul>
                        </div>
                        <div class="col-6">
                            <form action="<?php echo e(route('makeorder')); ?>" method="post" id="payment-form">
                                <?php echo csrf_field(); ?> 
                                <input type="hidden" name="total_product_value" value="<?php echo e(\Cart::session(Auth::user()->id)->getTotal()); ?>" >
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input required type="text" maxlength="100" name="client_name" class="form-control" id="exampleFormControlInput1" value="<?php echo e(Auth::user()->name); ?>" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                    <textarea required class="form-control"  name="client_address" maxlength="250" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                    <input required type="email" maxlength="100" name="email" class="form-control" id="exampleFormControlInput1" value="<?php echo e(Auth::user()->email); ?>" placeholder="Email">
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
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH /Users/ac/programming/laravel/app/resources/views/cart.blade.php ENDPATH**/ ?>