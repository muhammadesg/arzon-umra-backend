<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->get();
        return view('site.Comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.Comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('Comment', 'public');
        }

        Comment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $path,
        ]);

        return redirect()->route('comments.index')->with('create', "Yagi izoh qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('site.Comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('site.Comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Comment $comment)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comment' => ['required','max:255'],
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $path = $request->file('image')->store('comment', 'public');
        } else {
            $path = $comment->image;
        }

        $comment->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $path,
        ]);

        return redirect()->route('comments.index')->with('update', "Izoh ma'lumotlari o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('delete', "Izoh o'chirildi!");
    }
}
