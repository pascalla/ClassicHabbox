<?php

namespace App\Http\Controllers;

use App\Category;
use App\CollectableRelease;
use Auth;
use Session;
use App\Rare;
use App\RareRelease;
use App\Price;
use Illuminate\Http\Request;

class RaresController extends Controller
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
        $rares = Rare::all();
        return view('rares.index')->with('rares', $rares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('rares.create')->with('categories', $categories);
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
            'motto' => 'required',
            'credits' => 'required|numeric',
            'pixels' => 'required|numeric',
            'image' => 'required',
            'category' => 'required'
        ]);

        $rare = new Rare;
        $rare->name = $request->get('name');
        $rare->mission = $request->get('motto');
        $rare->image = $request->get('image');
        $rare->small_image = $request->get('small_image');
        $rare->category_id = $request->get('category');
        $rare->save();

        $price = new Price;
        $price->rare_id = $rare->id;
        $price->user_id = Auth::id();
        $price->credits = $request->get('credits');
        $price->pixels = $request->get('pixels');
        $price->direction = 1;
        $price->release = true;
        $price->save();

        if($request->has('rare_release')) {

            $rareReleases = RareRelease::all();
            foreach($rareReleases as $release){
                $release->active = 0;
                $release->save();
            }

            $rareRelease = new RareRelease;
            $rareRelease->rare_id = $rare->id;
            $rareRelease->active = true;
            $rareRelease->save();
        }

        if($request->has('collectable_release')) {
            $collectableReleases = CollectableRelease::all();
            foreach($collectableReleases as $release){
                $release->active = 0;
                $release->save();
            }

            $collectableRelease = new CollectableRelease;
            $collectableRelease->rare_id = $rare->id;
            $collectableRelease->active = true;
            $collectableRelease->save();
        }

        Session::flash('success', 'Successfully created rare.');
        return redirect()->route('rares.show', $rare->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rare  $rare
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rare = Rare::find($id);
        return view('rares.show')->with('rare', $rare);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rare  $rare
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rare = Rare::find($id);
        $categories = Category::all();
        return view('rares.edit')->with('rare', $rare)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rare  $rare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'motto' => 'required',
            'credits' => 'required|numeric',
            'pixels' => 'required|numeric',
            'image' => 'required',
            'category' => 'required'
        ]);


        $rare = Rare::find($id);

        $rare->name = $request->get('name');
        $rare->mission = $request->get('motto');
        $rare->image = $request->get('image');
        $rare->small_image = $request->get('small_image');
        $rare->category_id = $request->get('category');
        $rare->save();

        Session::flash('success', 'Successfully updated rare.');
        return redirect()->route('rares.show', $rare->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rare  $rare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rare $rare)
    {
        //
    }
}
