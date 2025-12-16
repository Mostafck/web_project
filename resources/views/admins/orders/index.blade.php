@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <h2 class="text-center mb-4">لیست سفارشات</h2>

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>نام کاربر</th>
                <th>نام بازی</th>
                <th>قیمت</th>
                <th>تاریخ سفارش</th>
                <th>عملیات</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_name }}</td>
                    <td>{{ $order->game_title }}</td>
                    <td>{{ number_format($order->price) }} تومان</td>
                    <td>{{ $order->created_at }}</td>

                    <td>
                        <form action="{{ route('orders.delete', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
