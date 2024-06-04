<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->forum_id = $id;
        $comment->save();

        return redirect()->route('forum.show', $id)->with('success', 'Comment added successfully');
    }

    public function update($id){
        $comment = Comment::findOrFail($id);

        return view('forums.update', compact('comment'));
    }

    public function edit(Request $request, $id)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    // Retrieve the existing comment by its ID
    $comment = Comment::findOrFail($id);

    // Update the comment's attributes
    $comment->body = $request->body;

    // Save the changes
    $comment->save();

    return redirect()->route('forum.show', $comment->forum_id)->with('success', 'Comment updated successfully');
}

    public function delete($id){
        $comment = Comment::findOrFail($id);

        $comment->delete();
        return redirect()->route('forum.show', $comment->forum_id)->with('success', 'Comment deleted successfully');
    }
}
