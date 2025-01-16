<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;
    //
    protected $table = 'battles';

    protected $fillable = ['player_1_id', 'player_2_id'];

    public function playerOne(){
        return $this->belongsTo(PlayerOne::class);
    }

    public function playerTwo(){
        return $this->belongsTo(PlayerTwo::class);
    }
}
