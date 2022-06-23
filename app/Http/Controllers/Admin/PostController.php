<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    protected $validationRules = [
        "title" => "required|string|max:60",
        "content" => "required|max:1000",
        "published" => "sometimes|accepted"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('admin/posts/index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $data = $request->all();

        $newPost = new Post();

        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->published = isset($data['published']);
        $newPost->category_id = $data['category_id'];
        
        // creazione slug
        $slug = Str::of($data['title'])->slug("-");
        $count = 1;
        while(Post::where('slug', $slug)->first()){
            $slug = Str::of($data['title'])->slug("-")."-{$count}";
            $count++;
        }
        $newPost->slug = $slug;

        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules);
        $data = $request->all();

        $updatedPost = Post::findOrFail($id);

        $updatedPost->title = $data['title'];
        $updatedPost->content = $data['content'];
        $updatedPost->published = isset($data['published']);
        $updatedPost->category_id = $data['category_id'];

        if($updatedPost->title != $data['title']){

            $slug = Str::of($post->title)->slug('-');
            if($slug != $updatedPost->slug){
                $updatedPost->slug = $this->getSlug($updatedPost->title);
            }
        }

        $updatedPost->update();

        return redirect()->route('admin.posts.show', $updatedPost->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    // funzione per creare slug
    private function getSlug($title){

        $slug = Str::of($title)->slug('-');
        $count = 1;

        while(Post::where('slug', $slug)->first()){
            $slug = Str::of($title)->slug('-').'-{$count}';
            $count++;
        }

        return $slug;

    }
}
