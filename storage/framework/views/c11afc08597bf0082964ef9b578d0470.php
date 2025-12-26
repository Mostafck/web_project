<style>
    .verify-form {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .verify-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .verify-form input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: border 0.3s;
    }

    .verify-form input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }

    .verify-form button {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .verify-form button:hover {
        background-color: #0056b3;
    }

    .verify-form .message {
        text-align: center;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .verify-form .message.success {
        color: green;
    }

    .verify-form .message.error {
        color: red;
    }
</style>

<form method="POST" action="<?php echo e(route('email.check.do')); ?>" class="verify-form">
    <?php echo csrf_field(); ?>
    <h2>تأیید کد</h2>

    <?php if(session('success')): ?>
        <div class="message success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="message error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <input type="text" name="code" placeholder="کد ارسال شده">
    <button>تأیید</button>
</form>
<?php /**PATH /home/sermostafack/projects/web_project/resources/views/email_check.blade.php ENDPATH**/ ?>