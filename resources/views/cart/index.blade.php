@extends('layouts.main')

@section('content')
<div class="container">
    <h3>🛒 سبد خرید</h3>

    <!-- پیام موفقیت -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- پیام خطا عمومی -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
        use App\Models\User;
        $user = session('user_id') ? User::find(session('user_id')) : null;
    @endphp

    @if($orders->isEmpty())
        <div class="alert alert-warning">سبد خرید شما خالی است</div>
    @else
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام بازی</th>
                    <th>قیمت</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="{{ $order->status === 'completed' ? 'table-success' : '' }}">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->game_title }}</td>
                    <td>{{ number_format($order->price) }} تومان</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @if($order->status !== 'completed')
                            <!-- پیام موجودی کافی نیست -->
                            @if($user && $user->balance < $order->price)
                                <div class="text-danger mb-1">⚠ موجودی شما کافی نیست</div>
                            @endif

                            <!-- پرداخت / تکمیل سفارش -->
                            <form action="{{ route('cart.complete', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-primary"
                                    @if($user && $user->balance < $order->price) disabled @endif>
                                    تکمیل فرآیند
                                </button>
                            </form>

                            <!-- حذف و بازگشت وجه -->
                            <form action="{{ route('cart.remove', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">حذف و بازگشت وجه</button>
                            </form>
                        @else
                            <span class="text-success">تکمیل سفارش</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- موجودی کاربر -->
    <p class="mt-3">💰 موجودی شما: <strong>{{ number_format($user->balance ?? 0) }} تومان</strong></p>

    <a href="{{ route('payment.topup') }}" class="btn btn-success">شارژ کیف</a>
</div>
@endsection
