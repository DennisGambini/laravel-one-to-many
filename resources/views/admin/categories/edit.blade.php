@extends('layouts.categories')

@section('pageTitle', 'Edit - '.$category->name)

@section('mainContent')

<section class="edit-categories">

    <div class="container">
        <h2>Edit Category</h2>

        <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="insert new name" value="{{$category->name}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>

</section>
    
@endsection