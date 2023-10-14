<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index',[
            'category' => new Category(),
            'categorys' => Category::latest()->get()
        ]);
    }
    public function read()
    {
        return Category::latest()->get();
    }
    public function store(CategoryRequest $request)
    {
        $add = Category::Create($request->validated());
        return response()->json($add);
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    public function edite(CategoryRequest $request,$id)
    {
        $post = Category::where('id',$id)->update($request->validated());
        return response()->json($post);
    }
    public function delete($id)
    {
            $post = Category::find($id);
       return response()->json($post);
    }
}
