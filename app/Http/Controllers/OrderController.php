<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Game;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // لیست سفارش‌ها
    public function index()
{
    if (!session('logged_in')) {
        return redirect()->route('login');
    }

    $orders = Order::where('user_id', session('user_id'))
        ->latest()
        ->get();

    return view('orders.index', compact('orders'));
}

    // افزودن به سبد خرید
   public function store($id)
{
    if (!session('logged_in')) {
        return redirect()->route('login');
    }

    $game = Game::findOrFail($id);

    $userId = session('user_id');

    Order::create([
        'user_id'    => $userId,
        'game_id'    => $game->id,
        'game_title' => $game->title,
        'price'      => $game->price,
        'status'     => 'pending',
        'is_paid'    => false,
    ]);

    return back()->with('success', '✔ بازی به سبد خرید اضافه شد');
}


    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success', 'سفارش حذف شد');
    }
}
