<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\BattleCollection;
use App\Models\Battle;
use App\Http\Resources\v1\BattleResource;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $battles= Battle::paginate(10);
        return new BattleCollection($battles);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $battle= Battle::find($id);
        return new BattleResource($battle);
    }
}
