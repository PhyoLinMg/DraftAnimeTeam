<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Battle;

class BattleController extends Controller
{
    //
    public function index(){
        $battles= Battle::all();
        return new BattleResourceCollection($battles);
    }
    
}
