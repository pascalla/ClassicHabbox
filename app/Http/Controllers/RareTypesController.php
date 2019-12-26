<?php

namespace App\Http\Controllers;

use App\Category;
use App\Rare;
use Session;
use App\RareType;
use Illuminate\Http\Request;

class RareTypesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rare_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $rareType = new RareType;
        $rareType->name = $request->get('name');
        $rareType->save();

        Session::flash('success', 'Successfully created rare type.');
        return redirect()->route('rares.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RareType  $rareType
     * @return \Illuminate\Http\Response
     */
    public function show(RareType $rareType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RareType  $rareType
     * @return \Illuminate\Http\Response
     */
    public function edit(RareType $rareType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RareType  $rareType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RareType $rareType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RareType  $rareType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RareType $rareType)
    {
        //
    }
}
