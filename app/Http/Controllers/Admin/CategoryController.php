<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryValidation = [
        'name' => 'required|string|max:50'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->categoryValidation);

        $data = $request->all();

        $newCategory = new Category();

        $newCategory->name = $data['name'];
        $slug = Str::of($newCategory->name)->slug("-");
        $count = 1;
        while(Category::where('cat_slug', $slug)->first()){
            $slug = Str::of($data['title'])->slug("-")."-{$count}";
            $count++;
        }
        $newCategory->cat_slug = $slug;

        $newCategory->save();

        return redirect()->route('admin.categories.show', $newCategory->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
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
        $request->validate($this->categoryValidation);

        $data = $request->all();

        $updatedCat = Category::findOrFail($id);

        $updatedCat->name = $data['name'];

        $slug = Str::of($updatedCat->name)->slug('-');
        $count = 1;
        while(Category::where('cat_slug', $slug)->first()){
            $slug = Str::of($data['name'])->slug("-")."-{$count}";
            $count++;
        }
        $updatedCat->cat_slug = $slug;

        $updatedCat->update();

        return redirect()->route('admin.categories.show', $updatedCat->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();

        return redirect()->route('admin.categories.index');
    }
}
