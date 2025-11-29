@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>لیست سفارشات</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>نام کاربر</th>
                <th>نام بازی</th>
                <th>قیمت</th>
                <th>تاریخ سفارش</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_name }}</td>
                    <td>{{ $order->game_name }}</td>
                    <td>{{ number_format($order->price) }} تومان</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
