<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advantages = Advantage::orderBy('id', 'desc')->get();
        return view('site.Advantage.index', compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.Advantage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon_name' => ['required', 'image'],
            'name' => ['required', 'max:255'],
        ]);

        if ($request->hasFile('icon_name')) {
            $path = $request->file('icon_name')->store("Advantages", 'public');
        }


        Advantage::create([
            'icon_name' => $path,
            'name' => $request->name,
        ]);
        return redirect()->route('advantages.index')->with('create', "Yangi avzallik qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Advantage $advantage)
    {
        return view('site.Advantage.show', compact('advantage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advantage $advantage)
    {
        return view('site.Advantage.edit', compact('advantage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advantage $advantage)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        if ($request->hasFile('icon_name')) {
            $request->validate([
                'icon_name' => ['required', 'image'],
            ]);
            $path = $request->file('icon_name')->store("Advantages", 'public');
        } else {
            $path = $advantage->icon_name;
        }


        $advantage->update([
            'icon_name' => $path,
            'name' => $request->name,
        ]);
        return redirect()->route('advantages.index')->with('update', "Avzallik o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advantage $advantage)
    {
        $advantage->delete();
        return redirect()->route('advantages.index')->with('delete', "Avzallik o'chirildi!");
    }
}
