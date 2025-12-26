<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PaymentController extends Controller
{
    // نمایش فرم شارژ
    public function showTopUpForm()
    {
        return view('payment.topup');
    }

    // پردازش شارژ
    public function topUp(Request $request)
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $request->validate([
            'amount' => 'required|numeric|min:1000'
        ]);

        $user = User::find(session('user_id'));

        if(!$user) {
            return back()->withErrors('کاربر یافت نشد');
        }

        // افزایش موجودی
        $user->increment('balance', $request->amount);

        return back()->with('success', 'موجودی شما با موفقیت شارژ شد');
    }
}
