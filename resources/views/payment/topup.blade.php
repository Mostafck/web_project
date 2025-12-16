@extends('layouts.app')

@section('content')
<div class="container">
    <h3>شارژ کیف</h3>

    @if($errors->any()) <div class="alert alert-danger">{{ $errors->first() }}</div> @endif
    <form action="{{ route('payment.topup.do') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>مبلغ (تومان)</label>
            <input type="number" name="amount" class="form-control" required min="1000" step="1000">
        </div>
        <button class="btn btn-primary">پرداخت</button>
    </form>
</div>
@endsection
