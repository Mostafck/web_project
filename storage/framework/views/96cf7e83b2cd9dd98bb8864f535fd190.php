<?php $__env->startSection('title','مدیریت بازی‌ها'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>🎮 مدیریت بازی‌ها</h3>
    <a href="<?php echo e(route('games.create')); ?>" class="btn btn-success">
        ➕ افزودن بازی
    </a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>نام بازی</th>
                    <th>قیمت</th>
                    <th width="220">عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($game->title); ?></td>
                        <td><?php echo e(number_format($game->price)); ?> تومان</td>
                        <td>
                            <form action="<?php echo e(route('orders.add',$game->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-success btn-sm">🛒 افزودن به سبد</button>
                            </form>

                            <a href="<?php echo e(route('games.edit',$game->id)); ?>" class="btn btn-warning btn-sm">✏️ ویرایش</a>

                            <form action="<?php echo e(route('games.destroy',$game->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('حذف شود؟')">🗑 حذف</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            هیچ بازی‌ای ثبت نشده است
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sermostafack/projects/web_project/resources/views/games/index.blade.php ENDPATH**/ ?>