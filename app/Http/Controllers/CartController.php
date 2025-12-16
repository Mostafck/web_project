<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Game;
use Illuminate\Http\Request;

class CartController extends Controller
{
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


}
