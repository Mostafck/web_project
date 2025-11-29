<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>تأیید کد پیامک 📱</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl" class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4 mx-auto" style="max-width:400px;">
    <h3 class="text-center mb-3">تأیید شماره تلفن</h3>
    <p class="text-center text-muted">کد ارسال‌شده را وارد کنید</p>

    @if ($errors->any())
      <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @if (session('code'))
      <div class="alert alert-info text-center">
        <small>📩 کد تستی شما (فقط برای تست): <b>{{ session('code') }}</b></small>
      </div>
    @endif

    <form action="{{ route('verify') }}" method="POST">
      @csrf
      <div class="mb-3">
        <input type="text" name="code" class="form-control text-center" placeholder="کد ۴ رقمی" required>
      </div>
      <button type="submit" class="btn btn-success w-100">تأیید</button>
    </form>
  </div>
</div>

</body>
</html>
