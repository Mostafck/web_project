@extends('layouts.main')

@section('title', 'مدیریت سفارش‌ها')

@section('content')
<div class="container">
    <h3>📦 مدیریت سفارش‌ها</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-warning">هیچ سفارشی وجود ندارد</div>
    @else
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام بازی</th>
                    <th>قیمت</th>
                    <th>وضعیت</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->game_title }}</td>
                    <td>{{ number_format($order->price) }} تومان</td>
                    <td>
                        @if($order->status === 'pending')
                            <span class="badge bg-warning">در انتظار پرداخت</span>
                        @elseif($order->status === 'completed')
                            <span class="badge bg-success">سفارش تکمیل شد </span>
                        @elseif($order->status === 'در حال آماده‌سازی محصول')
                            <span class="badge bg-info">در حال آماده‌سازی محصول</span>
                        @elseif($order->status === 'canceled')
                            <span class="badge bg-danger">لغو شده</span>
                        @else
                            <span class="badge bg-secondary">{{ $order->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @php
        use App\Models\User;
        $user = null;
        if(session('user_id')){
            $user = User::find(session('user_id'));
        }
    @endphp

    <p class="mt-3">💰 موجودی شما: <strong>{{ number_format($user->balance ?? 0) }} تومان</strong></p>

    <a href="{{ route('payment.topup') }}" class="btn btn-success">شارژ کیف</a>
</div>
@endsection
