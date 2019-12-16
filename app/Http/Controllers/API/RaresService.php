<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rare;

class RaresService extends Controller
{
    public function index() {
        $rares = Rare::with('currentPrice','category','priceHistory','releasePrice', 'release')->get();
        return response()->json($rares);
    }
}
