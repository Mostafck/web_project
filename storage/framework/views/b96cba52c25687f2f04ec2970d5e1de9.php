<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'پنل مدیریت'); ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            margin: 0;
        }

        /* هدر بالای صفحه */
        .top-header {
            width: 100%;
            height: 60px;
            background: #343a40;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 20px;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1000;
        }

        /* سایدبار */
        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            right: 0;
            top: 60px; /* پایین هدر */
            background: #495057;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #6c757d;
        }

        /* محتوای اصلی */
        .content {
            margin-right: 240px;
            padding: 80px 30px 30px 30px; /* بالای محتوا 80px برای هدر */
            background: #f7f7f7;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<?php
    use App\Models\User;

    $user = null;
    if(session('logged_in')) {
        $user = User::find(session('user_id'));
    }
?>

<!-- هدر بالای صفحه -->
<div class="top-header">
    <?php if($user): ?>
        <div class="fw-bold">
            موجودی: <span class="badge bg-success"><?php echo e(number_format($user->balance)); ?> تومان</span>
        </div>
    <?php endif; ?>
</div>

<!-- سایدبار -->
<div class="sidebar">
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
<?php /**PATH /home/sermostafack/projects/web_project/resources/views/layouts/main.blade.php ENDPATH**/ ?>