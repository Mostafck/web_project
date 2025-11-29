<?php

namespace App\Http\Controllers;

use Shetabit\Payment\Facade\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay()
    {
        $cart = session('cart', []);
        $amount = 0;

        foreach ($cart as $item) {
            $amount += $item['price'] * $item['qty'];
        }

        return Payment::callbackUrl(route('payment.verify'))
            ->purchase(
                amount: $amount,
                callback: function ($driver, $transactionId) {
                    session(['transaction_id' => $transactionId]);
                }
            )
            ->pay()
            ->render();
    }

    public function verify(Request $request)
    {
        $transactionId = session('transaction_id');

        $receipt = Payment::amount(0)->transactionId($transactionId)->verify();

        session()->forget('cart');
        session()->forget('transaction_id');

        return "پرداخت با موفقیت انجام شد ✔️";
    }
}

