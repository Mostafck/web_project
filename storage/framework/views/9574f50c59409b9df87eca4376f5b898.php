<form method="POST" action="<?php echo e(route('email.send')); ?>">
    <?php echo csrf_field(); ?>
    <input type="email" name="email" placeholder="ایمیل خود را وارد کنید">
    <button>ارسال کد</button>
</form>
<?php /**PATH /home/sermostafack/projects/web_project/resources/views/email_verify.blade.php ENDPATH**/ ?>