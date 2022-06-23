@extends('layouts.post_layout')

@section('pageTitle', 'Update Post')

@section('mainContent')

<section class="post-create">

    <div class="container">
        <h1>Modify Post</h1>

        <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="insert title" value="{{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Post Content</label>
                <textarea name="content" id="content" class="form-control">{{$post->content}}</textarea>
            </div>


            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="published" name="published" {{$post->published == 1 ? 'checked' : ''}}>
              <label class="form-check-label" for="published">Publish now?</label>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category : </label>
                <select name="category_id" id="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>

    </div>


    

</section>
    
@endsection