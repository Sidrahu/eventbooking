<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments')->get(); 
        return view('posts.index', compact('posts'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
     
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');  
        } else {
            $imagePath = null;
        }
    
      
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $imagePath, 
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    
    
    
    /**
     * Display the specified resource.
     */
    /**
 * Display the specified resource.
 */
public function show($id)
{
    $post = Post::with(['comments' => function($query) {
        $query->whereNull('parent_id'); 
    }])->findOrFail($id);

 
    $comments = $post->comments;

  
    $approved = $post->comments()->where('is_approved', 1)->get();  

    return view('posts.show', [
        'post' => $post,
        'comments' => $comments,
        'approved_comments' => $approved,  
    ]);
}

    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
   
    $post = Post::findOrFail($id);
    
 
    return view('posts.edit', compact('post'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
       
        $post = Post::findOrFail($id);
    
    
        $post->update($request->all());
    
        
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete(); 
    
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
    
}
