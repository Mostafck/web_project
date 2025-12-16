<!DOCTYPE html>
<!DOCTYPE html> <html lang="fa"> 
  <head> <meta charset="UTF-8">
   <title>ورود به سیستم 🎮</title> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> </head> 
   <body dir="rtl" class="bg-light">
     <div class="container mt-5"> <div class="card shadow p-4 mx-auto" style="max-width:400px;">
     <h3 class="text-center mb-3">ورود به سایت بازی‌ها</h3> <?php if($errors->any()): ?> 
   <div class="alert alert-danger"><?php echo e($errors->first()); ?></div> <?php endif; ?>
    <form action="<?php echo e(route('login')); ?>" method="POST"> <?php echo csrf_field(); ?> <div class="mb-3"> 
    <label class="form-label">نام کاربری</label> 
   <input type="text" name="username" class="form-control" required> </div> <div class="mb-3"> 
    <label class="form-label">رمز عبور</label> 
   <input type="password" name="password" class="form-control" required> </div>
    <button type="submit" class="btn btn-primary w-100">ورود</button>
   </form> 
  </div> 
  </div> 
  </body>
    </html>
</html>

<?php /**PATH /home/sermostafack/projects/web_project/resources/views/login.blade.php ENDPATH**/ ?>