<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>سبد خرید</h3>

    <?php if(session('success')): ?> <div class="alert alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>
    <?php if($errors->any()): ?> <div class="alert alert-danger"><?php echo e($errors->first()); ?></div> <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام بازی</th>
                <th>قیمت</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="<?php echo e($order->status === 'completed' ? 'table-success' : ''); ?>">
                <td><?php echo e($order->id); ?></td>
                <td><?php echo e($order->game_title); ?></td>
                <td><?php echo e(number_format($order->price)); ?></td>
                <td><?php echo e($order->status); ?></td>
                <td>
                    <?php if($order->status !== 'completed'): ?>
                        <form action="<?php echo e(route('cart.complete', $order->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-primary">تکمیل فرآیند</button>
                        </form>

                        <form action="<?php echo e(route('cart.remove', $order->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">حذف و بازگشت وجه</button>
                        </form>
                    <?php else: ?>
                        <span class="text-muted">نهایی شده</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <p>موجودی شما: <strong><?php echo e(number_format($user->balance ?? 0)); ?></strong></p>

    <a href="<?php echo e(route('payment.topup')); ?>" class="btn btn-success">شارژ کیف</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sermostafack/projects/web_project/resources/views/cart/index.blade.php ENDPATH**/ ?>