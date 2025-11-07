<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::all();
        return view('platforms.index', compact('platforms'));
    }

    public function create()
    {
        return view('platforms.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Platform::create($request->all());
        return redirect()->route('platforms.index')->with('success', 'پلتفرم اضافه شد.');
    }

    public function edit(Platform $platform)
    {
        return view('platforms.edit', compact('platform'));
    }

    public function update(Request $request, Platform $platform)
    {
        $request->validate(['name' => 'required']);
        $platform->update($request->all());
        return redirect()->route('platforms.index')->with('success', 'پلتفرم ویرایش شد.');
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();
        return redirect()->route('platforms.index')->with('success', 'پلتفرم حذف شد.');
    }
}
