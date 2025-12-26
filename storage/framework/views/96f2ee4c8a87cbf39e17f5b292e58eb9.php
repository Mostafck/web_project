<?php $__env->startSection('title', 'شارژ کیف پول'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>💳 شارژ کیف پول</h3>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('payment.topup.do')); ?>" method="POST" class="mt-4">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="amount" class="form-label">مبلغ مورد نظر (تومان)</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1000" placeholder="مثال: 50000" required>
        </div>
        <button type="submit" class="btn btn-success">شارژ کیف پول</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sermostafack/projects/web_project/resources/views/payment/topup.blade.php ENDPATH**/ ?>