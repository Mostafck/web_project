<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Game;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // نمایش همه سفارش‌ها
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admins.orders.index', compact('orders'));
    }

    // افزودن سفارش جدید (وقتی از Cart ایجاد می‌شود)
    public function store(Request $request, $gameId)
    {
        $game = Game::findOrFail($gameId);

        Order::create([
            'game_id' => $game->id,
            'game_title' => $game->title,
            'price' => $game->price,
        ]);

        return redirect()->back()->with('success', 'سفارش ثبت شد!');
    }
}

