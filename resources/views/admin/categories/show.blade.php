@extends('layouts.categories')

@section('pageTitle', $category->name)

@section('mainContent')

<section class="show-categories">

    <div class="container">

        <h2>{{$category->name}}</h2>
    
        <div>
            <span class="red">NAME : </span>
            <span>{{$category->name}}</span>
        </div>
        <div>
            <span class="red">ID : </span>
            <span>{{$category->id}}</span>
        </div>
        <div>
            <span class="red">SLUG : </span>
            <span>{{$category->cat_slug}}</span>
        </div>
        <div>
            <span class="red">CREATED : </span>
            <span>{{$category->created_at}}</span>
        </div>
        <div>
            <span class="red">UPDATED : </span>
            <span>{{$category->updated_at}}</span>
        </div>
        <div>
            <button>
                <a href="{{route('admin.categories.edit', $category->id)}}">Modify</a>
            </button>
        </div>

    </div>


</section>
    
@endsection