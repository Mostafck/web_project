<form method="POST" action="{{ route('email.check.do') }}">
    @csrf
    <input type="text" name="code" placeholder="کد ارسال شده">
    <button>تأیید</button>
</form>
