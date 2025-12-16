<form method="POST" action="{{ route('email.send') }}">
    @csrf
    <input type="email" name="email" placeholder="ایمیل خود را وارد کنید">
    <button>ارسال کد</button>
</form>
