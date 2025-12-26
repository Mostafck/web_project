<style>
    .email-form {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff8f0;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .email-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff5722;
    }

    .email-form input[type="email"] {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: border 0.3s;
    }

    .email-form input[type="email"]:focus {
        border-color: #ff5722;
        outline: none;
    }

    .email-form button {
        width: 100%;
        padding: 12px;
        background-color: #ff5722;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .email-form button:hover {
        background-color: #e64a19;
    }

    .email-form .message {
        text-align: center;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .email-form .message.success {
        color: green;
    }

    .email-form .message.error {
        color: red;
    }
</style>

<form method="POST" action="<?php echo e(route('email.send')); ?>" class="email-form">
    <?php echo csrf_field(); ?>
    <h2>ارسال کد به ایمیل</h2>

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

    <input type="email" name="email" placeholder="ایمیل خود را وارد کنید">
    <button>ارسال کد</button>
</form>

<?php /**PATH /home/sermostafack/projects/web_project/resources/views/email_verify.blade.php ENDPATH**/ ?>