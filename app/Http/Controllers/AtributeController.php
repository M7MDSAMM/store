<?php

namespace App\Http\Controllers;

use App\Models\Atribute;
use Illuminate\Http\Request;

class AtributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Atribute::all();

        return response()->view('cms.atribute.index', ['atributes' => $data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.atribute.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $atribute =  Atribute::create([
            'name' => $request->get('name'),
            'active' => $request->has('active'),
        ]);

        if ($atribute) {

            return back()->with('message', 'Success! Atribute created');
        } else {
            return back()->withErrors('failed', 'Failed! Atribute not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atribute  $atribute
     * @return \Illuminate\Http\Response
     */
    public function show(Atribute $atribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atribute  $atribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Atribute $atribute)
    {
        //
        return response()->view('cms.atribute.edit', ['atribute' => $atribute]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atribute  $atribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atribute $atribute)
    {
        //
        $atributeUpdated = Atribute::where('product_id', $atribute->update([
            'name' => $request->get('name'),
            'active' => $request->has('active'),
        ]));



        if ($atributeUpdated ) {
            return redirect()->route('atributes.index')->with('message', 'Success! Atribute Edited');
        } else {
            return back()->withErrors('failed', 'Failed! Atribute not created');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atribute  $atribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atribute $atribute)
    {
        //
        $deleted = $atribute->delete();
        if ($deleted) {
            return redirect()->back()->with('message', 'Deleted Successfully !');
        }
    }
}
