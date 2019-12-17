<?php

namespace App\Http\Controllers;

use Session;
use App\Badge;
use Illuminate\Http\Request;

class BadgesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = Badge::all();
        return view('badges.index')->with('badges', $badges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('badges.create');
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
            'code' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'obtained_by' => 'required',
            'image' => 'required'
        ]);

        $badge = Badge::create($request->all());
        Session::flash('success', 'Successfully created badge.');
        return redirect()->route('badges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $badge = Badge::find($id);
        return view('badges.edit')->with('badge', $badge);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'obtained_by' => 'required',
            'image' => 'required'
        ]);

        $badge = Badge::find($id);
        $badge->code = $request->get('code');
        $badge->name = $request->get('name');
        $badge->desc = $request->get('code');
        $badge->obtained_by = $request->get('obtained_by');
        $badge->image = $request->get('image');

        $badge->save();
        Session::flash('success', 'Successfully updated badge.');
        return redirect()->route('badges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        //
    }
}
