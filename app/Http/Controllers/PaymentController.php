<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function pay(Order $order)
    {
        $user = Auth::user();

        // اگر سفارش قبلا پرداخت شده باشد
        if ($order->status === 'paid') {
            return back()->with('error', 'این سفارش قبلاً پرداخت شده است.');
        }

        // بررسی موجودی
        if ($user->balance < $order->price) {
            return back()->with('error', 'موجودی کافی نیست!');
        }

        // از موجودی کم کن
        $user->balance -= $order->price;
        $user->save();

        // وضعیت سفارش را paid کن
        $order->status = 'paid';
        $order->save();

        return back()->with('success', 'پرداخت با موفقیت انجام شد!');
    }
}
