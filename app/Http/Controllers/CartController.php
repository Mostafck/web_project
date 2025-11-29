<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class CartController extends Controller
{
    // نمایش سبد خرید
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    // افزودن محصول به سبد
    public function add($id)
    {
        $game = Game::findOrFail($id);

        $cart = session()->get('cart', []);

        // اگر قبلاً در سبد بوده +۱ شود
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id'       => $game->id,
                'title'    => $game->title,
                'price'    => $game->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'بازی به سبد خرید اضافه شد');
    }

    // حذف از سبد
    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // خالی کردن سبد خرید
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index');
    }
}
