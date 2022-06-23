@extends('layouts.post_layout')

@section('pageTitle', 'All Posts')

@section('mainContent')

<section class="all-posts">

    <div class="container">

        <h1>All Posts</h1>

        <div>
            <button class="mb-5">
                <a href="{{route('admin.posts.create')}}">Crea un nuovo post</a>
            </button>
        </div>
    
        <div class="row">
            @foreach ($posts as $post)

            <div class="col-3">
                <div class="post-card">
                    <div class="post-title">
                        <span class="post-span">Titolo : </span>
                        <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
                    </div>
                    <div class="post-categories">
                        <span class="post-span">Categories : </span>
                        {{
                        $post->category_id != null ? App\Category::find($post->category_id)->name : 'none'
                        }}
                    </div>
                    <div class="post-content">
                        <span class="post-span">Content : </span>
                        {{$post->content}}
                    </div>
                    <div class="post-slug">
                        <span class="post-span">Slug : </span>
                        {{$post->slug}}
                    </div>
                    <div class="post-published">
                        <span class="post-span">Published : </span>
                        {{$post->published}}
                    </div>
                    <div class="post-date">
                        <span class="post-span">Created : </span>
                        {{$post->created_at}}
                    </div>
                    <div class="post-btns">

                        {{-- bottone/form delete --}}
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>

                        {{-- link edit --}}
                        <button>
                            <a href="{{route('admin.posts.edit', $post->id)}}">Modify</a>
                        </button>

                    </div>
                </div>
            </div>
                
            @endforeach
        </div>

    </div>

</section>

@endsection