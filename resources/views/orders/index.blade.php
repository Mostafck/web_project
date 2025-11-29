<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سفارش‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4" dir="rtl">

    <h2 class="mb-3">لیست سفارش‌ها</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>شماره سفارش</th>
                <th>نام بازی</th>
                <th>قیمت</th>
                <th>تاریخ</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->game_title }}</td>
                <td>{{ number_format($order->price) }} تومان</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
