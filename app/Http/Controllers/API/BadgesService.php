<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Badge;

class BadgesService extends Controller
{
    public function index(){
        $badges = Badge::all();
        return response()->json($badges);
    }
}
