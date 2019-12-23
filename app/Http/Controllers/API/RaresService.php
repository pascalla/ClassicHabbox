<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rare;
use App\Category;

class RaresService extends Controller
{
    public function index() {
        $rares = Rare::with('currentPrice','category','priceHistory','releasePrice','release','collectableRelease')->ordered()->all();
        return response()->json($rares);
    }

    public function getByCategory(Request $request, $category_id) {
        $category = Category::findOrFail($category_id);
        $rares = $category->rares->ordered()->all();
        return response()->json($rares);
    }
}
