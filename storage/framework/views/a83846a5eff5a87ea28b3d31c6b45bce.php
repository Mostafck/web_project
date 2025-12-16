<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'پنل مدیریت'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            background: #f7f7f7;
            margin: 0;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            right: 0;
            top: 0;
            background: #343a40;
            color: #fff;
            padding-top: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-right: 240px;
            padding: 30px;
        }
    </style>
</head>
<body>

<!-- سایدبار -->
<div class="sidebar">
    <h5 class="text-center">منوی مدیریت</h5>
    <hr class="bg-light">

    <a href="<?php echo e(route('home')); ?>">🏠 داشبورد</a>
    <a href="<?php echo e(route('games.index')); ?>">🎮 مدیریت بازی‌ها</a>
    <a href="<?php echo e(route('cart.index')); ?>">🛒 سبد خرید</a>
    <a href="<?php echo e(route('orders.index')); ?>">📦 مدیریت سفارش‌ها</a>
    <a href="<?php echo e(route('login')); ?>">🚪 خروج</a>
</div>

<!-- محتوای اصلی -->
<div class="content">
    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html>
<?php /**PATH /home/sermostafack/projects/web_project/resources/views/layouts/admin.blade.php ENDPATH**/ ?>