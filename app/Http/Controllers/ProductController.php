<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::with('category')->get();

        return response()->view('cms.products.index', ['products' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('active', true)->get();
        return response()->view('cms.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $product =  Product::create([
            'title' => $request->get('title'),
            'image' => $request->get('image'),
            'new_price' => $request->get('new_price'),
            'description' => $request->get('description'),
            'skv' => $request->get('skv'),
            'in_stock' => $request->has('in_stock'),
            'category_id' => $request->get('category_id')
        ]);

        if ($product) {

            return back()->with('message', 'Success! product created');
        } else {
            return back()->withErrors('failed', 'Failed! product not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::where('active', true)->get();
        return response()->view('cms.products.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //

        if ($request->get('price') != $product->new_price) {
            $old_price =  $product->new_price;
        }

        $productUpdated = Product::where('product_id', $product->update([
            'title' => $request->get('title'),
            'image' => $request->get('image'),
            'old_price' => $old_price,
            'new_price' => $request->get('new_price'),
            'description' => $request->get('description'),
            'skv' => $request->get('skv'),
            'in_stock' => $request->has('in_stock'),
            'category_id' => $request->get('category_id')


        ]));



        if ($productUpdated) {
            return redirect()->route('products.index')->with('message', 'Success! product Edited');
        } else {
            return back()->withErrors('failed', 'Failed! product not created');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $deleted = $product->delete();
        if ($deleted) {
            return redirect()->back()->with('message', 'Deleted Successfully !');
        }
    }
}
