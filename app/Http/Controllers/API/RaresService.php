<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rare;
use App\Category;

class RaresService extends Controller
{
    public function index() {
        $rares = Rare::with('currentPrice','category','priceHistory','releasePrice','release','collectableRelease', 'type')->ordered()->all();
        return response()->json($rares);
    }

    public function getByCategory(Request $request, $category_id) {
        $category = Category::findOrFail($category_id);
        $rares = $category->rares->ordered()->all();
        return response()->json($rares);
    }

    public function getByReleased(Request $request) {
        $rares = Rare::with('currentPrice','category','priceHistory','releasePrice','release','collectableRelease')->get();
        $rares = $rares->filter(function ($rare, $key) {
            return $rare->release != null;
        });

        $rares = $rares->sortBy('release.created_at');
        return response()->json($rares->values()->all());
    }
}
