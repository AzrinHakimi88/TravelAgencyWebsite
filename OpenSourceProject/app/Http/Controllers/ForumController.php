<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    

    public function index()
    {
        $topics = Forum::with('user')->get();
        return view('forum', compact('topics'));
    }

    public function show($id)
    {
        $topic = Forum::with(['user', 'comments.user'])->findOrFail($id);
        return view('forums.show', compact('topic'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $topic = new Forum();
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->user_id = auth()->id();
        $topic->save();

        return redirect()->route('forum')->with('success', 'Topic created successfully');
    }
}
