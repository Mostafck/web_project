<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست بازی‌ها 🎮</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl" class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('games.index')); ?>">🎮 وب‌سایت بازی‌ها</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">لیست بازی‌ها</h1>

        <a href="<?php echo e(route('games.create')); ?>" class="btn btn-success mb-3">افزودن بازی جدید</a>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>نام بازی</th>
                    <th>دسته</th>
                    <th>پلتفرم</th>
                    <th>قیمت</th>
                    <th>سبد خرید</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($game->title); ?></td>
                        <td><?php echo e($game->category->name ?? '-'); ?></td>
                        <td><?php echo e($game->platform->name ?? '-'); ?></td>
                        <td><?php echo e(number_format($game->price)); ?> تومان</td>
                        <td>
                            <form action="<?php echo e(route('orders.add', $game->id)); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                            <button class="btn btn-success btn-sm">افزودن به سبد خرید</button>
                            </form>

                            <a href="<?php echo e(route('games.show', $game->id)); ?>" class="btn btn-info btn-sm">نمایش</a>
                            <a href="<?php echo e(route('games.edit', $game->id)); ?>" class="btn btn-warning btn-sm">ویرایش</a>

                            <form action="<?php echo e(route('games.destroy', $game->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئنی؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">هیچ بازی‌ای ثبت نشده است 🎮</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        
        <div class="d-flex justify-content-center">
            <?php echo e($games->links()); ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php /**PATH /home/sermostafack/projects/web_project/resources/views/games/index.blade.php ENDPATH**/ ?>