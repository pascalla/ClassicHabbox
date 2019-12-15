<?php

namespace App\Http\Controllers;

use App\RareRelease;
use Illuminate\Http\Request;
use App\Rare;
use App\Price;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rares = Rare::all();
        $recents = Price::latest()->take(3)->get();
        $release = RareRelease::where('active', true)->latest()->first();
        return view('home')->with('rares', $rares)->with('recents', $recents)->with('release', $release);
    }
}
