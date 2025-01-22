<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;
    //
    protected $table = 'battles';

    protected $fillable = ['board_id'];

    public function board(): BelongsTo{
        return $this->belongsTo(Board::class);
    }
    public function players(): BelongsToMany{
        return $this->belongsToMany(Player::class)->withPivot('skip');
    }

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class,'character_battle')->withPivot('role_id','player_id');
    }
}
