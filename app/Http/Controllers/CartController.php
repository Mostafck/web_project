<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Game;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // افزودن به سبد خرید
    public function add($id)
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $game = Game::findOrFail($id);

        Order::create([
            'user_id'    => session('user_id'),
            'user_name'  => 'admin', // فعلاً فیک
            'game_id'    => $game->id,
            'game_title' => $game->title,
            'price'      => $game->price,
            'status'     => 'pending',
            'is_paid'    => false,
        ]);

        return back()->with('success', '✔ بازی به سبد خرید اضافه شد');
    }

    // نمایش سبد خرید
    public function index()
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $orders = Order::where('user_id', session('user_id'))
            ->where('status', 'pending')
            ->get();

        return view('cart.index', compact('orders'));
    }

    // حذف یک سفارش از سبد خرید
    public function remove($id)
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $order = Order::where('id', $id)
            ->where('user_id', session('user_id'))
            ->firstOrFail();

        $order->delete();

        return back()->with('success', '✔ سفارش حذف شد');
    }
    public function complete($id)
{
    if (!session('logged_in')) {
        return redirect()->route('login');
    }

    $order = Order::where('id', $id)
        ->where('user_id', session('user_id'))
        ->where('status', 'pending')
        ->firstOrFail();

    $user = \App\Models\User::find(session('user_id'));

    // بررسی موجودی
    if ($user->balance < $order->price) {
        return back()->with('error', '⚠ موجودی شما کافی نیست');
    }

    // کم کردن موجودی
    $user->decrement('balance', $order->price);

    // تغییر وضعیت سفارش
    $order->update([
        'status' => 'completed',
        'is_paid' => true
    ]);

    return back()->with('success', '✔ پرداخت با موفقیت انجام شد و سفارش تکمیل شد');
}


}
