@extends('layouts.admin')

@section('title','مدیریت بازی‌ها')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>🎮 مدیریت بازی‌ها</h3>
    <a href="{{ route('games.create') }}" class="btn btn-success">
        ➕ افزودن بازی
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>نام بازی</th>
                    <th>قیمت</th>
                    <th width="220">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($games as $game)
                    <tr>
                        <td>{{ $game->title }}</td>
                        <td>{{ number_format($game->price) }} تومان</td>
                        <td>
                            <form action="{{ route('orders.add',$game->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">🛒 افزودن به سبد</button>
                            </form>

                            <a href="{{ route('games.edit',$game->id) }}" class="btn btn-warning btn-sm">✏️ ویرایش</a>

                            <form action="{{ route('games.destroy',$game->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('حذف شود؟')">🗑 حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            هیچ بازی‌ای ثبت نشده است
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
