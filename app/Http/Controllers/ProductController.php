<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'new_price' => $request->get('new_price'),
            'description' => $request->get('description'),
            'skv' => $request->get('skv'),
            'in_stock' => $request->has('in_stock'),
            'category_id' => $request->get('category_id'),

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $product->title . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('products', $imageName, ['disk' => 'public']);
            $product->image = $imageName;
        }

        $product->save();

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
        // $product = Product::where($product->id)->get();
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

        if ($request->get('new_price') != $product->new_price) {
            $old_price =  $product->new_price;
        }else{
            $old_price = 0;
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Storage::disk('public')->delete("products/$product->image");
            $imageName = time() . '_' . $product->title . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('products', $imageName, ['disk' => 'public']);
            $product->image = $imageName;
            $updatedImage = $imageName;
        }else{
            $updatedImage = $product->image;
        }



        $productUpdated = Product::where('product_id', $product->update([
            'title' => $request->get('title'),
            'image' => $updatedImage,
            'old_price' => $old_price,
            'new_price' => $request->get('new_price'),
            'description' => $request->get('description'),
            'skv' => $request->get('skv'),
            'in_stock' => $request->has('in_stock'),
            'category_id' => $request->get('category_id'),
            'updated_at'=> now()
        ]));



        if ($productUpdated ) {
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
