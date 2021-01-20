<?php if(Session::has('primary')): ?>

<div class="alert alert-primary" role="alert">
<?php echo e(Session::get('primary')); ?>

</div>
<?php endif; ?>

<?php if(Session::has('secondary')): ?>
<div class="alert alert-secondary" role="alert">
<?php echo e(Session::get('secondary')); ?>

</div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
  <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>


<?php if(Session::has('danger')): ?>
<div class="alert alert-danger" role="alert">
<?php echo e(Session::get('danger')); ?>

</div>
<?php endif; ?>


<?php if(Session::has('warning')): ?>
<div class="alert alert-warning" role="alert">
<?php echo e(Session::get('warning')); ?>

</div>
<?php endif; ?>


<?php if(Session::has('info')): ?>
<div class="alert alert-info" role="alert">
<?php echo e(Session::get('info')); ?>

</div>
<?php endif; ?>


<?php if(Session::has('light')): ?>
<div class="alert alert-light" role="alert">
<?php echo e(Session::get('light')); ?>

</div>
<?php endif; ?>


<?php if(Session::has('error')): ?>
<div class="alert alert-dark" role="alert">
<?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ericforever\resources\views/flash/index.blade.php ENDPATH**/ ?>