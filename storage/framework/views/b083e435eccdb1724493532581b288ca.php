<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <h2 class="text-center mb-4">لیست سفارشات</h2>

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>نام کاربر</th>
                <th>نام بازی</th>
                <th>قیمت</th>
                <th>تاریخ سفارش</th>
                <th>عملیات</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->user_name); ?></td>
                    <td><?php echo e($order->game_title); ?></td>
                    <td><?php echo e(number_format($order->price)); ?> تومان</td>
                    <td><?php echo e($order->created_at); ?></td>

                    <td>
                        <form action="<?php echo e(route('orders.delete', $order->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sermostafack/projects/web_project/resources/views/admins/orders/index.blade.php ENDPATH**/ ?>