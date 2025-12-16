@extends('layouts.admin')

@section('title', 'سبد خرید')

@section('content')

<h3>🛒 سبد خرید</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($orders->isEmpty())
    <div class="alert alert-warning">سبد خرید شما خالی است</div>
@else
    <div class="card shadow-sm">
        <div class="card-body">

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
                                <span class="badge bg-warning">در انتظار پرداخت</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endif

@endsection
