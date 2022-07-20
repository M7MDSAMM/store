<?php

namespace App\Http\Controllers;

use App\Http\Requests\Option as RequestsOption;
use App\Models\Atribute;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $atributes = Atribute::where('active',true)->get();
        $options = Option::all();

        return response()->view('cms.options.index', ['atributes' => $atributes , 'options' => $options]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $atributes = Atribute::where('active', true)->get();
        return response()->view('cms.options.create', ['atributes' => $atributes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsOption $request)
    {
        //
        $option =  Option::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'atribute_id' => $request->get('atribute_id'),

        ]);



        if ($option) {
            return back()->with('message', 'Success! Option created');
        } else {
            return back()->withErrors('failed', 'Failed! Option not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
        $atributes = Atribute::where('active', true)->get();
        return response()->view('cms.options.edit', ['atributes' => $atributes , 'option' => $option]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsOption $request, Option $option)
    {
        //
        $optionUpdated = Option::where('product_id', $option->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'atribute_id' => $request->get('atribute_id'),
            'updated_at'=> now()
        ]));



        if ($optionUpdated ) {
            return redirect()->route('options.index')->with('message', 'Success! Option Edited');
        } else {
            return back()->withErrors('failed', 'Failed! Option Update Faild');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
        $deleted = $option->delete();
        if ($deleted) {
            return redirect()->back()->with('message', 'Deleted Successfully !');
        }
    }
}
