<?php $__env->startSection('title', 'مدیریت سفارش‌ها'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>📦 مدیریت سفارش‌ها</h3>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-warning">هیچ سفارشی وجود ندارد</div>
    <?php else: ?>
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
                        <?php if($order->status === 'pending'): ?>
                            <span class="badge bg-warning">در انتظار پرداخت</span>
                        <?php elseif($order->status === 'completed'): ?>
                            <span class="badge bg-success">سفارش تکمیل شد </span>
                        <?php elseif($order->status === 'در حال آماده‌سازی محصول'): ?>
                            <span class="badge bg-info">در حال آماده‌سازی محصول</span>
                        <?php elseif($order->status === 'canceled'): ?>
                            <span class="badge bg-danger">لغو شده</span>
                        <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e($order->status); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php
        use App\Models\User;
        $user = null;
        if(session('user_id')){
            $user = User::find(session('user_id'));
        }
    ?>

    <p class="mt-3">💰 موجودی شما: <strong><?php echo e(number_format($user->balance ?? 0)); ?> تومان</strong></p>

    <a href="<?php echo e(route('payment.topup')); ?>" class="btn btn-success">شارژ کیف</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sermostafack/projects/web_project/resources/views/orders/index.blade.php ENDPATH**/ ?>