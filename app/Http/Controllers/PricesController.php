<?php

namespace App\Http\Controllers;

use App\Price;
use App\Rare;
use Auth;
use Illuminate\Http\Request;

class PricesController extends Controller
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
        //
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
            'credits' => 'required',
            'rare_id' => 'required',
        ]);

        $rare = Rare::find($request->get('rare_id'));
        $oldPrice = $rare->price();

        $price = new Price;
        $price->rare_id = $request->get('rare_id');
        $price->user_id = Auth::id();
        $price->credits = $request->get('credits');

        if($price->credits > $oldPrice->credits) {
            $price->direction = 2;
        } else if($price->credits < $oldPrice->credits) {
            $price->direction = 0;
        } else {
            $price->direction = 1;
        }

        $price->pixels = 0;
        $price->release = 0;
        $price->save();

        return redirect()->route('prices.show', $rare->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rare = Rare::find($id);
        return view('prices.show')->with('rare', $rare);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
