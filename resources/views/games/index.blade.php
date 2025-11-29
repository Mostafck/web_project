<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست بازی‌ها 🎮</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl" class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('games.index') }}">🎮 وب‌سایت بازی‌ها</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">لیست بازی‌ها</h1>

        <a href="{{ route('games.create') }}" class="btn btn-success mb-3">افزودن بازی جدید</a>

        {{-- نمایش پیام موفقیت --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- جدول بازی‌ها --}}
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>نام بازی</th>
                    <th>دسته</th>
                    <th>پلتفرم</th>
                    <th>قیمت</th>
                    <th>سبد خرید</th>
                </tr>
            </thead>
            <tbody>
                @forelse($games as $game)
                    <tr>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->category->name ?? '-' }}</td>
                        <td>{{ $game->platform->name ?? '-' }}</td>
                        <td>{{ number_format($game->price) }} تومان</td>
                        <td>
                            <form action="{{ route('orders.add', $game->id) }}" method="POST">
                          @csrf
                            <button class="btn btn-success btn-sm">افزودن به سبد خرید</button>
                            </form>

                            <a href="{{ route('games.show', $game->id) }}" class="btn btn-info btn-sm">نمایش</a>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">ویرایش</a>

                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئنی؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">هیچ بازی‌ای ثبت نشده است 🎮</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- صفحه‌بندی --}}
        <div class="d-flex justify-content-center">
            {{ $games->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

