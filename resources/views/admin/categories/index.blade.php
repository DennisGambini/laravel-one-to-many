@extends('layouts.categories')

@section('pageTitle', 'All Categories')

@section('mainContent')

<section class="all-categories">

    <div class="container">

        <h1>All Categories</h1>

        <div>
            <button class="mb-5">
                <a href="{{route('admin.categories.create')}}">Create New Category</a>
            </button>
        </div>
    
        <div class="row">
            @foreach ($categories as $category)

            <div class="col-3">

                <div class="cat-card">
                    
                    <div class="cat-name">
                        <span class="cat-span">Name : </span>
                        <a href="{{route('admin.categories.show', $category->id)}}">{{$category->name}}</a>
                    </div>

                    <div class="cat-id">
                        <span class="cat-span">ID : </span>{{$category->id}}
                    </div>

                    <div class="cat-btns">

                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>

                        <button>
                            <a href="{{route('admin.categories.edit', $category->id)}}">Modify</a>
                        </button>

                    </div>

                </div>

            </div>
                
            @endforeach
        </div>

    </div>

</section>
    
@endsection