<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        return view('site.Video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.Video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_link' => ['required'],
        ]);

       Video::create([
            'video_link' => $request->video_link,
        ]);
        return redirect()->route('videos.index')->with('create', "Video sharx qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('site.Video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('site.Video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Video $video)
    {
        $request->validate([
            'video_link' => ['required'],
        ]);

        $video->update([
            'video_link' => $request->video_link,
        ]);
            return redirect()->route('videos.index')->with('update', " Video ma'lumoti o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('delete', "Video sharx o'chirildi!");
    }
}
