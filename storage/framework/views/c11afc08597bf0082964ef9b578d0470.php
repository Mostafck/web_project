<form method="POST" action="<?php echo e(route('email.check.do')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="code" placeholder="کد ارسال شده">
    <button>تأیید</button>
</form>
<?php /**PATH /home/sermostafack/projects/web_project/resources/views/email_check.blade.php ENDPATH**/ ?>