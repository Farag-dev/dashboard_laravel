<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('categories.index',compact('categories'));
    }


    public function create()
    {
        $parents=Category::all();
       return view('categories.create',compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','between:5,100'],
            'parent_id'=>['nullable','int','exists:categories,id'],
            'description'=>['nullable','string'],
        ],[
            'name.required'=>'name is required',
            'name.between'=>'name is consest of 5letters to 100',
        ]
    );
    $category=new Category();
    $category->name = $request->name;
    $category->slug = Str::slug($request->name) ;
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;
    $category->save();

    return redirect()->route('categories.index')->with('success','inserted new category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','deleted new category');
    }
}
