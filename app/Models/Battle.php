<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;
    //
    protected $table = 'battles';

    protected $fillable = ['board_id'];

    public function players(): BelongsToMany{
        return $this->belongsToMany(Player::class);
    }

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class);
    }
}
