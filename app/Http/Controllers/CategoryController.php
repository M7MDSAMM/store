<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Category::all();

        return response()->view('cms.categories.index', ['categories' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        // $this->authorize('create', Category::class);


        // $category = new Category();
        // $category->title = $request->get('title');
        // $category->active = $request->has('active');
        // $isSaved = $category->save();
        // if ($isSaved) {

        //     return redirect()->back();
        // }



        $category =  Category::create([
            'title' => $request->get('title'),
            'active' => $request->has('active'),
        ]);

        if ($category) {

            return back()->with('message', 'Success! Category created');
        } else {
            return back()->withErrors('failed', 'Failed! Category not created');
        }
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
        return response()->view('cms.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        $category->title = $request->get('title');
        $category->active = $request->has('active');
        $isSaved = $category->save();
        if ($isSaved) {
            return redirect()->route('categories.index')->with('message', 'Success! Category Edited');

            } else {
                return back()->withErrors('failed', 'Failed! Category not created');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //

        $deleted = $category->Delete();
        if ($deleted) {
            return redirect()->back()->with('message', 'Deleted Successfully !');
        }
    }
}
