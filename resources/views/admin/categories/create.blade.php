@extends('layouts.categories')

@section('pageTitle', 'Create New Category')

@section('mainContent')

<section class="create-categories">

    <div class="container">
        <h2>Create a New Category</h2>

        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="insert category name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>

</section>
    
@endsection