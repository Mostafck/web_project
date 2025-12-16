@extends('layouts.app')

@section('content')
<div class="container">
    <h3>سبد خرید</h3>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if($errors->any()) <div class="alert alert-danger">{{ $errors->first() }}</div> @endif

    <table class="table table-striped">
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
                <td>{{ number_format($order->price) }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    @if($order->status !== 'completed')
                        <form action="{{ route('cart.complete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-sm btn-primary">تکمیل فرآیند</button>
                        </form>

                        <form action="{{ route('cart.remove', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">حذف و بازگشت وجه</button>
                        </form>
                    @else
                        <span class="text-muted">نهایی شده</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>موجودی شما: <strong>{{ number_format($user->balance ?? 0) }}</strong></p>

    <a href="{{ route('payment.topup') }}" class="btn btn-success">شارژ کیف</a>
</div>
@endsection
