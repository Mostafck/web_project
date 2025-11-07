<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن بازی جدید 🎮</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl" class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('games.index') }}">🎮 وب‌سایت بازی‌ها</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">افزودن بازی جدید</h1>

        {{-- نمایش خطاها در صورت اعتبارسنجی --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- فرم افزودن بازی --}}
        <form action="{{ route('games.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">عنوان بازی</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">تاریخ انتشار</label>
                <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">توضیحات</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('games.index') }}" class="btn btn-secondary">بازگشت به لیست</a>
                <button type="submit" class="btn btn-success">افزودن بازی</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
