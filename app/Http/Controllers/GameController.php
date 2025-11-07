<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::latest()->paginate(10);
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string',
        ], [
            'title.required' => 'عنوان بازی الزامی است.',
            'title.max' => 'عنوان بازی نباید بیش از ۲۵۵ کاراکتر باشد.',
            'release_date.date' => 'تاریخ انتشار معتبر نیست.',
        ]);

        Game::create($validated);

        return redirect()->route('games.index')->with('success', 'بازی جدید با موفقیت افزوده شد ✅');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|min:10',
        ]);

        $game->update($request->all());
        return redirect()->route('games.index')->with('success', 'بازی با موفقیت ویرایش شد.');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'بازی حذف شد.');
    }
}
