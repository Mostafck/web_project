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

<form method="POST" action="{{ route('email.check.do') }}" class="verify-form">
    @csrf
    <h2>تأیید کد</h2>

    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="message error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <input type="text" name="code" placeholder="کد ارسال شده">
    <button>تأیید</button>
</form>
