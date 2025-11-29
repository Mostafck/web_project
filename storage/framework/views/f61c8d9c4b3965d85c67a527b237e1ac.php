<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن بازی جدید 🎮</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl" class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('games.index')); ?>">🎮 وب‌سایت بازی‌ها</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">افزودن بازی جدید</h1>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form action="<?php echo e(route('games.store')); ?>" method="POST" class="card p-4 shadow-sm">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="title" class="form-label">عنوان بازی</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">تاریخ انتشار</label>
                <input type="date" name="release_date" id="release_date" class="form-control" value="<?php echo e(old('release_date')); ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">توضیحات</label>
                <textarea name="description" id="description" class="form-control" rows="4"><?php echo e(old('description')); ?></textarea>
            </div>
             <div class="mb-3">
                 <label>قیمت بازی (تومان)</label>
                 <input type="number" name="price" class="form-control" required>
             </div>


            <div class="d-flex justify-content-between">
                <a href="<?php echo e(route('games.index')); ?>" class="btn btn-secondary">بازگشت به لیست</a>
                <button type="submit" class="btn btn-success">افزودن بازی</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /home/sermostafack/projects/web_project/resources/views/games/create.blade.php ENDPATH**/ ?>