@extends('layouts.main')

@section('title', 'شارژ کیف پول')

@section('content')
<div class="container">
    <h3>💳 شارژ کیف پول</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('payment.topup.do') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">مبلغ مورد نظر (تومان)</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1000" placeholder="مثال: 50000" required>
        </div>
        <button type="submit" class="btn btn-success">شارژ کیف پول</button>
    </form>
</div>
@endsection
