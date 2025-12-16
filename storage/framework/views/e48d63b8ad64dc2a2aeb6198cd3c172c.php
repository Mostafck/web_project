<?php $__env->startSection('title', 'سبد خرید'); ?>

<?php $__env->startSection('content'); ?>

<h3>🛒 سبد خرید</h3>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if($orders->isEmpty()): ?>
    <div class="alert alert-warning">سبد خرید شما خالی است</div>
<?php else: ?>
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام بازی</th>
                        <th>قیمت</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($order->game_title); ?></td>
                            <td><?php echo e(number_format($order->price)); ?> تومان</td>
                            <td>
                                <span class="badge bg-warning">در انتظار پرداخت</span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sermostafack/projects/web_project/resources/views/orders/index.blade.php ENDPATH**/ ?>