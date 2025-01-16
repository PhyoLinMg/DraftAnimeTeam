<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerTwo extends Model
{
    //

    use HasFactory;
    protected $table = 'player_two';

    protected $fillable = ['battle_id', 'role1', 'role2', 'role3', 'role4', 'role5', 'role6', 'skip'];

    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    public function board()
    {
        return $this->hasOne(Board::class);
    }
}
