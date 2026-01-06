<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::orderBy('id', 'desc')->get();
        return view('site.About.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.About.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'image' => ['required', 'image'],
        'name' => ['required', 'max:255'],
        'info' => ['required'],
        'goal_info' => ['required'],
        'advantages_info' => ['required'],
        'story_info' => ['required'],
        'brand' => ['required'],
        'hotel' => ['required'],
        'customer' => ['required'],
        'follower' => ['required'],
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('About', 'public');
    }

    About::create([
        'image' => $path,
        'name' => $request->name,
        'info' => $request->info,
        'goal_info' => $request->goal_info,
        'advantages_info' => $request->advantages_info,
        'story_info' => $request->story_info,
        'brand' => $request->brand,
        'hotel' => $request->hotel,
        'customer' => $request->customer,
        'follower' => $request->follower,
    ]);

    return redirect()->route('abouts.index')->with('create', "Ma'lumot qo'shildi!");
}


    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('site.About.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('site.About.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,About $about)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'info' => ['required'],
            'goal_info' => ['required'],
            'advantages_info' => ['required'],
            'story_info' => ['required'],
            'brand' => ['required'],
            'hotel' => ['required'],
            'customer' => ['required'],
            'follower' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $path = $request->file('image')->store('About', 'public');
        } else {
            $path = $about->image;
        }

        $about->update([
            'image' => $path,
            'name' => $request->name,
            'info' => $request->info,
            'goal_info' => $request->goal_info,
            'advantages_info' => $request->advantages_info,
            'story_info' => $request->story_info,
            'brand' => $request->brand,
            'hotel' => $request->hotel,
            'customer' => $request->customer,
            'follower' => $request->follower,
        ]);
            return redirect()->route('abouts.index')->with('update', "Ma'lumot o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('abouts.index')->with('delete', "Ma'lumot o'chirildi!");
    }
}
