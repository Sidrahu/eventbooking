<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;  
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
{
    $comments = Comment::with('replies')->get();
    return view('comments.index', compact('comments'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $postId;
        $comment->user_id = auth()->id();
        $comment->parent_id = null;  
        $comment->save();

        return redirect()->route('posts.show', $postId)->with('success', 'Comment added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($request->only('content'));

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.index')->with('success', 'Comment deleted successfully!');
    }

    public function reply(Request $request, $commentId)
    {
        $request->validate([
            'reply_content' => 'required|string|max:500',
        ]);

        $comment = Comment::findOrFail($commentId);

        $reply = new Comment();
        $reply->content = $request->input('reply_content');
        $reply->post_id = $comment->post_id; 
        $reply->user_id = auth()->id();  
        $reply->parent_id = $commentId;  
        $reply->save();

        return redirect()->back()->with('success', 'Reply added successfully!');
    }

    public function addCommentAsUserToExistingComment($commentId, $userId)
    {
        $comment = Comment::findOrFail($commentId);
        $user = User::findOrFail($userId);

        $comment->commentAsUser($user, "Hey there!");

        return redirect()->back()->with('success', 'Comment added successfully as another user!');
    }

    public function addCommentAsUser($postId, $userId)
    {
        $post = Post::findOrFail($postId); 
        $user = User::findOrFail($userId); 

        if ($post && $user) {
            $post->commentAsUser($user, 'This is a comment from another user.');
            return redirect()->route('posts.show', $post->id)->with('success', 'Comment added as another user successfully!');
        }

        return redirect()->back()->with('error', 'Post or user not found.');
    }

     

}



