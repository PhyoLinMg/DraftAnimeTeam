<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;
    protected $table = 'players';

    protected $fillable = ['player_type', 'name'];

    public function battles(): BelongsToMany{
        return $this->belongsToMany(Battle::class)->withPivot('skip');
    }
}
